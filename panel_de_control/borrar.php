<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
$nuevo = $_GET['nuevo'];

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar editorial</title>
    <link rel="stylesheet" href="paneldecontrol.css">
    <link rel="icon" href="../images/Acero.ico" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>


<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../images/Acero.ico"> Panel de control
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
                                        <a href="iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="tu_usuario.php" class="nav-link active">Tus datos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="lista_compras.php" class="nav-link active">Lista de tus compras</a>
                                    </li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Listados y registros
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="nav-link disabled">Usuarios</a></li>
                                            <li><a class="dropdown-item" href="listados.php?nuevo=usuario">Listado de usuarios</a></li>
                                            <li><a class="dropdown-item" href="agregar.php?nuevo=usuario">Agregar nuevo usuario</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="nav-link disabled">Autores</a></li>
                                            <li><a class="dropdown-item" href="listados.php?nuevo=autor">Listado de autores</a></li>
                                            <li><a class="dropdown-item" href="agregar.php?nuevo=autor">Agregar nuevo autor</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="nav-link disabled">Libros</a></li>
                                            <li><a class="dropdown-item" href="listados.php?nuevo=libro">Listado de libros</a></li>
                                            <li><a class="dropdown-item" href="agregar.php?nuevo=libro">Agregar nuevo libro</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="nav-link disabled">Editorial</a></li>
                                            <li><a class="dropdown-item" href="listados.php?nuevo=editorial">Listado de editoriales</a></li>
                                            <li><a class="dropdown-item" href="agregar.php?nuevo=editorial">Registrar nueva editorial</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../index.php" class="nav-link active">Volver al index</a>
                                    </li>

                                <?php
                                } else {
                                ?>
                                    <li class="nav-item">
                                        <a href="iniciopanel.php" class="nav-link active" aria-current="page">Inicio</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="tu_usuario.php" class="nav-link active">Tus datos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="lista_compras.php" class="nav-link active">Lista de tus compras</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../index.php" class="nav-link active">Volver al index</a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
            </nav>
        </header>

        <main>
            <!-- ###########EDITORIAL################# -->
            <?php
            if ($nuevo == 'editorial') {
                $id_editorial = $_GET['id_editorial'];
                $editorial = "Select * from editorial";
                $resultado_editorial = $mysqli->query($editorial);

                while ($fila = $resultado_editorial->fetch_assoc()) {
                    if ($fila['id_editorial'] == $titulo) {
                        $existe = 1;
                        // echo "Se mete en existe y puso 1";
                    } else {
                        // echo "Se mete en existe y deja el 0";
                    }
                }


                if ($existe == 0) {

            ?>
                    <p class="alert alert-danger">Error, la editorial no existe</p>
                    <a href="index.php">Volver</a>
                <?php

                } else {
                    $sql = "delete from editoriales where id_editorial='$id_editorial'";
                    $resultado = $mysqli->query($sql);
                ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Editorial eliminada correctamente</p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php
                }
                ?>

                <!-- ###########LIBRO################# -->
                <?php
            } elseif ($nuevo == 'libro') {
                $id_libro = $_GET['id_libro'];
                $sqljoin = "Select * from libros";
                $resultado_libros = $mysqli->query($sqljoin);

                while ($fila = $resultado_libros->fetch_assoc()) {
                    if ($fila['id_libro'] == $id_libro) {
                        $existe = 1;
                        // echo "Se mete en existe y puso 1";
                    } else {
                        // echo "Se mete en existe y deja el 0";
                    }
                }


                if ($existe == 0) {

                ?>
                    <p class="alert alert-danger">Error, el libro no existe</p>
                    <a href="index.php">Volver</a>
                <?php

                } else {
                    $sql = "delete from libros where id_libro='$id_libro'";
                    $resultado = $mysqli->query($sql);
                ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Libro eliminado correctamente</p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php
                }
                ?>
                <!-- ###########USUARIO################# -->
                <?php
            } elseif ($nuevo == 'usuario') {
                $id_usuario = $_GET['id_usuario'];
                $todos_usuarios = "Select * from usuarios";
                $resultado_usuarios = $mysqli->query($todos_usuarios);

                while ($fila = $resultado_usuarios->fetch_assoc()) {
                    if ($fila['id_usuario'] == $id_usuario) {
                        $existe = 1;

                        // echo "Se mete en existe y puso 1";
                    } else {
                        // echo "Se mete en existe y deja el 0";
                    }
                }


                if ($existe == 0) {

                ?>
                    <p class="alert alert-danger">Error, el usuario no existe</p>
                    <a href="index.php">Volver</a>
                    <?php

                } else {
                    if ($id_usuario != "1") {
                        $sql = "delete from usuarios where id_usuario= '$id_usuario'";
                        $resultado = $mysqli->query($sql);
                    } else {
                    ?>
                        <p class="alert alert-danger" role="alert">No puedes dar de baja al administrador</p>

                <?php
                    }
                }
                ?>
                <br>
                <p class="alert alert-primary" role="alert">Usuario dado de baja correctamente</p>
                <br>

                <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php


                ?>
                <!-- ###########AUTOR################# -->
                <?php
            } elseif ($nuevo == 'autor') {
                $id_autor = $_GET['id_autor'];
                $todos_autores = "Select * from autores";
                $resultado_autores = $mysqli->query($todos_autores);

                while ($fila = $resultado_autores->fetch_assoc()) {
                    if ($fila['id_autor'] == $id_autor) {
                        $existe = 1;
                        // echo "Se mete en existe y puso 1";
                    } else {
                        // echo "Se mete en existe y deja el 0";
                    }
                }


                if ($existe == 0) {

                ?>
                    <p class="alert alert-danger">Error, el autor no existe</p>
                    <a href="index.php">Volver</a>
                <?php

                } else {
                    $sql = "delete from autores where id_autor='$id_autor'";
                    $resultado = $mysqli->query($sql);
                ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Autor eliminado correctamente</p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php
                }
                ?>
                <!-- ####################################TU USUARIO################# -->
                <?php
            } elseif ($nuevo == 'tuusuario') {
                $id_usuario = $_GET['id_usuario'];
                $todos_usuarios = "Select * from usuarios";
                $resultado_usuarios = $mysqli->query($todos_usuarios);



                if ($id_usuario != 1) {

                    $sql = "delete from usuarios where id_usuario='$id_usuario'";
                    $resultado = $mysqli->query($sql);
                ?>

                    <br>
                    <p class="alert alert-primary" role="alert">Usuario dado de baja, ¡Te extrañaremos!</p>
                    <br>
                    <a href="../cerradodesesion.php" class='btn btn-primary'>Regresar</a>
                <?php
                } else {
                ?>
                    <p class="alert alert-danger" role="alert">No puedes dar de baja a el administrador principal</p>

                <?php
                }

                ?>

            <?php
            }
            ?>

        </main>
    </div>
</body>

</html>