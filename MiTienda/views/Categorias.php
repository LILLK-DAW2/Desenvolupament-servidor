<?php require_once("C:/xampp/htdocs/MiTienda/models/CategoriasModel.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/tablas.css"> <!-- Asegúrate de tener el archivo CSS/tablas.css disponible -->
    <title>Categorías</title>
</head>

<body>
<section class="ver_categorias">
    <table>
        <h1>Información de categorías</h1>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (CategoriasModel::obtenerCategorias() as $categoria) {
            ?>
            <tr>
                <td><?php echo $categoria["id"] ?></td>
                <td><?php echo $categoria["nombre"] ?></td>
                <td><?php echo $categoria["descripcion"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>
<br>
<section class="añadir_categorias">
    <h1>Añadir categorías</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Descripción:</label>
        <input type="text" name="descripcion">
        <input type="submit" name="añadir" value="añadir">
    </form>
    <?php
    if (isset($_POST['añadir'])) {
        CategoriasModel::agregarCategoria($_POST["nombre"], $_POST["descripcion"]);
        header("Refresh:2");
    }
    ?>
</section>
<br>
<section class="borrar_categorias">
    <h1>Borrar categorías</h1>
    <form method="post">
        <label>ID Solicitado:</label>
        <input type="text" name="idSolicitado"><br><br>
        <input type="submit" name="borrar" value="borrar">
    </form>
    <?php
    if (isset($_POST["borrar"])) {
        CategoriasModel::eliminarCategoria($_POST["idSolicitado"]);
        header("Refresh:2");
    }
    ?>
</section>

<section class="editar_categorias">
    <h1>Editar categorías</h1>
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
        CategoriasModel::actualizarCategoria($_POST['campoACambiar'], $_POST['valorACambiar'], $_POST['idSolicitado']);
        header("Refresh:2");
    }
    ?>
</section>
<button name="Menu"><a href="Menu.php">Menu</a></button>
</body>
</html>
