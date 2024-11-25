<!DOCTYPE html>
<html>
<body>
<h1>Baraja Completa</h1>
<ul>
    <?php foreach ($cartas as $carta): ?>
        <li><?= $carta->getValor() . " de " . $carta->getPalo(); ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
