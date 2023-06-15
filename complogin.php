<?php
//Establezco conexion
require 'conexion.php';
$usuario = $_POST['usuario'];
$contraseña = $_POST['contra'];
$encontrado = false;
$sql = "Select * from usuarios where usuario='$usuario'";

$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloinicio.css">
    <title>Libreria cosmere: Login</title>
    <link rel="icon" href="images/Acero.ico" type="image/png">
</head>

<body>
    <div class="container">
        <?php
        while (($fila = $resultado->fetch_assoc())) {
            $hash = $fila['contraseña'];

            if (password_verify($contraseña, $hash)) {
                $encontrado = true;
                session_start();
                $_SESSION["id_usu"] = $fila['id_usuario'];
                $_SESSION["usuario"] = $usuario;
                $_SESSION["rango"] = $fila['rango'];


                header("Location:index.php");
            } else {
                ?>
                <p class="alert alert-danger">Error, usuario o contraseña incorrecta</p>
                echo '<a href="login.php">Volver al login</a>';
                <?php
            }
        }


        ?>
    </div>

</body>

</html>