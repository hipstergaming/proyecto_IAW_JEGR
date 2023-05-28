<?php
session_start();

$rango = $_SESSION['rango'];
?>

<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">

	<title>Libreria cosmere: Registrar usuario</title>
	<link rel="icon" href="../../images/Acero.ico" type="image/png">
	<link rel="stylesheet" href="../paneldecontrol.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</head>

<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
					<img src="../../images/Acero.ico"> Panel de control
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<?php
								if ($rango == "ADMIN") {
								?>

									<li class="nav-item">
										<a href="../iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
									</li>

									<li class="nav-item">
										<a href="../tu_usuario/editar_usuario.php" class="nav-link active">Tus datos</a>
									</li>

									<li class="nav-item">
										<a href="../lista_compras.php" class="nav-link active">Lista de tus compras</a>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Listado de usuarios
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><a class="dropdown-item" href="../listado_usuarios/listado_usuarios.php">Listado de usuarios</a></li>
											<li><a class="dropdown-item" href="../listado_usuarios/listado_usuarios_registrar.php">Registrar usuario nuevo</a></li>
										</ul>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle active" href="#" id="navbarlibros" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Listado de libros
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarlibros">
											<li><a class="dropdown-item" href="../listado_libros/lista_libros.php">Listado de libros</a></li>
											<li><a class="dropdown-item" href="../listado_libros/agregar_libro.php">Agregar nuevo libro</a></li>
										</ul>
									</li>

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Listado de editoriales
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><a class="dropdown-item" href="../listado_editorial/listado_editorial.php">Listado de editoriales</a></li>
											<li><a class="dropdown-item" href="../listado_editorial/listado_editorial_añadir.php">Registrar nueva editorial</a></li>
										</ul>
									</li>

									<li class="nav-item">
										<a href="../../index.php" class="nav-link active">Volver al index</a>
									</li>


								<?php
								} else {
								?>

									<li class="nav-item">
										<a href="../iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
									</li>

									<li class="nav-item">
										<a href="../tu_usuario/editar_usuario.php" class="nav-link active">Tus datos</a>
									</li>

									<li class="nav-item">
										<a href="../lista_compras.php" class="nav-link active">Lista de tus compras</a>
									</li>

									<li class="nav-item">
										<a href="../../index.php" class="nav-link active">Volver al index</a>
									</li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
			</nav>
		</header>

		<br><br><br>
<main>
		<div class="formu">
			<h1> Nuevo usuario para libreria</h1>

			<form action="listado_usuarios_registrar2.php" method="get" name="registro" autocomplete="off">

				<div class="form-floating mb-3">
					<input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="" required>
					<label for="floatingInput">Nombre de usuario:</label>

				</div>

				<div class="form-floating mb-3">
					<label for="floatingInput">Contraseña:</label>
					<input type="password" name="contra" class="form-control" required>

				</div>

				<div class="form-floating mb-3">
					<label for="floatingInput">Correo electrónico:</label>
					<input type="mail" name="correo" class="form-control" required>

				</div>

				<div class="form-floating mb-3">
					<label for="floatingInput">Teléfono:</label>
					<input type="number" name="telefono" maxlength="9" class="form-control" required>

				</div>

				<div class="form-floating mb-3"></label>
					<label for="floatingInput">Dirección:</label>
					<input type="text" name="direccion" class="form-control" placeholder="Calle ..." required>

				</div>

				<div class="form-floating mb-3">
					<select name="rango" class="form-select" id="floatingSelect">
						<option selected>Selecciona el rango</option>
						<option value="ADMIN">ADMIN</option>
						<option value="USUARIO">USUARIO</option>
					</select>
					<label for="floatingSelect"> Rango:</label>

				</div>

				<input type="submit" value="Registrar" class='btn btn-primary'>


				<a href="../iniciopanel.php">Volver al inicio</a>
			</form>
		</div>
		</main>
	</div>



</body>

</html>