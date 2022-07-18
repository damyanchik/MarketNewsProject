<?php

class UserController extends GuestController
{
    public array $userDetails;
    private object $comments;

    private function loadUserDetails() : void
    {
        if (isset($_SESSION['person']) && isset($_SESSION['login'])) {
            $this->userDetails = $this->db->getRecords(UsersTable::NAME, UsersTable::LOGIN_COLUMN, $_SESSION['login']);
        }
    }

    public function changeEmail () : void
    {
        if (isset($_POST['changeEmail'])) {
            $newEmail = $_POST['newEmail'];
            $password = $_POST['confirmPassword'];

            $checkNewEmail = $this->db->getRecords(UsersTable::NAME, UsersTable::EMAIL_COLUMN, $newEmail);

            if (empty($checkNewEmail)) {
                if (Validation::validateEmail($newEmail)) {
                    if (password_verify($password, $this->userDetails[0]['user_password'])) {
                        $editedEmail = [];
                        $editedEmail = [$newEmail];
                        $emailColumn = [];
                        $emailColumn = [UsersTable::EMAIL_COLUMN];
                        $this->db->editRecord(UsersTable::NAME, $emailColumn, $editedEmail, UsersTable::ID_COLUMN, $this->userDetails[0]['user_id']);
                        echo 'Zmieniono email.';
                    } else {
                        echo 'Podane hasło jest niepoprawne.';
                    }
                } else {
                    echo 'Podany email jest w niepoprawnym formacie.';
                }
            } else {
                echo 'Taki e-mail jest już zajęty.';
            }
        }
    }

    function changePassword () : void
    {
        if (isset($_POST['changePassword'])) {
            $oldPass = $_POST['oldPassword'];
            $newPass = $_POST['newPassword'];

            if (password_verify($oldPass, $this->userDetails[0]['user_password'])) {
                if (Validation::validatePassword($newPass)) {
                    $editedPass = [];
                    $hash = password_hash($newPass, PASSWORD_DEFAULT);
                    $editedPass = [$hash];
                    $passColumn = [];
                    $passColumn = [UsersTable::PASSWORD_COLUMN];
                    $this->db->editRecord(UsersTable::NAME, $passColumn, $editedPass, UsersTable::ID_COLUMN, $this->userDetails[0]['user_id']);
                    echo 'Zmieniono hasło.';
                } else {
                    echo 'Hasło powinno zawierać więcej niż 6 znaków i mniej niż 20 znaków.';
                }
            } else {
                echo 'Hasło niepoprawne.';
            }
        }
    }

    public function __construct ($db)
    {
        parent::__construct($db);
        $this->loadUserDetails();
        $this->changeEmail();
        $this->changePassword();
        $this->comments = new CommentController($db);
    }
}