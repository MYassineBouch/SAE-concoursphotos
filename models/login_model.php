<?php
session_start();

// Configuration for the LDAP server
define('SERVER', 'ldaps://ldapsupannappli.univ-poitiers.fr:636');
define('ROOT', 'ou=people,dc=univ-poitiers,dc=fr');

function login_ldap(PDO $connex)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $error_login = "";
        $admin_username = 'admin';
        $admin_password_hash = password_hash('admin', PASSWORD_DEFAULT);
        $etudiant_password_hash = password_hash('etudiant', PASSWORD_DEFAULT);

        $connex = ldap_connect(SERVER);
        ldap_set_option($connex, LDAP_OPT_PROTOCOL_VERSION, 3);

        if (isset($login) && isset($pass)) {
            if ($login === $admin_username && password_verify($pass, $admin_password_hash)) {
                $_SESSION['user_id'] = 1;
                $_SESSION['user_login'] = $admin_username;
                require('./views/admin_view.php');
                exit();
            } elseif ($login === "etudiant" && password_verify($pass, $etudiant_password_hash)) {
                $_SESSION['user_id'] = 2;
                $_SESSION['user_login'] = "etudiant";
                header('Location: index.php?route=welcome');
                exit();
            }
        }

        if ($connex) {
            $ldap_bind = ldap_bind($connex);
            if ($ldap_bind) {
                $req = 'supannAliasLogin=' . $login;
                $res = ldap_search($connex, ROOT, $req);
                if ($res !== false) {
                    $entries = ldap_get_entries($connex, $res);

                    if ($entries['count'] > 0) {
                        $uid = $entries[0]['uid'][0];
                        $dn = 'uid=' . $uid . ',' . ROOT;

                        if (ldap_bind($connex, $dn, $pass)) {
                            $_SESSION['user_id'] = $uid;
                            $_SESSION['user_login'] = $login; // login
                            header('Location: index.php?route=welcome');
                            $error_login = "";
                            exit();
                        } else {
                            $error_login = "Mot de passe incorrect.";
                            require('./views/login_view.php');
                        }
                    } else {
                        $error_login = "Utilisateur n'existe pas";
                        require('./views/login_view.php');
                    }
                }
            }
        }
    }
}
?>
