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

    <title>Snkrs.Pro - Registrar Venta</title>
</head>

<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])){
    // Obtengo el id para saber qué venta borrar
    $id = $_GET['id'];

    // Se prepara la sentencia SQL
    $sql = "DELETE FROM ventas WHERE id_venta=?";

    // Se prepara la sentencia y se vincula el parámetro
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    // Se ejecuta la sentencia y se guarda el resultado en $resultado
    if ($stmt->execute()) {
        echo "<div class='alert alert-primary' role='alert'>Venta eliminada correctamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Ha habido un error al eliminar la venta</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>No se ha especificado la venta a eliminar</div>";
}

echo "<a href='ventas.php'><button type='button' class='btn btn-primary'>Regresar</button></a>";

?>
