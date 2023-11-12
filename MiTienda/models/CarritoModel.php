<?php
require_once("C:/xampp/htdocs/MiTienda/controllers/CarritoController.php");

class CarritoModel
{

    public static function agregarAlCarrito($idProducto,$sumar)
    {
        $carritoController = new CarritoController();
        $carritoController->add_to_carrito($idProducto,$sumar);
    }

    public static function obtenerCarrito()
    {
        $carritoController = new CarritoController();
        return $carritoController->get_carrito();
    }

    public static function updateStock($idProducto, $sumar)
    {
        $productosController = new ProductosController();
        $producto = $productosController->get_productoById($idProducto);

        if ($producto && $producto['stock'] > 0) {
            if($sumar){
                $nuevoStock =$producto['stock']+ 1;
                echo "sumado al stock: ".$nuevoStock."de: ".$producto['stock'].". " ;
            }else{
                $nuevoStock =$producto['stock']- 1;
                echo "restado al stock: ".$nuevoStock."de: ".$producto['stock'].". ";
            }
            $productosController->updt_productos('stock', $nuevoStock, $idProducto);
        } else {
            echo "No se pudo restar el stock. Producto no encontrado o sin stock disponible.";
        }
    }
}
?>