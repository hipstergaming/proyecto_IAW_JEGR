<?php

//Establezco conexion
require '../../conexion.php';

$sql1 = "Select * from usuarios";

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
    <link rel="icon" href="../images/Acero.ico" type="image/png">
    <link rel="stylesheet" href="../paneldecontrol.css">
    <title>Libreria cosmere: Registrar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
    <?php
    // Recojo los datos del GET
    $usuario = $_GET['usuario'];
    $contraseña = $_GET['contra'];
    $contraseña_segura = password_hash($contraseña, PASSWORD_DEFAULT);
    $tlf = $_GET['telefono'];
    $direccion = $_GET['direccion'];
    $correo = $_GET['correo'];
    $rango = $_GET['rango'];
    // Creo un contador para comprobar
    $existe = 0;


    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
    // En ambos casos te pondran un enlace al index.php
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['usuario'] == $usuario) {
            $existe = 1;
            // echo "Se mete en existe y puso 1";
        } else {
            // echo "Se mete en existe y pone 0";
        }
    }

    if ($existe == 1) {

    ?>
        <p class="alert alert-danger">Error, el usuario ya existe</p>
        <a href="listado_usuarios_registrar.php">Volver</a>
    <?php

    } else {
        $sql = "insert into usuarios (usuario, contraseña, correo_electronico, rango, direccion, telefono) values ('$usuario','$contraseña_segura','$correo','$rango','$direccion','$tlf')";
        $resultado = $mysqli->query($sql);
    ?>
        <br>
        <p class="alert alert-primary" role="alert">Usuario creado con éxito</p>
        <br>

        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
    <?php

    }

    ?>
</div>
</div>

</body>

</html>