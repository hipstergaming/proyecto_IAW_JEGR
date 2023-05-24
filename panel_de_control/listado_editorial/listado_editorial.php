<?php
require '../../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];

$editorial = "Select * from editorial";
$resultado = $mysqli->query($editorial);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Listado editorial</title>
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
                    <li>
                        <h3><a href="../../index.php" >Volver al index</a></h3>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <section>
                <h2>Listado de editoriales:</h2>
                <br>
                <br>
                <a href="listado_editorial_añadir.php">Añadir nueva editorial</a>
                <table class="tabla">
                    <tr>
                        <th>id_editorial</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>CIF</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $fila['id_editorial'] ?></td>
                            <td><?php echo $fila['Nombre_ed'] ?></td>
                            <td><?php echo $fila['Telefono'] ?></td>
                            <td><?php echo $fila['Direccion'] ?></td>
                            <td><?php echo $fila['CIF'] ?></td>
                            <td><a href="listado_editorial_editar.php?id_editorial=<?php echo $fila['id_editorial'] ?>">Editar</a></td>
                            <td><a href="listado_editorial_borrar.php?id_editorial=<?php echo $fila['id_editorial'] ?>">Eliminar</a></td>

                        </tr>
                    

                    <?php
                    }
                    ?>
                </table>
            </section>
        </main>

    </div>
</body>