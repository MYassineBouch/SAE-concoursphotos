<?php
/**
 * fetch photos
 * return id, legende, user_id1, filepath
 * @param PDO $connex
 * @return array
 */
function fetch_photos(PDO $connex) {

    $req = "SELECT id, legende, user_id1, file_path FROM photo";

    $prep = $connex->prepare($req);
    $prep->execute();
    $photos = $prep->fetchAll(PDO::FETCH_ASSOC);
    $prep->closeCursor();

    return $photos;
}

function insert_photo(PDO $connex, $file_path, $legende, $user_id) {
    $req = "INSERT INTO photo (file_path, legende, user_id1) VALUES (:file_path, :legende, :user_id)";
    $prep = $connex->prepare($req);
    $prep->bindValue(':file_path', $file_path);
    $prep->bindValue(':legende', $legende);
    $prep->bindValue(':user_id', $user_id);
    $prep->execute();
}


