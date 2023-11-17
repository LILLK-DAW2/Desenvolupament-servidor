<?php
require_once("C:/xampp/htdocs/MiTienda/db/db.php");

class ProductosController
{
    private $tabla;
    private $db;
    private $productos;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->productos = array();
        $this->tabla = "productos";
    }

    public function get_productos()
    {
        $sql = "select * from `$this->tabla`";
        try {
            $consulta = $this->db->query($sql);
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->productos[] = $filas;
        }
        return $this->productos;
    }

    function set_productos($nombre, $stock, $precio, $categoria)
{
    $id = Conectar::autonumerico($this->tabla);
    $sql = "INSERT INTO `$this->tabla`(`id`, `nombre`, `stock`, `precio`, `categoria`) 
                VALUES ('$id','$nombre','$stock','$precio','$categoria')";
    try {
        $consulta = $this->db->query($sql);
        echo "producto añadido";
    } catch (mysqli_sql_exception $ex) {
        if (str_contains($ex, 'FK_Producto_Categoria')) {
            echo "no existe la categoria insertada";
        }else{
            echo "ProductosController set_productos catch " . $ex;
        }
    }

}

    function updt_productos($campoACambiar, $valorACambiar, $idSolicitado)
    {
        if ($this->existsProducto($idSolicitado)) {
            $sql = "UPDATE `$this->tabla` SET `$campoACambiar` = '$valorACambiar' WHERE `id` = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "producto actualizado";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido editar el producto con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "El producto con ID $idSolicitado no existe.";
        }
    }

    function del_productos($idSolicitado)
    {
        if ($this->existsProducto($idSolicitado)) {
            $sql = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "producto borrado";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido borrar el producto con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "El producto con ID $idSolicitado no existe.";
        }
    }

    function existsProducto($idSolicitado)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idSolicitado";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }

    public function get_productosOrdenados($sortBy, $order)
    {
        $sql = "SELECT * FROM `productos` ORDER BY $sortBy $order";
        $productos = array();

        try {
            $consulta = $this->db->query($sql);
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $productos[] = $filas;
        }

        return $productos;
    }

    public function get_productoById($idProducto)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idProducto";
        try {
            $consulta = $this->db->query($sql);
            return  $consulta->fetch_assoc();
        } catch (mysqli_sql_exception $ex) {
            echo "Error al obtener el producto con ID $idProducto: " . $ex;
            return null;
        }
    }
    public function get_productoPrecioById($idProducto)
    {
        $sql = "SELECT `precio` FROM `$this->tabla` WHERE id = $idProducto";
        try {
            $consulta = $this->db->query($sql);
            return  $consulta->fetch_assoc();
        } catch (mysqli_sql_exception $ex) {
            echo "Error al obtener el producto con ID $idProducto: " . $ex;
            return null;
        }
    }

}
?>
