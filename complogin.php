<?php
    //Establezco conexion
    require 'conexion.php';
    
    $sql= "Select * from usuarios";

    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
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
        //recojo datos y creo la variable encontrado a false
            $usuario=$_POST['usuario'];
            $contraseña=$_POST['contra'];
            $encontrado=false;

            // en el bucle pongo que mientras que existan datos y encontrado este a falso(sin coincidencias)
            // siga el bucle tanto como usuarios haya
            while(($fila = $resultado->fetch_assoc()) && ($encontrado==false)){
                $hash= $fila['contraseña'];
                if ($usuario == $fila['usuario']){
                    // if (password_verify($contraseña,$hash)){
                    //Si hay coincidencia imprimo el nombre y pongo encontrado a true para finalizar el bucle
                        $encontrado=true;
                        session_start();
                        $_SESSION["id_usu"] = $fila['id_usuario'];
                        $_SESSION["usuario"] =$usuario;
                        $_SESSION["rango"] = $fila['rango'];
                        
                        
                        header("Location:index.php");
                    // }
                    }else{
                        //No es necesario esto pero lo puse igual
                        $encontrado=false;
                    }
                }
                // Si no encuentra ninguna coincidencia y se acaban todos los usuarios que hay en la bdd
                //a traves de encontrado==false agregamos el texto de error y un enlace de vuelta
                if ($encontrado==false){
                    echo "Usuario o contraseña incorrecta <br>";
                    echo '<a href="login.php">Volver al login</a>';
                }
           
        
?>

    </body>
</html>