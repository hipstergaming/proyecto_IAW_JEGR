<?php
    require '../../conexion.php';

session_start();

$id_editorial = $_POST['id_editorial'];
$usuario = "Select * from editorial where id_editorial = $id_editorial";
$datos_usu = $mysqli->query($usuario);

$nombre_ed = $_POST['nombre_ed'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$CIF= $_POST['CIF'];


?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		
        <title>Libreria cosmere: Editar editorial</title>
        <link rel="icon" href="../images/Acero.ico" type="image/png">
	</head>
	<body>
	<?php
    // Recojo los datos del GET
			$nombre_ed=$_GET['nombre_ed'];
			$telefono=$_GET['telefono'];
			$direccion=$_GET['direccion'];
			$CIF=$_GET['CIF'];
			

            // Creo un contador para comprobar
 $existe=0;


 // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
 // En ambos casos te pondran un enlace al index.php
			while($fila = $resultado->fetch_assoc()){
                if ($fila['Nombre_ed'] == $nombre_ed){
                    $existe=1;
                    // echo "Se mete en existe y puso 1";
                }else{
                    // echo "Se mete en existe y deja el 0";
                }
            }

            if ($existe == 1){
                
                ?>
                    <p class="alert alert-danger">Error, nombre duplicado</p>
                    <a href="../iniciopanel.php">Volver</a>
                <?php

            }else{
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