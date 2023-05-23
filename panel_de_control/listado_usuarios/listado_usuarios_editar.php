<?php
require '../../conexion.php';
$sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
$todo = $mysqli->query($sqljoin);

session_start();

$id_usu = $_GET['id_usuario'];
$usuario = "Select * from usuarios where id_usuario = $id_usu";
$datos_usu = $mysqli->query($usuario);

$todos_usuarios = "Select * from usuarios";
$resultado_usuarios = $mysqli->query($todos_usuarios);
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
                        <h3><a href="../listado_libros/editar_libro.php">Edicion de libros</a></h3>
                    </li>
                    <li>
                        <h3><a href="../listado_libros/eliminar_libro.php">Borrado de libros</a></h3>
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
                while ($fila = $datos_usu->fetch_assoc()) {
                ?>
                    <label for="Usuario"> Usuario:
                        <input type="text" name="usuario" id='usuario' placeholder="<?php echo $fila['usuario'] ?>" value="<?php echo $fila['usuario'] ?>">
                    </label>
                    <br><br>

                    <label for="contra"> Contraseña:
                        <input type="password" name="contra" id='contra' placeholder="<?php echo $fila['contraseña'] ?>" value="<?php echo $fila['contraseña'] ?>">
                    </label>
                    <br><br>

                    <label for="correo"> Correo electronico:
                        <input type="mail" name="correo" id='correo' placeholder="<?php echo $fila['correo_electronico'] ?>" value="<?php echo $fila['correo_electronico'] ?>">
                    </label>
                    <br><br>

                    <label for="direccion"> Direccion:
                        <input type="text" name="direccion" id='direccion' placeholder="<?php echo $fila['direccion'] ?>" value="<?php echo $fila['direccion'] ?>">
                    </label>
                    <br><br>

                    <label for="rango"> Rango:
                    <select name="rango" id="rango">
                        <option value="ADMIN">ADMIN</option>
                        <option value="CLIENTE">CLIENTE</option>
                    </select>
                    </label>
                    <br><br>

                    <label for="correo"> Teléfono:
                        <input type="number" name="telefono" id='telefono' placeholder="<?php echo $fila['telefono'] ?>" value="<?php echo $fila['telefono'] ?>">
                    </label>

                    <input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario'] ?>">
                    <br><br>

                    <input type="submit" value="Actualiza tus datos" name="Enviar">
                <?php
                }
                ?>
        </section>



    </div>
</body>

</html>