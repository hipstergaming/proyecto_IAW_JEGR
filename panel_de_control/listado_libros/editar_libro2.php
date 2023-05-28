<?php

require '../../conexion.php';

$id_libro = $_GET['id_libro'];


$titulo = $_GET['Titulo'];
$cantidad = $_GET['Cantidad_disponible'];
$ISBN = $_GET['ISBN'];
$autor = $_GET['autor'];
$editorial = $_GET['editorial'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar libro</title>
    <link rel="stylesheet" href="../paneldecontrol.css">
    <link rel="icon" href="../../images/Acero.ico" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
<div class="container">
    <?php

            $actualizar = "update libros set Titulo='$titulo', cantidad_dis='$cantidad', ISBN='$ISBN', id_autor='$autor', id_editorial='$editorial' where id_libro='$id_libro'";
            $resultado = $mysqli->query($actualizar);
        ?>

            <p class="alert alert-primary" role="alert">Libro actualizado con exito</p>
            <a href="../iniciopanel.php">Volver</a>

    </div>

</body>