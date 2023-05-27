<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Registrar</title>
    <link rel="icon" href="images/Acero.ico" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


	<style>

	</style>
</head>

<body>
		<div class="">
			<h1>Socios</h1>
		</div>

		<div class="formu"> 
				<form action="registrar2.php" method="get" class="col-3" name="registro" autocomplete="off">

				<!-- usuario -->
				<div class="form-floating mb-3">
					<input type="text" name="usuario" class="form-control" id="floatingInput" placeholder=""  required>
					<label for="floatingInput">Nombre de usuario:</label>
					<br>
				</div>

				<!-- Contraseña -->
				<div class="form-floating mb-3">
					<input type="password" name="contra" class="form-control" id="floatingInput" placeholder="" required>
					<label for="floatingInput">Contraseña:</label>
					<br>
				</div>


				<!-- Correo -->
				<div class="form-floating mb-3">
					<input type="mail" name="correo" class="form-control" id="floatingInput" placeholder="" required>
					<label for="floatingInput">Correo electrónico:</label>
					<br>
				</div>

				<!-- Telefono -->
				<div class="form-floating mb-3">
					<input type="number" name="telefono" maxlength="9" class="form-control" id="floatingInput" placeholder="" required>
					<label for="floatingInput">Teléfono:</label>
					<br>
				</div>

				<!-- Dirección -->
				<div class="form-floating mb-3">
					<input type="text" name="direccion" class="form-control" id="floatingInput" placeholder="Calle ..." required>
					<label for="floatingInput">Dirección:</label>
					<br>
				</div>

				<!-- El envio -->
				<input type="submit" value="Registrar" class='btn btn-primary'>
				
				<div class="login-enlaces">
					<p>¿Ya tienes una cuenta? <a href="login.php">¡Inicia sesión!</a></p>
					<p>Volver a <a href="index.php">Incio</a></p>
				</div>
			</form>
			</section>

</div>


</body>

</html>