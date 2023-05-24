<?php
require '../conexion.php';
session_start();

$id_usu=$_GET['id_usuario'];
$borrar = "delete from usuarios where id_usuario = $id_usu";
$borrado = $mysqli->query($borrado);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Darte de baja</title>
    <link rel="shortcut icon" href="../../images/acero.png">
</head>
<body>
    <H1>Te has dado de baja con exito, muchas gracias por su apoyo</H1>
    <a href="../../cerradodesesion.php">Volver</a>
</body>
</html>