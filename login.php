<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Login</title>
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

</head>

<body>
    <div class='formu'>
    <section class="login">
        <form action="complogin.php" method="post" class="col" id="formulario">


            <div class="form-floating mb-3 ">
                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="" required>
                <label for="floatingInput"> Usuario:</label>
                <br>
            </div>

            <div class="form-floating mb-3 ">
                <input type="password" name="contra" class="form-control" id="floatingInput" placeholder="" required>
                <label for="floatingInput">Contraseña:</label>
                <br>
            </div>
            <input type="submit" class="btn btn-primary col-12 submit-btn1" value="Log-in">
            
            <div class="login-enlaces">
            <p>¿No tienes cuenta? <a href="registrar.php">¡Registrate!</a></p>
            <p>Volver a <a href="index.php">Incio</a></p>
            </div>
        </form>
    </section>
    </div>
</body>

</html>