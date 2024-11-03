<?php
require('./models/connection.php');
require_once('./models/admin_model.php');
require_once('./views/admin_view.php'); // Include the AdminView class

class AdminController {
    private $model;
    private $view;

    public function __construct() {
        $db = connection(); // Create the database connection object
        $this->model = new AdminModel($db); // Pass the database connection object to the AdminModel class
        $this->view = new AdminView();
        $usersWhoVoted = $this->model->getUsersWhoVoted();
        $this->view->displayUsersWhoVoted($usersWhoVoted);
    }

    public function validateVotes() {
        $this->model->validateVotes();
        // Update the view accordingly
    }

    public function validatePhotos() {
        $this->model->validatePhotos();
        // Update the view accordingly
    }

    function show_results() {
        require('./views/result_view.php');

        $voteResults = $this->model->getVoteResults();
        $photoResults = $this->model->getPhotoResults();
        $this->view->displayResults($voteResults, $photoResults);
    }
}