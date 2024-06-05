<?php
require 'conexion.php';

$id = $_GET['id'];

// Verifica si se ha enviado el formulario para cambiar la contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene la nueva contraseña del formulario
    $nueva_password = $_POST['nueva_password'];

    // Encripta la nueva contraseña
    $password_encriptada = password_hash($nueva_password, PASSWORD_DEFAULT);

    // Actualiza la contraseña en la base de datos
    $sql = "UPDATE usuarios SET Contraseña='$password_encriptada' WHERE id_usuario=$id";
    if ($mysqli->query($sql) === TRUE) {
        // Redirige al usuario a la página de éxito
        header("Location: cambio_password_exito.php");
        exit();
    } else {
        echo "Error al cambiar la contraseña: " . $mysqli->error;
    }
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

    <title>Snkrs.Pro - Cambiar Contraseña</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Cambiar Contraseña</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form id="cambio_password" name="cambio_password" autocomplete="off" action="cambiarPassword2.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="nueva_password">Nueva Contraseña:</label>
                        <input type="password" name="nueva_password" id="nueva_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmar_password">Confirmar Contraseña:</label>
                        <input type="password" name="confirmar_password" id="confirmar_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Cambiar Contraseña">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
