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
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Club Deportivo La Venta</title>
</head>

<body>
    <?php

while($fila = $resultado->fetch_assoc()){
    $cantidad_dis =$fila[$cantidad_dis];
}
    $cant_calc=$cantidad_dis-$cantidad;

    // $sql= "update base set nombre = '$nombre', correo = '$email', fecha = '$fecha', premium = '$premium' where id = '$id'";
    $sql2 = "update compras set id_usuario= '$id_usu' id_libro = '$id_libro' cantidad_comprada= '$cantidad'";
    $resultado2 = $mysqli->query($sql2);
    $sql3= "update libros set cantidad_dis = '$calc_cant' where id_libro = '$id_libro'";
    $resultado3= $mysqli->query($sql3);

    
    ?>
    <br>
    <p class="alert alert-primary" role="alert">REGISTRO MODIFICADO</p>
    <br>

    <a href="index.php" class='btn btn-primary'>Regresar</a>
    <?php

    ?>
</body>

</html>