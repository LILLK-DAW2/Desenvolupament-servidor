<?php
require_once("C:/xampp/htdocs/MiTienda/db/db.php");

class CategoriasController
{
    private $tabla;
    private $db;
    private $categorias;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->categorias = array();
        $this->tabla = "categorias";
    }

    public function get_categorias()
    {
        $sql = "select * from `$this->tabla`";
        try {
            $consulta = $this->db->query($sql);
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->categorias[] = $filas;
        }
        return $this->categorias;
    }

    function set_categorias($nombre, $descripcion)
    {
        $id = Conectar::autonumerico($this->tabla);
        $sql = "INSERT INTO `$this->tabla`(`id`, `nombre`, `descripcion`) 
                VALUES ('$id','$nombre','$descripcion')";
        try {
            $consulta = $this->db->query($sql);
            echo "categoría añadida";
        } catch (mysqli_sql_exception $ex) {
            echo "CategoriasController set_categorias catch " . $ex;
        }
    }

    function updt_categorias($campoACambiar, $valorACambiar, $idSolicitado)
    {
        if ($this->existsCategoria($idSolicitado)) {
            $sql = "UPDATE `$this->tabla` SET `$campoACambiar` = '$valorACambiar' WHERE `id` = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "categoría actualizada";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido editar la categoría con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "La categoría con ID $idSolicitado no existe.";
        }
    }

    function del_categorias($idSolicitado)
    {
        if ($this->existsCategoria($idSolicitado)) {
            $sql = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "categoría borrada";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido borrar la categoría con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "La categoría con ID $idSolicitado no existe.";
        }
    }

    function existsCategoria($idSolicitado)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idSolicitado";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }
}
?>
