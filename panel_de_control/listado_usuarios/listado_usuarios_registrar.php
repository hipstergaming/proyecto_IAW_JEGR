<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		
		<title>Libreria cosmere: Registrar usuario</title>

		<style>
			.form-control{
				width:850px ;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1> Nuevo usuario para libreria</h1>
			</div>
			
			<div class="row">
				<div class="col-md-8">					
					<form action="listado_usuarios_registrar2.php" method="get" id="registro" name="registro" autocomplete="off">

                        <!-- usuario -->
						<div class="form-group">
							<label>Nombre de usuario: 
							<input type="text" name="usuario" class="form-control" required>
							</label>
						</div>
                        <!-- Contraseña -->


						<div class="form-group">
							<label>Contraseña: 
							<input type="password" name="contra" class="form-control" required>
							</label>
						</div>


                        <!-- Correo -->
                        <div class="form-group">
                        <label>Correo electrónico: 
                            <input type="mail" name="correo" class="form-control" required>
                            </label>
                        </div>

                        <!-- Telefono -->
						<div class="form-group">
						<label>Teléfono: 
							<input type="number" name="telefono" maxlength="9" class="form-control" required>
							</label>
						</div>

                        <!-- Dirección -->
						<div class="form-group">
						<label>Dirección: 
							<input type="text" name="direccion" class="form-control" placeholder="Calle ..." required>
							</label>
						</div>
                        <!-- Rango -->
                        <div class="form-group">
                        <label for="rango"> Rango:
                        <select name="rango" id="rango">
                            <option value="ADMIN">ADMIN</option>
                            <option value="USUARIO">USUARIO</option>
                        </select>
                        </label>
                        </div>
                     
						
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
		<a href="../iniciopanel.php">Volver al inicio</a>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="../../js/jquery-3.4.1.min.js" ></script>
		<script src="../../js/bootstrap.min.js" ></script>
	</body>
</html>				