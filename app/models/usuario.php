<?php
require_once 'app/config/database.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email and password = SHA2(:password, 256 )";
        $smt = $this->db->prepare($sql);
        $smt->execute(['email' => $email, 'password' => $password]);
        return $smt->fetch(PDO::FETCH_ASSOC);
    }
}
