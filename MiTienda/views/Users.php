<?php require_once("C:/xampp/htdocs/MiTienda/models/UsersModel.php"); ?>
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
<section class="ver_users">
    <table>
        <h1>Informacion de usuarios</h1>
        <thead>
        <tr>
            <th>ID</th>
            <th>nick</th>
            <th>mail</th>
            <th>password</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (UsersModel::getUsers() as $dato) {
            ?>
            <tr>
                <td><?php echo $dato["id"] ?></td>
                <td><?php echo $dato["nick"] ?></td>
                <td><?php echo $dato["mail"] ?></td>
                <td><?php echo $dato["password"] ?></td>
                <td><?php echo $dato["rol"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>
<br>
<section class="añadir_users">
    <h1>Añadir usuarios</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Correo Electrónico:</label>
        <input type="text" name="email">
        <label>Contraseña:</label>
        <input type="password" name="password">
        <label>Repetir Contraseña:</label>
        <input type="password" name="password2">
        <input type="submit" name="añadir" value="añadir">
    </form>
    <?php
    if (isset($_POST['añadir'])) {
        if ($_POST["password"] ==  $_POST["password2"]) {//si las contraseñas conciden
            UsersModel::registrarUsuario($_POST["nombre"], $_POST["email"], $_POST["password"], $_POST["password2"]);
            header("Refresh:2");
        }else{
            echo "las contraseñas no coinciden";
        }
    }
    ?>
</section>
<br>
<section class="borrar_users">
    <h1>borrar usuarios</h1>
    <form method="post">
        <label >idSolicitado:</label>
        <input type="text" name="idSolicitado"><br><br>
        <input type="submit" name="borrar" value="borrar" >
    </form>
    <?php
    if(isset($_POST["borrar"])) {
        UsersModel::delUsers($_POST["idSolicitado"]);
        header("Refresh:2");
    }
    ?>
</section>

<section class="editar_users">
    <h1>editar usuarios</h1>
    <body>
    <form method="post">
        <label >campoACambiar:</label>
        <input type="text" name="campoACambiar"><br><br>
        <label >valorACambiar:</label>
        <input type="text" name="valorACambiar"><br><br>
        <label >idSolicitado:</label>
        <input type="text" name="idSolicitado"><br><br>
        <input type="submit" name="editar" value="editar">
    </form>
    <?php
    if(isset($_POST["editar"])) {
        UsersModel::updtUsers($_POST['campoACambiar'],$_POST['valorACambiar'],$_POST['idSolicitado']);
        header("Refresh:2");
    }
    ?>
</section>
<button name="Menu"><a href="Menu.php">Menu</a></button>
</body>
</html>