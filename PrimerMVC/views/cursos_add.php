<!DOCTYPE html>
<html lang="es">
<body>
<?php require_once ('C:/xampp/htdocs/PrimerMVC/models/cursos_model.php');?>
<form method="post">
    <label >nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label >ano:</label>
    <input type="number" name="ano"><br><br>
    <input type="submit" name="enviar" >
</form>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>


<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    ModelCursos::anadirCursos($_POST['nombre'],$_POST['ano']);
}
?>

</body>
<head>
        <meta charset="UTF-8" />
        <title>Personas</title>

    </head>
</html>
