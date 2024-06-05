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

<?php
require 'conexion.php';

$id = $_GET['id'];

// Verifica si se ha enviado el formulario para cambiar la contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene la nueva contraseña del formulario
    $nueva_password = $_POST['nueva_password'];
    $confirmar_password = $_POST['confirmar_password'];

    // Verifica si las contraseñas coinciden
    if ($nueva_password === $confirmar_password) {
        // Encripta la nueva contraseña
        $password_hasheada = password_hash($nueva_password, PASSWORD_DEFAULT);

        // Actualiza la contraseña en la base de datos
        $sql = "UPDATE usuarios SET password='$password_hasheada' WHERE id_usuario=$id";
        if ($mysqli->query($sql) === TRUE) {
            echo "<div class='container mt-4'>
		            <div class='alert alert-success text-center' role='alert'>
			          Contraseña cambiada exitosamente <a href='login.php' class='alert-link'>Volver</a>.
		            </div>
	            </div>";
        } else {
            echo "<div class='container mt-4'>
                    <div class='alert alert-warning text-center' role='alert'>
                    Error al cambiar la contraseña:  . $mysqli->error <a href='cambiarPassword.php?id=$id' class='alert-link'>Volver a intentarlo</a>.
                    </div>
                </div>";
        }
    } else {
        echo "<div class='container mt-4'>
        <div class='alert alert-danger text-center' role='alert'>
        Las contraseñas no coinciden <a href='cambiarPassword.php?id=$id' class='alert-link'>Volver a intentarlo</a>.
        </div>
    </div>";
    }
}
?>