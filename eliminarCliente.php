<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
	// Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
	header("Location: login.php");
	exit();
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

	<title>Snkrs.Pro - Eliminar Cliente</title>
</head>

<body>
	<?php
	require 'conexion.php';

	// Obtengo el id para saber que cliente borrar
	$id = $_GET['id'];

	// Se prepara la sentencia SQL
	$sql = "DELETE FROM clientes WHERE id_cliente=$id";

	// Se ejecuta la sentencia y se guarda el resultado en $resultado
	$resultado = $mysqli->query($sql);

	if ($resultado > 0) {
		echo "<div class='alert alert-primary' role='alert'> Cliente eliminado </div>";
	} else {
		echo "<div class='alert alert-danger' role='alert'> Ha habido un error al eliminar el cliente </div>";
	}
	echo "<a href=clientes.php><button type='button' class='btn btn-primary'>Regresar</button></a>";


	?>

</body>

</html>