<?php
require_once("C:/xampp/htdocs/PrimerMVC/db/db.php");

class cursos_controller{
    private $tabla;
    private $db;
    private $cursos;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->cursos=array();
        $this -> tabla = "cursos";
    }
    public function get_cursos(){
        $sql="select * from `$this->tabla`";
        try {
            $consulta=$this->db->query($sql);
            echo "se a mostrado exitosamente";

        }
        catch (mysqli_sql_exception $ex){
            echo "error mostrando los alumnos"."<br/>";
            echo $exç;
        }
        while($filas=$consulta->fetch_assoc()){
            $this->cursos[]=$filas;
        }
        return $this->cursos;
    }
   function set_cursos($nombre, $ano){
        $id = Conectar::autonumerico($this->tabla);

       $sql="INSERT INTO `$this->tabla`(`id`, `nombre`, `ano`) 
    VALUES ('$id','$nombre','$ano')";
       try {
           $consulta=$this->db->query($sql);
           echo "se  a añadio exitosamente";
       }
       catch (mysqli_sql_exception $ex){
        echo "error añadiendo curso"."<br/>";
        echo $ex;
       }
   }

    function del_cursos($idSolicitado){
        $sql = "DELETE FROM `alumnos` WHERE curso = $idSolicitado";
        $sql2 = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";

        try{
            $consulta=$this->db->query($sql);
            $consulta=$this->db->query($sql2);
        }catch (mysqli_sql_exception $ex){
            echo "no se a podido borrar los el curso con id $idSolicitado"."<br/>";
            echo $ex;
        }
    }

    function existsCurso($idSolicitado)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idSolicitado";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }
}
?>
