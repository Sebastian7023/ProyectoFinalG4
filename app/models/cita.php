<?php
require_once 'app/config/database.php';

class Cita
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function obtenerCitasPorCliente($clienteId) {
        $sql = "SELECT a.*, 
                    c.fullName AS clienteNombre, 
                    s.serviceName AS servicioNombre, 
                    u.fullName AS usuarioNombre
                FROM appointment a
                JOIN client c ON a.clientId = c.id
                JOIN serviceRequest s ON a.serviceId = s.id
                JOIN users u ON a.userId = u.id
                WHERE a.clientId = :clientId 
                AND a.appointmentStatus != 'cancelled'
                ORDER BY a.appointmentDateTime DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['clientId' => $clienteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCitaPorId($id)
    {
        $sql = "SELECT 
                    a.id,
                    a.appointmentDateTime,
                    a.appointmentStatus,
                    a.notes,
                    c.fullName AS clienteNombre,
                    u.fullName AS usuarioNombre,
                    s.serviceName AS servicioNombre
                FROM appointment a
                JOIN client c ON a.clientId = c.id
                JOIN users u ON a.userId = u.id
                JOIN serviceRequest s ON a.serviceId = s.id
                WHERE a.id = :id
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerServicios()
    {
        $sql = "SELECT id, serviceName FROM serviceRequest WHERE isAvailable = 1";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEstilistas()
    {
        $sql = "SELECT id, fullName FROM users WHERE rol = 'Estilista' AND isActive = 1";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelar($id)
    {
        $sql = "UPDATE appointment SET appointmentStatus = 'cancelled' WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}

