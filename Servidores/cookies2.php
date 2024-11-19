<?php
$cookie_name = "idioma";

$idiomas_disponibles = [
    "es" => "Español",
    "en" => "Inglés",
    "fr" => "Francés"
];

if (isset($_POST['idioma'])) {
    $idioma_seleccionado = $_POST['idioma'];
    setcookie($cookie_name, $idioma_seleccionado, time() + (86400 * 30));
} elseif (isset($_COOKIE[$cookie_name])) {
    $idioma_seleccionado = $_COOKIE[$cookie_name];
} else {
    $idioma_seleccionado = "es";
}

switch ($idioma_seleccionado) {
    case "es":
        $mensaje = "Bienvenido a nuestro sitio web.";
        break;
    case "en":
        $mensaje = "Welcome to our website.";
        break;
    case "fr":
        $mensaje = "Bienvenue sur notre site web.";
        break;
    default:
        $mensaje = "Bienvenido a nuestro sitio web.";
        break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de idioma</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>

    <form method="post" action="">
        <label for="idioma">Seleccione su idioma:</label>
        <select name="idioma" id="idioma">
            <?php
            foreach ($idiomas_disponibles as $codigo => $nombre) {
                $selected = ($codigo == $idioma_seleccionado) ? "selected" : "";
                echo "<option value='$codigo' $selected>$nombre</option>";
            }
            ?>
        </select>
        <button type="submit">Guardar idioma</button>
    </form>
</body>
</html>
