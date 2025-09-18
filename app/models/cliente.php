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
}