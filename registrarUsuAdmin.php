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

    <title>Snkrs.Pro - Registrar</title>
</head>
<?php if ($admin) { ?>

    <body>
        <div class="container login-container">
            <div class="card login-card">
                <div class="card-body">
                    <h1 class="card-title text-center">Registrar Usuario</h1>
                    <form action="registrarUsuAdmin2.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwd" class="form-label">Contraseña</label>
                            <input type="password" name="passwd" id="passwd" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="administrador">Administrador</label>
                            <select name="administrador" id="administrador" class="form-control" required>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-custom">Registrar</button>
                        </div>
                        <div class="text-center">
                            <a href="usuarios.php" class="btn btn-danger btn-custom">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>

<?php } else { ?>
    <div class='container mt-4'>
        <div class='alert alert-danger text-center' role='alert'>
            No tiene derechos de administrador para acceder a la página <a href='index.php' class='alert-link'>Volver</a>.
        </div>
    </div>
<?php } ?>

</html>