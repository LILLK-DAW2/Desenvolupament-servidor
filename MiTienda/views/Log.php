<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log </title>
</head>
<body>
<section id="Log in">
    <h2>Logearse</h2>
    <form method="post">
        <label>Correo Electrónico:</label>
        <input type="text" name="email">
        <label>Contraseña:</label>
        <input type="password" name="password">
        <button type="submit" name="log" value="log">log in</button>
    </form>
</section>
<?php
require_once("C:/xampp/htdocs/MiTienda/models/UsersModel.php");
if (isset($_POST['log'])) {
        UsersModel::logearUsuario($_POST["email"], $_POST["password"]);
}
?>
<button name="Registrarse"><a href="Reg.php"> Registrarse </a></button>
</body>
</html>
