<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/UsersController.php");

class UsersModel {

    Public static function registrarUsuario($nick, $mail,$password,$password2){
        //comprobacion de si ya existe este usuario por mail
        $users=new UsersController();
        $existemail = false;
        $datos= $users->get_users();
        foreach ($datos as $dato) {
           if($mail == $dato["mail"]){
                $existemail = true;
           }
        }
        //si no exsiste el usuario
        if (!$existemail){ //se encripta y se guardan los datos a la bd
                $encriptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $users->set_users($nick,$mail,$encriptedPassword);
        }else{//Si existe el usario
            require_once("C:/xampp/htdocs/MiTienda/views/Reg.php");
            echo "Ya existe este usuario ";
        }
    }
    Public static function logearUsuario( $mail,$password){
        $encriptedPassword = password_hash($password, PASSWORD_DEFAULT);
        //comprobacion de si ya existe este usuario por mail
        $users=new UsersController();
        $existemail = false;
        $existePassword = false;
        $datos= $users->get_users();
        foreach ($datos as $dato) {
            if($mail == $dato["mail"]){
                $existemail = true;
                echo  $dato["mail"];
            }
            if(password_verify($password, $dato["password"])){
                $existePassword=true;
            }
        }
        //si exsiste el usuario
        if ($existemail&&$existePassword){
            require_once("C:/xampp/htdocs/MiTienda/views/menu.html");
        }else if(!$existemail || !$existePassword){//Si no existe el usario
            require_once("C:/xampp/htdocs/MiTienda/views/log.php");
            echo "No existe el usuario o la constraseña esta mal";
        }
    }
}




?>
