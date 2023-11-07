<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/productos_controller.php");
class ModelCursos {
    public static function anadirCursos($nombre, $ano){
        $curs=new productos_controller();
        $curs ->set_productos($nombre, $ano);
    }
    Public static function mostrarCursos(){
        $curs=new productos_controller();
        return $curs->get_productos();
    }
    Public static function borrarCursos($idSolicitado){
        $curs=new productos_controller();
        $curs->del_cursos($idSolicitado);
        $_SERVER["rol"]=ad;

    }
}
?>
