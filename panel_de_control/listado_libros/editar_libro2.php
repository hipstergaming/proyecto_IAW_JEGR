<?php

    require '../../conexion.php';
    
    $id_libro=$_GET['id_libro'];


    $titulo=$_GET['Titulo'];
    $cantidad=$_GET['Cantidad_disponible'];
    $ISBN=$_GET['ISBN'];
    $autor=$_GET['autor'];
    $editorial=$_GET['editorial'];

    $actualizar = "update libros set Titulo='$titulo', cantidad_dis='$cantidad', ISBN='$ISBN', id_autor='$autor', id_editorial='$editorial' where id_libro='$id_libro'";
    // UPDATE `libros` SET `Titulo` = 'Juan potter y la mascara secreta', `cantidad_dis` = '3', `id_autor` = '2', `id_editorial` = '2', `ISBN` = '3123313212' WHERE `libros`.`id_libro` = 7; 
    $resultado = $mysqli->query($actualizar);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar libro</title>
    <link rel="stylesheet" href="paneldecontrol.css">
</head>

<body>
    <h1>Libro actualizado con exito!</h1>
    <a href="../iniciopanel.php">Volver a inicio</a>
</body>

