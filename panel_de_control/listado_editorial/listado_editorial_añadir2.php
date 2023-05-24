<?php

//Establezco conexion
require '../../conexion.php';

$id_editorial = $_GET['id_editorial'];
$editorial = "Select * from editorial where id_editorial=$id_editorial";
$resultado = $mysqli->query($editorial);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="icon" href="../images/Acero.ico" type="image/png">
    <title>Libreria Cosmere: Nueva editorial</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
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
        <p class="alert alert-danger">Error, esa editorial ya existe</p>
        <a href="index.php">Volver</a>
    <?php

    } else {
        $sql = "insert into editorial (Nombre_ed, telefono, direccion, CIF) values ('$nombre_ed','$telefono','$direccion','$CIF')";
        $resultado = $mysqli->query($sql);
    ?>
        <br>
        <p class="alert alert-primary" role="alert">Editorial agregada corractamente al sistema</p>
        <br>

        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
    <?php

    }

    ?>



</body>

</html>