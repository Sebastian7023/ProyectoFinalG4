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

    public function login($email)
    {
        // Asegurémonos que la consulta SQL es correcta
        /* $sql = "SELECT * FROM users WHERE email = :email AND userPassword = SHA2(:userPassword, 256)";
        $smt = $this->db->prepare($sql);
        $smt->execute([
            'email' => $email,
            'userPassword' => $userPassword
        ]);  */

        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $smt = $this->db->prepare($sql);
        $smt->execute(['email' => $email]); 

        $resultado = $smt->fetch(PDO::FETCH_ASSOC);

        // DEBUG: Verificar si encontramos al usuario
        error_log("Resultado del login: " . print_r($resultado, true));

        return $resultado;
    }

    public function crear($data)
    {
        $data['userPassword'] = hash('sha256', $data['userPassword']);
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

    public function obtenerUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $smt = $this->db->prepare($sql);
        $smt->execute(['email' => $email]);
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
            $data['userPassword'] = hash('sha256', $data['userPassword']);
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

    public function obtenerEstilistas()
    {
        $sql = "SELECT id, fullName FROM users WHERE rol = 'estilista' AND isActive = 1";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   

    public function listarEstilistas()
    {
        $sql = "SELECT id, userName, fullName, email, rol, specialty, isActive FROM users WHERE rol = 'Estilista'";
        $smt = $this->db->prepare($sql);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_ASSOC);
    }
}
