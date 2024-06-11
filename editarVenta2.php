<?php
require 'conexion.php';

$id_venta = $_GET['id'];

// Se prepara y ejecuta la sentencia
$sql = "SELECT * FROM ventas WHERE id_venta=$id_venta LIMIT 1";
$resultado = $mysqli->query($sql);

$venta = $resultado->fetch_assoc();
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

    <title>Snkrs.Pro - Editar Venta</title>
</head>

<body>
    <div class="container mt-4">
        <?php
        require 'conexion.php';

        $id_cliente = $_POST['id_cliente'];
        $id_zapatilla = $_POST['id_zapatilla'];
        $cantidad = $_POST['cantidad'];
        $fecha_venta = $_POST['fecha_venta'];

        // Verificar que la cantidad no sea menor o igual a 0
        if ($cantidad <= 0) {
            echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>Error:</strong> La cantidad debe ser un número positivo.
                <br><a href='ventas.php' class='btn btn-warning mt-2'>Regresar</a>
            </div>";
            exit();
        }

        // Obtener el stock actual de la zapatilla
        $sql = "SELECT stock FROM zapatillas WHERE id_zapatilla = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_zapatilla);
        $stmt->execute();
        $stmt->bind_result($stock_actual);
        $stmt->fetch();
        $stmt->close();

        // Verificar que la cantidad solicitada no exceda el stock disponible
        if ($cantidad > $stock_actual) {
            echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>Error:</strong> La cantidad solicitada excede el stock disponible.
                <br><a href='ventas.php' class='btn btn-warning mt-2'>Regresar</a>
            </div>";
            exit();
        }

        // Actualizar el stock de la zapatilla
        $sql = "UPDATE zapatillas SET stock = stock - ? WHERE id_zapatilla = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $cantidad, $id_zapatilla);
        $stmt->execute();
        $stmt->close();

        // Actualizar la venta
        $sql = "UPDATE ventas SET id_cliente = ?, id_zapatilla = ?, cantidad = ?, fecha_venta = ? WHERE id_venta = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiisi", $id_cliente, $id_zapatilla, $cantidad, $fecha_venta, $id_venta);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center' role='alert'>
                <strong>Éxito:</strong> La venta ha sido actualizada correctamente.
                <br><a href='ventas.php' class='btn btn-success mt-2'>Ver ventas</a>
            </div>";
        } else {
            // Revertir la actualización del stock si falla la actualización de la venta
            $sql = "UPDATE zapatillas SET stock = stock + ? WHERE id_zapatilla = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ii", $cantidad, $id_zapatilla);
            $stmt->execute();

            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Error:</strong> Ha habido un error al actualizar la venta.
                <br><a href='ventas.php' class='btn btn-danger mt-2'>Regresar</a>
            </div>";
        }
        ?>
    </div>
</body>

</html>
