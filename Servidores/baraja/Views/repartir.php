<!DOCTYPE html>
<html>
<body>
<h1>Reparto de Cartas</h1>
<?php foreach ($reparto as $jugador => $cartas): ?>
    <h2>Jugador <?= $jugador + 1 ?></h2>
    <ul>
        <?php foreach ($cartas as $carta): ?>
            <li><?= $carta->getValor() . " de " . $carta->getPalo(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
</body>
</html>
