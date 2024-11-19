<?php
$cookie_base_name = "Visita";
$max_visitas = 5;

if (isset($_POST['borrar_cookie'])) {
    for ($i = 0; $i < $max_visitas; $i++) {
        setcookie("{$cookie_base_name}[$i]", "", time() - 3600);
    }
    $mensaje = "Las cookies de visitas han sido eliminadas.";
} else {
    $fecha_actual = date("Y-m-d H:i:s");

    for ($i = $max_visitas - 1; $i > 0; $i--) {
        if (isset($_COOKIE["{$cookie_base_name}"][$i - 1])) {
            setcookie("{$cookie_base_name}[$i]", $_COOKIE["{$cookie_base_name}"][$i - 1], time() + (86400 * 30));
        }
    }
    setcookie("{$cookie_base_name}[0]", $fecha_actual, time() + (86400 * 30));

    $mensaje = "Usted ha visitado esta página " . (count($_COOKIE[$cookie_base_name]) + 1) . " veces.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Visitas Página con Cookies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0F0F0;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            background-color: #333;
            color: #FFF;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>CONTROL VISITAS PAGINA CON COOKIES</h2>
        <p><?php echo $mensaje; ?></p>

        <?php if (isset($_COOKIE[$cookie_base_name]) && count($_COOKIE[$cookie_base_name]) > 0): ?>
            <p>Las últimas veces que nos visitó fue en:</p>
            <ul>
                <?php foreach ($_COOKIE[$cookie_base_name] as $visita): ?>
                    <li><?php echo htmlspecialchars($visita); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay visitas anteriores registradas.</p>
        <?php endif; ?>

        <form method="post" action="">
            <button type="submit" name="borrar_cookie">Borrar cookie</button>
            <button type="submit" name="actualizar_pagina">Recargar página</button>
        </form>
    </div>
</body>
</html>
