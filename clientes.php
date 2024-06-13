<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];



$sql = "SELECT * FROM clientes";
$resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snkrs.Pro - Clientes</title>
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

<body class="bg-light">

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <img class="img" src="images/icono.png">
                <h1 class="display-4 mb-4">Nuestros Clientes.</h1>
                <p class="lead mb-4">Descubre nuestra colección de zapatillas exclusivas.</p>
                <a href="index.php" class="btn btn-primary btn-lg">Volver</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <a href="registrarCliente.php" class="btn btn-success mb-4"><i class="bi bi-plus-lg"></i> Registrar Cliente</a>
                <table id="tabla" class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID_Cliente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                                <th></th>
                                <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<td>{$fila['id_cliente']}</td>";
                            echo "<td>{$fila['Nombre']}</td>";
                            echo "<td>{$fila['Apellido']}</td>";
                            echo "<td>{$fila['Email']}</td>";
                            echo "<td>{$fila['Telefono']}</td>";
                            echo "<td>{$fila['Ciudad']}</td>";
                                echo "<td><a href='editarCliente.php?id={$fila['id_cliente']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i> Editar</a></td>";
                                echo "<td><a href='eliminarCliente.php?id={$fila['id_cliente']}' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i> Eliminar</a></td>";
                            echo "</tr>";
                        }
                        $mysqli->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>