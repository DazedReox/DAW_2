<?php
$filename = "ej5php.txt";

$file = fopen($filename, "w");
if ($file) {
    fwrite($file, $content);
    fclose($file);
} else {
    die("No se pudo abrir el archivo para escritura.");
}

$file = fopen($filename, "r");
if ($file) {
    echo "Contenido del archivo original:\n";
    while (($line = fgets($file)) !== false) {
        echo $line;
    }
    fclose($file);
} else {
    die("No se pudo abrir el archivo para lectura.");
}


$file = fopen($filename, "a");
if ($file) {
    $newContent = "Esta es una nueva línea añadida.\n";
    fwrite($file, $newContent);
    fclose($file);
} else {
    die("No se pudo abrir el archivo para añadir contenido.");
}


$newFilename = "archivo_copia.txt";
if (!copy($filename, $newFilename)) {
    die("Error al copiar el archivo.");
} else {
    echo "\nArchivo copiado con éxito a 'archivo_copia.txt'.\n";
}


$renamedFilename = "archivo_renombrado.txt";
if (!rename($filename, $renamedFilename)) {
    die("Error al renombrar el archivo.");
} else {
    echo "Archivo renombrado con éxito a 'archivo_renombrado.txt'.\n";
}


if (!unlink($renamedFilename)) {
    die("Error al eliminar el archivo renombrado.");
} else {
    echo "Archivo 'archivo_renombrado.txt' eliminado con éxito.\n";
}
?>
