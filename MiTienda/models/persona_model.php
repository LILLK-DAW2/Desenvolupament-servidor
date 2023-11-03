<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/users_controller.php");

class ModelPersona {
    public static function anadirPersonas($nombre, $apellido, $dni, $curso){
      $per=new users_controller();
      $per->set_users($nombre, $apellido, $dni, $curso);
    }
    Public static function mostrarPersonas(){
        $per=new users_controller();
        return $per->get_users();
        }
}




?>
