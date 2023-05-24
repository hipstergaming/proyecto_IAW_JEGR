<?php
require '../../conexion.php';
$autores = "Select * from autores";
$resultado1 = $mysqli->query($autores);

$editorial = "Select * from editorial";
$resultado2 = $mysqli->query($editorial);
session_start();

?>

<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Libreria cosmere: Agregar nuevo libro</title>
    <link rel="icon" href="../images/Acero.ico" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="estiloinicio.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <style>
        .form-control {
            width: 850px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1> Nuevo usuario para libreria</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form action="agregar_libro2.php" method="get" id="registro" name="registro" autocomplete="off">

                    <!-- Titulo -->
                    <div class="form-group">
                        <label>Titulo del libro:
                            <input type="text" name="titulo" class="form-control" required>
                        </label>
                    </div>
                    <!-- Cantidad -->


                    <div class="form-group">
                        <label>Cantidad en stock:
                            <input type="number" name="cantidad" class="form-control" required>
                        </label>
                    </div>

                    <!-- ISBN -->
                    <div class="form-group">
                        <label>ISBN:
                            <input type="text" name="ISBN" class="form-control" required>
                        </label>
                    </div>

                    <!-- Autor -->
                    <div class="form-group">
                        <label>Autor:
                            <select name='autor'>
                                <?php
                                while ($fila = $resultado1->fetch_assoc()) {

                                    echo "<option value=", $fila['id_autor'], ">", $fila['Nombre'], "</option>";
                                }
                                ?>
                            </select>
                    </div>

                    <!-- Editorial -->
                    <div class="form-group">
                        <label>Editorial:
                            <select name=editorial>
                                <?php
                                while ($fila = $resultado2->fetch_assoc()) {

                                    echo "<option value=", $fila['id_editorial'], ">", $fila['Nombre_ed'], "</option>";
                                }
                                ?>
                            </select>
                    </div>

                    <!-- El envio -->
                    <div class="form-group">
                        <label>
                            <input type="submit" value="Agregar" class='btn btn-primary'>
                            <label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="../iniciopanel.php">Volver al inicio</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>