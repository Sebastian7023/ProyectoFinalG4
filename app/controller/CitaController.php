<?php
require_once 'app/models/cita.php';

class CitaController
{
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

}