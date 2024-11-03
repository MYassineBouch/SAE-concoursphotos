<?php
class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function validateVotes() {
        // Update all votes to mark them as validated
        $query = $this->db->prepare("UPDATE vote SET validated = 1 WHERE validated = 0");
        $query->execute();
    }

    public function validatePhotos() {
        // Update all photos to mark them as validated
        $query = $this->db->prepare("UPDATE photo SET validated = 1 WHERE validated = 0");
        $query->execute();
    }

    public function getVoteResults() {
        // Count the number of votes for each photo and return the results in descending order of the number of votes
        $query = $this->db->prepare("SELECT photo_id, COUNT(*) as vote_count FROM vote WHERE validated = 1 GROUP BY photo_id ORDER BY vote_count DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPhotoResults() {
        // Get all validated photos
        $query = $this->db->prepare("SELECT * FROM photo WHERE validated = 1");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersWhoVoted() {
        // Select all unique users who have voted
        $query = $this->db->prepare("SELECT DISTINCT user.id, user.nom, user.prenom FROM user INNER JOIN vote ON user.id = vote.user_id2");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}