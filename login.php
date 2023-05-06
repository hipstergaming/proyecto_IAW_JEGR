<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cosmere</title>
</head>
    <body>
    <form action="complogin.php" method="post">
            <label >Usuario: <input type="text" name="usuario" placeholder="Usuario" required></label>
            <br>
            <label >Contraseña: <input type="password" name="contra" placeholder="Contraseña" required></label>
            <br>
         
            <input type="submit" value="Insertar">
            
        </form>
        <p>¿No tienes cuenta? <a href="registrar.php">¡Registrate!</a></p>
        <p>Volver a <a href="index.php">Incio</a></p>
    </body>
</html>