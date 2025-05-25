<?php
$galeria = [
    [
        "tipo" => "Pintura",
        "artista" => "Frida Kahlo",
        "año" => 1940,
        "dimensiones" => "60x80 cm",
        "precio" => 150000,
        "tecnica" => "Óleo sobre lienzo",
        "certificado" => true,
        "imagen" => "https://via.placeholder.com/150",
        "comentarios" => "En excelente estado."
    ],
    [
        "tipo" => "Escultura",
        "artista" => "Fernando Botero",
        "año" => 1985,
        "dimensiones" => "150x60x60 cm",
        "precio" => 250000,
        "tecnica" => "Bronce",
        "certificado" => false,
        "imagen" => "https://via.placeholder.com/150",
        "comentarios" => "Desgastes por el tiempo."
    ],
    [
        "tipo" => "Fotografía",
        "artista" => "Sebastião Salgado",
        "año" => 2001,
        "dimensiones" => "40x60 cm",
        "precio" => 5000,
        "tecnica" => "Fotografía en blanco y negro",
        "certificado" => true,
        "imagen" => "https://via.placeholder.com/150",
        "comentarios" => "Marco dañado."
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Galería de Arte</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        img { width: 100px; }
    </style>
</head>
<body>
    <h1>Galería de Arte</h1>
    <table>
        <tr>
            <th>Tipo</th>
            <th>Artista</th>
            <th>Año</th>
            <th>Dimensiones</th>
            <th>Precio</th>
            <th>Técnica / Materiales</th>
            <th>Certificado</th>
            <th>Imagen</th>
            <th>Comentarios</th>
        </tr>
        <?php foreach ($galeria as $obra): ?>
            <tr>
                <td><?= $obra["tipo"] ?></td>
                <td><?= $obra["artista"] ?></td>
                <td><?= $obra["año"] ?></td>
                <td><?= $obra["dimensiones"] ?></td>
                <td>$<?= number_format($obra["precio"], 2) ?></td>
                <td><?= $obra["tecnica"] ?></td>
                <td><?= $obra["certificado"] ? "Sí" : "No" ?></td>
                <td><img src="<?= $obra["imagen"] ?>" alt="Obra de arte"></td>
                <td><?= $obra["comentarios"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
