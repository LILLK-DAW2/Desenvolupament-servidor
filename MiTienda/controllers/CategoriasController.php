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
            echo "se a mostrado exitosamente";
        } catch (mysqli_sql_exception $ex) {
            echo $exç;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->categorias[] = $filas;
        }
        return $this->categorias;
    }

    function set_categorias($nombre, $apellido, $dni, $curso)
    {
        $id = Conectar::autonumerico($this->tabla);
        $sql = "INSERT INTO `$this->tabla`(`id`, `nombre`, `apellido`, `dni`,`curso`) 
        VALUES ('$id','$nombre','$apellido','$dni','$curso')";


        try {
            $consulta = $this->db->query($sql);
            echo "Alumno añadido existente";
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }
    }
}

?>
