<?php

namespace App\Core;

class Auth
{
    // Iniciar sesión del usuario
    public static function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];
    }

    // Cerrar sesión del usuario
    public static function logout()
    {
        unset($_SESSION['user']);
    }

    // Obtener el usuario autenticado
    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    // Verificar si hay un usuario autenticado
    public static function check()
    {
        return isset($_SESSION['user']);
    }

    // Verificar si el usuario tiene un rol específico (si aplica)
    public static function hasRole($role)
    {
        return isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === $role;
    }
}
?>