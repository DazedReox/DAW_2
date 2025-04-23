<?php
define("EURO_A_PESETAS", 166.386);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombre"];
    $precios = $_POST["precio"];

    echo "<h2>Tiquet de compra</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Producto</th><th>Precio (€)</th><th>Precio (₧)</th></tr>";

    $totalEuros = 0;

    for ($i = 0; $i < count($nombres); $i++) {
        $nombre = htmlspecialchars($nombres[$i]);
        $precio = floatval($precios[$i]);
        $precioPesetas = $precio * EURO_A_PESETAS;

        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>" . number_format($precio, 2) . " €</td>";
        echo "<td>" . number_format($precioPesetas, 2) . " ₧</td>";
        echo "</tr>";

        $totalEuros += $precio;
    }

    $totalPesetas = $totalEuros * EURO_A_PESETAS;

    echo "<tr style='font-weight:bold; background-color:#efefef'>";
    echo "<td>Total</td>";
    echo "<td>" . number_format($totalEuros, 2) . " €</td>";
    echo "<td>" . number_format($totalPesetas, 2) . " ₧</td>";
    echo "</tr>";
    echo "</table>";

} elseif (isset($_GET["cantidad"]) && is_numeric($_GET["cantidad"])) {
    $cantidad = intval($_GET["cantidad"]);
    if ($cantidad <= 0) {
        echo "Cantidad inválida.";
        exit;
    }

    echo "<h2>Introduce los productos</h2>";
    echo "<form method='post'>";
    for ($i = 1; $i <= $cantidad; $i++) {
        echo "<b>Producto $i</b><br>";
        echo "Nombre: <input type='text' name='nombre[]' required><br>";
        echo "Precio (€): <input type='number' name='precio[]' step='0.01' required><br><br>";
    }
    echo "<input type='submit' value='Generar Tiquet'>";
    echo "</form>";
} else {
    echo "No se han obtenido datos para hacer el ejercicio. Ejemplo: <code>?cantidad=3</code>";
}
?>
