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