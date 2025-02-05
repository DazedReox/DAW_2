<?php
$cookie_name = "contador";
if (isset($_GET['reset']) && $_GET['reset'] == '1') {
    setcookie($cookie_name, "", time() - 3600);
    echo "La cookie ha sido borrada. <a href='?'>Volver a empezar</a>";
} else {
    if (isset($_COOKIE[$cookie_name])) {
        $contador = $_COOKIE[$cookie_name] + 1;
        setcookie($cookie_name, $contador, time() + 3600 * 24 * 30);
        echo "Bienvenido por " . $contador . " vez.";
    } else {
        $contador = 1;
        setcookie($cookie_name, $contador, time() + 3600 * 24 * 30); 
        echo "Bienvenido por primera vez.";
    }
    echo "<br><a href='?reset=1'>Borrar contador</a>";
}
?>
