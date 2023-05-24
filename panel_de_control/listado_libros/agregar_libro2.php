<?php
			
			//Establezco conexion
			require '../../conexion.php';
			
			$sql1= "Select * from libros";
		
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
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		
        <title>Libreria cosmere: Agregar nuevo libro</title>
        <link rel="icon" href="../images/Acero.ico" type="image/png">
	</head>
	<body>
	<?php
    // Recojo los datos del GET
			$titulo=$_GET['titulo'];
			$cantidad=$_GET['cantidad'];
			$ISBN=$_GET['ISBN'];
			$autor=$_GET['autor'];
			$editorial=$_GET['editorial'];

            // Creo un contador para comprobar
 $existe=0;


 // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
 // En ambos casos te pondran un enlace al index.php
			while($fila = $resultado->fetch_assoc()){
                if ($fila['Titulo'] == $titulo){
                    $existe=1;
                    // echo "Se mete en existe y puso 1";
                }else{
                    // echo "Se mete en existe y deja el 0";
                }
            }

            if ($existe == 1){
                
                ?>
                    <p class="alert alert-danger">Error, el libro ya existe</p>
                    <a href="index.php">Volver</a>
                <?php

            }else{
                $sql= "insert into libros (Titulo, cantidad_dis, ISBN, id_autor, id_editorial) values ('$titulo','$cantidad','$ISBN','$autor','$editorial')";
                $resultado= $mysqli->query($sql);
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