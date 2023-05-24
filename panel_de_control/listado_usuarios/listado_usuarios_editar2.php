<?php
    require '../../conexion.php';

session_start();

$id_usuario = $_POST['id_usuario'];
$usuario = "Select * from usuarios where id_usuario = $id_usuario";
$datos_usu = $mysqli->query($usuario);

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$correo = $_POST['correo'];
$rango= $_POST['rango'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$actualizar = "update usuarios set usuario='$usuario', contraseña='$contra', correo_electronico='$correo', direccion='$direccion', telefono='$telefono', rango='$rango' where id_usuario='$id_usuario'";
$resultado = $mysqli->query($actualizar);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar usuario</title>
    <link rel="shortcut icon" href="../../images/acero.png">
</head>

<body>
    <h1>Actualizado con exito!</h1>
    <a href="../iniciopanel.php">Volver</a>
</body>

</html>