<?php
			
			//Establezco conexion
			require 'conexion.php';
			
			$sql1= "Select * from usuarios";
		
			// Ejecuto la sentencia y guardo el resultado
			$resultado= $mysqli->query($sql1);
?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Confirmando registro</title>
	</head>
	<body>
	<?php
    // Recojo los datos del GET
			$usuario=$_GET['usuario'];
			$contraseña=$_GET['contra'];
			$tlf=$_GET['telefono'];
			$direccion=$_GET['direccion'];
			$correo=$_GET['correo'];
            // Creo un contador para comprobar
 $existe=0;


 // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
 // En ambos casos te pondran un enlace al index.php
			while($fila = $resultado->fetch_assoc()){
                if ($fila['usuario'] == $usuario){
                    $existe=1;
                    echo "Se mete en existe y puso 1";
                }else{
                    echo "Se mete en existe y pone 0";
                }
            }

            if ($existe == 1){
                
                ?>
                    <p class="alert alert-danger">Error, el usuario ya existe</p>
                    <a href="index.php">Volver</a>
                <?php

            }else{
                $sql= "insert into usuarios (usuario, contraseña, correo_electronico, rango, direccion, telefono) values ('$usuario','$contraseña','$correo','CLIENTE','$direccion','$tlf')";
                $resultado= $mysqli->query($sql);
                ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Usuario creado con éxito, ¡Bienvenido al Cosmere!</p> 
                    <br>
                    
                    <a href="index.php" class='btn btn-primary'>Regresar</a>
                    <?php    

            }
            
			?>
			
		

	</body>
</html>