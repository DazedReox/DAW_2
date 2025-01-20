<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correos</title>
</head>
<body>
    <h1><?php echo "Bienvenido" . $name; ?></h1>
    <h2>Correos</h2>
    <form action="borrar" method ="POST">
        <table>
            <thead>
                <tr>
                    <th>De</th>
                    <th>Asunto</th>
                    <th>Fecha</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr id="fila1">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Jose Luis Caparros";'?></td>
                    <td id="asunto1"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Jose Luis Caparros);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Jose Luis Caparros"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Jose Luis Caparros"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila2">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Javier Gomez";'?></td>
                    <td id="asunto2"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Javier Gomez);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Javier Gomez"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Javier Gomez"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila3">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Mariano Sanchez";'?></td>
                    <td  id="asunto3"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Mariano Sanchez);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Mariano Sanchez"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Mariano Sanchez"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila4">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Virginia Santamaria";'?></td>
                    <td  id="asunto4"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Virginia Santamaria);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Virginia Santamaria"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Virginia Santamaria"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila5">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Almudena Jackson";'?></td>
                    <td  id="asunto5"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Almudena Jackson);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Almudena Jackson"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Almudena Jackson"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila6">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Brad McGanauy";'?></td>
                    <td  id="asunto6"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Brad McGanauy);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Brad McGanauy"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Brad McGanauy"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila7" >
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Xavi Villanova";'?></td>
                    <td  id="asunto7"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Xavi Villanova);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Xavi Villanova"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Xavi Villanova"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila8">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Javier Gomez";'?></td>
                    <td  id="asunto8"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Javier Gomez);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Javier Gomez"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Javier Gomez"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila9">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Anne Wintertur";'?></td>
                    <td  id="asunto9"  @.click='alert("SELECT asunto FROM mensajes WHERE de = "Anne Wintertur);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Anne Wintertur"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Anne Wintertur"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
                <tr id="fila10">
                    <td><?php echo 'SELECT de FROM mensajes WHERE de = "Joaquim Pitt";'?></td>
                    <td  id="asunto10" @.click='alert("SELECT asunto FROM mensajes WHERE de = "Joaquim Pitt);'><?php echo 'SELECT asunto FROM mensajes WHERE de = "Joaquim Pitt"; '?></td>
                    <td><?php echo 'SELECT fecha FROM mensajes WHERE de = "Joaquim Pitt"; '?></td>
                    <td><input type="checkbox" value = "Eliminar">
                </tr>
            </tbody>
        </table>
    </form>
    <button value="Delete">Eliminar</button>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filaABorrar = $_POST['fila'];
            if (!empty($filaABorrar)) {
                $sql = "DELETE FROM mensajes WHERE de IN ($filaABorrar)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($filaABorrar);
            }
        }
    ?>
</body>
</html>