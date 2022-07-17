<?php

class AdminController extends UserController
{
    private object $articles;

    private function changeStatus() : void
    {
        if (isset($_POST['statususer'])) {
            $userID = $_POST['statususer'];
            $checkUser = $this->db->getRecords(DatabaseProperties::USERSTAB_NAME, DatabaseProperties::USERSTAB_ID, $userID);
            $statusColumn = ['user_status'];
            $newStatus = [];
            if ($checkUser[0]['user_status'] === 'User') {
                $newStatus = ['Admin'];
            } else {
                $newStatus = ['User'];
            }
            $this->db->editRecord(DatabaseProperties::USERSTAB_NAME, $statusColumn, $newStatus, DatabaseProperties::USERSTAB_ID, $userID);
        }
    }

    public function __construct($db)
    {
        parent::__construct($db);
        $this->changeStatus();
        $this->articles = new ArticlesController($db);
    }
}