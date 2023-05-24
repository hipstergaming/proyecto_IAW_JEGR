<?php

require '../../conexion.php';
$id_libro = $_GET['id_libro'];

$sql = "Select * from libros where id_libro='$id_libro'";
$resultado = $mysqli->query($sql);

$autores = "Select * from autores";
$resultado1 = $mysqli->query($autores);

$editorial = "Select * from editorial";
$resultado2 = $mysqli->query($editorial);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria cosmere: Editar libro</title>
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


        <section id='Listado_libros'>
            <div class="row">
                <h2>Lista de libros a la venta:</h2>
            </div>
            <br>
            <br>
            <a href="agregar_libro.php">Agregar libro nuevo a la base de datos</a>
            <form action="editar_libro2.php" method="get" autocomplete="off">
                <?php

                while ($fila = $resultado->fetch_assoc()) {
                ?>
                    <h2><?php echo $fila['Titulo'] ?></h2>

                    <label for="Titulo">Titulo</label>
                    <br>
                    <input type="text" name="Titulo" size="50" value="<?php echo $fila['Titulo'] ?>">
                    <br><br>


                    <label for="Cantidad disponible">Cantidad_disponible</label>
                    <br>
                    <input type="number" name="Cantidad_disponible" value="<?php echo $fila['cantidad_dis'] ?>">
                    <br><br>

                    <label for="ISBN">ISBN</label>
                    <br>
                    <input type="number" name="ISBN" value="<?php echo $fila['ISBN'] ?>">
                    <br><br>

                    
                    <label>Autor:
                        <select name='autor'>
                            <?php
                            while ($fila = $resultado1->fetch_assoc()) {
                                
                                echo "<option value=", $fila['id_autor'], ">", $fila['Nombre'], "</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <br><br>
                    
                    <!-- Editorial -->
                    
                    <label>Editorial:
                        <select name='editorial'>
                            <?php
                            while ($fila = $resultado2->fetch_assoc()) {
                                echo "<option value=", $fila['id_editorial'], ">", $fila['Nombre_ed'], "</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <br><br>
                    <input type="hidden" name="id_libro" value="<?php echo $id_libro ?>">

                    <input type="submit" value="Actualizar libro">
                    
                    
                    <?php
                }
                ?>
            </form>
        </section>



    </div>
</body>

</html>