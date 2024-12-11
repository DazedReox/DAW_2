<?php

namespace App\Helpers;

session_start();

class Auth
{
    public static function login($username, $password)
    {
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    public static function isLoggedIn()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function getUser()
    {
        return isset($_SESSION['username']) ? $_SESSION['username'] : null;
    }
}
?>
