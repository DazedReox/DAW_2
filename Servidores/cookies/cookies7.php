<?php
$cookie_name = "fecha_acceso";

$valor_cookie = date("Y-m-d H:i:s");

setcookie($cookie_name, $valor_cookie, time() + 3600);
if (isset($_COOKIE[$cookie_name])) {
    echo "Última fecha de acceso: " . $_COOKIE[$cookie_name];
} else {
    echo "Esta es tu primera visita o la cookie ha expirado.";
}
?>
