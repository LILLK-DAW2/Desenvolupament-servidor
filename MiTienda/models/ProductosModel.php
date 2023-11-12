<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/ProductosController.php");

class ProductosModel
{
    public static function agregarProducto($nombre, $stock, $precio, $categoria)
    {
        $productos = new ProductosController();
        $productos->set_productos($nombre, $stock, $precio, $categoria);
    }
    public static function eliminarProducto($idSolicitado)
    {
        $productos = new ProductosController();
        $productos->del_productos($idSolicitado);
    }

    public static function actualizarProducto($campoACambiar, $valorACambiar, $idSolicitado)
    {
        $productos = new ProductosController();
        $productos->updt_productos($campoACambiar, $valorACambiar, $idSolicitado);
    }
    public static function ordenarProductos($sortBy, $order)
    {
        $productosController = new ProductosController();
        return $productosController->get_productosOrdenados($sortBy, $order);
    }

}
?>
