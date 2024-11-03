<?php

function fetch_votes() {
    // get connection
    require('./models/connection.php');
    $c = connection();
    // call CRUD
    require('./models/vote_model.php');
    $result = vote_dump($c);
    $votes_by_photo = $result['votes_by_photo'];
    $votes_total = $result['votes_total'];
   // $user_upload = $result['user_upload'];

    //view HTML
    require('./views/result_view.php');
}


function vote_add_controller()
{
    require('./models/login_model.php');
    $error_message = "";
    $success_message = "";

    // Check if the user is logged in
    if ($_SESSION["user_id"] == "admin" or $_SESSION["user_id"] == "etudiant") {
        echo "Les administrateurs et les comptes test ne votent pas ici.";
        return;
   }

    $c = connection();

    require('./models/vote_model.php');
    ensure_user_exists($c);
    $photo_id = $_POST['photo_id'];
    $user_id = $_SESSION['user_id'];

    if (vote_add($c,$user_id, $photo_id)) {
        $success_message = "Votre vote a été pris en compte. Merci !";
    } else {
        $error_message = "Votre vote n'a pas été pris en compte, veuillez réssayer! ";
    }


}
