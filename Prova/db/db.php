<?php

require_once("C:/xampp/htdocs/Prova/db/db.php");

class Conectar
{
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "dacaho", "1234", "daw2");
        $conexion->query("SET NAMES 'utf8'");

        return $conexion;
    }

    public static function autonumerico($tabla){
        $sql="select * from `$tabla`";
        $id = 0;

        $consulta = Conectar::conexion()->query($sql);
        while ($fila = $consulta->fetch_assoc()) {
            if ($fila["id"] > $id) {
                $id = $fila["id"];
            }
        }
        $id++;
        return $id;
    }

}

?>
