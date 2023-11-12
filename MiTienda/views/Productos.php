<?php require_once("C:/xampp/htdocs/MiTienda/models/ProductosModel.php"); ?>

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
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($productos as $producto) {
            ?>
            <tr>
                <td><?php echo $producto["id"] ?></td>
                <td><?php echo $producto["nombre"] ?></td>
                <td><?php echo $producto["stock"] ?></td>
                <td><?php echo $producto["precio"] ?>€</td>
                <td><?php echo $producto["categoria"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>
<br>
<section class="añadir_productos">
    <h1>Añadir productos</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Stock:</label>
        <input type="text" name="stock">
        <label>Precio:</label>
        <input type="text" name="precio">
        <label>Categoría:</label>
        <input type="text" name="categoria">
        <input type="submit" name="añadir" value="añadir">
    </form>
    <?php
    if (isset($_POST['añadir'])) {
        ProductosModel::agregarProducto($_POST["nombre"], $_POST["stock"], $_POST["precio"], $_POST["categoria"]);
        header("Refresh:2");
    }
    ?>
</section>
<br>
<section class="borrar_productos">
    <h1>Borrar productos</h1>
    <form method="post">
        <label>ID Solicitado:</label>
        <input type="text" name="idSolicitado"><br><br>
        <input type="submit" name="borrar" value="borrar">
    </form>
    <?php
    if (isset($_POST["borrar"])) {
        ProductosModel::eliminarProducto($_POST["idSolicitado"]);
        header("Refresh:2");
    }
    ?>
</section>

<section class="editar_productos">
    <h1>Editar productos</h1>
    <form method="post">
        <label>Campo a Cambiar:</label>
        <input type="text" name="campoACambiar"><br><br>
        <label>Valor a Cambiar:</label>
        <input type="text" name="valorACambiar"><br><br>
        <label>ID Solicitado:</label>
        <input type="text" name="idSolicitado"><br><br>
        <input type="submit" name="editar" value="editar">
    </form>
    <?php
    if (isset($_POST["editar"])) {
        ProductosModel::actualizarProducto($_POST['campoACambiar'], $_POST['valorACambiar'], $_POST['idSolicitado']);
        header("Refresh:2");
    }
    ?>
</section>
<button name="Menu"><a href="Menu.php">Menu</a></button>

</body>
</html>
