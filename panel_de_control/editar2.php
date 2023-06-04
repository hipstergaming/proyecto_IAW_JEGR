<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
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

                    while ($fila = $resultado_editoriales->fetch_assoc()) {
                        if ($fila['Nombre_ed'] == $titulo) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y deja el 0";
                        }
                    }
                    if ($existe == 1) {

                ?>
                        <p class="alert alert-danger">Error, la editorial ya existe</p>
                        <a href="index.php">Volver</a>
                    <?php

                    } else {
                        $sql = "update editorial set Nombre_ed='$nombre_ed', Telefono='$telefono', Direccion='$direccion', CIF='$CIF' where id_editorial='$id_editorial'";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Editorial editada correctamente</p>
                        <br>

                        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>

                    <!-- ###########LIBRO################# -->
                    <?php
                } elseif ($nuevo == 'libro') {
                    $sql = "Select * from libros ";
                    $resultado_libros = $mysqli->query($sql);

                    $id_libro = $_GET['id_libro'];


                    $titulo = $_GET['Titulo'];
                    $cantidad = $_GET['Cantidad_disponible'];
                    $ISBN = $_GET['ISBN'];
                    $autor = $_GET['autor'];
                    $editorial = $_GET['editorial'];
                    $existe = 0;


                    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
                    // En ambos casos te pondran un enlace al index.php
                    while ($fila = $resultado_libros->fetch_assoc()) {
                        if ($fila['Titulo'] == $titulo) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y deja el 0";
                        }
                    }


                    if ($existe == 1) {

                    ?>
                        <p class="alert alert-danger">Error, el libro ya existe</p>
                        <a href="index.php">Volver</a>
                    <?php

                    } else {
                        $sql = "update editorial set Nombre_ed='$nombre_ed', Telefono='$telefono', Direccion='$direccion', CIF='$CIF' where id_editorial='$id_editorial'";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Libro editado correctamente</p>
                        <br>

                        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
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
                    $contraseña_segura= password_hash($contra, PASSWORD_DEFAULT);
                    $correo = $_POST['correo'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    

                    while ($fila = $resultado_usuarios->fetch_assoc()) {
                        if ($fila['usuario'] == $titulo) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y deja el 0";
                        }
                    }


                    if ($existe == 1) {

                    ?>
                        <p class="alert alert-danger">Error, el usuario ya existe</p>
                        <a href="index.php">Volver</a>
                    <?php

                    } else {
                        $sql = "update usuarios set usuario='$usuario', contraseña='$contraseña_segura', correo_electronico='$correo', direccion='$direccion', telefono='$telefono' where id_usuario='$id_usu'";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Usuario editado correctamente </p>
                        <br>

                        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>


                    <!-- ###########AUTOR################# -->
                    <?php
                } elseif ($nuevo == 'autor') {
                    $id_autor = $_GET['id_autor'];
                    $nombre = $_GET['nombre'];

                    $sql = "Select * from autores";
                    $resultado_autores = $mysqli->query($sql);

                    while ($fila = $resultado_autores->fetch_assoc()) {
                        if ($fila['Nombre'] == $titulo) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y deja el 0";
                        }
                    }
                    if ($existe == 1) {

                    ?>
                        <p class="alert alert-danger">Error, el autor ya existe</p>
                        <a href="index.php">Volver</a>
                    <?php

                    } else {
                        $sql = "update autores set Nombre='$nombre' where id_autor='$id_autor'";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Autor editado correctamente </p>
                        <br>

                        <a href="../iniciopanel.php" class='btn btn-primary'>Regresar</a>
                <?php
                    }
                }
                ?>

            </div>
        </main>
</body>

</html>