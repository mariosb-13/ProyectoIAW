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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $id_zapatilla = $_POST['id_zapatilla'];
    $cantidad = $_POST['cantidad'];
    $fecha_venta = $_POST['fecha_venta'];

    if ($cantidad <= 0) {
        echo "<div class='container mt-4'>
            <div class='alert alert-danger text-center' role='alert'>
                La cantidad debe ser un número positivo <a href='registrarVentas.php' class='alert-link'>Volver a intentar</a>.
            </div>
            </div>";
    } else {
        // Actualizar el stock de la zapatilla
        $sql = "UPDATE zapatillas SET stock = stock - ? WHERE id_zapatilla = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $cantidad, $id_zapatilla);

        if ($stmt->execute()) {
            // Registrar la venta
            $sql = "INSERT INTO ventas (id_usuario, id_zapatilla, cantidad, fecha_venta) VALUES (?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("iiis", $id_usuario, $id_zapatilla, $cantidad, $fecha_venta);

            if ($stmt->execute()) {
                echo "<div class='container mt-4'>
                    <div class='alert alert-success text-center' role='alert'>
                    La venta ha sido registrada correctamente <a href='ventas.php' class='alert-link'>Volver</a>.
                    </div>
                    </div>";
            } else {
                // Revertir la actualización del stock si falla el registro de la venta
                $sql = "UPDATE zapatillas SET stock = stock + ? WHERE id_zapatilla = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ii", $cantidad, $id_zapatilla);
                $stmt->execute();

                echo "<div class='container mt-4'>
                    <div class='alert alert-danger text-center' role='alert'>
                        Ha ocurrido un error al registrar la venta <a href='registrarVentas.php' class='alert-link'>Volver a intentar</a>.
                    </div>
                    </div>";
            }
        } else {
            echo "<div class='container mt-4'>
                <div class='alert alert-danger text-center' role='alert'>
                    Ha ocurrido un error al actualizar el stock <a href='registrarVentas.php' class='alert-link'>Volver a intentar</a>.
                </div>
                </div>";
        }
    }
}
