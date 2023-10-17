<?php require_once('C:/xampp/htdocs/PrimerMVC/models/persona_model.php'); ?>
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
$datos = ModelPersona::mostrarPersonas();
foreach ($datos as $dato) {
    echo "Alumno ". $dato["id"] . "<br/>" ;
    echo " -Nombre: ".$dato["nombre"] . "<br/>";
    echo " -Apellido: ".$dato["apellido"] . "<br/>";
    echo " -Dni:  ".$dato["dni"] . "<br/>";
    echo " -Curso: ".$dato["curso"] . "<br/>";
    echo "<hr/>";


}
?>
</body>
</html>