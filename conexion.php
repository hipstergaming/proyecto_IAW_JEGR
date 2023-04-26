<?php


    $mysqli = new mysqli("localhost","root","","tienda_libros");
    if($mysqli->connect_errno){
        echo "Falló al conectar a MySQL: (",$mysqli->connect_errno, ") , ", $mysqli->connect_error;
    }

?>