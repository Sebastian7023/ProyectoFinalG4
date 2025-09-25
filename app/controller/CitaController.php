<?php
require_once 'app/models/cita.php';
require_once 'app/models/serviceRequest.php';
require_once 'app/models/usuario.php';
require_once 'app/models/cliente.php';

class CitaController
{
    //ESTO ES PARA CLIENTES
    public function verCitas()
    {
        if (!isset($_SESSION['cliente'])) {
            header('Location: index.php?controller=LoginCliente&action=login');
            exit();
        }

        $clienteId = $_SESSION['cliente']['id'];
        $citaModel = new Cita();

        $citas = $citaModel->obtenerCitasPorCliente($clienteId);

        $citaSeleccionada = null;
        if (isset($_GET['id'])) {
            $citaSeleccionada = $citaModel->obtenerCitaPorId($_GET['id']);
        } elseif (!empty($citas)) {
            $citaSeleccionada = $citas[0];
        }

        $vista = 'app/views/clientes/verCitas.php';
        require 'app/views/clientes/layoutCliente.php';
    }

    public function agendarCita()
    {
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?controller=LoginCliente&action=login");
            exit();
        }

        $citaModel = new Cita();
        $servicios = $citaModel->obtenerServicios();
        $estilistas = $citaModel->obtenerEstilistas();

        $clienteId = $_SESSION['cliente']['id'];
        $vista = 'app/views/clientes/agendarCita.php';
        require 'app/views/clientes/layoutCliente.php';
    }

    public function guardarCita()
    {
        if (!isset($_SESSION['cliente'])) {
            header("Location: index.php?controller=LoginCliente&action=login");
            exit();
        }

        $data = [
            'clientId' => $_POST['clientId'] ?? '',
            'serviceId' => $_POST['serviceId'] ?? '',
            'userId' => $_POST['userId'] ?? '',
            'appointmentDateTime' => $_POST['appointmentDateTime'] ?? '',
            'appointmentStatus' => "pending",
            'notes' => $_POST['notes'] ?? ''
        ];
        $cita = new Cita();
        if ($cita->guardar($data)) {
            header("Location: index.php?controller=Cita&action=verCitas");
            exit();
        } else {
            echo "<script>alert('Error al agendar la cita');window.history.back();</script>";
        }
    }

    public function cancelarCita()
    {
        if (!isset($_SESSION['cliente'])) {
            header('Location: index.php?controller=LoginCliente&action=login');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $cita = new Cita();
        if ($cita->cancelar($id)) {
            header("Location: index.php?controller=Cita&action=verCitas");
            exit();
        } else {
            echo "<script>alert('Error al cancelar la cita'); window.history.back();</script>";
        }
    }

    //ESTO ES PARA ESTILISTAS
    public function verCitasEstilista()
    {
        if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?controller=Home&action=index');
        exit();
        }

        // Tomamos el id del estilista logueado
        $userId = $_SESSION['usuario']['id'];
        $citaModel = new Cita();

        // Ahora traemos citas por estilista (usuario)
        $citas = $citaModel->obtenerCitasPorUsuario($userId);

        $citaSeleccionada = null;
        if (isset($_GET['id'])) {
            $citaSeleccionada = $citaModel->obtenerCitaPorId($_GET['id']);
        } elseif (!empty($citas)) {
            $citaSeleccionada = $citas[0];
        }

        $vista = 'app/views/citas/verCitaEstilista.php';
        require 'app/views/users/layout.php';
    }

    public function agendarCitaEstilista()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=Home&action=index");
            exit();
        }

        $citaModel = new Cita();
        $clientes = $citaModel->obtenerClientes();
        $servicios = $citaModel->obtenerServicios();
        $estilistas = $citaModel->obtenerEstilistas();

        $vista = 'app/views/citas/agendarCitaEstilista.php';
        require 'app/views/users/layout.php';
    }

    public function guardarCitaEstilista()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=Home&action=index");
            exit();
        }

        $data = [
            'clientId' => $_POST['clientId'] ?? '',
            'serviceId' => $_POST['serviceId'] ?? '',
            'userId' => $_POST['userId'] ?? '',
            'appointmentDateTime' => $_POST['appointmentDateTime'] ?? '',
            'appointmentStatus' => "pending",
            'notes' => $_POST['notes'] ?? ''
        ];
        $cita = new Cita();
        if ($cita->guardar($data)) {
            header("Location: index.php?controller=User&action=index");
            exit();
        } else {
            echo "<script>alert('Error al agendar la cita');window.history.back();</script>";
        }
    }

    public function editarCitaEstilista()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=Cita&action=verCitasEstilista");
            exit();
        }

        $id = $_GET['id'];
        $rol = $_SESSION['usuario']['rol'] ?? '';

        $citaModel = new Cita();
        $clienteModel = new Cliente();
        $servicioModel = new ServiceRequest();
        $usuarioModel = new Usuario();

        $cita = $citaModel->traerCitaPorId($id);
        $clientes = $citaModel->obtenerClientes();
        $servicios = $citaModel->obtenerServicios();
        $usuarios = $citaModel->obtenerEstilistas();

        $vista = 'app/views/citas/editarCitaEstilistas.php';
        require 'app/views/users/layout.php';
    }

    public function actualizarCitaEstilista()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rol = $_SESSION['usuario']['rol'] ?? '';
            $data = $_POST;

            $citaModel = new Cita();
            $resultado = $citaModel->actualizar($data, $rol);

            if ($resultado) {
                $_SESSION['success'] = "Cita actualizada correctamente.";
            } else {
                $_SESSION['error'] = "Error al actualizar la cita.";
            }

            header("Location: index.php?controller=Cita&action=verCitasEstilista");
            exit();
        }
    }

    public function cancelarCitaEstilista()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?controller=Home&action=index');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $cita = new Cita();
        if ($cita->cancelar($id)) {
            header("Location: index.php?controller=Cita&action=verCitasEstilista");
            exit();
        } else {
            echo "<script>alert('Error al cancelar la cita'); window.history.back();</script>";
        }
    }
    /////////////
    public function index()
    {

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

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


