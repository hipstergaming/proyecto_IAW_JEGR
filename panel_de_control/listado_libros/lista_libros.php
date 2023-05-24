<?php

require '../../conexion.php';
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Listado de libros</title>
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
                <a href="agregar_libro.php">Registrar libro nuevo</a>
                <table class="tabla">
                    <tr>
                        <th>Titulo</th>
                        <th>Cantidad_disponible</th>
                        <th>ISBN</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    while ($fila = $todo->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $fila['Titulo'] ?></td>
                            <td><?php echo $fila['cantidad_dis'] ?></td>
                            <td><?php echo $fila['ISBN'] ?></td>
                            <td><a href="editar_libro.php?id_libro=<?php echo $fila['id_libro'] ?>">Editar</a></td>
                            <td><a href="eliminar_libro.php?id_libro=<?php echo $fila['id_libro'] ?>">Eliminar</a></td>

                        </tr>
                        <!-- <form action="opciones_admin/editar_usuarios2.php" method="get" id="compra" name="compra" autocomplete="off">

                        </form> -->

                    <?php
                    }
                    ?>
                </table>
            </section>
        </main>
    </div>
</body>

</html>