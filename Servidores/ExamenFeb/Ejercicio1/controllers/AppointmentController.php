<?php
require_once 'config/database.php';

class AppointmentController {
    
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //lista de citas
    public function getAppointments() {
        $sql = "SELECT id, paciente_id, medico_id, fecha, hora FROM citas ORDER BY paciente_id, fecha, hora";
        $result = $this->conn->query($sql);
        $appointments = [];
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }

        echo json_encode($appointments);
    }

    //crear cita
    public function addAppointment() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $paciente_id = $_POST['paciente_id'];
            $especialidad_id = $_POST['especialidad_id'];
            $medico_id = $_POST['medico_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            $sql = "INSERT INTO citas (paciente_id, especialidad_id, medico_id, fecha, hora) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iiiss", $paciente_id, $especialidad_id, $medico_id, $fecha, $hora);

            if ($stmt->execute()) {
                echo "Cita creada.";
            } else {
                echo "Error al crear la cita: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    //cambiar cita
    public function updateAppointment() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cita_id = $_POST['cita_id'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            $sql = "UPDATE citas SET fecha = ?, hora = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssi", $fecha, $hora, $cita_id);

            if ($stmt->execute()) {
                echo "Cita actualizada.";
            } else {
                echo "Error al actualizar la cita: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    //borrar cita
    public function deleteAppointment() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cita_id = $_POST['cita_id'];

            $sql = "DELETE FROM citas WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $cita_id);

            if ($stmt->execute()) {
                echo "Cita eliminada.";
            } else {
                echo "Error al eliminar la cita: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>