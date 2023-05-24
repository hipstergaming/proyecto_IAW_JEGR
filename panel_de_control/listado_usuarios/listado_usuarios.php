<?php
require '../../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];

$todos_usuarios = "Select * from usuarios";
$resultado_usuarios = $mysqli->query($todos_usuarios);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Listado usuarios</title>
        <link rel="stylesheet" href="../paneldecontrol.css">
        <link rel="icon" href="../images/Acero.ico" type="image/png">
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
                        <h3><a href="../lista_compras.php">Lista de tus compras</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_usuarios/listado_usuarios.php" id="admin">Listado de usuarios</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_libros/lista_libros.php" id="admin">Edicion de libros</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_editorial/listado_editorial.php" id="admin">Listado de editorial</a></h3>
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
                        <th>Id_usuario</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    while ($fila = $resultado_usuarios->fetch_assoc()) {
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