<?php
require_once 'app/models/usuario.php';
require_once 'app/models/cita.php';

class CitaController
{
    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $cita =  new Cita();
        $citas = $cita->obtenerCitas();
        $vista = 'app/views/citas/indexCitas.php';
        $titulo = 'Listado de Citas';

        require 'app/views/layout.php';
    }

    public function crear()
    {
        $vista = 'app/views/citas/crearCitas.php';
        $titulo = 'Crear citas';
        require 'app/views/layout.php';
    }

    public function guardar()
    {

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $data = [
            'clientId' => $_POST['clientId'] ?? '',
            'serviceId' => $_POST['serviceId'] ?? '',
            'userId' => $_POST['userId'] ?? '',
            'appointmentDateTime' => $_POST['appointmentDateTime'] ?? '',
            'notes' => $_POST['notes'] ?? '',
            'appointmentStatus' => "pendiente",
        ];
        $cita =  new Cita();
        if ($cita->guardar($data)) {
            header('Location: index.php?controller=Cita&action=index');
            exit();
        } else {
            echo "<script>alert('Error al guardar la cita');windows.history.back();</script>";
        }
    }

    public function editar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "ID no identificado";
            return;
        }
        $citaModel =  new Cita();
        $cita = $citaModel->obtenerId($id);

        if (!$cita) {
            echo "Cita no encontrada";
            return;
        }

        $vista = 'app/views/citas/editarCitas.php';
        $titulo = 'Editar citas';
        require 'app/views/layout.php';
    }

    public function actualizar()
    {
        $data = [
            'id' => $_POST['id'] ?? '',
            'clientId' => $_POST['clientId'] ?? '',
            'serviceId' => $_POST['serviceId'] ?? '',
            'userId' => $_POST['userId'] ?? '',
            'appointmentDateTime' => $_POST['appointmentDateTime'] ?? '',
            'notes' => $_POST['notes'] ?? '',
            'appointmentStatus' => "pendiente",
        ];

        $cita =  new Cita();
        $cita->actualizar($data);
        header('Location: index.php?controller=Cita&action=index');
        exit();
    }


    public function eliminar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }
        $cita =  new Cita();
        $cita->inactivar($id);
        header('Location: index.php?controller=Cita&action=index');
        exit();
    }
}
