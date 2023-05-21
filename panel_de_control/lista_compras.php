<?php
require '../conexion.php';
session_start();

$id_usu=$_SESSION['id_usuario'];
// $recoger_lista = "select * from compras where id_usuario = $id_usu";
// $resultado = $mysqli->query($resultado);
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial and id_usuario=$id_usu";
$todo = $mysqli->query($sqljoin);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../paneldecontrol.css">
</head>

<body>

    <div class="container">
    <header>
            <nav>
                <ul class="menu">
                    <li>
                        <h3><a href="../iniciopanel.php">Inicio</a></h3>
                    </li>
                    <li>
                        <h3><a href="../tu_usuario/editar_usuario.php">Tus datos</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_usuarios/listado_usuarios.php">Listado de usuarios</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_libros/lista_libros.php">Edicion de libros</a></h3>
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
                        <th>Nombre</th>
                        <th>Titulo</th>
                        <th>Cantidad comprada</th>
                        <th>Fecha compra</th>
                    </tr>
                    <?php
                    while ($fila = $todo->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $fila['id_usuario'] ?></td>
                            <td><?php echo $fila['usuario'] ?></td>
                            <td><?php echo $fila['rango'] ?></td>
                            <td><a href="listado_usuarios_editar.php?id_usuario=<?php echo $fila['id_usuario'] ?>">Editar</a></td>
                            <td><a href="listado_usuarios_borrar.php?id_usuario=<?php echo $fila['id_usuario'] ?>">Eliminar</a></td>

                        </tr>
                    

                    <?php
                    }
                    ?>
                </table>
            </section>
        </main>

    </div>
</body>