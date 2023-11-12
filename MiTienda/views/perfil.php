<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/tablas.css">
    <title>Document</title>
</head>
<body>
<section id="Perfil">
    <h2>Perfil</h2>

    <form method="post">
        <label>Correo Electrónico:</label>
        <input type="text" name="email">
        <label>Contraseña:</label>
        <input type="password" name="password">
        <button type="submit" name="Editar" value="Editar">Editar</button>
    </form>
</section>
<?php
require_once("C:/xampp/htdocs/MiTienda/models/UsersModel.php");
session_start();
if (isset($_POST['Editar'])) {
    UsersModel::editUsers($_POST["email"],$_POST["password"],$_SESSION["id"]);

}
?>

<table>
    <h1>Información del perfil</h1>
    <thead>
    <tr>
        <th>mail</th>
        <th>nick</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once("C:/xampp/htdocs/MiTienda/controllers/UsersController.php");
    $users = new UsersController();
    $datos = $users->get_users();
    foreach ($datos as $dato) {
        if ($dato["id"]==$_SESSION["id"]){
        ?>
        <tr>
            <td><?php echo $dato["mail"] ?></td>
            <td><?php echo $dato["nick"] ?></td>
        </tr>
    <?php } } ?>
    </tbody>
</table>
<button name="Menu"><a href="Menu.php">Menu</a></button>

</body>
</html>