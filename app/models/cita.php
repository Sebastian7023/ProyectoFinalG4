<?php
require_once 'app/config/database.php';

class Cita
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    // Admin: todas las citas
    public function obtenerTodasLasCitas()
    {
        $sql = "SELECT a.id, a.appointmentDateTime, a.appointmentStatus, a.notes,
                       c.fullName AS cliente,
                       s.serviceName AS servicio,
                       u.fullName AS estilista
                FROM appointment a
                JOIN client c ON a.clientId = c.id
                JOIN serviceRequest s ON a.serviceId = s.id
                JOIN users u ON a.userId = u.id";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Estilista: solo sus citas
    public function obtenerCitasPorUsuario($userId)
    {
        $sql = "SELECT a.id, a.appointmentDateTime, a.appointmentStatus, a.notes,
                       c.fullName AS cliente,
                       s.serviceName AS servicio,
                       u.fullName AS estilista
                FROM appointment a
                JOIN client c ON a.clientId = c.id
                JOIN serviceRequest s ON a.serviceId = s.id
                JOIN users u ON a.userId = u.id
                WHERE a.userId = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cliente: solo sus citas
    public function obtenerCitasPorCliente($clientId)
    {
        $sql = "SELECT a.id, a.appointmentDateTime, a.appointmentStatus, a.notes,
                       s.serviceName AS servicio,
                       u.fullName AS estilista
                FROM appointment a
                JOIN serviceRequest s ON a.serviceId = s.id
                JOIN users u ON a.userId = u.id
                WHERE a.clientId = :clientId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':clientId' => $clientId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($data)
    {
        try {
            $sql = "INSERT INTO appointment(clientId, serviceId, userId, appointmentDateTime, appointmentStatus, notes) 
                    VALUES(:clientId, :serviceId, :userId, :appointmentDateTime, :appointmentStatus, :notes)";
            $stmt = $this->db->prepare($sql);
            
            if ($stmt->execute($data)) {
                return true;
            } else {
                error_log("Error al guardar cita: " . implode(", ", $stmt->errorInfo()));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Excepción al guardar cita: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerId($id)
    {
        $stmt = $this->db->prepare("
            SELECT 
                a.id,
                a.clientId,
                cli.fullName AS cliente,
                a.serviceId,
                s.serviceName AS servicio,
                a.userId,
                u.fullName AS estilista,
                a.appointmentDateTime,
                a.notes,
                a.appointmentStatus
            FROM appointment a
            INNER JOIN client cli ON a.clientId = cli.id
            INNER JOIN serviceRequest s ON a.serviceId = s.id
            INNER JOIN users u ON a.userId = u.id
            WHERE a.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function actualizar($data, $rol)
    {
        $campos = [];
        $params = [':id' => $data['id']];

        if ($rol === 'Administrador') {
            // Admin cambia todo
            $campos[] = "serviceId = :serviceId";
            $params[':serviceId'] = $data['serviceId'];

            $campos[] = "userId = :userId";
            $params[':userId'] = $data['userId'];

            $campos[] = "appointmentDateTime = :appointmentDateTime";
            $params[':appointmentDateTime'] = $data['appointmentDateTime'];

            $campos[] = "notes = :notes";
            $params[':notes'] = $data['notes'];

            $campos[] = "appointmentStatus = :appointmentStatus";
            $params[':appointmentStatus'] = $data['appointmentStatus'];
        } elseif ($rol === 'Estilista') {
            // Estilista cambia servicio, fecha, hora, notas y estado
            $campos[] = "serviceId = :serviceId";
            $params[':serviceId'] = $data['serviceId'];

            $campos[] = "appointmentDateTime = :appointmentDateTime";
            $params[':appointmentDateTime'] = $data['appointmentDateTime'];

            $campos[] = "notes = :notes";
            $params[':notes'] = $data['notes'];

            $campos[] = "appointmentStatus = :appointmentStatus";
            $params[':appointmentStatus'] = $data['appointmentStatus'];
        } else {
            // Cliente solo cambia notas
            $campos[] = "notes = :notes";
            $params[':notes'] = $data['notes'];
        }

        $sql = "UPDATE appointment SET " . implode(", ", $campos) . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($params);
    }

    public function editar()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=Cita&action=index");
            exit;
        }

        $id = $_GET['id'];
        $citaModel = new Cita();
        $cita = $citaModel->obtenerId($id);

        // Si no hay cita, regreso
        if (!$cita) {
            header("Location: index.php?controller=Cita&action=index");
            exit;
        }

        // Control de roles
        $rol = $_SESSION['usuario']['rol'];

        // Cliente: solo puede ver/editar sus propias citas
        if ($rol === 'cliente' && $cita['clientId'] != $_SESSION['usuario']['id']) {
            header("Location: index.php?controller=Cita&action=index");
            exit;
        }

        // Estilista: solo puede editar sus citas
        if ($rol === 'Estilista' && $cita['userId'] != $_SESSION['usuario']['id']) {
            header("Location: index.php?controller=Cita&action=index");
            exit;
        }

        // Servicios (solo si es admin o estilista)
        $servicios = [];
        if ($rol !== 'cliente') {
            $stmt = $citaModel->db->query("SELECT id, serviceName FROM serviceRequest WHERE isAvailable = 1");
            $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Estilistas (solo admin puede reasignar)
        $usuarios = [];
        if ($rol === 'Administrador') {
            $stmt = $citaModel->db->prepare("SELECT id, fullName FROM users WHERE rol = 'estilista' AND isActive = 1");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $vista = 'app/views/citas/editarCitas.php';
        $titulo = 'Editar Cita';
        require 'app/views/layout.php';
    }


    public function eliminar($id)
    {
        $sql = "UPDATE appointment 
                   SET appointmentStatus = 'cancelled' 
                 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
