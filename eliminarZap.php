<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

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

    <title>Snkrs.Pro - Eliminar Zapatilla</title>
</head>

<body>
    <div class="container mt-4">
        <?php
        require 'conexion.php';

        // Obtengo el id para saber que zapatilla borrar
        $id = $_GET['id'];

        // Se prepara la sentencia SQL
        $sql = "DELETE FROM zapatillas WHERE id_zapatilla=$id";

        // Se ejecuta la sentencia y se guarda el resultado en $resultado
        $resultado = $mysqli->query($sql);

        if ($resultado > 0) {
            echo "<div class='alert alert-success text-center' role='alert'>
                <strong>Éxito:</strong> La zapatilla ha sido eliminada correctamente.
                <br><a href='zapatillas.php' class='btn btn-success mt-2'>Ver zapatillas</a>
            </div>";
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>
                <strong>Error:</strong> Ha habido un error al eliminar la zapatilla.
                <br><a href='zapatillas.php' class='btn btn-danger mt-2'>Regresar</a>
            </div>";
        }
        ?>
    </div>
</body>

</html>
