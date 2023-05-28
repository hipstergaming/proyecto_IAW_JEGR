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
    <title>Libreria cosmere: Login</title>
    <link rel="icon" href="images/Acero.ico" type="image/png">
</head>

<body>
    <?php
    while (($fila = $resultado->fetch_assoc())) {
        echo "Se mete al fetch <br>";
        $hash = $fila['contraseña'];
        echo $hash;
        
        if (password_verify($contraseña,$hash)){
            $encontrado =true;
            session_start();
            $_SESSION["id_usu"] = $fila['id_usuario'];
            $_SESSION["usuario"] = $usuario;
            $_SESSION["rango"] = $fila['rango'];


            header("Location:index.php");
        } else {
            echo "Usuario o contraseña incorrecta <br>";
            echo '<a href="login.php">Volver al login</a>';
        }
    }

    // Si no encuentra ninguna coincidencia y se acaban todos los usuarios que hay en la bdd
    //a traves de encontrado==false agregamos el texto de error y un enlace de vuelta


    ?>

</body>

</html>