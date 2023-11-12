<?php require_once("C:/xampp/htdocs/MiTienda/models/ProductosModel.php"); ?>
<?php require_once("C:/xampp/htdocs/MiTienda/models/CarritoModel.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/tablas.css"> <!-- Asegúrate de tener el archivo CSS/tablas.css disponible -->
    <title>Productos</title>
</head>

<body>
<section class="ver_productos">
    <?php
    $order = isset($_GET['order']) ? $_GET['order'] : 'ASC'; // Por defecto, orden ascendente
    $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'precio'; // Por defecto, ordenar por precio
    $productos = ProductosModel::ordenarProductos($sortBy, $order);
    ?>
    <form method="get">
        <input type="hidden" name="sort" value="<?php echo $sortBy; ?>">
        <input type="hidden" name="order" value="<?php echo $order === 'ASC' ? 'DESC' : 'ASC'; ?>">
        <input type="submit" value="Ordenar por Precio <?php echo $order === 'ASC' ? '↓' : '↑'; ?>">
    </form>
    <table>
        <h1>Información de productos</h1>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?php echo $producto["id"] ?></td>
                <td><?php echo $producto["nombre"] ?></td>
                <td><?php echo $producto["stock"] ?></td>
                <td><?php echo $producto["precio"] ?>€</td>
                <td><?php echo $producto["categoria"] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="idProducto" value="<?php echo $producto["id"] ?>">
                        <button type="submit" name="agregarCarrito">Agregar al Carrito</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
    if (isset($_POST['agregarCarrito'])) {
        $idProducto = $_POST["idProducto"];
        CarritoModel::agregarAlCarrito($idProducto,true);
        CarritoModel::updateStock($idProducto,false);
    }
    ?>
</section>


<section class="ver_carrito">

    <table>
        <h1>Información de productos</h1>
        <thead>
        <tr>
            <th>ID</th>
            <th>producto</th>
            <th>cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $carritos = CarritoModel::obtenerCarrito();
        foreach ($carritos as $carrito) {
            ?>
            <tr>
                <form method="post">
                        <td><?php echo $carrito["id"] ?></td>
                        <td >
                            <input type="hidden" name="idProduct" value="<?php echo $carrito["producto"] ?>">
                            <?php echo $carrito["producto"] ?></td>
                        <td><?php echo $carrito["cantidad"] ?></td>
                        <td><?php echo $carrito["precio"] ?>€</td>
                        <td>
                        <input type="hidden" name="idCarrito" value="<?php echo $carrito["id"] ?>">
                        <button type="submit" name="quitarCarrito">Quitar del Carrito</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
    if (isset($_POST['quitarCarrito'])) {
        $idCarrito = $_POST['idCarrito'];
            $idProducto = $_POST["idProduct"];
        CarritoModel::agregarAlCarrito($idProducto,false);
        CarritoModel::updateStock($idProducto,true);
    }
    ?>
</section>
<button name="Menu"><a href="Menu.php">Menu</a></button>

</body>
</html>
