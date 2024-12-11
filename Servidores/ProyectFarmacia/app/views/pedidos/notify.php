<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificar Pedido</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Notificar al Cliente</h1>

    <form action="/pedidos/notify/1" method="POST">
        <label for="mensaje">Mensaje de notificacion:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required>
            Su pedido ha llegado a nuestra farmacia
        </textarea>
        
        <button type="submit">Enviar Notificacion</button>
    </form>
</body>
</html>
