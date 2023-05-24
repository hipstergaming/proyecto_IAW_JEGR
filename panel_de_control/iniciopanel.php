<?php
require '../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];
$rango = $_SESSION['rango'];
// echo $rango;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Panel de control</title>
    <link href="paneldecontrol.css" rel="stylesheet">
    <link rel="icon" href="../images/Acero.ico" type="image/png">
    <script src="javascript.js"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
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
                        <h3><a href="../index.php">Volver al index</a></h3>
                    </li>
                </ul>
            </nav>
        </header>

        <section>
            <h1>Bienvenido al maravilloso panel de control</h1>
            <a href="../index.php">Volver al index</a>
        </section>

    </div>
</body>

</html>