<?php
require_once 'config/database.php';

class Appointment {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //crear cita
    public function createAppointment($paciente_id, $especialidad_id, $medico_id, $fecha, $hora) {
        $checkSQL = "SELECT id FROM citas WHERE medico_id = ? AND fecha = ? AND hora = ?";
        $stmt = $this->conn->prepare($checkSQL);
        $stmt->bind_param("iss", $medico_id, $fecha, $hora);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return "El horario seleccionado no esta disponible.";
        }
        $stmt->close();

        $sql = "INSERT INTO citas (paciente_id, especialidad_id, medico_id, fecha, hora) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiiss", $paciente_id, $especialidad_id, $medico_id, $fecha, $hora);

        if ($stmt->execute()) {
            return "Cita reservada.";
        } else {
            return "Error al reservar la cita: " . $stmt->error;
        }

        $stmt->close();
    }

    //ver las citas de un usuario
    public function getAppointmentsByPatient($paciente_id) {
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

        return $appointments;
    }

    //cambiar cita
    public function updateAppointment($cita_id, $fecha, $hora) {
        $sql = "UPDATE citas SET fecha = ?, hora = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $fecha, $hora, $cita_id);

        if ($stmt->execute()) {
            return "Cita actualizada.";
        } else {
            return "Error al actualizar la cita: " . $stmt->error;
        }

        $stmt->close();
    }

    //elim cita
    public function deleteAppointment($cita_id) {
        $sql = "DELETE FROM citas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cita_id);

        if ($stmt->execute()) {
            return "Cita eliminada.";
        } else {
            return "Error al eliminar la cita: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
