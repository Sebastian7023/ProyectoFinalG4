<?php
class Database
{
    public static function conectar()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3307;dbname=prettygirl_salon", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexion " . $e->getMessage());
        }
    }
}
