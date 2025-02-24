<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Cita</title>
</head>
<body>
    <h2>Confirmación de cita</h2>
    <p>Gracias por reservar tu cita en nuestra clínica. Aquí tienes los detalles:</p>
    <ul>
        <li><strong>Fecha:</strong> {$appointmentDetails['fecha']}</li>
        <li><strong>Hora:</strong> {$appointmentDetails['hora']}</li>
        <li><strong>Médico:</strong> {$appointmentDetails['medico']}</li>
        <li><strong>Consulta:</strong> {$appointmentDetails['consulta']}</li>
        <li><strong>Servicios:</strong> {$appointmentDetails['servicios']}</li>
        <li><strong>Importe total:</strong> {$appointmentDetails['importe']}€</li>
    </ul>
</body>
</html>