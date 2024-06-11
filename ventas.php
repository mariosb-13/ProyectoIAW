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

$sql = "SELECT ventas.id_venta, clientes.nombre, clientes.apellido, zapatillas.marca, zapatillas.modelo, ventas.cantidad, ventas.fecha_venta
        FROM ventas
        JOIN clientes ON ventas.id_cliente = clientes.id_cliente
        JOIN zapatillas ON ventas.id_zapatilla = zapatillas.id_zapatilla";
$resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snkrs.Pro - Gestión de Ventas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="icon" href="images/icono.png" type="image/png">
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable();
    });
</script>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <img class="img" src="images/icono.png">
                <h1 class="display-4 mb-4">Nuestras ventas.</h1>
                <p class="lead mb-4">Aquí puedes administrar todas las ventas registradas en nuestra base de datos</p>
                <a href="index.php" class="btn btn-outline-primary btn-lg">Volver</a>
            </div>
        </div>
    </div>

    <div class="container">
        <a href="registrarVentas.php" class="btn btn-success mb-4"><i class="bi bi-plus-lg"></i> Registrar Venta</a>
        <br><br>

        <table id="tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad</th>
                    <th>Fecha de Venta</th>
                        <th></th>
                        <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila['id_venta']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['apellido']}</td>";
                    echo "<td>{$fila['marca']}</td>";
                    echo "<td>{$fila['modelo']}</td>";
                    echo "<td>{$fila['cantidad']}</td>";
                    echo "<td>{$fila['fecha_venta']}</td>";
                        echo "<td><a href='editarVenta.php?id={$fila['id_venta']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i> Editar</a></td>";
                        echo "<td><a href='eliminarVentas.php?id={$fila['id_venta']}' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i> Eliminar</a></td>";
                    echo "</tr>";
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>