<?php
require_once 'app/config/database.php';

class Review {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    } 

    public function obtenerTodos() {
        $sql = "SELECT * FROM review";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM review WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerResenasPorCliente($clienteId) {
        $sql = "SELECT r.id, r.appointmentId, r.ratingValue, r.reviewComment, r.reviewDate,
                    a.appointmentDateTime, s.serviceName, u.fullName AS usuarioNombre
                FROM review r
                JOIN appointment a ON r.appointmentId = a.id
                JOIN serviceRequest s ON a.serviceId = s.id
                JOIN users u ON a.userId = u.id
                WHERE a.clientId = :clienteId
                ORDER BY r.reviewDate DESC";

        $stmt = $this->db->prepare($sql); // ✅ corregido
        $stmt->execute(['clienteId' => $clienteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCitasCompletadas($clienteId) {
        $sql = "SELECT a.id, s.serviceName, a.appointmentDateTime
                FROM appointment a
                JOIN serviceRequest s ON a.serviceId = s.id
                WHERE a.clientId = :clienteId AND a.appointmentStatus = 'completed'
                ORDER BY a.appointmentDateTime DESC";

        $stmt = $this->db->prepare($sql); // ✅ corregido
        $stmt->execute(['clienteId' => $clienteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($data) {
        $sql = "INSERT INTO review (appointmentId, ratingValue, reviewComment) VALUES (:appointmentId, :ratingValue, :reviewComment)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function actualizarRespuesta($data) {
        $sql = "UPDATE review SET response = :response WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function actualizarValoracion($data) {
        $sql = "UPDATE review SET ratingValue = :ratingValue, reviewComment = :reviewComment WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM review WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>