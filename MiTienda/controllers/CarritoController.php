<?php
require_once("C:/xampp/htdocs/MiTienda/db/db.php");
session_start();

class CarritoController
{
    private $tabla;
    private $db;
    private $carrito;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->carrito = array();
        $this->tabla = "carrito";
    }



    public function get_carrito()
    {
        if($_SESSION["rol"]=="admin"){
            $sql = "SELECT * FROM `$this->tabla`";
        }else{
            $idUser = $_SESSION["id"];
            $sql = "SELECT * FROM `$this->tabla` WHERE `usuario` = $idUser";
        }

        try {
            $consulta = $this->db->query($sql);
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
        }

        while ($filas = $consulta->fetch_assoc()) {
            $this->carrito[] = $filas;
        }
        return $this->carrito;
    }
    function set_carrito($productoId, $cantidad, $precio)
    {
        $usuarioId = $_SESSION["id"];
        $id = Conectar::autonumerico($this->tabla);



        $sql = "INSERT INTO `$this->tabla` (`id`, `producto`, `cantidad`, `precio`, `usuario`) 
                VALUES ('$id', '$productoId', '$cantidad', '$precio', '$usuarioId')";
        try {
            $consulta = $this->db->query($sql);
            echo "Producto añadido al carrito";
        } catch (mysqli_sql_exception $ex) {
            if (str_contains($ex, 'FK_Carrito_Producto')) {
                echo "Ni existe el producto";
            }
            else if(str_contains($ex, 'FK_Carrito_User')){
                echo "No existe el usuario";
            }else{
                echo "Error al añadir producto al carrito: " . $ex;
            }

        }
    }
    function updt_carrito($campoACambiar, $valorACambiar, $idSolicitado)
    {
        if ($this->existsCarrito($idSolicitado)) {
            $sql = "UPDATE `$this->tabla` SET `$campoACambiar` = '$valorACambiar' WHERE `id` = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "carrito actualizado. ";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido editar el carrito con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "EL carrito con ID $idSolicitado no existe.";
        }
    }

    function del_carrito($idSolicitado)
    {
        if ($this->existsCarrito($idSolicitado)) {
            $sql = "DELETE FROM `$this->tabla` WHERE id = $idSolicitado";
            try {
                $consulta = $this->db->query($sql);
                echo "Carrito borrado. ";
            } catch (mysqli_sql_exception $ex) {
                echo "no se ha podido borrar el Carrito con id $idSolicitado" . "<br/>";
                echo $ex;
            }
        } else {
            echo "El Carrito con ID $idSolicitado no existe.";
        }
    }

    public function add_to_carrito($idPrdoucto, $sumar)
    {
        $ultimoCarrito = false;//si solo queda una unidad en el carrito
        $exixteCarrito = false;//si ya se encuentra en el carrito
        foreach ($this->get_carrito() as $item) {
            //si el registro coincide con el usuario y el producto
            if ($item['producto'] == $idPrdoucto && $item['usuario'] == $_SESSION["id"]) {
                $exixteCarrito = true;
                $idCarrito = $item['id'];
                if ($item['cantidad'] == 1) {
                    $ultimoCarrito = true;
                }
                if ($sumar) {
                    $cantidad = $item['cantidad']+1;
                    echo "sumado al carrito : ".$cantidad."de: ".$item['cantidad'].". ";
                } else
                    $cantidad = $item['cantidad']-1;
                    echo "restado al carrito: ".$cantidad."de: ".$item['cantidad'].". ";
                }
            }
        if ($exixteCarrito && !$sumar){
            if ($ultimoCarrito){
                $this->del_carrito($idCarrito);
            }else{
                $this->updt_carrito("cantidad", $cantidad,$idCarrito);
            }
        }else if(!$exixteCarrito && !$sumar) {
            echo "no hay carrito que borrar";

        }else if(!$exixteCarrito && $sumar) {
            $productosController = new ProductosController();
            $precio = $productosController->get_productoPrecioById($idPrdoucto);
            $this->set_carrito($idPrdoucto, 1,$precio['precio']);
        }
        else if($exixteCarrito && $sumar) {
            $this->updt_carrito("cantidad", $cantidad,$idCarrito);
        }
    }

    function existsCarrito($idSolicitado)
    {
        $sql = "SELECT * FROM `$this->tabla` WHERE id = $idSolicitado";
        $result = $this->db->query($sql);
        return $result->num_rows > 0;
    }


}

?>
