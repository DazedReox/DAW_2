<?php
$cookie_name = "color_fondo";

$colores_disponibles = [
    "white" => "Blanco",
    "lightblue" => "Azul claro",
    "lightgreen" => "Verde claro",
    "lightcoral" => "Coral claro",
    "lightyellow" => "Amarillo claro"
];

if (isset($_POST['color'])) {
    $color_seleccionado = $_POST['color'];
    setcookie($cookie_name, $color_seleccionado, time() + (86400 * 30));
} elseif (isset($_COOKIE[$cookie_name])) {
    $color_seleccionado = $_COOKIE[$cookie_name];
} else {
    $color_seleccionado = "white";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de color de fondo</title>
    <style>
        body {
            background-color: <?php echo htmlspecialchars($color_seleccionado); ?>;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la selección de color de fondo</h1>
    <p>Seleccione su color de fondo preferido y se guardará para futuras visitas.</p>
    <form method="post" action="">
        <label for="color">Seleccione el color de fondo:</label>
        <select name="color" id="color">
            <?php
            foreach ($colores_disponibles as $codigo => $nombre) {
                $selected = ($codigo == $color_seleccionado) ? "selected" : "";
                echo "<option value='$codigo' $selected>$nombre</option>";
            }
            ?>
        </select>
        <button type="submit">Guardar color</button>
    </form>
</body>
</html>
