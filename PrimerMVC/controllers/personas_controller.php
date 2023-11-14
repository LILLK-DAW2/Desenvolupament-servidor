<?php
require_once("C:/xampp/htdocs/PrimerMVC/db/db.php");
require_once("C:/xampp/htdocs/PrimerMVC/controllers/cursos_controller.php");

class personas_controller
{
    private $tabla;
    private $db;
    private $personas;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->personas = array();
        $this->tabla = "alumnos";
    }

    public function get_personas()
    {
        $sql = "select * from `$this->tabla`";


        try {
            $consulta = $this->db->query($sql);
            echo "se a mostrado exitosamente";
        } catch (mysqli_sql_exception $ex) {
            echo "error mostrando los cursos" . "<br/>";
            echo $exç;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->personas[] = $filas;
        }
        return $this->personas;
    }

    function set_personas($nombre, $apellido, $dni, $curso)
    {
        $id = Conectar::autonumerico($this->tabla);
        $curs = new cursos_controller();
        if ($curs->existsCurso($curso)) {
            $sql = "INSERT INTO `$this->tabla`(`id`, `nombre`, `apellido`, `dni`,`curso`) 
    VALUES ('$id','$nombre','$apellido','$dni','$curso')";
            try {
                $consulta = $this->db->query($sql);
                echo "Alumno añadido existente";
            } catch (mysqli_sql_exception $ex) {
                if (str_contains($ex, "foreign key constraint fails")) {
                    echo "curso no existente" . "<br/>";
                } else {
                    "error añadiendo alumos" . "<br/>";
                }
                echo $ex;
            }

        } else {
            echo "no existe el curso";
        }
    }
}

?>
