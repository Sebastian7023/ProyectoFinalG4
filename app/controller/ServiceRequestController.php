<?php
// app/controller/ServiceRequestController.php
require_once __DIR__ . '/../models/serviceRequest.php';

class ServiceRequestController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new ServiceRequest();
    }

    public function index() {
        $services = $this->serviceModel->getAll();
        require __DIR__ . '/../views/serviceRequest/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'serviceName' => $_POST['serviceName'],
                'durationMinutes' => $_POST['durationMinutes'],
                'servicePrice' => $_POST['servicePrice'],
                'serviceDescription' => $_POST['serviceDescription'],
                'isAvailable' => isset($_POST['isAvailable']) ? 1 : 0
            ];
            $this->serviceModel->create($data);
            header('Location: ?controller=ServiceRequest&action=index');
            exit;
        }
        require __DIR__ . '/../views/serviceRequest/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?controller=ServiceRequest&action=index');
            exit;
        }
        
        $service = $this->serviceModel->getById($id);
        if (!$service) {
            header('Location: ?controller=ServiceRequest&action=index');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'serviceName' => $_POST['serviceName'],
                'durationMinutes' => $_POST['durationMinutes'],
                'servicePrice' => $_POST['servicePrice'],
                'serviceDescription' => $_POST['serviceDescription'],
                'isAvailable' => isset($_POST['isAvailable']) ? 1 : 0
            ];
            $this->serviceModel->update($id, $data);
            header('Location: ?controller=ServiceRequest&action=index');
            exit;
        }
        require __DIR__ . '/../views/serviceRequest/edit.php';
    }

    // Activar o desactivar un servicio
    public function toggleAvailable($id) {
        $service = $this->serviceModel->getById($id);
        if ($service) {
            $newStatus = $service['isAvailable'] ? 0 : 1;
            $this->serviceModel->setAvailable($id, $newStatus);
        }
        header('Location: ?controller=ServiceRequest&action=index');
        exit;
    }

    // Eliminar deshabilitado, usar toggleAvailable
}
