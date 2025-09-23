<?php
// debug.php - Para verificar sesiones y redirecciones
session_start();
echo "<h2>Información de Debug</h2>";
echo "<h3>Sesión:</h3>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h3>POST:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<h3>GET:</h3>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

// Probar la conexión a la base de datos
try {
    require_once 'app/config/database.php';
    $pdo = Database::conectar();
    echo "<h3>Conexión a BD: ✓ Exitosa</h3>";
    
    // Probar consulta de usuarios
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
    $result = $stmt->fetch();
    echo "<p>Total de usuarios en BD: " . $result['total'] . "</p>";
    
} catch (PDOException $e) {
    echo "<h3>Conexión a BD: ✗ Error</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
}