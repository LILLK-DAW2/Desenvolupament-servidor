<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/UsersController.php");

class UsersModel
{
    public static function registrarUsuario($nick, $mail, $password, $password2)
    {
        $existemail = false;
        $users = new UsersController();
        $datos = $users->get_users();
        //comprobacion de si ya existe este usuario por mail
        foreach ($datos as $dato) {
            if ($mail == $dato["mail"]) {
                $existemail = true;
            }
        }
        //si no exsiste el usuario
        if (!$existemail) { //se encripta y se guardan los datos a la bd
            $encriptedPassword = md5($password);
            $users->set_users($nick, $mail, $encriptedPassword);
        } else {//Si existe el usario
            echo "Ya existe este usuario con este correo";
            exit;
        }
    }
    public static function logearUsuario($mail, $password)
    {
        //comprobacion de si ya existe este usuario por mail
        $users = new UsersController();
        $existeMail = false;
        $existePassword = false;
        $datos = $users->get_users();
        foreach ($datos as $dato) {
            if ($mail == $dato["mail"]) {
                $existeMail = true;
                //si existe el usuario y su contraseña es correcta
                if ($dato["password"] == md5($password)) {
                    $existePassword = true;
                    $idUsuarioTmp = $dato["id"];
                }
            }
        }
        if ($existeMail && $existePassword) {//si exsiste el usuario
            self::setSession($idUsuarioTmp);
            header("Location: Menu.php");

        } else if (!$existeMail || !$existePassword) {//Si no existe el usario o la contraseña
            if (!$existeMail) {//si no encuentra el mail
                echo "no existe el mail";
            } else if (!$existePassword) {
                echo "contraseña equivocada";
            }
        }
    }
    public static function setSession($id)
    {
        //establecer la session con los datos del usuario
        session_start();
        $users = new UsersController();
        $datos = $users->get_users();
        foreach ($datos as $dato) {
            if ($id == $dato["id"]) {
                $_SESSION["id"] = $dato["id"];
                $_SESSION["nick"] = $dato["nick"];
                $_SESSION["password"] = $dato["password"];
                $_SESSION["mail"] = $dato["mail"];
                $_SESSION["rol"] = $dato["rol"];
            }
        }
    }
    public static function getUsers(){
        $users = new UsersController();
        return $users->get_users();
    }

    Public static function delUsers($idSolicitado){
        $users=new UsersController();
        $users->del_users($idSolicitado);
    }

    Public static function updtUsers($campoACambiar,$valorACambiar,$idSolicitado){
        $users=new UsersController();
        $users->updt_users($campoACambiar,$valorACambiar,$idSolicitado);
    }
    Public static function editUsers($valorACambiar1,$valorACambiar2,$idSolicitado){

        $users=new UsersController();
        $users->updt_users("mail",$valorACambiar1,$idSolicitado);
        $users->updt_users("password",md5($valorACambiar2),$idSolicitado);

    }


}




?>
