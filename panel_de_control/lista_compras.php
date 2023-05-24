<?php
require '../conexion.php';
session_start();

$id_usu=$_SESSION['id_usu'];
$sqljoin = "Select * from autores,libros, editorial, compras, usuarios where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial and libros.id_libro=compras.id_libro and usuarios.id_usuario=compras.id_usuario and compras.id_usuario=$id_usu";
$todo = $mysqli->query($sqljoin);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Tu lista de compras</title>
    <link rel="stylesheet" href="paneldecontrol.css">
    <link rel="icon" href="../images/Acero.ico" type="image/png">
        <!-- <script src="javascript.js"></script> -->
</head>

<body>

    <div class="container">
    <header>
            <nav>
                <ul class="menu">
                    <li>
                        <h3><a href="iniciopanel.php">Inicio</a></h3>
                    </li>
                    <li>
                        <h3><a href="tu_usuario/editar_usuario.php">Tus datos</a></h3>
                    </li>
                    <li>
                        <h3><a href="lista_compras.php">Lista de tus compras</a></h3>
                    </li>
                    <li>
                        <h3><a href="listado_usuarios/listado_usuarios.php" id="admin">Listado de usuarios</a></h3>
                    </li>
                    <li>
                        <h3><a href="listado_libros/lista_libros.php" id="admin">Edicion de libros</a></h3>
                    </li>
                    <li>
                        <h3><a href="listado_editorial/listado_editorial.php" id="admin">Listado de editorial</a></h3>
                    </li>
                    <li>
                        <h3><a href="../index.php" >Volver al index</a></h3>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <section>
                <h2>Lista de usuarios:</h2>
                <br>
                <br>
                <a href="listado_usuarios_registrar.php">Registrar usuario nuevo</a>
                <table class="tabla">
                    <tr>
                        <th>id_compra</th>
                        <th>Titulo</th>
                        <th>Cantidad comprada</th>
                        <th>Fecha compra</th>
                    </tr>
                    <?php
                    while ($fila = $todo->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $fila['id_compra'] ?></td>
                            <td><?php echo $fila['Titulo'] ?></td>
                            <td><?php echo $fila['cantidad_comprada'] ?></td>
                            <td><?php echo $fila['fecha_compra'] ?></td>


                        </tr>
                    

                    <?php
                    }
                    ?>
                </table>
            </section>
        </main>

    </div>
</body>