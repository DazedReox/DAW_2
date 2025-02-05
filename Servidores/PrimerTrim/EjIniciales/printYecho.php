<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print y Echo</title>
</head>
<body>
    <p><?php echo "Hola Mundo"; ?></p>
    <p><?= "Hola Mundo"; ?></p>
    <p><?php print "Hola Mundo"; ?></p>
    <?php // variables
    $variable = "Hola"; 
    echo "La variable dice:  $variable";?>
</body>
</html>