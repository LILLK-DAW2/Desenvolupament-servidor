<?php
require_once("C:/xampp/htdocs/PrimerMVC/controllers/personas_controller.php");

class ModelPersona {
    public static function anadirPersonas($nombre, $apellido, $dni, $curso){
      $per=new personas_controller();

      $per->set_personas($nombre, $apellido, $dni, $curso);
    }
    Public static function mostrarPersonas(){
        $per=new personas_controller();
        return $per->get_personas();
        }
}




?>
