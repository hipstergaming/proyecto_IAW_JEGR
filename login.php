<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Login</title>
    <link rel="icon" href="../images/Acero.ico" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

</head>

<body>
    <section class="login">
    <form action="complogin.php" method="post">
        <div class="form-floating mb-3">
        <label>Usuario: <input type="text" name="usuario" class="form-floating mb-3" placeholder="Usuario" required></label>
        <br>
        </div>
        <div class="form-floating mb-3">
        <label>Contraseña: <input type="password" name="contra" placeholder="Contraseña" required></label>
        <br>
        </div>
        <input type="submit" class="btn btn-primary" value="Insertar">

    </form>
    <p>¿No tienes cuenta? <a href="registrar.php">¡Registrate!</a></p>
    <p>Volver a <a href="index.php">Incio</a></p>
    </section>
</body>

</html>