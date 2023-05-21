<?php

    require '../conexion.php';
    $sqljoin = "Select * from autores,libros, editorial where libros.id_autor=autores.id_autor and libros.id_editorial=editorial.id_editorial";
    $todo = $mysqli->query($sqljoin);

    $borrado="delete from libros where id_libro='$id_libro'";
    $resultado = $mysqli->query($borrado);

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
    
</body>

</html>