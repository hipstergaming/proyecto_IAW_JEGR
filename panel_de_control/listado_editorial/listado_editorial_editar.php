<?php
require '../../conexion.php';
session_start();

$id_usu = $_SESSION['id_usu'];

$id_editorial=$_GET['id_editorial'];
$editorial = "Select * from editorial where id_editorial=$id_editorial";
$resultado = $mysqli->query($editorial);
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
                    <li>
                        <h3><a href="../listado_editorial/listado_editorial.php">Listado de editorial</a></h3>
                    </li>
                    <li>
                        <h3><a href="../lista_compras.php">Lista de tus compras </a></h3>
                    </li>

                </ul>
            </nav>
        </header>
        <section class="tus_datos">
            <H1>Bienvenido al listado de usuarios</H1>
            <br>
            <br>

            <form action="listado_usuarios_editar2.php" method="post">
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                ?>
                    <label for="nombre_ed"> Usuario:
                        <input type="text" name="nombre_ed" value="<?php echo $fila['Nombre_ed'] ?>">
                    </label>
                    <br><br>

                    <label for="telefono"> Contraseña:
                        <input type="number" name="telefono" value="<?php echo $fila['Telefono'] ?>">
                    </label>
                    <br><br>

                    <label for="direccion"> Correo electronico:
                        <input type="text" name="direccion" value="<?php echo $fila['Direccion'] ?>">
                    </label>
                    <br><br>

                    <label for="CIF"> Direccion:
                        <input type="text" name="CIF"  value="<?php echo $fila['CIF'] ?>">
                    </label>
                    <br><br>

                    <input type="hidden" name="id_editorial" value="<?php echo $fila['id_editorial'] ?>">
                    <br><br>

                    <input type="submit" value="Actualiza tus datos" name="Enviar">
                <?php
                }
                ?>
        </section>



    </div>
</body>

</html>