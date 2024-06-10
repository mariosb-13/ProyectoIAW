<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Obtener si el usuario es admin
$sql = $mysqli->prepare("SELECT administrador FROM usuarios WHERE usuario = ?");
$sql->bind_param("s", $usuario);
$sql->execute();
$resultado = $sql->get_result();
$fila = $resultado->fetch_assoc();
$admin = $fila['administrador'] == 'Si';

$sql = "SELECT ventas.id_venta, usuarios.nombre, zapatillas.marca, zapatillas.modelo, ventas.cantidad, ventas.fecha_venta
        FROM ventas
        JOIN usuarios ON ventas.id_usuario = usuarios.id_usuario
        JOIN zapatillas ON ventas.id_zapatilla = zapatillas.id_zapatilla";
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

    <title>Snkrs.Pro - Gestión de Ventas</title>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>

</head>

<body>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <table>
                <tr>
                    <th>
                        <p><img class="img" src="images/icono.png"></p>
                    </th>
                    <th>
                        <h1 class="display-3">Hola, <?php echo $usuario ?></h1>
                        <p class="lead">Aquí puedes administrar todas las ventas registradas en nuestra base de datos</p>
                        <a href="index.php"><button type="button" class="btn btn-outline-primary">Volver</button></a>
                    </th>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">
            <a href='registrarVentas.php'><button type="button" class="btn btn-primary btn-lg">Registrar Venta</button></a>
            <br><br>

        <table id="tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Usuario</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad</th>
                    <th>Fecha de Venta</th>
                    <?php if ($admin) { ?>
                        <th></th>
                        <th></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila['id_venta']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['marca']}</td>";
                    echo "<td>{$fila['modelo']}</td>";
                    echo "<td>{$fila['cantidad']}</td>";
                    echo "<td>{$fila['fecha_venta']}</td>";
                    if ($admin) {
                        echo "<td><a href='editarVenta.php?id={$fila['id_venta']}' class='btn btn-warning'>Editar</a></td>";
                        echo "<td><a href='eliminarVentas.php?id={$fila['id_venta']}' class='btn btn-danger'>Eliminar</a></td>";
                    }
                    echo "</tr>";
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>
