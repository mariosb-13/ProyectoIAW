<?php
require 'conexion.php';

$sql = "SELECT * FROM zapatillas";

$resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="icon" href="images/icono.png" type="image/png">

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <title>Snkrs.Pro</title>


</head>
<?php

?>

<body>
    <div class="jumbotron">
        <h1 class="display-3">Hola, bienvenido a Snkrs.Pro</h1>
        <p class="lead">Esta es la página de administración de la base de datos de nuestras zapatillas.</p>
        <hr class="my-2">
        <p>Deberá registrarse o iniciar sesión para poder acceder</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="registrarUsu.php" role="button">Registrarse</a>
            <a class="btn btn-primary btn-lg" href="login.php" role="button">Iniciar Sesión</a>
        </p>
    </div>


</body>

</html>