<?php
require '../../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];

$id_editorial = $_GET['id_editorial'];
$editorial = "Select * from editorial where id_editorial=$id_editorial";
$resultado = $mysqli->query($editorial);
$rango = $_SESSION['rango'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar editorial</title>
    <link rel="stylesheet" href="../paneldecontrol.css">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <?php
        if ($rango == "ADMIN") {
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="navbar-brand" href="#">
                                <img src="../../images/Acero.ico"> Panel de control
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

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
                                <a href="../listado_usuarios/listado_usuarios.php" id="admin" class="nav-link active">Listado de usuarios</a>
                            </li>

                            <li class="nav-item">
                                <a href="../listado_libros/lista_libros.php" id="admin" class="nav-link active">Edicion de libros</a>
                            </li>

                            <li class="nav-item">
                                <a href="../listado_editorial/listado_editorial.php" id="admin" class="nav-link active">Listado de editorial</a>
                            </li>

                            <li class="nav-item">
                                <a href="../../index.php" class="nav-link active">Volver al index</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>

        <?php
        } else {
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="navbar-brand" href="#">
                                <img src="../../images/Acero.ico"> Panel de control
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
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
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
        }
        ?>
    </header>
    <div class="container">

        <section class="tus_datos">
            <H1>Bienvenido al listado de usuarios</H1>
            <br>
            <br>

            <form action="listado_usuarios_editar2.php" method="post">
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                ?>
                    <label for="nombre_ed"> Usuario:
                        <input type="text" name="nombre_ed" value="<?php echo $fila['Nombre_ed'] ?>">
                    </label>
                    <br><br>

                    <label for="telefono"> Contraseña:
                        <input type="number" name="telefono" value="<?php echo $fila['Telefono'] ?>">
                    </label>
                    <br><br>

                    <label for="direccion"> Correo electronico:
                        <input type="text" name="direccion" value="<?php echo $fila['Direccion'] ?>">
                    </label>
                    <br><br>

                    <label for="CIF"> Direccion:
                        <input type="text" name="CIF" value="<?php echo $fila['CIF'] ?>">
                    </label>
                    <br><br>

                    <input type="hidden" name="id_editorial" value="<?php echo $fila['id_editorial'] ?>">
                    <br><br>

                    <input type="submit" value="Actualiza tus datos" name="Enviar">
                <?php
                }
                ?>
        </section>



    </div>
</body>

</html>