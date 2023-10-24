<!DOCTYPE html>
<html lang="es">
<body>
<?php require_once('C:/xampp/htdocs/Prova/models/animales_model.php');?>
<form method="post">
    <label >especie:</label>
    <input type="text" name="especie"><br><br>
    <label >nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label >fechaNacimiento:</label>
    <input type="text" name="fechaNacimiento"><br><br>
    <label >peso:</label>
    <input type="text    " name="peso"><br><br>
    <input type="submit" name="enviar" >
</form>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>


<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    ModelAnimales::anadirAnimales($_POST['especie'],$_POST['nombre'],$_POST['fechaNacimiento'],$_POST['peso']);
}
?>

</body>
<head>
        <meta charset="UTF-8" />
        <title>Personas</title>

    </head>
</html>
