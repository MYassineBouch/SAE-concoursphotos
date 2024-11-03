<?php

function user_login()
{
    require('./models/connection.php');
    $connex = connection();
    require('./models/login_model.php');
    $photos = login_ldap($connex);

}

function check_login()
{
        session_start();
        if (empty($_SESSION['user_id'])) {
              header("Location: ./index.php");
              exit();
        }

}

function check_admin()
{
        session_start();
        if ($_SESSION['user_id'] !== 1) {
          header("Location: ./index.php?route=welcome");
          exit();
        }

}


function user_logout() {
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: ./index.php");
    exit();
}
