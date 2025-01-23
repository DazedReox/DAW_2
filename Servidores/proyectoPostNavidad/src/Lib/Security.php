<?php 
    
    namespace Lib;
    
    class Security{
        final public static function encryptPassw(string $passw){

        }

        final public static function validatePassw(string $passw, string $passwhash){

        }

        final public static function secretKey():string{
            return $_ENV['SECRET_KEY'];
        }

        final public static function createToken(string $key, array $data):string{
            
            $time = strtotime("now");
            $token = array(
                "iat"=>$time,
                "exp"=>$time + 3600,
                "data"=>$data
            );

            return JWT::encode($token,$key, 'HS256');
        }
    }
?>