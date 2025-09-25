<?php
// app/models/serviceRequest.php
require_once __DIR__ . '/../config/database.php';

class ServiceRequest {
    private $conn;

    public function __construct() {
        $this->conn = Database::conectar();
    }

    public function getAll() {
        $stmt = $this->conn->prepare('SELECT * FROM serviceRequest');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM serviceRequest WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare('INSERT INTO serviceRequest (serviceName, durationMinutes, servicePrice, serviceDescription, isAvailable) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([
            $data['serviceName'],
            $data['durationMinutes'],
            $data['servicePrice'],
            $data['serviceDescription'],
            $data['isAvailable']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare('UPDATE serviceRequest SET serviceName = ?, durationMinutes = ?, servicePrice = ?, serviceDescription = ?, isAvailable = ? WHERE id = ?');
        return $stmt->execute([
            $data['serviceName'],
            $data['durationMinutes'],
            $data['servicePrice'],
            $data['serviceDescription'],
            $data['isAvailable'],
            $id
        ]);
    }

    // Activar o desactivar un servicio
    public function setAvailable($id, $isAvailable) {
        $stmt = $this->conn->prepare('UPDATE serviceRequest SET isAvailable = ? WHERE id = ?');
        return $stmt->execute([$isAvailable, $id]);
    }

    public function getActiveServices($limit = 6) {
        $stmt = $this->conn->prepare("SELECT * FROM serviceRequest WHERE isAvailable = 1 LIMIT ?");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
