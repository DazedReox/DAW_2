<?php
require_once 'config/database.php';

class AdminController {
    
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //añadir un nuevo doctor
    public function addDoctor() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $especialidad_id = $_POST['especialidad_id'];

            $sql = "INSERT INTO medicos (nombre, especialidad_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("si", $nombre, $especialidad_id);

            if ($stmt->execute()) {
                echo "Médico agregado.";
            } else {
                echo "Error al agregar el medico: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    //modificar docotr
    public function updateDoctor() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $medico_id = $_POST['medico_id'];
            $nombre = $_POST['nombre'];
            $especialidad_id = $_POST['especialidad_id'];

            $sql = "UPDATE medicos SET nombre = ?, especialidad_id = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sii", $nombre, $especialidad_id, $medico_id);

            if ($stmt->execute()) {
                echo "Medico actualizado.";
            } else {
                echo "Error al actualizar el medico: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    //eliminar medico
    public function deleteDoctor() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $medico_id = $_POST['medico_id'];

            $sql = "DELETE FROM medicos WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $medico_id);

            if ($stmt->execute()) {
                echo "Medico eliminado.";
            } else {
                echo "Error al eliminar el medico: " . $stmt->error;
            }

            $stmt->close();
        }
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

    //listar todo
    public function getDashboardData() {
        $dashboardData = [];

        //listar las citas
        $sql = "SELECT c.id, p.nombre AS paciente, e.nombre AS especialidad, m.nombre AS medico, c.fecha, c.hora
                FROM citas c
                JOIN pacientes p ON c.paciente_id = p.id
                JOIN especialidades e ON c.especialidad_id = e.id
                JOIN medicos m ON c.medico_id = m.id
                ORDER BY c.fecha, c.hora";

        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dashboardData['citas'][] = $row;
        }

        //listar los médicos
        $sql = "SELECT id, nombre FROM medicos";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dashboardData['medicos'][] = $row;
        }

        //listar los servicios
        $sql = "SELECT id, nombre, precio FROM servicios";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dashboardData['servicios'][] = $row;
        }

        echo json_encode($dashboardData);
    }
}
?>
