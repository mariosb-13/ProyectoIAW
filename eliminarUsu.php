<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
	// Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
	header("Location: login.php");
	exit();
}

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

	<title>Snkrs.Pro - Eliminar Zapatilla</title>
</head>

<body>
	<?php
	require 'conexion.php';

	// Obtengo el id para saber que zapatilla borrar con el usuario para que vuelva a salir luego en la página principal.
	$id = $_GET['id'];

	// Se prepara la sentencia SQL
	$sql = "DELETE FROM usuarios WHERE id_usuario=$id";

	// Se ejecuta la sentencia y se guarda el resultado en $resultado
	$resultado = $mysqli->query($sql);

	if ($resultado > 0) {
		echo "<div class='alert alert-primary' role='alert'> Usuario eliminado </div>";
	} else {
		echo "<p>Ha habido un error al eliminar el usuario</p>";
	}
	echo "<a href=usuarios.php?><button type='button' class='btn btn-primary'>Regresar</button></a>";


	?>

</body>

</html>