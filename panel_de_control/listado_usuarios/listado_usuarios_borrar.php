<?php
    require '../../conexion.php';

session_start();

$id_usuario = $_GET['id_usuario'];

$actualizar = "delete from usuarios where id_usuario='$id_usuario'";
$resultado = $mysqli->query($actualizar);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Usuario borrado con exito!</h1>
    <a href="../iniciopanel.php">Volver</a>
</body>

</html>