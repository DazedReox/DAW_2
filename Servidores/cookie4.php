<?php
$cookie_name = "politica_cookies_aceptada";
if (isset($_POST['aceptar_cookies'])) {
    setcookie($cookie_name, "aceptado", time() + (86400 * 365));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$mostrar_aviso_cookies = !isset($_COOKIE[$cookie_name]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Política de Cookies</title>
    <style>
        .aviso-cookies {
            display: <?php echo $mostrar_aviso_cookies ? 'block' : 'none'; ?>;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 16px;
        }
        .aviso-cookies button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h1>Bienvenido a nuestra página web</h1>
    <p>Contenido principal de la página.</p>
    <?php if ($mostrar_aviso_cookies): ?>
    <div class="aviso-cookies">
        <p>Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Al continuar navegando, acepta nuestra <a href="#">política de cookies</a>.</p>
        <form method="post" action="">
            <button type="submit" name="aceptar_cookies">Aceptar</button>
        </form>
    </div>
    <?php endif; ?>

</body>
</html>
