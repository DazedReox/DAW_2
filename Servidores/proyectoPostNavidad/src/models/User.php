<?php 
    class User{
        protected static array $errores = [];

        public function __construct(){
            protected    int id = null;
        }

        public static function getErrores() : array{
            return self::Errores;
        }

        public static function setErrores(array $errores) : void{
            
        }
    }
?>