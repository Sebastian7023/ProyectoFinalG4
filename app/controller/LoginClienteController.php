<?php

require_once 'app/models/cliente.php';

class LoginClienteController
{
    public function login()
    {
        if (isset($_SESSION['cliente'])) {
            header("Location: index.php?controller=Cliente&action=dashboardCliente");
            exit();
        }
        require 'app/views/clientes/loginCliente.php';
    }

    public function autenticar()
    {
        $dni = $_POST['dni'] ?? '';
        $clienteModel = new Cliente();
        $cliente = $clienteModel->loginCliente($dni);

        if ($cliente) {
            $_SESSION['cliente'] = $cliente;
            header("Location: index.php?controller=Cliente&action=dashboardCliente");
            exit();
        } else {
            echo "<script>alert('No está registrado. Por favor regístrese.'); 
                  window.location='index.php?controller=LoginCliente&action=login';</script>";
        }
    }

    public function logout()
    {
        unset($_SESSION['cliente']);
        session_destroy();
        header("Location: index.php?controller=Home&action=index");
        exit();
    }
}