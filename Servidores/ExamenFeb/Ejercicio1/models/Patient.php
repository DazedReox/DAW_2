<?php
require_once 'config/database.php';
require_once 'libs/EmailSender.php';

class Patient {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //reservar una cita
    public function bookAppointment() {
            $paciente_id = $_SESSION['user_id'];
            $especialidad_id = $_POST['especialidad_id'];
            $medico_id = $_POST['medico_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            //verificar disponibilidad del horario
            $checkSQL = "SELECT id FROM citas WHERE medico_id = ? AND fecha = ? AND hora = ?";
            $stmt = $this->conn->prepare($checkSQL);
            $stmt->bind_param("iss", $medico_id, $fecha, $hora);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "El horario seleccionado no esta disponible.";
                return;
            }
            $stmt->close();

            // Insertar la cita
            $insertSQL = "INSERT INTO citas (paciente_id, especialidad_id, medico_id, fecha, hora) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($insertSQL);
            $stmt->bind_param("iiiss", $paciente_id, $especialidad_id, $medico_id, $fecha, $hora);

            if ($stmt->execute()) {
                echo "Cita reservada.";
            } else {
                echo "Error al reservar la cita: " . $stmt->error;
            }

            $stmt->close();
        }
    

    //reservar algo adicional
    function bookService() {
            $paciente_id = $_SESSION['user_id'];
            $servicio_id = $_POST['servicio_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            //verificar disponibilidad
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

            //insertar la reserva del servicio
            $insertSQL = "INSERT INTO servicios_reservados (paciente_id, servicio_id, fecha, hora) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($insertSQL);
            $stmt->bind_param("iiss", $paciente_id, $servicio_id, $fecha, $hora);

            if ($stmt->execute()) {
                echo "Servicio reservado.";
            } else {
                echo "Error al reservar el servicio: " . $stmt->error;
            }

            $stmt->close();
        }
    

    //vercitas
    function getAppointments() {
        $paciente_id = $_SESSION['user_id'];
        $sql = "SELECT c.id, e.nombre AS especialidad, m.nombre AS medico, c.fecha, c.hora 
                FROM citas c
                JOIN especialidades e ON c.especialidad_id = e.id
                JOIN medicos m ON c.medico_id = m.id
                WHERE c.paciente_id = ?
                ORDER BY c.fecha, c.hora";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $paciente_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $appointments = [];
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }

        echo json_encode($appointments);
        $stmt->close();
    }

    //cancelar una cita
    function cancelAppointment() {
            $paciente_id = $_SESSION['user_id'];
            $cita_id = $_POST['cita_id'];

            $sql = "DELETE FROM citas WHERE id = ? AND paciente_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $cita_id, $paciente_id);

            if ($stmt->execute()) {
                echo "Cita cancelada.";
            } else {
                echo "Error al cancelar la cita.";
            }

            $stmt->close();
        }

    //ver especializaciones
     function getSpecialtiesAndDoctors() {
        $sql = "SELECT e.id AS especialidad_id, e.nombre AS especialidad, m.id AS medico_id, m.nombre AS medico
                FROM especialidades e
                JOIN medicos m ON e.id = m.especialidad_id
                ORDER BY e.nombre, m.nombre";

        $result = $this->conn->query($sql);
        $specialties = [];

        while ($row = $result->fetch_assoc()) {
            $specialties[] = $row;
        }

        echo json_encode($specialties);
    }

    //logout
    function logout() {
        session_start();
        session_destroy();
        echo "Sesion cerrada.";
    }
}
?>
