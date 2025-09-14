<?php
    require_once 'app/models/usuario.php';
 
    class LoginController{
        
        public function login(){
            if(isset($_SESSION['usuario'])){
                header("Location: index.php?controller=Dashboard&action=index");
                exit();
            } else {
                require 'app/views/login/login.php';
            }
        }
 
        public function autenticar(){
            $usuario = new Usuario();
            $data = $usuario->login($_POST['email'],$_POST['password']);
 
            if ($data)  {
                $_SESSION['usuario'] = $data;
                
                if ($data['rol'] === 'administrador') {
                    header("Location: index.php?controller=Dashboard&action=index");
                } else {
                    header("Location: index.php?controller=Estilista&action=index");
                }
                exit();
            } else {
                echo "<script>alert('Credenciales incorrectas'); window.location='index.php';</script>";
            }
        }
    
 
        public function cerrar_session(){
            session_destroy();
            header('Location: index.php');
        }
    }
