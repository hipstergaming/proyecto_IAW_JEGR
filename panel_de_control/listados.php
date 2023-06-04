<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
$nuevo= $_GET['nuevo']


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
            <!-- ###########EDITORIAL################# -->
            <?php
            if ($nuevo == 'editorial') {
                $editorial = "Select * from editorial";
                $resultado = $mysqli->query($editorial);
            ?>

                <section>
                    <h2>Listado de editoriales:</h2>
                    <br>
                    <br>
                    <table class="table table-striped table-light table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>id_editorial</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>CIF</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $fila['id_editorial'] ?></td>
                                    <td><?php echo $fila['Nombre_ed'] ?></td>
                                    <td><?php echo $fila['Telefono'] ?></td>
                                    <td><?php echo $fila['Direccion'] ?></td>
                                    <td><?php echo $fila['CIF'] ?></td>
                                    <td><a href="editar.php?id_editorial=<?php echo $fila['id_editorial'] ?>&nuevo=editorial">Editar</a></td>
                                    <td><a href="borrar.php?id_editorial=<?php echo $fila['id_editorial'] ?>&nuevo=editorial">Eliminar</a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>

                <!-- ###########LIBRO################# -->
            <?php
            } elseif ($nuevo == 'libro') {
                $sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
                $todo = $mysqli->query($sqljoin);
            ?>
                <section>
                    <h2>Listado de libros:</h2>
                    <br>
                    <br>
                    <table class="table table-striped table-light table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Cantidad_disponible</th>
                                <th>ISBN</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fila = $todo->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $fila['Titulo'] ?></td>
                                    <td><?php echo $fila['cantidad_dis'] ?></td>
                                    <td><?php echo $fila['ISBN'] ?></td>
                                    <td><a href="editar.php?id_libro=<?php echo $fila['id_libro'] ?>&nuevo=libro">Editar</a></td>
                                    <td><a href="borrar.php?id_libro=<?php echo $fila['id_libro'] ?>&nuevo=libro">Eliminar</a></td>

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
                <!-- ###########USUARIO################# -->
            <?php
            } elseif ($nuevo == 'usuario') {
                $todos_usuarios = "Select * from usuarios";
                $resultado_usuarios = $mysqli->query($todos_usuarios);
            ?>
                <section>
                    <h2>Listado de usuarios:</h2>
                    <br>
                    <br>
                    <table class="table table-striped table-light table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>Id_usuario</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fila = $resultado_usuarios->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $fila['id_usuario'] ?></td>
                                    <td><?php echo $fila['usuario'] ?></td>
                                    <td><?php echo $fila['rango'] ?></td>
                                    <td><a href="editar.php?id_usuario=<?php echo $fila['id_usuario'] ?>&nuevo=usuario">Editar</a></td>
                                    <td><a href="borrar.php?id_usuario=<?php echo $fila['id_usuario'] ?>&nuevo=usuario">Eliminar</a></td>

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </section>
                <!-- ###########AUTOR################# -->
            <?php
            } elseif ($nuevo == 'autor') {
                $todos_autores = "Select * from autores";
                $resultado_autores= $mysqli->query($todos_autores);
            ?>
                <section>
                    <h2>Listado de autores:</h2>
                    <br>
                    <br>
                    <table class="table table-striped table-light table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>Id_autor</th>
                                <th>Nombre</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($fila = $resultado_autores->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $fila['id_autor'] ?></td>
                                    <td><?php echo $fila['Nombre'] ?></td>
                                    <td><a href="editar.php?id_autor=<?php echo $fila['id_autor'] ?>&nuevo=autor">Editar</a></td>
                                    <td><a href="borrar.php?id_usuario=<?php echo $fila['id_autor'] ?>&nuevo=autor">Eliminar</a></td>

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </section>
            <?php
            }
            ?>
        </main>
    </div>
</body>

</html>