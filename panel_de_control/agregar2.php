<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
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
            <div class="formu">
                <!-- ###########EDITORIAL################# -->
                <?php
                if ($nuevo == 'editorial') {
                    $editorial = "Select * from editorial";
                    $resultado = $mysqli->query($editorial);
                    $nombre_ed = $_POST['nombre_ed'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $CIF = $_POST['CIF'];
                    $existe = 0;

                    while ($fila = $resultado->fetch_assoc()) {
                        if ($fila['Nombre_ed'] == $nombre_ed) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y deja el 0";
                        }
                    }

                    if ($existe == 1) {
                ?>
                        <p class="alert alert-danger">Error, esa editorial ya existe</p>
                        <a href="iniciopanel.php">Volver</a>
                    <?php

                    } else {
                        $sql = "insert into editorial (Nombre_ed, telefono, direccion, CIF) values ('$nombre_ed','$telefono','$direccion','$CIF')";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Editorial agregada corractamente al sistema</p>
                        <br>

                        <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>

                    <!-- ###########LIBRO################# -->
                    <?php
                } elseif ($nuevo == 'libro') {
                    $sql1 = "Select * from libros";
                    $resultado = $mysqli->query($sql1);

                    $titulo = $_POST['titulo'];
                    $cantidad = $_POST['cantidad'];
                    $ISBN = $_POST['ISBN'];
                    $autor = $_POST['autor'];
                    $editorial = $_POST['editorial'];
                    $existe = 0;

                    while ($fila = $resultado->fetch_assoc()) {
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
                        <a href="iniciopanel.php">Volver</a>
                    <?php

                    } else {
                        $sql = "insert into libros (Titulo, cantidad_dis, ISBN, id_autor, id_editorial) values ('$titulo','$cantidad','$ISBN','$autor','$editorial')";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Libro agregado correctamente a la Base de datos</p>
                        <br>

                        <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>

                    <!-- ###########USUARIO################# -->
                    <?php
                } elseif ($nuevo == 'usuario') {
                    $sql1 = "Select * from usuarios";
                    $resultado = $mysqli->query($sql1);
                    $usuario = $_POST['usuario'];
                    $contraseña = $_POST['contra'];
                    $contraseña_segura = password_hash($contraseña, PASSWORD_DEFAULT);
                    $tlf = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $correo = $_POST['correo'];
                    $rango = $_POST['rango'];
                    // Creo un contador para comprobar
                    $existe = 0;


                    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
                    // En ambos casos te pondran un enlace al index.php
                    while ($fila = $resultado->fetch_assoc()) {
                        if ($fila['usuario'] == $usuario) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y pone 0";
                        }
                    }
                    if ($existe == 1) {

                    ?>
                        <p class="alert alert-danger">Error, el usuario ya existe</p>
                        <a href="iniciopanel.php">Volver</a>
                    <?php

                    } else {
                        $sql = "insert into usuarios (usuario, contraseña, correo_electronico, rango, direccion, telefono) values ('$usuario','$contraseña_segura','$correo','$rango','$direccion','$tlf')";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Usuario creado con éxito</p>
                        <br>

                        <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }
                    ?>

                    </form>
                    <!-- ###########AUTOR################# -->
                    <?php
                } elseif ($nuevo == 'autor') {
                    $sql1 = "Select * from autores";
                    $resultado = $mysqli->query($sql1);
                    $existe = 0;
                    $nombre=$_POST['nombre'];


                    // Compruebo si el usuario existe, si existe, da un error de alerta, si no existe, se inicia la consulta y da la alerta de bienvenida.
                    // En ambos casos te pondran un enlace al index.php
                    while ($fila = $resultado->fetch_assoc()) {
                        if ($fila['Nombre'] == $nombre) {
                            $existe = 1;
                            // echo "Se mete en existe y puso 1";
                        } else {
                            // echo "Se mete en existe y pone 0";
                        }
                    }
                    if ($existe == 1) {
                    ?>

                        <p class="alert alert-danger">Error, el usuario ya existe</p>
                        <a href="listado_usuarios_registrar.php" class='btn btn-primary'>Volver</a>
                    <?php

                    } else {
                        $sql = "insert into autores (Nombre) values ('$nombre')";
                        $resultado = $mysqli->query($sql);
                    ?>
                        <br>
                        <p class="alert alert-primary" role="alert">Autor creado con éxito</p>
                        <br>

                        <a href="iniciopanel.php" class='btn btn-primary'>Regresar</a>
                    <?php
                    }


                    ?>
                <?php
                }
                ?>

            </div>
        </main>
</body>

</html>