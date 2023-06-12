<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$nuevo = $_POST['nuevo'];


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
                    <a class="navbar-brand" href="iniciopanel.php">
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
                                        <a href="tu_usuario.php" class="nav-link active">Tus datos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="lista_compras.php" class="nav-link active">Compras de clientes</a>
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
                                        <a href="../index.php" class="nav-link active">Inicio</a>
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
                                        <a href="../index.php" class="nav-link active">Inicio</a>
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
            <div class="formu">
                <!-- ###########EDITORIAL################# -->
                <?php
                if ($nuevo == 'editorial') {

                    $id_editorial = $_POST['id_editorial'];
                    $sql = "Select * from editorial";
                    $resultado_editoriales = $mysqli->query($sql);

                    $nombre_ed = $_POST['nombre_ed'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $CIF = $_POST['CIF'];

                    $sql = "update editorial set Nombre_ed='$nombre_ed', Telefono='$telefono', Direccion='$direccion', CIF='$CIF' where id_editorial='$id_editorial'";
                    $resultado = $mysqli->query($sql);
                ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Editorial editada correctamente</p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>

                    <!-- ###########LIBRO################# -->
                    <?php
                } elseif ($nuevo == 'libro') {
                    $sql = "Select * from libros ";
                    $resultado_libros = $mysqli->query($sql);

                    $id_libro = $_POST['id_libro'];


                    $titulo = $_POST['Titulo'];
                    $cantidad = $_POST['Cantidad_disponible'];
                    $ISBN = $_POST['ISBN'];
                    $autor = $_POST['autor'];
                    $editorial = $_POST['editorial'];
                    $existe = 0;


                    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
                    // En ambos casos te pondran un enlace al index.php



                    if ($cantidad < 0) {

                    ?>
                        <p class="alert alert-danger">Error, no puedes agregar menos de 0 libros en stock</p>
                        <a href="index.php">Volver</a>
                    <?php

                    } else {
                        $sql = "update libros set Titulo='$titulo', cantidad_dis='$cantidad', ISBN='$ISBN', id_autor='$autor', id_editorial='$editorial' where id_libro='$id_libro'";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Libro editado correctamente</p>
                        <br>

                        <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>

                    <!-- ###########USUARIO################# -->
                <?php
                } elseif ($nuevo == 'usuario') {
                    $id_usuario = $_POST['id_usuario'];
                    $sql = "Select * from usuarios";
                    $resultado_usuarios = $mysqli->query($sql);


                    $usuario = $_POST['usuario'];
                    $contra = $_POST['contra'];
                    $contraseña_segura = password_hash($contra, PASSWORD_DEFAULT);
                    $correo = $_POST['correo'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    $rango = $_POST['rango'];


                    while ($fila = $resultado_usuarios->fetch_assoc()) {
                        $contraseñadebdd = $fila['contraseña'];
                    }
                ?>
                    <?php

                    if ($contra == $contraseñadebdd) {
                        $sql = "update usuarios set usuario='$usuario', correo_electronico='$correo', direccion='$direccion', telefono='$telefono', rango='$rango' where id_usuario='$id_usuario'";
                        $resultado = $mysqli->query($sql);
                    } else {
                        $sql = "update usuarios set usuario='$usuario', contraseña='$contraseña_segura', correo_electronico='$correo', direccion='$direccion', telefono='$telefono', rango='$rango' where id_usuario='$id_usuario'";
                        $resultado = $mysqli->query($sql);
                    }
                    ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Usuario editado correctamente </p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php

                    ?>


                    <!-- ###########AUTOR################# -->
                <?php
                } elseif ($nuevo == 'autor') {
                    $id_autor = $_POST['id_autor'];
                    $nombre = $_POST['nombre'];

                    $sql = "Select * from autores";
                    $resultado_autores = $mysqli->query($sql);


                ?>

                    <?php

                    $sql = "update autores set Nombre='$nombre' where id_autor='$id_autor'";
                    $resultado = $mysqli->query($sql);
                    ?>
                    <br>
                    <p class="alert alert-primary" role="alert">Autor editado correctamente </p>
                    <br>

                    <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php

                }
                ?>

            </div>
        </main>
</body>

</html>