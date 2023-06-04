<?php
require '../conexion.php';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
$nuevo = $_GET['nuevo'];
echo $nuevo;

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

                ?>
                    <h1>Nueva editorial para la libreria</h1>
                    <form action="agregar2.php" method="get" class="col" name="registro" autocomplete="off">
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre_ed" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput"> Nombre</label>

                            <br>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="telefono" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput"> Telefono</label>

                            <br>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="direccion" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput"> Direccion</label>

                            <br>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="CIF" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput"> CIF</label>
                            <br>
                        </div>

                        <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                        <input type="submit" class="btn btn-primary" value="Actualiza tus datos" name="Enviar">



                        <!-- ###########LIBRO################# -->
                    <?php
                } elseif ($nuevo == 'libro') {
                    $autores = "Select * from autores";
                    $resultado1 = $mysqli->query($autores);

                    $editoriales = "Select * from editorial";
                    $resultado2 = $mysqli->query($editoriales);
                    ?>
                        <h1> Nuevo libro para la libreria</h1>
                        <form action="agregar2.php" method="get" class="col" name="registro" autocomplete="off">

                            <div class="form-floating mb-3">
                                <input type="text" name="titulo" class="form-control" placeholder="" required>
                                <label class="form-floating mb-3">Titulo del libro</label>

                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name="cantidad" class="form-control" placeholder="" required>
                                <label for="floatingInput">Cantidad en stock</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" name="ISBN" class="form-control" placeholder="" required>
                                <label for="floatingInput">ISBN</label>
                            </div>


                            <div class="form-floating mb-3">
                                <select name='autor' class="form-select" id="floatingSelect">
                                    <option selected>Selecciona el Autor</option>
                                    <?php
                                    while ($fila = $resultado1->fetch_assoc()) {

                                        echo "<option value=", $fila['id_autor'], ">", $fila['Nombre'], "</option>";
                                    }
                                    ?>
                                </select>
                                <label for="floatingSelect">Autor</label>
                            </div>


                            <div class="form-floating mb-3">
                                <select name="editorial" class="form-select" id="floatingSelect">
                                    <option selected>Selecciona la editorial</option>
                                    <?php
                                    while ($fila = $resultado2->fetch_assoc()) {

                                        echo "<option value=", $fila['id_editorial'], ">", $fila['Nombre_ed'], "</option>";
                                    }
                                    ?>
                                </select>
                                <label for="floatingSelect">Editorial</label>
                            </div>


                            <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                            <input type="submit" value="Agregar" class='btn btn-primary col-12'>


                        </form>
                        <!-- ###########USUARIO################# -->
                    <?php
                } elseif ($nuevo == 'usuario') {
                    ?>
                        <h1> Nuevo usuario para la libreria</h1>

                        <form action="agregar2.php" method="get" class="col" name="registro" autocomplete="off">

                            <div class="form-floating mb-3">
                                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre de usuario</label>

                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="contra" class="form-control" placeholder="" required>
                                <label for="floatingInput">Contraseña</label>

                            </div>

                            <div class="form-floating mb-3">
                                <input type="mail" name="correo" class="form-control" placeholder="" required>
                                <label for="floatingInput">Correo electrónico</label>

                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name="telefono" maxlength="9" class="form-control" placeholder="" required>
                                <label for="floatingInput">Teléfono</label>

                            </div>

                            <div class="form-floating mb-3"></label>
                                <input type="text" name="direccion" class="form-control" placeholder="Calle ..." required>
                                <label for="floatingInput">Dirección</label>

                            </div>

                            <div class="form-floating mb-3">
                                <select name="rango" class="form-select" id="floatingSelect">
                                    <option selected>Selecciona el rango</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USUARIO">USUARIO</option>
                                </select>
                                <label for="floatingSelect"> Rango:</label>

                            </div>

                            <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                            <input type="submit" value="Registrar" class='btn btn-primary col-12'>


                        </form>
                        <!-- ###########AUTOR################# -->
                    <?php
                } elseif ($nuevo == 'autor') {
                    ?>
                        <h1> Nuevo autor para la libreria</h1>

                        <form action="agregar2.php" method="get" class="col" name="registro" autocomplete="off">

                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre de autor</label>

                            </div>

                            <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                            <input type="submit" value="Registrar" class='btn btn-primary col-12'>


                        </form>


                    <?php
                }
                    ?>

            </div>
        </main>
</body>

</html>