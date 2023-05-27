<?php
require '../../conexion.php';

session_start();

$id_editorial = $_POST['id_editorial'];
$usuario = "Select * from editorial where id_editorial = $id_editorial";
$datos_usu = $mysqli->query($usuario);

$nombre_ed = $_POST['nombre_ed'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$CIF = $_POST['CIF'];


?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Libreria cosmere: Editar editorial</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">
    <link rel="icon" href="../images/Acero.ico" type="image/png">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    // Recojo los datos del GET
    $nombre_ed = $_GET['nombre_ed'];
    $telefono = $_GET['telefono'];
    $direccion = $_GET['direccion'];
    $CIF = $_GET['CIF'];


    // Creo un contador para comprobar
    $existe = 0;


    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
    // En ambos casos te pondran un enlace al index.php
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['Nombre_ed'] == $nombre_ed) {
            $existe = 1;
            // echo "Se mete en existe y puso 1";
        } else {
            // echo "Se mete en existe y deja el 0";
        }
    }

    if ($existe == 1) {

    ?>
        <p class="alert alert-danger">Error, nombre duplicado</p>
        <a href="../iniciopanel.php">Volver</a>
    <?php

    } else {
        $actualizar = "update editorial set Nombre_ed='$nombre_ed', Telefono='$telefono', Direccion='$direccion', CIF='$CIF' where id_editorial='$id_editorial'";
        $resultado = $mysqli->query($actualizar);
    ?>
        <br>
        <p class="alert alert-primary" role="alert">Editorial actualizada corractamente</p>
        <br>

        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
    <?php

    }

    ?>



</body>

</html>