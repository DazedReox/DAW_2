<?php
require_once 'autoloader.php';

use Controllers\BarajaController;

$action = $_GET['action'] ?? 'mostrarBaraja';
$controller = new BarajaController();

if (method_exists($controller, $action)) {
    call_user_func([$controller, $action]);
} else {
    echo "Acción no encontrada";
}
