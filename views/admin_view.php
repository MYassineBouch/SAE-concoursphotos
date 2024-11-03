<?php
require ('./views/blocks/header.php');
class AdminView {
    public function displayResults($voteResults, $photoResults) {

        echo "<h1>Résultats des votes</h1>";
        echo "<table>";
        echo "<tr><th>Photo ID</th><th>Nombre de votes</th></tr>";
        foreach ($voteResults as $result) {
            echo "<tr><td>" . $result['photo_id'] . "</td><td>" . $result['vote_count'] . "</td></tr>";
        }
        echo "</table>";
        echo "<h1>Résultats des photos</h1>";
        echo "<table>";
        echo "<tr><th>Photo ID</th><th>Photo URL</th></tr>";
        foreach ($photoResults as $result) {
            echo "<tr><td>" . $result['photo_id'] . "</td><td><img src='" . $result['photo_url'] . "' alt='Photo'></td></tr>";
        }
        echo "</table>";
        $this->displayFooter();
    }

    public function displayUsersWhoVoted($users) {
        $this->displayHeader();
        echo "<h1>Utilisateurs qui ont voté</h1>";
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>" . htmlspecialchars($user['nom']) . " " . htmlspecialchars($user['prenom']) . "</li>";
        }
        echo "</ul>";

    }
}

require('./views/blocks/footer.php');