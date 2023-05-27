<?php

require '../../conexion.php';
$id_libro = $_GET['id_libro'];

$sql = "Select * from libros where id_libro='$id_libro'";
$resultado = $mysqli->query($sql);

$autores = "Select * from autores";
$resultado1 = $mysqli->query($autores);

$editorial = "Select * from editorial";
$resultado2 = $mysqli->query($editorial);
session_start();
$rango = $_SESSION['rango'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar libro</title>
    <link rel="stylesheet" href="../paneldecontrol.css">
    <link rel="icon" href="../../images/Acero.ico" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <a class="navbar-brand" href="../iniciopanel.php">
                            <img src="../../images/Acero.ico"> Panel de control
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
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

    
        <section id='Listado_libros'>
            <div class="formu">
            <form action="editar_libro2.php" method="get" class="col-3" autocomplete="off">
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

                    <input type="submit" class="btn btn-primary" value="Actualizar libro">


                <?php
                }
                ?>
            </form>
            </div>
        </section>
    



</body>

</html>