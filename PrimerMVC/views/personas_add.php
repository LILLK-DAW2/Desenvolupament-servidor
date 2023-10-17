<!DOCTYPE html>
<html lang="es">
<body>
<?php require_once ('C:/xampp/htdocs/PrimerMVC/models/persona_model.php');?>

<form method="post">
    <label >nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label >apellido:</label>
    <input type="text" name="apellido"><br><br>
    <label >dni:</label>
    <input type="text" name="dni"><br><br>
    <label >curso:</label>
    <input type="number" name="curso"><br><br>
    <input type="submit" name="enviar" >
</form>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>

<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    ModelPersona::anadirPersonas($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['curso']);
}
?>

</body>
<head>
        <meta charset="UTF-8" />
        <title>Personas</title>

    </head>
</html>
