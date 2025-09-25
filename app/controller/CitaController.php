<?php
require_once 'app/models/usuario.php';
require_once 'app/models/cita.php';
require_once 'app/models/serviceRequest.php';

class CitaController
{
    public function __construct()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }
    }

    public function index()
    {
        $cita = new Cita();
        $rol = $_SESSION['usuario']['rol'] ?? 'cliente'; // por defecto cliente

        if ($rol === 'Administrador') {
            // Admin ve todas las citas
            $citas = $cita->obtenerTodasLasCitas();
        } elseif ($rol === 'Estilista') {
            // Estilista solo ve sus citas
            $citas = $cita->obtenerCitasPorUsuario($_SESSION['usuario']['id']);
        } else { 
            // Cliente solo ve sus citas
            $citas = $cita->obtenerCitasPorCliente($_SESSION['usuario']['id']);
        }

        $vista = 'app/views/citas/indexCitas.php';
        $titulo = 'Listado de Citas';
        require 'app/views/layout.php';
    }

    public function crear()
    {
        $rol = $_SESSION['usuario']['rol'] ?? 'cliente';

        // Servicios activos
        $serviceModel = new ServiceRequest();
        $servicios = $serviceModel->getActiveServices(50);

        // Estilistas activos
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerEstilistas();

        // Clientes (solo Admin y Estilista)
        $clientes = [];
        if ($rol === 'Administrador' || $rol === 'Estilista') {
            require_once 'app/models/Cliente.php';
            $clienteModel = new Cliente();
            $clientes = $clienteModel->obtenerTodo();
        }

        $vista = 'app/views/citas/crearCitas.php';
        $titulo = 'Crear citas';
        require 'app/views/layout.php';
    }


    public function guardar()
    {
        $data = [
            'clientId'            => $_POST['clientId'] ?? '',
            'serviceId'           => $_POST['serviceId'] ?? '',
            'userId'              => $_POST['userId'] ?? '',
            'appointmentDateTime' => $_POST['appointmentDateTime'] ?? '',
            'notes'               => $_POST['notes'] ?? '',
            'appointmentStatus'   => "pendiente",
        ];

        $cita = new Cita();
        if ($cita->guardar($data)) {
            header('Location: index.php?controller=Cita&action=index');
            exit();
        } else {
            echo "<script>alert('Error al guardar la cita'); window.history.back();</script>";
        }
    }

    public function editar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $citaModel = new Cita();
        $cita = $citaModel->obtenerId($id);

        if (!$cita) {
            echo "Cita no encontrada";
            return;
        }

        // 🚀 traer servicios activos
        $serviceModel = new ServiceRequest();
        $servicios = $serviceModel->getActiveServices(50);

        // 🚀 traer estilistas activos
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerEstilistas();

        $vista = 'app/views/citas/editarCitas.php';
        $titulo = 'Editar citas';
        require 'app/views/layout.php';
    }


public function actualizar()
{
    $rol = $_SESSION['usuario']['rol'] ?? 'cliente';
    $id = $_POST['id'] ?? null;

    if (!$id) {
        die("ID de cita no proporcionado");
    }

    // Obtener cita original
    $cita = (new Cita())->obtenerId($id);

    if (!$cita) {
        die("Cita no encontrada");
    }

    // Datos comunes (todos pueden editar notas)
    $data = [
        'id' => $id,
        'notes' => $_POST['notes'] ?? $cita['notes'],
        'appointmentStatus' => $cita['appointmentStatus'], // por defecto mantiene estado
        'serviceId' => $cita['serviceId'],
        'userId' => $cita['userId'],
        'appointmentDateTime' => $cita['appointmentDateTime'],
    ];

    if ($rol === 'Administrador') {
        // Admin puede cambiar todo
        $data['serviceId'] = $_POST['serviceId'] ?? $cita['serviceId'];
        $data['userId'] = $_POST['userId'] ?? $cita['userId'];
        $data['appointmentDateTime'] = $_POST['appointmentDateTime'] ?? $cita['appointmentDateTime'];
        $data['appointmentStatus'] = $_POST['appointmentStatus'] ?? $cita['appointmentStatus'];
    } elseif ($rol === 'Estilista') {
        // Estilista cambia servicio, fecha/hora, notas y estado
        $data['serviceId'] = $_POST['serviceId'] ?? $cita['serviceId'];
        $data['appointmentDateTime'] = $_POST['appointmentDateTime'] ?? $cita['appointmentDateTime'];
        $data['appointmentStatus'] = $_POST['appointmentStatus'] ?? $cita['appointmentStatus'];
        // userId no cambia, mantiene al estilista asignado
    }

    // Actualizar en el modelo PASANDO EL ROL
    $modelo = new Cita();
    $modelo->actualizar($data, $rol);

    header("Location: index.php?controller=Cita&action=index");
    exit();
}

    public function eliminar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $cita = new Cita();
        $cita->eliminar($id);

        header('Location: index.php?controller=Cita&action=index');
        exit();
    }
}
