<?php
//Establezco conexion
require 'conexion.php';

$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);
session_start();

if (isset($_SESSION['usuario'])) {
	$id_usu = $_SESSION["id_usu"];
}
?>


<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="estiloinicio.css">
	<link rel="icon" href="images/Acero.ico" type="image/png">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<title>Librería Cosmere: Inicio</title>

	<script>
		$(document).ready(function() {
			$('#tabla').DataTable();
		});
	</script>

</head>

<body>
	<div class="container">

		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="images/Acero.ico"> Libreria Cosmere
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">

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

			</nav>
		</header>
		<br><br>

		<main>
			<h1>Bienvenido a la libreria cosmere</h1>
			<br>


			<div class="row">
				<h2>Lista de libros a la venta:</h2>
			</div>
			<br>

			<table id="tabla" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Autor</th>
						<th>Titulo de libro</th>
						<th>Editorial</th>
						<th>ISBN</th>
						<th>Cant. disponible</th>
						<th>Comprar</th>

					</tr>


				</thead>
				<tbody>
					<?php
					echo "<tr>";

					while ($fila = $todo->fetch_assoc()) {
						echo "<td>", $fila['Nombre'], "</td>";
						echo "<td>", $fila['Titulo'], "</td>";
						echo "<td>", $fila['Nombre_ed'], "</td>";
						echo "<td>", $fila['ISBN'], "</td>";
						echo "<td>", $fila['cantidad_dis'], "</td>";

						if (isset($_SESSION['usuario'])) {
							echo "<td><a href='comprar.php?id_libro=$fila[id_libro]&id_usu=$id_usu' class='btn btn-danger'>Comprar</a></td>";
						} else {
							echo "<td>Logueate para comprar</td>";
						}

						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</main>

	</div>
	</div>

</body>

</html>