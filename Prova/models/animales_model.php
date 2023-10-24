<?php
require_once("C:/xampp/htdocs/Prova/controllers/animales_controller.php");
class ModelAnimales {
    public static function anadirAnimales($especie,$nombre,$fechaNacimiento,$peso){
        $animal=new animales_controller();
        $animal ->set_animales($especie,$nombre,$fechaNacimiento,$peso);

    }
    Public static function mostrarAnimales(){
        $animal=new animales_controller();
        return $animal->get_animales();
    }
    Public static function borrarAnimales($idSolicitado){
        $animal=new animales_controller();
        $animal->del_animales($idSolicitado);
    }
    Public static function actulizarAnimales($campoACambiar,$valorACambiar,$idSolicitado){
        $animal=new animales_controller();
        $animal->upd_animales($campoACambiar,$valorACambiar,$idSolicitado);
    }
}
?>
