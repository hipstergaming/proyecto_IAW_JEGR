<?php
//    Variables
   $id=$_GET['id'];
   $idusu=$_GET['idusu'];


    //Establezco conexion
    require 'conexion.php';
    // &contra=a
	$sql= "Select * from libros where id_libro=$id";
	$resultado= $mysqli->query($sql);
	
?>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Formulario de registro Cosmere</title>
		<style>
			.form-control{
				width:850px ;
			}
            </style>
	</head>
	<body>
		<div class="container">
    <?php
        while($fila = $resultado->fetch_assoc()){
            
            echo "<h2>Compra de ",$fila['Titulo'],"</h2>";
        }
        ?>
			<div class="row">
                <div class="col-md-8">					
                    <form action="comprar2.php" method="get" id="compra" name="compra" autocomplete="off">
                        
                        
                        <div class="form-group">
                            <label>¿Cuantos quieres?: 
                                <input type="text" name="cantidad" class="form-control" required>
							</label>
						</div>
                     
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        
						
                        <!-- El envio -->
						<div class="form-group">
                            <label>
                                <input type="submit" value="Registrar" class='btn btn-primary'>
                                <label>
                                    </div>
                                </form>
                            </div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
	</body>
</html>				