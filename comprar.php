<?php
//    Variables
$id_libro = $_GET['id_libro'];
$id_usu = $_GET['id_usu'];


//Establezco conexion
require 'conexion.php';
// &contra=a
$sql = "Select * from libros where id_libro=$id_libro";
$resultado = $mysqli->query($sql);

?>
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
	<link rel="stylesheet" href="estiloinicio.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

	<style>
		.form-control {
			width: 850px;
		}
	</style>
</head>

<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="images/Acero.ico"> Panel de control
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<div class="d-flex justify-content-end">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
								</li>
								<?php
								if (isset($_SESSION['usuario'])) {
								?>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="panel_de_control/iniciopanel.php">Panel de control</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="cerradodesesion.php">Cerrar sesion</a>
									</li>
								<?php
								} else {
								?>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="login.php">Iniciar sesion</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" href="registrar.php">Registrate</a>
									</li>
								<?php
								}
								?>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<br><br>
		<br><br>
		<?php
		while ($fila = $resultado->fetch_assoc()) {

			echo "<h2>Compra de ", $fila['Titulo'], "</h2>";
		}
		?>
		<div class="row">
			<div class="col-md-8">
				<form action="comprar2.php" method="get" id="compra" name="compra" autocomplete="off">


					<div class="form-group">
						<label>¿Cuantos libros quieres?:
							<input type="number" name="cantidad" class="form-control" required>
						</label>
					</div>

					<input type="hidden" name="id_usu" value="<?php echo $id_usu ?>">
					<input type="hidden" name="id_libro" value="<?php echo $id_libro ?>">

					<!-- El envio -->
					<div class="form-group">
						<label>
							<input type="submit" value="Comprar" class='btn btn-primary'>
							<label>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>

</html>