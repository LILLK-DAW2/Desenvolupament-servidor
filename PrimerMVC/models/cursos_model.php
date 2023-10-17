<?php
require_once("C:/xampp/htdocs/PrimerMVC/controllers/cursos_controller.php");
class ModelCursos {
    public static function anadirCursos($nombre, $ano){
        $curs=new cursos_controller();
        $curs ->set_cursos($nombre, $ano);
    }
    Public static function mostrarCursos(){
        $curs=new cursos_controller();
        return $curs->get_cursos();
    }
    Public static function borrarCursos($idSolicitado){
        $curs=new cursos_controller();
        $curs->del_cursos($idSolicitado);
    }
}
?>
