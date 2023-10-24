<?php require_once('C:/xampp/htdocs/Prova/models/animales_model.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>

    <title>Personas</title>
</head>
<body>
<button name="home"><a href="menu.html"> Volver al menu </a> </button>

<?php
echo "<hr/>";

$datos = ModelAnimales::mostrarAnimales();
foreach ($datos as $dato) {
    echo " -Animal ". $dato["id"] . "<br/>" ;
    echo " -especie: ".$dato["especie"] . "<br/>";
    echo " -nombre: ".$dato["nombre"] . "<br/>";
    echo " -fechaNacimiento: ".$dato["fechaNacimiento"] . "<br/>";
    echo " -peso: ".$dato["peso"] . "<br/>";

    echo "<hr/>";


}
?>
</body>
</html>