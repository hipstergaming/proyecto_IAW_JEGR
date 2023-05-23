<?php
    require '../../conexion.php';

session_start();

$id_editorial = $_POST['id_editorial'];
$usuario = "Select * from editorial where id_editorial = $id_editorial";
$datos_usu = $mysqli->query($usuario);

$nombre_ed = $_POST['nombre_ed'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$CIF= $_POST['CIF'];


$actualizar = "update editorial set Nombre_ed='$nombre_ed', Telefono='$telefono', Direccion='$direccion', CIF='$CIF' where id_editorial='$id_editorial'";
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
    <h1>Actualizado con exito!</h1>
    <a href="../iniciopanel.php">Volver</a>
</body>

</html>