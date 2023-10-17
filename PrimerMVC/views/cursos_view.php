<?php require_once ('C:/xampp/htdocs/PrimerMVC/models/cursos_model.php');?>
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

$datos = ModelCursos::mostrarCursos();
foreach ($datos as $dato) {
    echo "Curso ". $dato["id"] . "<br/>" ;
    echo " -Nombre: ".$dato["nombre"] . "<br/>";
    echo " -Año: ".$dato["ano"] . "<br/>";
    echo "<hr/>";


}
?>
</body>
</html>