<?php

    require '../conexion.php';
    $sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
    $todo = $mysqli->query($sqljoin);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="paneldecontrol.css">
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
                        <h3><a href="editar_usuario.php">Tus datos</a></h3>
                    </li>
                    <li>
                        <h3><a href="editar_libro.php">Edicion de libros</a></h3>
                    </li>
                    <li>
                        <h3><a href="eliminar_libro.php">Borrado de libros</a></h3>
                    </li>
                </ul>
            </nav>
        </header>

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


                            <input type="hidden" name="id_libro" value="<?php echo $fila['id_libro'] ?>">
                            <input type="submit" value="Eliminar libro">
                            <br><br>
                        </form>
                       
                        <?php
                    }
                    ?>
                </section>



    </div>
</body>

</html>