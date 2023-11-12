<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Personas</title>
</head>
<body>
<p>Quieres cerrar session?</p>
<form method="post">
<button name="si" value="si">si</a></button>
<button name="no" value="no">no</a></button>
</form>
</body>
</html>

<?php
if(isset($_POST["si"])){
    session_unset();
    session_abort();
    header("Location: Log.php");
}else if(isset($_POST["no"])){
    header("Location: Menu.php");
}

?>
