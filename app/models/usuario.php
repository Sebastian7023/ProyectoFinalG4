<!--app/models/usuario.php-->
<?php
require_once 'app/config/database.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function login($userName, $userPassword)
    {
        // Asegurémonos que la consulta SQL es correcta
        $sql = "SELECT * FROM users WHERE userName = :userName AND userPassword = SHA2(:userPassword, 256)";
        $smt = $this->db->prepare($sql);
        $smt->execute([
            'userName' => $userName,
            'userPassword' => $userPassword
        ]);

        $resultado = $smt->fetch(PDO::FETCH_ASSOC);

        // DEBUG: Verificar si encontramos al usuario
        error_log("Resultado del login: " . print_r($resultado, true));

        return $resultado;
    }

    public function crear($data)
    {
        $sql = "INSERT INTO users (userName, userPassword, fullName, email, rol, specialty, isActive) 
            VALUES (:userName, :userPassword, :fullName, :email, :rol, :specialty, :isActive)";

        $smt = $this->db->prepare($sql);

        return $smt->execute([
            'userName' => $data['userName'],
            'userPassword' => $data['userPassword'],
            'fullName' => $data['fullName'],
            'email' => $data['email'],
            'rol' => $data['rol'],
            'specialty' => $data['specialty'],
            'isActive' => $data['isActive']
        ]);
    }

    public function obtenerUser($userName)
    {
        $sql = "SELECT * FROM users WHERE userName = :userName";
        $smt = $this->db->prepare($sql);
        $smt->execute(['userName' => $userName]);
        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $smt = $this->db->prepare($sql);
        $smt->execute(['id' => $id]);
        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM users ORDER BY fullName DESC";
        $smt = $this->db->prepare($sql);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($data)
    {        
        $sql = "UPDATE users SET 
                fullName = :fullName, 
                userName = :userName, 
                rol = :rol, 
                specialty = :specialty, 
                email = :email,
                isActive = :isActive";

        // Si se proporciona una nueva contraseña, agrégala a la consulta y hashea
        if (isset($data['userPassword']) && !empty($data['userPassword'])) {
            $sql .= ", userPassword = :userPassword";
            $data['userPassword'] = password_hash($data['userPassword'], PASSWORD_DEFAULT);
        } else {
            // Elimina la clave del array para que no cause un error en el execute()
            unset($data['userPassword']);
        }

        // Usa el ID en la cláusula WHERE para una actualización segura
        $sql .= " WHERE id = :id";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log("Error al actualizar el usuario: " . $e->getMessage());
            return false;
        }
    }

    public function buscarPorUserName($userName)
    {
        $sql = "SELECT id, userName FROM users WHERE userName = :userName";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['userName' => $userName]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $smt = $this->db->prepare($sql);
        return $smt->execute(['id' => $id]);
    }

    public function actualizarEstado($id, $isActive)
    {
        $sql = "UPDATE users SET isActive = :isActive WHERE id = :id";
        $smt = $this->db->prepare($sql);
        return $smt->execute([
            'isActive' => $isActive,
            'id' => $id
        ]);
    }
}
