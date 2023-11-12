<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log </title>
</head>
<body>
<section id="register">
    <h2>Registrarse</h2>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Correo Electrónico:</label>
        <input type="text" name="email">
        <label>Contraseña:</label>
        <input type="password" name="password">
        <label>Repetir Contraseña:</label>
        <input type="password" name="password2">
        <button type="submit" name="registrase" value="registrase">Registrarse</button>
    </form>
</section>
<button name="Log in"><a href="Log.php"> Log in </a></button>
<?php
require_once("C:/xampp/htdocs/MiTienda/models/UsersModel.php");
if (isset($_POST['registrase'])) {
    if ($_POST["password"] ==  $_POST["password2"]) {//si las contraseñas conciden
        UsersModel::registrarUsuario($_POST["nombre"], $_POST["email"], $_POST["password"], $_POST["password2"]);
    }else{
        echo "las contraseñas no coinciden";
    }
}
?>
</body>
</html>
