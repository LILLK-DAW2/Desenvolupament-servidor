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
        $sql = "select * from `$this->tabla`";
        try {
            $consulta = $this->db->query($sql);
            //echo "se a mostrado exitosamente";
        } catch (mysqli_sql_exception $ex) {
            echo $exç;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->users[] = $filas;
        }
        return $this->users;
    }

    function set_users($nick, $mail,$password)
    {
        $id = Conectar::autonumerico($this->tabla);
        $sql = "INSERT INTO `$this->tabla`(`id`, `nick`, `mail`, `password`) 
        VALUES ('$id','$nick','$mail','$password')";
        try {
            $consulta = $this->db->query($sql);
            echo "usuario añadido existente";
        } catch (mysqli_sql_exception $ex) {
            echo "UsersController set_users catch ".$ex;
        }
    }
}

?>
