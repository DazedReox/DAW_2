<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
        h5 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
            table-layout: auto;
            margin-left: auto;
            margin-right: auto;
        }
        body{
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <h1>Boletín de notas</h1>
    <?php
        $notas = array("matematicas"=>array("trimestre1"=>3, "trimestre2"=>10, "trimestre3"=>7, "media"=>6.7),
        "lengua"=>array("trimestre1"=>8, "trimestre2"=>5, "trimestre3"=>3, "media"=>5.3),
        "fisica"=>array("trimestre1"=>7, "trimestre2"=>2, "trimestre3"=>1, "media"=>3.3),
        "latin"=>array("trimestre1"=>4, "trimestre2"=>7, "trimestre3"=>8, "media"=>6.3),
        "ingles"=>array("trimestre1"=>6, "trimestre2"=>2, "trimestre3"=>3, "media"=>3.7)
        );
    ?>
    <table>
        <tr>
            <th>Asignaturas</th>
            <th>Trimestre 1</th>
            <th>Trimestre 2</th>
            <th>Trimestre 3</th>
            <th>Media</th>
        </tr>
        <tr>
            <td>Matemáticas</td>
            <td><?= $notas["matematicas"]["trimestre1"] ?></td>
            <td><?= $notas["matematicas"]["trimestre2"] ?></td>
            <td><?= $notas["matematicas"]["trimestre3"] ?></td>
            <td><?= $notas["matematicas"]["media"] ?></td>
        </tr>
        <tr>
            <td>Lengua</td>
            <td><?= $notas["lengua"]["trimestre1"] ?></td>
            <td><?= $notas["lengua"]["trimestre2"] ?></td>
            <td><?= $notas["lengua"]["trimestre3"] ?></td>
            <td><?= $notas["lengua"]["media"] ?></td>
        </tr>
        <tr>
            <td>Física</td>
            <td><?= $notas["fisica"]["trimestre1"] ?></td>
            <td><?= $notas["fisica"]["trimestre2"] ?></td>
            <td><?= $notas["fisica"]["trimestre3"] ?></td>
            <td><?= $notas["fisica"]["media"] ?></td>
        </tr>
        <tr>
            <td>Latin</td>
            <td><?= $notas["latin"]["trimestre1"] ?></td>
            <td><?= $notas["latin"]["trimestre2"] ?></td>
            <td><?= $notas["latin"]["trimestre3"] ?></td>
            <td><?= $notas["latin"]["media"] ?></td>
        </tr>
        <tr>
            <td>Ingles</td>
            <td><?= $notas["ingles"]["trimestre1"] ?></td>
            <td><?= $notas["ingles"]["trimestre2"] ?></td>
            <td><?= $notas["ingles"]["trimestre3"] ?></td>
            <td><?= $notas["ingles"]["media"] ?></td>
        </tr>
    </table>
    <?php $mediaTotal = array_sum([
        $notas["matematicas"]["media"],
        $notas["lengua"]["media"],
        $notas["fisica"]["media"],
        $notas["latin"]["media"],
        $notas["ingles"]["media"]
        ]);

        $promedio = $mediaTotal / count($notas);

        echo "La media total es: " + $promedio;
    ?>

</body>
</html>