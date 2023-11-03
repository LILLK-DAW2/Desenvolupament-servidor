<?php
require_once("C:/xampp/htdocs/MiTienda/db/db.php");

class users_controller{
    private $tabla;
    private $db;
    private $users;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->users=array();
        $this -> tabla = "alumnos";
    }
    public function get_users(){
        $sql="select * from `$this->tabla`";


        try {
            $consulta=$this->db->query($sql);
            echo "se a mostrado exitosamente";
        }
        catch (mysqli_sql_exception $ex){
            echo "error mostrando los cursos"."<br/>";
            echo $exç;
        }

        while($filas=$consulta->fetch_assoc()){
            $this->users[]=$filas;
        }
        return $this->users;
    }
   function set_users($nombre, $apellido, $dni, $curso){
        $id = Conectar::autonumerico($this->tabla);

       $sql="INSERT INTO `$this->tabla`(`id`, `nombre`, `apellido`, `dni`,`curso`) 
    VALUES ('$id','$nombre','$apellido','$dni','$curso')";
       try {
           $consulta=$this->db->query($sql);
           echo "Alumno añadido existente";
       }
       catch (mysqli_sql_exception $ex){
           if (str_contains($ex, "foreign key constraint fails")){
               echo "curso no existente"."<br/>";
           }
           else{
               "error añadiendo alumos"."<br/>";
           }
           echo $ex;
       }
   }
}
?>
