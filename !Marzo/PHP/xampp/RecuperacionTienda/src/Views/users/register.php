<?php

require_once '../../vendor/autoload.php';
use App\Controllers\UserController;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $registerSuccess = $userController->register($_POST['name'], $_POST['email'], $_POST['password']);
    
    if ($registerSuccess) {
        header('Location: login.php');
        exit();
    } else {
        $error = "Error al registrar el usuario. Inténtalo de nuevo.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    
    <?php include '../../layout/header.php'; ?>
    
    <main>
        <h1>Registro</h1>
        <?php if (isset($error)): ?>
            <p class="error"> <?php echo htmlspecialchars($error); ?> </p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Registrarse</button>
        </form>
    </main>
    
    <?php include '../../layout/footer.php'; ?>
    
</body>
</html>
