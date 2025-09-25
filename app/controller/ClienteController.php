<?php

require_once 'app/models/cliente.php';

class ClienteController 
{
    public function index()
    {
       /*  if(!isset($_SESSION['usuario'])){
            header('Location: index.php');
            exit();
        } */

        $clienteModel = new Cliente();
        $clientes = $clienteModel->obtenerTodo();
        $vista = 'app/views/clientes/indexCliente.php';
        $titulo = 'Lista de clientes registrados';

        require $vista;
    }

    public function dashboardCliente()
    {
            // Inicia sesión solo si no hay una activa
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION['cliente'])) {
            header("Location: index.php?controller=LoginCliente&action=login");
            exit();
        }

        // Vista del dashboard
        $vista = 'app/views/clientes/dashboardCliente.php';
        require $vista;
    }

    public function crear()
    {
        $vista = 'app/views/clientes/crearCliente.php';
        $titulo = 'Agregar cliente';
        require $vista;
    }

    /* public function guardar()
    {
       if(!isset($_SESSION['usuario'])){
            header('Location: index.php');
            exit();
        } 

        $data = [
            'dni' => $_POST['dni'] ?? '',
            'fullName' => $_POST['fullName'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? ''
        ];
        $cliente = new Cliente();
        if($cliente->guardar($data))
        {
            header('Location: routers.php?controller=Cliente&action=index');
            exit();
        }else{
            echo "<script>alert('Error al guardar el cliente');windows.history.back();</script>";
        }
    } */

    public function registrarClienteForm()
    {
        require 'app/views/clientes/registrarCliente.php';
    }

    public function registrar()
    {
        $data = [
            'dni' => $_POST['dni'] ?? '',
            'fullName' => $_POST['fullName'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? ''
        ];

        $cliente = new Cliente();
        if ($cliente->guardar($data)) {
            header("Location: /ProyectoFinalG4/index.php?controller=LoginCliente&action=login");
            exit();
        } else {
            echo "<script>alert('Error al registrar el cliente'); window.history.back();</script>";
        }
    }

    public function editar()
    {
        $id = $_GET['id'] ?? null;
        if(!$id)
        {
            echo "ID no identificado";
            return;
        }
        $clienteModel = new cliente();
        $cliente = $clienteModel->obtenerId($id);
        if(!$cliente)
        {
            echo "El cliente no existe";
            return;
        }
        $vista = 'app/views/clientes/editarCliente.php';
        $titulo = 'Editar clientes';
        require $vista;
    }

    public function actualizar()
    {
        $data = [
            'id' => $_POST['id'] ?? '',
            'dni' => $_POST['dni'] ?? '',
            'fullName' => $_POST['fullName'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? ''
        ];
        $cliente = new Cliente();
        $cliente->actualizar($data);
        header('Location: routers.php?controller=Cliente&action=index');
        exit();
    }
}