<?php
session_start();

if (isset($_SESSION['contador_visitas'])) {
    $_SESSION['contador_visitas']++;
} else {
    $_SESSION['contador_visitas'] = 1;
}

echo "Has visitado esta página " . $_SESSION['contador_visitas'] . " veces en esta sesión.";
?>
