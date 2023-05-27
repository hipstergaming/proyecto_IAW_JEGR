<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
$sqljoin = "Select * from autores,libros, editorial, compras, usuarios where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial and libros.id_libro=compras.id_libro and usuarios.id_usuario=compras.id_usuario and compras.id_usuario=$id_usu";
$todo = $mysqli->query($sqljoin);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Tu lista de compras</title>
    <link rel="stylesheet" href="paneldecontrol.css">
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
                                <img src="../images/Acero.ico"> Panel de control
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <li class="nav-item">
                                <a href="iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a href="tu_usuario/editar_usuario.php" class="nav-link active">Tus datos</a>
                            </li>

                            <li class="nav-item">
                                <a href="lista_compras.php" class="nav-link active">Lista de tus compras</a>
                            </li>

                            <li class="nav-item">
                                <a href="listado_usuarios/listado_usuarios.php" id="admin" class="nav-link active">Listado de usuarios</a>
                            </li>

                            <li class="nav-item">
                                <a href="listado_libros/lista_libros.php" id="admin" class="nav-link active">Edicion de libros</a>
                            </li>

                            <li class="nav-item">
                                <a href="listado_editorial/listado_editorial.php" id="admin" class="nav-link active">Listado de editorial</a>
                            </li>

                            <li class="nav-item">
                                <a href="../index.php" class="nav-link active">Volver al index</a>
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
                                <img src="../images/Acero.ico"> Panel de control
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <li class="nav-item">
                                <a href="iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a href="tu_usuario/editar_usuario.php" class="nav-link active">Tus datos</a>
                            </li>

                            <li class="nav-item">
                                <a href="lista_compras.php" class="nav-link active">Lista de tus compras</a>
                            </li>

                            <li class="nav-item">
                                <a href="../index.php" class="nav-link active">Volver al index</a>
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

        <main>
            <section>
                <h2>Lista de usuarios:</h2>
                <br>
                <br>
                <a href="listado_usuarios_registrar.php">Registrar usuario nuevo</a>
                <table class="tabla">
                    <tr>
                        <th>id_compra</th>
                        <th>Titulo</th>
                        <th>Cantidad comprada</th>
                        <th>Fecha compra</th>
                    </tr>
                    <?php
                    while ($fila = $todo->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $fila['id_compra'] ?></td>
                            <td><?php echo $fila['Titulo'] ?></td>
                            <td><?php echo $fila['cantidad_comprada'] ?></td>
                            <td><?php echo $fila['fecha_compra'] ?></td>


                        </tr>


                    <?php
                    }
                    ?>
                </table>
            </section>
        </main>

    </div>
</body>