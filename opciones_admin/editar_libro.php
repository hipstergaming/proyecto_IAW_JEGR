<?php
require '../conexion.php';
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);

// session_start();

// $id_usu = $_SESSION['id_usu'];
// $usuario = "Select * from usuarios where id_usuario = $id_usu";
// $datos_usu = $mysqli->query($usuario);

// $todos_usuarios = "Select * from usuarios";
// $resultado_usuarios = $mysqli->query($todos_usuarios);
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
                <li><h3><a href="editar_usuario.php">Tus datos</a></h3></li>
                <li><h3><a href="editar_libro.php">Edicion de libros</a></h3></li>
                <li><h3><a href="eliminar_libro.php">Borrado de libros</a></h3></li>
            </ul>
        </nav>
    </header>
    



    </div>
    </body>
</html>