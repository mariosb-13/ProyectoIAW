<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM usuarios";

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

    <title>Snkrs.Pro - Gestión de Usuarios</title>

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
                        <p class="lead">Aqui puedes administrar todos los usuarios registrados en nuestra base de datos</p>
                    </th>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">

        <a href='registrarUsu.php'><button type="button" class="btn btn-primary">Registrar Usuario</button></a>
        <br><br>

        <table id="tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID_Usuario</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>$fila[id_usuario]</td>";
                    echo "<td>$fila[Nombre]</td>";
                    echo "<td>$fila[Usuario]</td>";
                    echo "<td>********</td>"; // No mostrar la contraseña
                    echo "<td><a href='editarUsu.php?id=$fila[id_usuario]' class='btn btn-warning'>Editar</a></td>";
                    echo "<td><a href='eliminarUsu.php?id=$fila[id_usuario]' class='btn btn-danger'>Eliminar</a></td>";
                    echo "</tr>";
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>