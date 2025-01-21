<?php
namespace Lib;

class Utils {
    public static function isAdmin() {
        return isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin';
    }

    public static function deleteSession($name) {
        if(isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function getCarritoTotal() {
        $total = 0;
        if(isset($_SESSION['carrito'])) {
            foreach($_SESSION['carrito'] as $producto) {
                $total += $producto['cantidad'] * $producto['precio'];
            }
        }
        return $total;
    }
    
    public static function uploadImage($file, $folder = 'uploads/') {
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        
        $filename = uniqid() . '_' . $file['name'];
        $path = $folder . $filename;
        
        if (move_uploaded_file($file['tmp_name'], $path)) {
            return $filename;
        }
        return false;
    }
}
?>