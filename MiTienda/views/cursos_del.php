<!DOCTYPE html>
<html lang="es">
<body>
<?php require_once ('C:/xampp/htdocs/MiTienda/models/cursos_model.php');?>
<form method="post">
    <label >idSolicitado:</label>
    <input type="text" name="idSolicitado"><br><br>
    <input type="submit" name="enviar" >
</form>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>

<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    ModelCursos::borrarCursos($_POST['idSolicitado']);
}
?>
</body>
<head>
        <meta charset="UTF-8" />
        <title>Personas</title>

    </head>
</html>
