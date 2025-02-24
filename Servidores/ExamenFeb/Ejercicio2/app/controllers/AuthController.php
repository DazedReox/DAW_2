<?php

namespace App\Controllers;

use App\Core\JWT;
use App\Models\UserModel;
use App\Core\Database;

class AuthController
{
    private $userModel;
    private $jwt;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->jwt = new JWT();
    }

    //autentica user
    public function login()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($data['username']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Usuario y contraseña son requeridos']);
            return;
        }

        $username = $data['username'];
        $password = $data['password'];

        //verif credenciales
        $user = $this->userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Generar token JWT
            $token = $this->jwt->encode([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'exp' => time() + 3600
            ]);

            echo json_encode(['token' => $token]);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Credenciales inválidas']);
        }
    }

    //valida el token
    public function validateToken()
    {
        $headers = getallheaders();
        $token = $headers['Authorization'] ?? '';

        if (empty($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Token no obtenido']);
            return;
        }

        try {
            $decoded = $this->jwt->decode($token);
            echo json_encode(['valid' => true, 'user' => $decoded]);
        } catch (\Exception $e) {
            http_response_code(401);
            echo json_encode(['error' => 'Token inválido']);
        }
    }
}
?>