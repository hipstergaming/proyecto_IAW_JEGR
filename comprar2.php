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
    <link rel="icon" href="images/Acero.ico" type="image/png">
    <title>Libreria cosmere: Compra</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php

while($fila = $resultado->fetch_assoc()){
   $cant_dis=$fila['cantidad_dis'];


}
    $calculo=$cant_dis - $cantidad;

    if ($calculo >= 0){

    $sql2="insert into compras (id_usuario, id_libro, cantidad_comprada, fecha_compra) values ($id_usu, $id_libro, $cantidad, curdate())";
    $resultado2 = $mysqli->query($sql2);
    
    $sql3= "update libros set cantidad_dis = '$calculo' where id_libro = '$id_libro'";
    $resultado3= $mysqli->query($sql3);
    }else{
        ?>
        <p class="alert alert-danger">Error, no puedes comrpar más libros de los que hay en stock</p>
        <a href="index.php" class='btn btn-primary'>Volver al index</a>
        <?php
    }

    ?>
    <br>
    <p class="alert alert-primary" role="alert">REGISTRO MODIFICADO</p>
    <br>

    <a href="index.php" class='btn btn-primary'>Regresar</a>
    <?php

    ?>
</body>

</html>