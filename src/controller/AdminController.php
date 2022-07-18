<?php

class AdminController extends UserController
{
    private object $articles;

    private function changeStatus() : void
    {
        if (isset($_POST['statususer'])) {
            $userID = $_POST['statususer'];
            $checkUser = $this->db->getRecords(UsersTable::NAME, UsersTable::ID_COLUMN, $userID);
            $statusColumn = ['user_status'];
            $newStatus = [];
            if ($checkUser[0]['user_status'] === 'User') {
                $newStatus = ['Admin'];
            } else {
                $newStatus = ['User'];
            }
            $this->db->editRecord(UsersTable::NAME, $statusColumn, $newStatus, UsersTable::ID_COLUMN, $userID);
        }
    }

    public function __construct($db)
    {
        parent::__construct($db);
        $this->changeStatus();
        $this->articles = new ArticlesController($db);
    }
}