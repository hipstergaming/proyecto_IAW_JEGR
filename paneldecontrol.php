<?php
session_start();

echo "Hola ", $_SESSION['usuario'], $_SESSION['rango'] ," bienvenido al maravilloso panel de control" ;
echo "<br>";

if(isset($_SESSION)){
    if($_SESSION["rango"] == "ADMIN" ) {
        echo "Eres administrador, menu completo";
        
    }elseif($_SESSION["rango"] == "CLIENTE") {
        echo "Eres cliente, menu incompleto";
    }
}else{
    echo "Error, no estas logueado";
}
echo "<br>";
echo '<a href="cerradodesesion.php">Cerrar sesion</a>';
?>
