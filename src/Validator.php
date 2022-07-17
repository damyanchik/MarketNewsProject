<?php

class Validator
{
    public static function validateLogin($login) : bool
    {
        if (!preg_match("/^[a-zA-z0-9]*$/", $login) || strlen($login) < 3 || strlen($login) > 20) {
            return false;
        } else {
            return true;
        }
    }

    public static function validatePassword($password)
    {
        if (strlen($password) < 6 || strlen($password) > 20) {
            echo 'Hasło powinno zawierać więcej niż 6 znaków i mniej niż 20 znaków.';
        } else {
            return true;
        }
    }

    public static function validateEmail($email)
    {
        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
            return false;
        } else {
            return true;
        }
    }
}