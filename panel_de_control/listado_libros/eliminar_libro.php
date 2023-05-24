<?php

    require '../../conexion.php';

    $id_libro=$_GET['id_libro'];
    $borrado="delete from libros where id_libro='$id_libro'";
    $resultado = $mysqli->query($borrado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Eliminar libro</title>
        <link rel="stylesheet" href="paneldecontrol.css">
        <link rel="icon" href="../images/Acero.ico" type="image/png">
    </head>

<body>
    <h1>Libro eliminado con exito!</h1>
    <a href="../iniciopanel.php">Volver a inicio</a>
</body>

</html>