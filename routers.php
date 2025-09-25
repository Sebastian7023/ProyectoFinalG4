<!--routers en la riz-->
<?php
session_start();
$controller = $_GET['controller'] ?? 'Home';
$action = $_GET['action'] ?? 'index';

$controllerName = $controller . 'Controller';
$controllerPath = "app/controller/$controllerName.php";

if (file_exists($controllerPath)) {
    require_once $controllerPath;    
    $controllerObj = new $controllerName;
    
    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        // Manejar acción no encontrada        
        echo "Action '$action' no encontrado";
    }    
} else {
    // Manejar controlador no encontrado    
    echo "Controller '$controllerName' no encontrado";
}