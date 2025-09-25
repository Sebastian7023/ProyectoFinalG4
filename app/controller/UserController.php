<!--app/controller/UserController.php-->
<?php
require_once 'app/models/usuario.php';

class UserController
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    private function verificarRolAdmin()
    {
        // El rol debe coincidir con el formato de la base de datos
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador') {
            header('Location: index.php');
            exit();
        }
    }

    public function index()
    {
        /* if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        } */

        $rol = $_SESSION['usuario']['rol'];
        $titulo = 'Panel de ' . ucfirst(strtolower($rol));

        // Lógica de redirección basada en el rol
        switch ($rol) {
            case 'Administrador':
                $vista = 'app/views/dashboard/admin.php';
                break;
            case 'Estilista':
                $vista = 'app/views/dashboard/estilista.php';
                break;
            default:
                // 3. Manejar roles no válidos o inesperados
                header('Location: index.php');
                exit();
        }
        if (file_exists($vista)) {
            require_once $vista;
        } else {
            // Manejar el caso de que el archivo de vista no exista
            header('Location: index.php'); // Redirigir a una página de error o al inicio
            exit();
        }
    }

    public function crear()
    {
        $this->verificarRolAdmin();
        $vista = 'app/views/users/crear.php';
        $titulo = 'Crear Usuario';
        require 'app/views/users/layout.php';
    }

    public function guardar()
    {
        $this->verificarRolAdmin();

        $errors = [];
        $data = [
            'userName' => trim($_POST['userName'] ?? ''),
            'userPassword' => $_POST['userPassword'] ?? '',
            'fullName' => trim($_POST['fullName'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'rol' => $_POST['rol'] ?? '',
            'specialty' => trim($_POST['specialty'] ?? ''),
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        // Validación de campos obligatorios
        if (empty($data['userName'])) {
            $errors[] = 'El nombre de usuario es obligatorio.';
        }
        if (empty($data['userPassword'])) {
            $errors[] = 'La contraseña es obligatoria.';
        }
        if (empty($data['fullName'])) {
            $errors[] = 'El nombre completo es obligatorio.';
        }
        if (empty($data['email'])) {
            $errors[] = 'El correo electrónico es obligatorio.';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El formato del correo electrónico no es válido.';
        }
        if (empty($data['rol'])) {
            $errors[] = 'El rol es obligatorio.';
        }

        // Si hay errores, guarda los datos en sesión y redirige
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $data;
            header('Location: index.php?controller=User&action=crear');
            exit();
        }

        // Encriptar la contraseña
        $data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);

        // Guardar en la base de datos
        if ($this->usuario->crear($data)) {
            $_SESSION['success'] = 'Usuario creado exitosamente.';
            header('Location: index.php?controller=User&action=gestionarUsuarios');
            exit();
        } else {
            $_SESSION['error'] = 'Error al crear el usuario. Por favor, inténtelo de nuevo.';
            $_SESSION['form_data'] = $data;
            header('Location: index.php?controller=User&action=crear');
            exit();
        }
    }

    public function editar()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "<script>alert('ID no encontrado');windows.history.back();</script>";
            return;
        }
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->buscarPorId($id);
        if (!$usuario) {
            echo "<script>alert('Usuario no encontrado');windows.history.back();</script>";
            return;
        }
        $vista = 'app/views/users/editar.php';
        $titulo = 'Editar Producto';
        require 'app/views/users/layout.php';
    }

    public function actualizar()
    {
        $this->verificarRolAdmin();

        $errors = [];
        $data = [
            'id' => $_POST['id'] ?? null,
            'fullName' => trim($_POST['fullName'] ?? ''),
            'userName' => trim($_POST['userName'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'userPassword' => $_POST['userPassword'] ?? '',
            'rol' => $_POST['rol'] ?? '',
            'specialty' => trim($_POST['specialty'] ?? ''),
            'isActive' => isset($_POST['isActive']) ? 1 : 0
        ];

        if (empty($data['id'])) {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
            header('Location: index.php?controller=User&action=index');
            exit();
        }

        // Validaciones
        if (empty($data['fullName'])) {
            $errors[] = 'El nombre completo es obligatorio.';
        }
        if (empty($data['email'])) {
            $errors[] = 'El correo electrónico es obligatorio.';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El formato del correo electrónico no es válido.';
        }
        if (empty($data['rol'])) {
            $errors[] = 'El rol es obligatorio.';
        }

        // Validar si el nuevo userName ya existe, excluyendo el usuario actual
        $usuarioModel = new Usuario();
        $existingUser = $usuarioModel->buscarPorUserName($data['userName']);
        if ($existingUser && $existingUser['id'] != $data['id']) {
            $errors[] = 'El nombre de usuario ya está en uso.';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $data;
            header("Location: index.php?controller=User&action=editar&id={$data['id']}");
            exit();
        }

        // Llamada al modelo para actualizar
        if ($usuarioModel->actualizar($data)) {
            $_SESSION['success'] = 'Usuario actualizado exitosamente.';
        } else {
            $_SESSION['error'] = 'Error al actualizar el usuario. Por favor, inténtelo de nuevo.';
        }

        header('Location: index.php?controller=User&action=gestionarUsuarios');
        exit();
    }

    public function eliminar()
    {
        $this->verificarRolAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
            header('Location: index.php?controller=User&action=index');
            exit();
        }

        if ($this->usuario->eliminar($id)) {
            $_SESSION['success'] = 'Usuario eliminado exitosamente.';
        } else {
            $_SESSION['error'] = 'Error al eliminar el usuario.';
        }

        header('Location: index.php?controller=User&action=index');
        exit();
    }

    public function desactivar()
    {
        $this->verificarRolAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
            header('Location: index.php?controller=User&action=index');
            exit();
        }

        // Se llama a un método único en el modelo para actualizar el estado
        if ($this->usuario->actualizarEstado($id, 0)) {
            $_SESSION['success'] = 'Usuario desactivado exitosamente.';
        } else {
            $_SESSION['error'] = 'Error al desactivar el usuario.';
        }
        header('Location: index.php?controller=User&action=index');
        exit();
    }

    public function activar()
    {
        $this->verificarRolAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
            header('Location: index.php?controller=User&action=index');
            exit();
        }

        // Se llama a un método único en el modelo para actualizar el estado
        if ($this->usuario->actualizarEstado($id, 1)) {
            $_SESSION['success'] = 'Usuario activado exitosamente.';
        } else {
            $_SESSION['error'] = 'Error al activar el usuario.';
        }
        header('Location: index.php?controller=User&action=index');
        exit();
    }

    public function gestionarUsuarios()
    {
        $this->verificarRolAdmin();
        $usuarios = $this->usuario->listarTodos();
        $vista = 'app/views/users/index.php';
        $titulo = 'Gestión de Usuarios';
        require 'app/views/users/layout.php';
    }

    public function gestionarEstilistas()
    {
        $this->verificarRolAdmin();

        $estilistas = $this->usuario->listarEstilistas();
        $vista = 'app/views/users/gestionar_estilistas.php';
        $titulo = 'Gestión de Estilistas';
        require 'app/views/users/layout.php';
    }
}
