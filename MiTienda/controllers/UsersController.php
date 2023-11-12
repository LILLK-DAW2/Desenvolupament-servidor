<?php
require_once("C:/xampp/htdocs/MiTienda/db/db.php");

class UsersController
{
    private $tabla;
    private $db;
    private $users;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->users = array();
        $this->tabla = "usuario";
    }

    public function get_users()
    {
        $sql = "SELECT * FROM `$this->tabla`";
        try {
            $consulta = $this->db->query($sql);
            // echo "Se ha mostrado exitosamente";
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->users[] = $filas;
        }

        return $this->users;
    }

    function set_users($nick, $mail, $password)
    {
        $id = Conectar::autonumerico($this->tabla);
        $sql = "INSERT INTO `$this->tabla` (`id`, `nick`, `mail`, `password`) VALUES ('$id', '$nick', '$mail', '$password')";
        try {
            $consulta = $this->db->query($sql);
            echo "Usuario añadido";
        } catch (mysqli_sql_exception $ex) {
            echo "UsersController set_users catch " . $ex;
        }
    }

    function updt_users($campoACambiar, $valorACambiar, $idSolicitado)
    {
        if ($this->existsUser($idSolicitado)) {
            $sql = "UPDATE `$this->tabla` SET `$campoACambiar` = '$valorACambiar' WHERE `id` = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "Usuario actualizado";
            } catch (mysqli_sql_exception $ex) {
                echo "No se ha podido editar el usuario con ID $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "El usuario con ID $idSolicitado no existe.";
        }
    }

    function del_users($idSolicitado)
    {
        if ($this->existsUser($idSolicitado)) {
            $sql = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "Usuario borrado";
            } catch (mysqli_sql_exception $ex) {
                echo "No se ha podido borrar el usuario con ID $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "El usuario con ID $idSolicitado no existe.";
        }
    }

    function existsUser($idSolicitado)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idSolicitado";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }
}
?>
