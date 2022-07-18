<?php

class PersonController extends AbstractController
{
    const DEFAULT_STATUS = 'Guest';

    public function loginAccount() : void
    {
        if (isset($this->post['authorisation'])) {
            $login = htmlentities($this->post['login']);
            $password = htmlentities($this->post['password']);

            if (!empty($login) || !empty($password)) {

                $columnLogin = 'user_login';
                $result = $this->db->getRecords(UsersTable::NAME, UsersTable::LOGIN_COLUMN, $login);
                $hash = $result[0]['user_password'];

                if ($result[0]['user_login'] === $login && password_verify($password, $hash)) {
                    $_SESSION['login'] = $login;
                    $_SESSION['person'] = 'User';
                    if ($result[0]['user_status'] === 'Admin') {
                        $_SESSION['person'] = 'Admin';
                    }
                    header("Location: index.php");
                } else {
                    echo 'Niepoprawny login lub hasło';
                }
            } else {
                echo 'Uzupełnij pola';
            }
        }
    }

    public function logoutAccount() : void
    {
        $action = $this->get['action'];
        if ($action === 'logout') {
            session_destroy();
            header("refresh: 0.4; index.php");
        }
    }

    protected function personStatus () : void
    {
        $person = $_SESSION['person'] ?? self::DEFAULT_STATUS;

        switch ($person) {
            case 'User':
                $user = new UserController($this->db);
                break;
            case 'Admin':
                $admin = new AdminController($this->db);
                break;
            default:
                $guest = new GuestController($this->db);
                break;
        }
    }

    public function registrationAccount()
    {
        if (isset($this->post['register'])) {

            $login = $this->post['login'];
            $password = $this->post['password'];
            $email = $this->post['email'];

            if (!empty($login) && !empty($password) && !empty($email)) {
                $checkEmail = $this->db->getRecords(UsersTable::NAME, UsersTable::EMAIL_COLUMN, $email);
                $checkLogin = $this->db->getRecords(UsersTable::NAME, UsersTable::LOGIN_COLUMN, $login);

                if (empty($checkEmail) && empty($checkLogin)) {

                    if (Validation::validateLogin($login)) {
                        $loginValidated = $login;
                    } else {
                        return 'BŁĄD W LOGINIE';
                    }

                    if (Validation::validatePassword($password)) {
                        $passwordValidated = password_hash($password, PASSWORD_DEFAULT);
                    } else {
                        return 'BŁĄD W HAŚLE';
                    }

                    if (Validation::validateEmail($email)) {
                        $emailValidated = $email;
                    } else {
                        echo "Zły format email";
                    }

                    if (!empty($loginValidated) && !empty($passwordValidated) && !empty($emailValidated)) {
                        $newRecords = [$loginValidated, $emailValidated, $passwordValidated, 'User'];
                        $this->db->createRecord(UsersTable::NAME, UsersTable::COLUMNS, $newRecords);
                        echo 'Rejestracja zakończona';
                    }

                } else {
                    echo 'Taki użytkownik lub e-mail jest już w bazie';
                }

            } else {
                echo 'Uzupełnij pola!';
            }
        }
    }

    public function __construct($post, $get, $db)
    {
        parent::__construct($post, $get, $db);
        $this->loginAccount();
        $this->logoutAccount();
        $this->registrationAccount();
        $this->personStatus();
    }
}