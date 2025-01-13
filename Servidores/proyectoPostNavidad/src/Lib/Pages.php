<?php 
    namespace Lib;
    class Pages{
        public static function render($view, $params = []){
            foreach ($params as $key => $value) {
                $$key = $value;
            }
            ob_start();
            include __DIR__ . '/../views/' . $view . '.php';
            $content = ob_get_clean();
            return $content;
        }
    }
?>