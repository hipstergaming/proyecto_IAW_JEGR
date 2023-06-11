<?php

require 'conexion.php';
$id_libro = $_GET['id_libro'];
$id_usu = $_GET['id_usu'];
$cantidad = $_GET['cantidad'];

$sql = "Select * from libros where id_libro=$id_libro";
// Ejecuto la sentencia y guardo el resultado
$resultado = $mysqli->query($sql);

?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="images/Acero.ico" type="image/png">
    <link rel="stylesheet" href="estiloinicio.css">
    <link rel="icon" href="images/Acero.ico" type="image/png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <title>Libreria cosmere: Compra</title>
</head>

<body>
    <div class="container">
        <?php

        while ($fila = $resultado->fetch_assoc()) {
            $cant_dis = $fila['cantidad_dis'];
        }
        $calculo = $cant_dis - $cantidad;

        if ($calculo >= 0) {

            $sql2 = "insert into compras (id_usuario, id_libro, cantidad_comprada, fecha_compra) values ($id_usu, $id_libro, $cantidad, curdate())";
            $resultado2 = $mysqli->query($sql2);

            $sql3 = "update libros set cantidad_dis = '$calculo' where id_libro = '$id_libro'";
            $resultado3 = $mysqli->query($sql3);
        } else {
        ?>
            <p class="alert alert-danger">Error, no puedes comrpar más libros de los que hay en stock</p>
            <a href="index.php" class='btn btn-primary'>Volver al index</a>
        <?php
        }

        ?>
        <br>
        <p class="alert alert-primary" role="alert">Compra realizada correctamente, ¡GRACIAS!</p>
        <br>

        <a href="index.php" class='btn btn-primary'>Regresar</a>

    </div>
</body>

</html>