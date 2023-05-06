<?php
session_start();
echo "Hola ", $_SESSION['usuario'], "bienvenido al maravilloso panel de control" ;

echo "<br>";
echo '<a href="cerradodesesion.php">Cerrar sesion</a>';
?>
