<?php
require_once 'config/database.php';

class Doctor {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //obtener medicos
    public function getAllDoctors() {
        $sql = "SELECT m.id, m.nombre, e.nombre AS especialidad 
                FROM medicos m
                JOIN especialidades e ON m.especialidad_id = e.id
                ORDER BY e.nombre, m.nombre";
                
        $result = $this->conn->query($sql);
        $doctors = [];

        while ($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }

        return $doctors;
    }

    //clasificar medicos por especialidad
    public function getDoctorsBySpecialty($especialidad_id) {
        $sql = "SELECT id, nombre FROM medicos WHERE especialidad_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $especialidad_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $doctors = [];
        while ($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }

        return $doctors;
    }

    //añadir medico
    public function createDoctor($nombre, $especialidad_id) {
        $sql = "INSERT INTO medicos (nombre, especialidad_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nombre, $especialidad_id);

        if ($stmt->execute()) {
            return "Médico agregado.";
        } else {
            return "Error al agregar el médico: " . $stmt->error;
        }

        $stmt->close();
    }

    //actualizar datos
    public function updateDoctor($medico_id, $nombre, $especialidad_id) {
        $sql = "UPDATE medicos SET nombre = ?, especialidad_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $nombre, $especialidad_id, $medico_id);

        if ($stmt->execute()) {
            return "Médico actualizado.";
        } else {
            return "Error al actualizar el médico: " . $stmt->error;
        }

        $stmt->close();
    }

    //eliminar medico
    public function deleteDoctor($medico_id) {
        $sql = "DELETE FROM medicos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $medico_id);

        if ($stmt->execute()) {
            return "Médico eliminado.";
        } else {
            return "Error al eliminar el médico: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
