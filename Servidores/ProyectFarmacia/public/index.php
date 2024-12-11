<?php
require_once 'config/config.php';

session_start();

$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia - Inicio</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

    <header>
        <h1>Bienvenido a la Farmacia</h1>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="productos">Productos</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <?php if ($isLoggedIn && $userRole == 'propietario') { ?>
                    <li><a href="usuarios">Usuarios</a></li>
                <?php } ?>
                <li><a href="perfil">Mi Perfil</a></li>
                <?php if ($isLoggedIn) { ?>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Iniciar sesión</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php if ($isLoggedIn) { ?>
            <p>Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>. Estás logueado como <?php echo htmlspecialchars($userRole); ?>.</p>
        <?php } else { ?>
            <p>Bienvenido, por favor inicia sesión para acceder a las funcionalidades.</p>
        <?php } ?>

        <section>
            <h2>Información General</h2>
            <p>Esta es una plataforma para gestionar productos, pedidos y usuarios en nuestra farmacia.</p>
            <p>Los propietarios tienen acceso adicional para gestionar usuarios.</p>
        </section>

        <section>
            <h2>Enlaces Rápidos</h2>
            <ul>
                <li><a href="productos">Ver Productos</a></li>
                <li><a href="pedidos">Ver Pedidos</a></li>
                <?php if ($isLoggedIn && $userRole == 'propietario') { ?>
                    <li><a href="usuarios">Gestionar Usuarios</a></li>
                <?php } ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Farmacia. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
