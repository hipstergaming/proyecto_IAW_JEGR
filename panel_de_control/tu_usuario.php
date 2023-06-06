<?php
require '../conexion.php';
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);

$nuevo = 'usuario';
session_start();
$rango = $_SESSION['rango'];
$id_usu = $_SESSION['id_usu'];
$usuario = "Select * from usuarios where id_usuario = $id_usu";
$datos_usu = $mysqli->query($usuario);

$todos_usuarios = "Select * from usuarios";
$resultado_usuarios = $mysqli->query($todos_usuarios);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar tus datos</title>
    <link rel="stylesheet" href="paneldecontrol.css">
    <link rel="icon" href="../images/Acero.ico" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        function confirmacion() {
            var respuesta = confirm("¿Estás seguro de que deseas visitar este enlace?");

            if (respuesta) {
                window.location.href = "borrar.php?id_usuario=<?php echo $id_usu ?>&nuevo=tuusuario";
            }
        }
    </script>
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

        <section class="tus_datos">
            <br>
            <H1>Bienvenido a tu cuenta</H1>
            <br>
            <div class="formu">
                <section>
                    <h3>Edite sus datos aquí:</h3>
                    <form action="editar2.php" method="post" class="col" name="editar" autocomplete="off">
                        <?php
                        while ($fila = $datos_usu->fetch_assoc()) {
                        ?>
                            <div class="form-floating mb-3">
                                <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['usuario'] ?>" required>
                                <label for="floatingInput"> Usuario:</label>

                                <br>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="contra" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput"> Contraseña:</label>

                                <br>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="mail" name="correo" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['correo_electronico'] ?>" required>
                                <label for="floatingInput"> Correo electronico:</label>
                                <br>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="direccion" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['direccion'] ?>" required>
                                <label for="floatingInput"> Direccion:</label>
                                <br>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name="telefono" class="form-control" id="floatingInput" placeholder="" value="<?php echo $fila['telefono'] ?>" required>
                                <label for="floatingInput"> Teléfono:</label>
                                <br>
                            </div>

                            <input type="hidden" name="nuevo" value="usuario">
                            <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'] ?>">
                            <input type="submit" class="btn btn-primary col-12" value="Actualiza tus datos" name="Enviar">
                        <?php
                        }
                        ?>
                    </form>
                    <p>Si desea dar de baja su usuario pulse <a onclick="confirmacion(); return false" href="borrar.php?id_usuario=<?php echo $id_usu ?>&nuevo=tuusuario">aquí</a></p>
                </section>

            </div>

        </section>



    </div>

</body>

</html>