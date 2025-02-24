<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailSender {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        //servidor smtp
        try {
            $this->mail->isSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'reox.jai@gmail.com';
            $this->mail->Password = 'adminadmin'; 
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587; //puerto SMTP

            $this->mail->setFrom('reox.jai@gmail.com', 'Clínica Médica');
        } catch (Exception $e) {
            echo "Error al configurar PHPMailer: {$this->mail->ErrorInfo}";
        }
    }

    //correo confirmacion 
    public function sendConfirmationEmail($toEmail, $token) {
        try {
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = "Confirmación de cuenta - Clínica Médica";
            $this->mail->isHTML(true);

            $confirmationLink = "http://clinicamedica.com/confirm-email?token=" . $token;
            $this->mail->Body = "
                <h2>Bienvenido a nuestra clínica</h2>
                <p>Por favor, confirma tu cuenta haciendo clic en el siguiente enlace:</p>
                <p><a href='$confirmationLink'>$confirmationLink</a></p>
                <p>Si no te registraste, ignora este mensaje.</p>
            ";

            $this->mail->send();
            echo "Correo de confirmación enviado.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$this->mail->ErrorInfo}";
        }
    }

    //correo con detalles en formato pdf
    public function sendAppointmentDetails($toEmail, $pdfPath, $appointmentDetails) {
        try {
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = "Detalles de tu cita médica";
            $this->mail->isHTML(true);

            $this->mail->Body = "
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
                <p>Adjunto encontrarás un PDF con todos los detalles de la cita.</p>
            ";

            $this->mail->addAttachment($pdfPath, "Detalles_Cita.pdf");

            $this->mail->send();
            echo "Correo con detalles de la cita enviado.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$this->mail->ErrorInfo}";
        }
    }
}
?>
