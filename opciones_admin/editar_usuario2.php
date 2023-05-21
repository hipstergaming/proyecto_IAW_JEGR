<?php
    require '../conexion.php';

    session_start();

    $id_usu = $_SESSION['id_usu'];
    $usuario = "Select * from usuarios where id_usuario = $id_usu";
    $datos_usu = $mysqli->query($usuario);

    $usuario=$_GET['usuario'];
    $contra=$_GET['contra'];
    $correo=$_GET['correo'];
    $direccion=$_GET['direccion'];
    $telefono=$_GET['telefono'];

    $actualizar= "update usuarios set usuario=$usuario, contraseña=$contra, correo_electronico=$correo, direccion=$direccion, telefono=$telefono where id_usuario=$id_usu";
    $resultado= $mysqli->query($actualizar);

    
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
    <a href="editar_usuario.php">Volver</a>
</body>
</html>


