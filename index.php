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

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

	<title>Librería Cosmere</title>

	<script>
		$(document).ready(function() {
			$('#tabla').DataTable();
		});
	</script>

</head>

<body>

	<?php
	if (isset($_SESSION['usuario'])) {
	?>
		<a href="panel_de_control/iniciopanel.php" class='btn btn-primary '>Panel de control</a>
		<a href="cerradodesesion.php" class='btn btn-primary '>Cerrar sesion</a>
	<?php
	} else {
	?>
		<a href="login.php" class='btn btn-primary '>Iniciar sesión</a>
		<a href="registrar.php" class='btn btn-primary '>Registrar</a>
	<?php
	}
	?>
	<div class="container">
		<h1>Bienvenido a la libreria cosmere</h1>
		<br>

		<div class="row">
			<h2>Lista de libros a la venta:</h2>
		</div>
		<br>
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

	</div>


</body>

</html>