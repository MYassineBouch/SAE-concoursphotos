<?php
// affichage des erreurs (periode de developpement)
    //The front root controller
   // error_reporting(E_ERROR);
   // ini_set("display_errors", 1);

    //The requested route
    $route = null;
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
    }

    //We switch to the good controller
    switch ($route) {
        case null:
            require('views/login_view.php');
            break;

        case 'welcome':
            require('control/ctrl_login.php');
            check_login();
            require('views/welcome_view.php');
            break;

        case 'upload':
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            upload_photo_controller();
            break;

        case 'photos';
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            list_photo();
            break;

        case 'voter':
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            list_photo();
            require('control/ctrl_vote.php');
            vote_add_controller();
            break;

        case 'resultats':
            require('control/ctrl_login.php');
            check_login();
            check_admin();

            require('control/ctrl_vote.php');
            fetch_votes();
            break;

        case 'login':
            require('control/ctrl_login.php');
            user_login();
            break;

        case 'logout':
            require('control/ctrl_login.php');
            user_logout();
            break;

        case 'admin':
        require('control/ctrl_login.php');
        check_login();
        check_admin();
        require('control/ctrl_admin.php');
        break;

      # les controleurs :
        default:
            require('views/404_view.php');
            break;
    }
