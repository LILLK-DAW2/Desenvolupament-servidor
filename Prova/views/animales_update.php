<?php require_once('C:/xampp/htdocs/Prova/models/animales_model.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>

    <title>Personas</title>
</head>
<body>
<form method="post">
    <label >campoACambiar:</label>
    <input type="text" name="campoACambiar"><br><br>
    <label >valorACambiar:</label>
    <input type="text" name="valorACambiar"><br><br>
    <label >idSolicitado:</label>
    <input type="text" name="idSolicitado"><br><br>
    <input type="submit" name="enviar" >
</form>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>


<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    ModelAnimales::actulizarAnimales($_POST['campoACambiar'],$_POST['valorACambiar'],$_POST['idSolicitado']);
}

?>
</body>
</html>