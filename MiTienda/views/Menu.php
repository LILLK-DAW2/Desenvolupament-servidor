<?php session_start();
?>

<?php if ($_SESSION["rol"] == "admin") { ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Personas</title>
    </head>
    <body>
    <h1><?php echo "HOLA ". strtoupper($_SESSION["nick"]) ; ?> </h1>
    <button name="Users"><a href="Users.php">Users</a></button>
    <button name="Productos"><a href="Productos.php">Productos</a></button>
    <button name="Categorias"><a href="Categorias.php">Categorias</a></button>
    <button name="Tienda"><a href="Tienda.php">Tienda</a></button>
    <button name="Perfil"><a href="perfil.php">Perfil</a></button>
    <button name="Log out"><a href="LogOut.php"> Log out </a></button>
    </body>
    </html>
<?php }else{?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Personas</title>
    </head>
    <body>
    <h1><?php echo "HOLA ". strtoupper($_SESSION["nick"]) ; ?> </h1>
    <button name="Tienda"><a href="Tienda.php">Tienda</a></button>
    <button name="Perfil"><a href="perfil.php">Perfil</a></button>

    <button name="Log out"><a href="LogOut.php"> Log out </a></button>
    </body>
    </html>
<?php }?>

