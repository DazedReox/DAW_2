<?php

namespace App\Core;

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;

class JWT
{
    private $key;
    private $algorithm;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->key = $config['jwt']['key'];
        $this->algorithm = $config['jwt']['algorithm'];
    }

    public function encode($data)
    {
        return FirebaseJWT::encode($data, $this->key, $this->algorithm);
    }

    public function decode($token)
    {
        return FirebaseJWT::decode($token, new Key($this->key, $this->algorithm));
    }
}
?>