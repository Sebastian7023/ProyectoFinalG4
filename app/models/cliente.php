<?php

require_once 'app/config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function obtenerTodo()
    {
        $sql = "SELECT * FROM client";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerId($id)
    {
        $sql = "SELECT * FROM client WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' =>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar($data)
    {
        $sql = "INSERT INTO client (dni,fullName,phone,email)
                values(:dni,:fullName,:phone,:email)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function actualizar($data)
    {
        $sql = "UPDATE client SET dni = :dni , fullName = :fullName, phone = :phone, email = :email
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function loginCliente($dni)
    {
        $sql = "SELECT * FROM client WHERE dni = :dni ";
        $smt = $this->db->prepare($sql);
        $smt->execute(['dni' => $dni]);
        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerClientesPorEstilista($userId)
    {
         $sql = "SELECT c.id, c.dni, c.fullName, c.phone, c.email, MAX(a.appointmentDateTime) AS appointmentDateTime
            FROM client c
            JOIN appointment a ON c.id = a.clientId
            WHERE a.userId = :userId
            GROUP BY c.id, c.dni, c.fullName, c.phone, c.email
            ORDER BY appointmentDateTime DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}