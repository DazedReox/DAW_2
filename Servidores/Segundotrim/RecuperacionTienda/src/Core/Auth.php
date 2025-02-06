<?php

namespace App\Core;

class Auth{
    //login
    public static function login($user){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];
    }

    //logout
    public static function logout(){
        unset($_SESSION['user']);
    }

    //usuario autenticado?
    public static function user(){
        return $_SESSION['user'] ?? null;
    }

    //checkeo
    public static function check(){
        return isset($_SESSION['user']);
    }

    //verificacion del rol
    public static function hasRole($role){
        return isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === $role;
    }
}
?>