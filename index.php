<?php
session_start();
require 'conexion.php';

// Verifica si hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Si la hay guarda la sesion en la variable usuario
    $usuario = $_SESSION['usuario'];

    // Obtener si el usuario logeado es administrador o no
    $sql = $mysqli->prepare("SELECT administrador FROM usuarios WHERE usuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $fila = $resultado->fetch_assoc();
    $admin = $fila['administrador'] == 'Si';
} else {
    $admin = false;
}
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

    <title>Snkrs.Pro</title>
</head>

<body>
    <div class="jumbotron">
        <!-- Filtramos si hay un usuario logeado -->
        <?php if (isset($usuario)) { ?>
            <h1 class="display-3">Bienvenido/a <?php echo $usuario; ?>!</h1>
            <hr class="my-2">
            <p class="lead">
                <!-- Filtramos si ese usuario es administrador -->
                <?php if ($admin) { ?>
            <p class="lead">Puede acceder a los paneles de control pulsando aquí ⬇</p>
            <p class="lead">Tienes opciones de administrador</p>
            <a class="btn btn-primary btn-lg" href="zapatillas.php" role="button">Administrar Zapatillas</a>
            <a class="btn btn-primary btn-lg" href="usuarios.php" role="button">Administrar Usuarios</a>
            <a class="btn btn-primary btn-lg" href="ventas.php" role="button">Administrar Ventas</a>
            <!-- Si no es administrador -->
        <?php } else { ?>
            <p class="lead">Puede acceder a ver la base de datos ⬇</p>
            <a class="btn btn-primary btn-lg" href="zapatillas.php" role="button">Ver Zapatillas</a>
            <a class="btn btn-primary btn-lg" href="usuarios.php" role="button">Ver Usuarios</a>
            <a class="btn btn-primary btn-lg" href="ventas.php" role="button">Ver Ventas</a>
        <?php } ?>
        </p>
        <p class="lead">
            <a class="btn btn-danger btn-lg" href="cerrar.php" role="button">Cerrar Sesión</a>
        </p>
    <?php } else { ?>
        <!-- Aquí si no hay ningun usuario logeado en la pagina -->
        <h1 class="display-3">Hola, bienvenido/a a Snkrs.Pro</h1>
        <p class="lead">Esta es la página de administración de la base de datos de nuestra tienda.</p>
        <hr class="my-2">
        <p class="lead">Deberá registrarse o iniciar sesión para poder acceder</p>
        <p class="lead">
            <a class="btn btn-success btn-lg" href="registrarUsu.php" role="button">Registrarse</a>
            <a class="btn btn-primary btn-lg" href="login.php" role="button">Iniciar Sesión</a>
        </p>
    <?php } ?>
    </div>

</body>

</html>