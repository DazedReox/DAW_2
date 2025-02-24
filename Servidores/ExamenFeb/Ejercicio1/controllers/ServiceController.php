<?php
require_once 'config/database.php';

class ServiceController {
    
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //lista de servicios adicionales
    public function getServices() {
        $sql = "SELECT id, nombre, descripcion, precio FROM servicios ORDER BY nombre";
        $result = $this->conn->query($sql);

        $services = [];
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }

        echo json_encode($services);
    }

    //reservar un servicio
    public function bookService() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                echo "Debes iniciar sesion para poder reservar.";
                return;
            }

            $paciente_id = $_SESSION['user_id'];
            $servicio_id = $_POST['servicio_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            //verificar disponibilidad en horario
            $checkSQL = "SELECT id FROM servicios_reservados WHERE servicio_id = ? AND fecha = ? AND hora = ?";
            $stmt = $this->conn->prepare($checkSQL);
            $stmt->bind_param("iss", $servicio_id, $fecha, $hora);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "El horario seleccionado no está disponible.";
                return;
            }
            $stmt->close();

            // insertar la reserva
            $insertSQL = "INSERT INTO servicios_reservados (paciente_id, servicio_id, fecha, hora) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($insertSQL);
            $stmt->bind_param("iiss", $paciente_id, $servicio_id, $fecha, $hora);

            if ($stmt->execute()) {
                echo "Servicio reservado con exito.";
            } else {
                echo "Error al reservar el servicio: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    //ver los servicios reservados
    public function getBookedServices() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo "Debes iniciar sesion para ver las reservas.";
            return;
        }

        $paciente_id = $_SESSION['user_id'];
        $sql = "SELECT sr.id, s.nombre, sr.fecha, sr.hora, s.precio
                FROM servicios_reservados sr
                JOIN servicios s ON sr.servicio_id = s.id
                WHERE sr.paciente_id = ?
                ORDER BY sr.fecha, sr.hora";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $paciente_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $bookedServices = [];
        while ($row = $result->fetch_assoc()) {
            $bookedServices[] = $row;
        }

        echo json_encode($bookedServices);
        $stmt->close();
    }

    //cancelar un servicio
    public function cancelService() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                echo "Debes iniciar sesion para poder cancelar.";
                return;
            }

            $paciente_id = $_SESSION['user_id'];
            $reserva_id = $_POST['reserva_id'];

            $sql = "DELETE FROM servicios WHERE id = ? AND paciente_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $reserva_id, $paciente_id);

            if ($stmt->execute()) {
                echo "Servicio cancelado.";
            } else {
                echo "Error al cancelar el servicio.";
            }

            $stmt->close();
        }
    }
}
?>
