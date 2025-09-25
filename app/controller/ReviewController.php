<?php
require_once 'app/models/review.php';

class ReviewController {

    public function index() {
        // if (!isset($_SESSION['usuario'])) {
        //     header('Location: index.php');
        //     exit();
        // }
        $reviews = new Review();
        $listaReviews = $reviews->obtenerTodos();
        $vista = 'app/views/review/index.php';
        $titulo = 'Lista de Valoraciones';
        require_once $vista;
    }

    public function obtenerPorId() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $reviewModel = new Review();
        $review = $reviewModel->obtenerPorId($id);

        if (!$review) {
            echo "Valoración no encontrada";
            return;
        }

        $vista = 'app/views/review/index.php';
        $titulo = 'Detalle de la Valoración';
        require 'app/views/home/index.php';
    }

    public function verReseña() {
        if (!isset($_SESSION['cliente'])) {
            header('Location: index.php?controller=LoginCliente&action=login');
            exit();
        }

        $clienteId = $_SESSION['cliente']['id']; 

        $reviewModel = new Review();

        // Traer citas completadas para el combo
        $citas = $reviewModel->obtenerCitasCompletadas($clienteId);

        $citaSeleccionada = null;
        if (isset($_GET['id'])) {
            // Buscar reseña solo de esa cita
            $reseñas = $reviewModel->obtenerResenasPorCliente($clienteId);

            foreach ($reseñas as $reseña) {
                if ($reseña['appointmentId'] == $_GET['id']) {
                    $citaSeleccionada = $reseña;
                    break;
                }
            }
        }

        $vista = 'app/views/clientes/verReseña.php';
        require 'app/views/clientes/layoutCliente.php';
    }

    public function dejaReseña() {
        if (!isset($_SESSION['cliente'])) {
            header('Location: index.php?controller=LoginCliente&action=login');
            exit();
        }

        $clienteId = $_SESSION['cliente']['id']; // ID del cliente logueado
        $review = new Review();

        $citasCompletadas = $review->obtenerCitasCompletadas($clienteId);

        $vista = 'app/views/clientes/dejarReseña.php';
        require 'app/views/clientes/layoutCliente.php';
    }

    public function subirReseña() {
            if (!isset($_SESSION['cliente'])) {
            header('Location: index.php?controller=LoginCliente&action=login');
            exit();
        } 

        $data = [
            'appointmentId' => $_POST['appointmentId'] ?? '',
            'ratingValue'   => $_POST['ratingValue'] ?? '',
            'reviewComment' => $_POST['reviewComment'] ?? ''
        ];
        
        $review = new Review();
        if ($review->guardar($data)) {
            // ✅ Redirigir con el id de la cita reseñada
            header('Location: index.php?controller=Review&action=verReseña&id=' . $data['appointmentId']); 
            exit();
        } else {
            echo "<script>alert('Error al guardar la valoración');window.history.back();</script>";
        }
    }


    public function guardar() {
        /* if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        } */

        $data = [
            'appointmentId' => $_POST['appointmentId'] ?? '',
            'ratingValue' => $_POST['ratingValue'] ?? '',
            'reviewComment' => $_POST['reviewComment'] ?? ''
        ];
        
        $review = new Review();
        if ($review->guardar($data)) {
            // Se ha corregido la redirección para que se dirija al home index
            header('Location: index.php?controller=User&action=index'); 
            exit();
        } else {
            echo "<script>alert('Error al guardar la valoración');window.history.back();</script>";
        }
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $reviewModel = new Review();
        $review = $reviewModel->obtenerPorId($id);

        if (!$review) {
            echo "Valoración no encontrada";
            return;
        }

        $vista = 'app/views/reviews/editar.php';
        $titulo = 'Editar Valoración';
        require 'app/views/home/index.php';
    }

    public function actualizar() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }
        
        $data = [
            'id' => $_POST['id'] ?? '',
            'ratingValue' => $_POST['ratingValue'] ?? '',
            'reviewComment' => $_POST['reviewComment'] ?? ''
        ];

        $review = new Review();
        if ($review->actualizarValoracion($data)) {
            // Se ha corregido la redirección para que se dirija al home index
            header('Location: index.php'); 
            exit();
        } else {
            echo "<script>alert('Error al actualizar la valoración');window.history.back();</script>";
        }
    }

    public function actualizarRespuesta() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header('Location: index.php');
            exit();
        }

        $data = [
            'id' => $_POST['id'] ?? '',
            'response' => $_POST['response'] ?? ''
        ];

        $review = new Review();
        if ($review->actualizarRespuesta($data)) {
            header('Location: index.php'); // Redirección a la página de inicio
            exit();
        } else {
            echo "<script>alert('Error al actualizar la respuesta');window.history.back();</script>";
        }
    }

    public function eliminar() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID no identificado";
            return;
        }

        $review = new Review();
        if ($review->eliminar($id)) {
            header('Location: index.php'); // Redirección a la página de inicio
            exit();
        } else {
            echo "<script>alert('Error al eliminar la valoración');window.history.back();</script>";
        }
    }
}
?>