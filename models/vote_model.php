<?php
/**
 * fetch votes
 * return id, photo_id, user_id
 * @param PDO $connex
 * @return array
 */
function vote_dump(PDO $connex) {
    $req = "SELECT p.id, p.file_path, COUNT(v.id) AS total_votes
            FROM photo p
            INNER JOIN vote v ON p.id = v.photo_id
            GROUP BY p.id, p.file_path";

    $prep = $connex->prepare($req);
    $prep->execute();
    $votes_by_photo = $prep->fetchAll(PDO::FETCH_ASSOC);
    $prep->closeCursor();

    // Get the sum of all votes
    $req_sum = "SELECT COUNT(*) AS votes_total FROM vote";
    $prep_sum = $connex->prepare($req_sum);
    $prep_sum->execute();
    $votes_total = $prep_sum->fetchColumn();
    $prep_sum->closeCursor();


    return array(
        'votes_by_photo' => $votes_by_photo,
        'votes_total' => $votes_total
    );
}


function vote_add(PDO $connex, $user_id, $photo_id) {
    $stmt = $connex->prepare("SELECT COUNT(*) FROM vote WHERE user_id2 = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($count == 0) {
        $req = "INSERT INTO vote (photo_id, user_id2) VALUES (:photo_id, :user_id)";
        $prep = $connex->prepare($req);
        $prep->bindParam(':photo_id', $photo_id, PDO::PARAM_INT);
        $prep->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    } else {
        echo 'Vous avez déjà voté une seule fois, merci !';
    }
}

function ensure_user_exists($connex) {

    $user_id = $_SESSION['user_id'];
    $stmt = $connex->prepare("SELECT COUNT(*) FROM user WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $stmt = $connex->prepare("INSERT INTO user (id, nom) VALUES (:user_id, :nom)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':nom', $_SESSION["user_login"]);
        $stmt->execute();
    }
}
