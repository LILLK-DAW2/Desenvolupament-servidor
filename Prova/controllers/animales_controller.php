<?php
require_once("C:/xampp/htdocs/Prova/db/db.php");

class animales_controller{
    private $tabla;
    private $db;
    private $animales;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->animales=array();
        $this -> tabla = "animales";
    }
    public function get_animales(){
        $sql="select * from `$this->tabla`";
        try {
            $consulta=$this->db->query($sql);
            echo "se a mostrado exitosamente";

        }
        catch (mysqli_sql_exception $ex){
            echo "error mostrando los animales"."<br/>";
            echo $exç;
        }
        while($filas=$consulta->fetch_assoc()){
            $this->animales[]=$filas;
        }
        return $this->animales;
    }
   function set_animales($especie,$nombre,$fechaNacimiento,$peso){
        $id = Conectar::autonumerico($this->tabla);

           $sql="INSERT INTO `$this->tabla`(`id`, `especie`, `nombre`,`fechaNacimiento`,`peso`) 
    VALUES ('$id','$especie','$nombre','$fechaNacimiento','$peso')";
       try {
           $consulta=$this->db->query($sql);
           echo "se  a añadio exitosamente";
       }
       catch (mysqli_sql_exception $ex){
        echo "error añadiendo animal"."<br/>";
        echo $ex;
       }
   }

    function del_animales($idSolicitado){
        $sql = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";

        try{
            $consulta=$this->db->query($sql);
        }catch (mysqli_sql_exception $ex){
            echo "no se a podido borrar los el animales con id $idSolicitado"."<br/>";
            echo $ex;
        }
    }

     function upd_animales($campoACambiar,$valorACambiar,$idSolicitado)
    {
        $sql = "UPDATE `$this->tabla` SET `$campoACambiar` = '$valorACambiar' WHERE `id` = $idSolicitado";
        try{
            $consulta=$this->db->query($sql);
        }catch (mysqli_sql_exception $ex){
            echo "no se a podido editar los el animales con id $idSolicitado"."<br/>";
            echo $ex;
        }    }
}
?>
