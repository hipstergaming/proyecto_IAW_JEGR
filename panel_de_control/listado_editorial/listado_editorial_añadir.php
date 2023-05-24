<?php
require '../../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Nueva editorial</title>
    <link rel="stylesheet" href="../paneldecontrol.css">
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
                </ul>
            </nav>
        </header>


        <section class="editorial">
            <H1>Agregar nueva editorial</H1>
            <br>
            <br>

            <form action="listado_usuarios_editar2.php" method="post">
                    <label for="nombre_ed"> Nombre de la nueva editorial:
                        <input type="text" name="nombre_ed">
                    </label>
                    <br><br>

                    <label for="telefono"> Contraseña:
                        <input type="number" name="telefono" >
                    </label>
                    <br><br>

                    <label for="direccion"> Correo electronico:
                        <input type="text" name="direccion">
                    </label>
                    <br><br>

                    <label for="CIF"> Direccion:
                        <input type="text" name="CIF" >
                    </label>
                    <br><br>

                    <input type="hidden" name="id_editorial">
                    <br><br>

                    <input type="submit" value="Agregar" name="Enviar">

        </section>



    </div>
</body>

</html>