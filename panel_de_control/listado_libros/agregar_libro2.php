<?php

//Establezco conexion
require '../../conexion.php';

$sql1 = "Select * from libros";

// Ejecuto la sentencia y guardo el resultado
$resultado = $mysqli->query($sql1);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Libreria cosmere: Agregar nuevo libro</title>
    <link rel="icon" href="../images/Acero.ico" type="image/png">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

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
    $titulo = $_GET['titulo'];
    $cantidad = $_GET['cantidad'];
    $ISBN = $_GET['ISBN'];
    $autor = $_GET['autor'];
    $editorial = $_GET['editorial'];

    // Creo un contador para comprobar
    $existe = 0;


    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
    // En ambos casos te pondran un enlace al index.php
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['Titulo'] == $titulo) {
            $existe = 1;
            // echo "Se mete en existe y puso 1";
        } else {
            // echo "Se mete en existe y deja el 0";
        }
    }

    if ($existe == 1) {

    ?>
        <p class="alert alert-danger">Error, el libro ya existe</p>
        <a href="index.php">Volver</a>
    <?php

    } else {
        $sql = "insert into libros (Titulo, cantidad_dis, ISBN, id_autor, id_editorial) values ('$titulo','$cantidad','$ISBN','$autor','$editorial')";
        $resultado = $mysqli->query($sql);
    ?>
        <br>
        <p class="alert alert-primary" role="alert">Libro agregado correctamente a la Base de datos</p>
        <br>

        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
    <?php

    }

    ?>



</body>

</html>