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
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/Acero.ico"> Libreria Cosmere
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex justify-content-end">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    </div>

</body>

</html>