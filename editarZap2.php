<?php
require 'conexion.php';

$id = $_POST['id'];

// Se prepara y ejecuta la sentencia
$sql = "SELECT * FROM zapatillas WHERE id_zapatilla=$id LIMIT 1";
$resultado = $mysqli->query($sql);

$fila = $resultado->fetch_assoc();
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

    <title>Snkrs.Pro - Editar Zapatilla</title>
</head>

<body>
    <div class="container mt-4">
        <?php
        require 'conexion.php';

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        // Verificar que el stock no sea menor que 0
        if ($stock < 0) {
            echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>Error:</strong> El stock no puede ser menor que 0.
                <br><a href='zapatillas.php' class='btn btn-warning mt-2'>Regresar</a>
            </div>";
        }

        // Verificar que el precio no sea menor que 0
        if ($precio < 0) {
            echo "<div class='alert alert-warning text-center' role='alert'>
                <strong>Error:</strong> El precio no puede ser menor que 0.
                <br><a href='zapatillas.php' class='btn btn-warning mt-2'>Regresar</a>
            </div>";
        }

        $sql = "UPDATE zapatillas SET Marca='$marca', Modelo='$modelo' , Stock='$stock', Precio='$precio' WHERE id_zapatilla='$id'";
        $resultado = $mysqli->query($sql);

        if ($resultado > 0) {
            echo "<div class='alert alert-success text-center' role='alert'>
                <strong>Éxito:</strong> La zapatilla ha sido modificada correctamente.
                <br><a href='zapatillas.php' class='btn btn-success mt-2'>Ver zapatillas</a>
            </div>";
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Error:</strong> Ha habido un error al modificar la zapatilla.
                <br><a href='zapatillas.php' class='btn btn-danger mt-2'>Regresar</a>
            </div>";
        }
        ?>
    </div>
</body>

</html>
