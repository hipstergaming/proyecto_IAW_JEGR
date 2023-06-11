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
                    $id_editorial = $_GET['id_editorial'];
                    $editorial = "Select * from editorial where id_editorial='$id_editorial'";
                    $resultado = $mysqli->query($editorial);

                ?>


                    <h1>Editar editorial</h1>
                    <form action="editar2.php" method="POST" class="col" name="editar" autocomplete="off">
                        <?php
                        while ($fila = $resultado->fetch_assoc()) {
                        ?>
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre_ed" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['Nombre_ed'] ?>">
                                <label for="floatingInput"> Nombre</label>

                                <br>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="telefono" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['Telefono'] ?>">
                                <label for="floatingInput"> Telefono</label>

                                <br>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="direccion" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['Direccion'] ?>">
                                <label for="floatingInput"> Direccion</label>

                                <br>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="CIF" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['CIF'] ?>">
                                <label for="floatingInput"> CIF</label>
                                <br>
                            </div>


                            <input type="hidden" name="id_editorial" value="<?php echo $fila['id_editorial'] ?>">
                            <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">

                            <input type="submit" class="btn btn-primary" value="Actualiza tus datos" name="Enviar">
                        <?php
                        }
                        ?>

                        <!-- ###########LIBRO################# -->
                    <?php
                } elseif ($nuevo == 'libro') {
                    $id_libro = $_GET['id_libro'];

                    $sql = "Select * from libros where id_libro='$id_libro'";
                    $resultado = $mysqli->query($sql);

                    $autores = "Select * from autores";
                    $resultado1 = $mysqli->query($autores);

                    $editorial = "Select * from editorial";
                    $resultado2 = $mysqli->query($editorial);

                    ?>
                        <form action="editar2.php" method="POST" class="col" name="registro" autocomplete="off">
                            <br>
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                            ?>
                                <h2><?php echo $fila['Titulo'] ?></h2>

                                <div class="form-floating mb-3">
                                    <label for="floatingInput">Titulo</label>
                                    <br>
                                    <input type="text" name="Titulo" size="50" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['Titulo'] ?>">
                                    <br>
                                </div>

                                <div class="form-floating mb-3">

                                    <input type="number" name="Cantidad_disponible" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['cantidad_dis'] ?>">
                                    <label for="floatingInput">Cantidad_disponible</label>
                                    <br>
                                </div>

                                <div class="form-floating mb-3">

                                    <input type="number" name="ISBN" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['ISBN'] ?>">
                                    <label for="floatingInput">ISBN</label>
                                    <br>
                                </div>


                                <div class="form-floating mb-3">
                                    <select name='autor' class="form-select" id="floatingSelect">
                                        <?php
                                        while ($fila = $resultado1->fetch_assoc()) {

                                            echo "<option value=", $fila['id_autor'], ">", $fila['Nombre'], "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Autor:</label>

                                    <br>
                                </div>


                                <div class="form-floating mb-3">
                                    <select name='editorial' class="form-select" id="floatingSelect">
                                        <?php
                                        while ($fila = $resultado2->fetch_assoc()) {
                                            echo "<option value=", $fila['id_editorial'], ">", $fila['Nombre_ed'], "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Editorial:</label>

                                    <br>
                                </div>
                                <input type="hidden" name="id_libro" value="<?php echo $id_libro ?>">
                                <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                                <input type="submit" class="btn btn-primary" value="Actualizar libro">


                            <?php
                            }
                            ?>
                        </form>
                        <!-- ###########USUARIO################# -->
                    <?php
                } elseif ($nuevo == 'usuario') {

                    $id_usu = $_GET['id_usuario'];

                    $el_usuario = "Select * from usuarios where id_usuario='$id_usu'";
                    $resultado_usuario = $mysqli->query($el_usuario);
                    ?>

                        <H1>Editar usuario</H1>
                        <form action="editar2.php" method="POST" class="col" name="registro" autocomplete="off">
                            <?php
                            while ($fila = $resultado_usuario->fetch_assoc()) {
                            ?>
                                <div class="form-floating mb-3">
                                    <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['usuario'] ?>">
                                    <label for="floatingInput"> Usuario:</label>

                                    <br>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="contra" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['contraseña'] ?>">
                                    <label for="floatingInput"> Contraseña:</label>

                                    <br>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="mail" name="correo" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['correo_electronico'] ?>">
                                    <label for="floatingInput"> Correo electronico:</label>

                                    <br>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="direccion" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['direccion'] ?>">
                                    <label for="floatingInput"> Direccion:</label>

                                    <br>
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="rango" class="form-select" id="floatingSelect">
                                        <option selected>Selecciona el rango</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="CLIENTE">CLIENTE</option>
                                    </select>
                                    <label for="floatingSelect"> Rango:</label>
                                    <br>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="telefono" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['telefono'] ?>">
                                    <label for="floatingInput"> Teléfono:</label>

                                </div>

                                <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'] ?>">
                                <br>

                                <input type="submit" value="Actualiza tus datos" class="btn btn-primary" name="Enviar">
                            <?php
                            }
                            ?>

                            <form>
                                <!-- ###########AUTOR################# -->
                            <?php
                        } elseif ($nuevo == 'autor') {
                            $id_autor = $_GET['id_autor'];

                            $el_autor = "Select * from autores where id_autor='$id_autor'";
                            $resultado_autor = $mysqli->query($el_autor);
                            ?>
                                <h1> Editar autor</h1>

                                <form action="editar2.php" method="POST" class="col" name="registro" autocomplete="off">
                                    <?php
                                    while ($fila = $resultado_autor->fetch_assoc()) {
                                    ?>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['Nombre'] ?> " required>
                                            <label for="floatingInput">Nombre de autor</label>

                                        </div>
                                        <input type="hidden" name="id_autor" value="<?php echo $fila['id_autor'] ?>">
                                        <input type="hidden" name="nuevo" value="<?php echo $nuevo ?>">
                                        <input type="submit" value="Registrar" class='btn btn-primary col-12'>
                                    <?php
                                    }
                                    ?>

                                </form>

                            <?php
                        }
                            ?>

            </div>
        </main>
</body>

</html>