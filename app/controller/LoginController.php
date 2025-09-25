<?php
//app/controller/LoginController.php

require_once 'app/models/usuario.php';

class LoginController
{
    public function login()
    {
        $vista = 'app/views/login.php';
        $titulo = 'PrettyGirl Salon - Login';
        require 'app/views/layout.php';
    }

    public function autenticar()
    {   
        /* $usuario = new Usuario();
        $data = $usuario->login($_POST['email'],$_POST['userPassword']);
        
        if ($data){
            $_SESSION['usuario'] = $data;
            $_SESSION['userName'] = $data['userName'];
            
            // DEBUG: Verificar qué datos estamos recibiendo
            error_log("Usuario autenticado: " . print_r($data, true));
            
            header("Location: index.php?controller=User&action=index");          
            
        } else {
            $_SESSION['error_login'] = 'Credenciales incorrectas';
            header("Location: index.php?controller=Login&action=login");S
            exit();
        }  */

        $usuario = new Usuario();
        $data = $usuario->login($_POST['email']);

        if ($data && hash('sha256', $_POST['userPassword']) === $data['userPassword']) {
            $_SESSION['usuario'] = $data;
            $_SESSION['userName'] = $data['userName'];
            header("Location: index.php?controller=User&action=index");
            exit();
        } else {
            $_SESSION['error_login'] = 'Credenciales incorrectas';
            header("Location: index.php?controller=Login&action=login");
            exit();
        }
    }

    public function cerrar_sesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}