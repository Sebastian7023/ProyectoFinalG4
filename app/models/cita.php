<?php
require_once 'app/config/database.php';

class Cita
{
    private $db;

    public function __construct()
    {
        $this -> db= Database::conectar();
    }

    public function obtenerCitas(){
        $sql = "SELECT * FROM appointment";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($data)
    {
        try {
            $sql = "INSERT INTO appointment(clientId, serviceId, userId, appointmentDateTime, appointmentStatus, notes) 
                    values(:clientId, :serviceId, :userId, :appointmentDateTime, :appointmentStatus, :notes)";
            $stmt = $this->db->prepare($sql);
            
            if ($stmt->execute($data)) {
                return true;
            } else {
                // Log del error para debugging
                error_log("Error al guardar cita: " . implode(", ", $stmt->errorInfo()));
                return false;
            }
            
        } catch (PDOException $e) {
            // Log de excepciones de la base de datos
            error_log("Excepción al guardar cita: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerId($id)
    {
        $sql = "SELECT * FROM appointment WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data)
    {
        $sql = "UPDATE appointment SET clientId = :clientId , serviceId = :serviceId, userId = :userId , 
                appointmentDateTime = :appointmentDateTime, appointmentStatus = :appointmentStatus,
                notes = :notes WHERE id = :id ";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM appointment WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function inactivar($id)
    {
        $sql = "UPDATE appointment SET appointmentStatus = 'Cancelado' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}