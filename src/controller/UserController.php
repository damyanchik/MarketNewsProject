<?php

class UserController extends GuestController
{
    public array $userDetails;
    private object $comments;

    private function loadUserDetails() : void
    {
        if (isset($_SESSION['person']) && isset($_SESSION['login'])) {
            $this->userDetails = $this->db->getRecords(DatabaseProperties::USERSTAB_NAME, DatabaseProperties::USERSTAB_LOGIN, $_SESSION['login']);
        }
    }

    public function changeEmail () : void
    {
        if (isset($_POST['changeEmail'])) {
            $newEmail = $_POST['newEmail'];
            $password = $_POST['confirmPassword'];

            $checkNewEmail = $this->db->getRecords(DatabaseProperties::USERSTAB_NAME, DatabaseProperties::USERSTAB_EMAIL, $newEmail);

            if (empty($checkNewEmail)) {
                if (Validator::validateEmail($newEmail)) {
                    if (password_verify($password, $this->userDetails[0]['user_password'])) {
                        $editedEmail = [];
                        $editedEmail = [$newEmail];
                        $emailColumn = [];
                        $emailColumn = [DatabaseProperties::USERSTAB_EMAIL];
                        $this->db->editRecord(DatabaseProperties::USERSTAB_NAME, $emailColumn, $editedEmail, DatabaseProperties::USERSTAB_ID, $this->userDetails[0]['user_id']);
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
                if (Validator::validatePassword($newPass)) {
                    $editedPass = [];
                    $hash = password_hash($newPass, PASSWORD_DEFAULT);
                    $editedPass = [$hash];
                    $passColumn = [];
                    $passColumn = [DatabaseProperties::USERSTAB_PASSWORD];
                    $this->db->editRecord(DatabaseProperties::USERSTAB_NAME, $passColumn, $editedPass, DatabaseProperties::USERSTAB_ID, $this->userDetails[0]['user_id']);
                    echo 'zmieniono hasło';
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