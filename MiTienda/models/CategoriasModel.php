<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/CategoriasController.php");

class CategoriasModel
{
    public static function agregarCategoria($nombre, $descripcion)
    {
        $categorias = new CategoriasController();
        $categorias->set_categorias($nombre, $descripcion);
    }

    public static function obtenerCategorias()
    {
        $categorias = new CategoriasController();
        return $categorias->get_categorias();
    }

    public static function eliminarCategoria($idSolicitado)
    {
        $categorias = new CategoriasController();
        $categorias->del_categorias($idSolicitado);
    }

    public static function actualizarCategoria($campoACambiar, $valorACambiar, $idSolicitado)
    {
        $categorias = new CategoriasController();
        $categorias->updt_categorias($campoACambiar, $valorACambiar, $idSolicitado);
    }
}
?>
