<?php
// Inicializar variables
$nombre = $apellidos = $email = $telefono = $empleo_actual = $url = "";
$lenguajes = [];

// Variable para guardar errores
$errores = [];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar el nombre
    if (isset($_POST['nombre']) && !empty(trim($_POST['nombre']))) {
        $nombre = trim($_POST['nombre']);
    } else {
        $errores[] = "El nombre es obligatorio.";
    }

    // Validar los apellidos
    if (isset($_POST['apellidos']) && !empty(trim($_POST['apellidos']))) {
        $apellidos = trim($_POST['apellidos']);
    } else {
        $errores[] = "Los apellidos son obligatorios.";
    }

    // Validar el email
    if (isset($_POST['email']) && filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);
    } else {
        $errores[] = "El email es inválido.";
    }

    // Validar el teléfono
    if (isset($_POST['telefono']) && preg_match('/^\+?[0-9]{7,15}$/', trim($_POST['telefono']))) {
        $telefono = trim($_POST['telefono']);
    } else {
        $errores[] = "El teléfono es inválido.";
    }

    // Validar el empleo actual
    if (isset($_POST['empleo_actual']) && in_array($_POST['empleo_actual'], ['sin empleo', 'media jornada', 'tiempo completo'])) {
        $empleo_actual = $_POST['empleo_actual'];
    } else {
        $errores[] = "El empleo actual es inválido.";
    }

    // Validar los lenguajes dominados
    if (isset($_POST['lenguajes']) && is_array($_POST['lenguajes'])) {
        $valores_permitidos = ['Python', 'PHP', 'JavaScript', 'Java', 'C++'];
        foreach ($_POST['lenguajes'] as $lenguaje) {
            if (in_array($lenguaje, $valores_permitidos)) {
                $lenguajes[] = $lenguaje;
            } else {
                $errores[] = "Lenguaje inválido: $lenguaje.";
            }
        }
    }

    // Validar la URL
    if (isset($_POST['url']) && filter_var(trim($_POST['url']), FILTER_VALIDATE_URL)) {
        $url = trim($_POST['url']);
    } else {
        $errores[] = "La URL es inválida.";
    }
    
    // Procesar datos si no hay errores
    if (empty($errores)) {
        echo "Formulario enviado correctamente.";
    } else {
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>