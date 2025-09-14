<?php
class Database
{
    public static function conectar()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=prettygirl_salon", "root", "123456");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexion " . $e->getMessage());
        }
    }
}
