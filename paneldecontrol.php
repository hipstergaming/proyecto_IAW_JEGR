<?php
require 'conexion.php';
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);

session_start();

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <title>Panel de control del Cosmere</title>
</head>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable();
    });

    function mostrarlibros() {
        document.getElementById('Listado_libros').style.display = 'block';
    }
</script>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .contenedor {
        /* width: 90%; */
        /* max-width: 1000px; */

        display: flex;
        flex-wrap: wrap;
    }

    #boton {
        height: 50px;
    }

    nav {
        width: 100%;

        background-color: blue;
        display: flex;
        flex-direction: row;
        justify-content: space-arround;
    }

    section {
        width: 70%;
        display: flex;
        flex-direction: column;
    }

    #Listado_libros {
        display: block;
    }

    #Editar_usuario {
        display: none;
    }

    #Listado_usuarios {
        display: none;
    }
</style>

<body>
    <?php
    echo "Hola ", $_SESSION['usuario'], $_SESSION['rango'], " bienvenido al maravilloso panel de control";
    echo "<br>";
    if (isset($_SESSION)) {
        if ($_SESSION["rango"] == "ADMIN") {
            echo "Eres administrador, menu completo";
    ?>
            <div class="contenedor">
                <nav>
                    <button id="boton">Tu cuenta</button>
                    <button id="boton">Listado de usuarios</button>
                    <button id="boton" onclick="mostrarlibros();">Listado de libros</button>
                </nav>
                <!-- ///////////////////////////////////////////////TU CUENTA//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <section id='Editar_usuario'>
                    <H1>Bienvenido a tu cuenta</H1>
                    <br>
                    <br>
                    <form action="paneldecontrol.php" method="post">
                        <?php
                        while ($fila = $datos_usu->fetch_assoc()) {
                        ?>
                            <label for="Usuario"> Usuario:
                                <input type="text" name="Usuario" id='usuario' placeholder="<?php echo $fila['usuario'] ?>" value="<?php echo $fila['usuario'] ?>">
                            </label>
                            <br><br>
                            <label for="contra"> Contraseña:
                                <input type="password" name="contra" id='contra' placeholder="<?php echo $fila['contraseña'] ?>" value="<?php echo $fila['contraseña'] ?>">
                            </label>
                            <br><br>
                            <label for="correo"> Correo electronico:
                                <input type="mail" name="correo" id='correo' placeholder="<?php echo $fila['correo_electronico'] ?>" value="<?php echo $fila['correo_electronico'] ?>">
                            </label>
                            <br><br>
                            <label for="direccion"> Direccion:
                                <input type="mail" name="direccion" id='direccion' placeholder="<?php echo $fila['direccion'] ?>" value="<?php echo $fila['direccion'] ?>">
                            </label>
                            <br><br>
                            <label for="correo"> Teléfono:
                                <input type="number" name="telefono" id='telefono' placeholder="<?php echo $fila['telefono'] ?>" value="<?php echo $fila['telefono'] ?>">
                            </label>

                            <br><br>
                            <input type="submit" value="Actualiza tus datos" name="Enviar">
                        <?php
                        }
                        ?>
                    </form>
                </section>
                <!-- ///////////////////////////////////////////////LISTADO DE USUARIOS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <section id='Listado_usuarios'>
                    <div class="row">
                        <h2>Lista de libros a la venta:</h2>
                    </div>

                </section>

                <!-- ///////////////////////////////////////////////LISTADO DE LIBROS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <section id='Listado_libros'>
                    <div class="row">
                        <h2>Lista de libros a la venta:</h2>
                    </div>
                    <br>
                    <br>
                    <?php


                    while ($fila = $todo->fetch_assoc()) {
                    ?>
                        <form action="opciones_admin/editar_libro.php" method="get" id="compra" name="compra" autocomplete="off">
                            <h2><?php echo $fila['Titulo'] ?></h2>

                            <label for="Titulo">Titulo</label>
                            <br>
                            <input type="text" name="Titulo" size="50" value="<?php echo $fila['Titulo'] ?>">
                            <br><br>

                            
                            <label for="Cantidad disponible">Cantidad_disponible</label>
                            <br>
                            <input type="number" name="Cantidad disponible" value="<?php echo $fila['cantidad_dis'] ?>">
                            <br><br>

                            <label for="ISBN">ISBN</label>
                            <br>
                            <input type="number" name="ISBN" value="<?php echo $fila['ISBN'] ?>">
                            <br><br>

                            <input type="hidden" name="id_libro" value="<?php echo $fila['id_libro'] ?>">
                            <input type="submit" value="Actualizar libro">
                            <br><br>
                        </form>
                       
                        <?php
                    }
                    ?>
                </section>

            </div>




            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
        <?php
        } elseif ($_SESSION["rango"] == "CLIENTE") {
            echo "Eres cliente, menu incompleto";
        ?>
    <?php
        }
    } else {
        echo "Error, no estas logueado";
    }
    ?>
</body>

</html>