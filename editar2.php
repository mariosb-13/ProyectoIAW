<?php
require 'conexion.php';

$id = $_POST['id'];

// Se prepara y ejecuta la sentencia
$sql = "SELECT * FROM zapatillas WHERE id_zapatilla=$id LIMIT 1";
$resultado = $mysqli->query($sql);

// Se extrae el registro. No se hace en bucle porque el resultado debe ser único
$fila = $resultado->fetch_assoc();
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

	<title>Snkrs.Pro - Editar Zapatilla</title>
</head>

<body>
	<?php

	require 'conexion.php';

	$id = $_POST['id'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$stock = $_POST['stock'];
	$precio = $_POST['precio'];

	$sql = "UPDATE zapatillas SET marca='$marca', modelo='$modelo', stock='$stock', precio='$precio' WHERE id_zapatilla='$id'";


	$resultado = $mysqli->query($sql);

	if ($resultado > 0) {
		echo "<div class='alert alert-primary' role='alert'> Registro modificado </div>";
	} else {
		echo "<p>Ha habido un error al modificar el registro</p>";
	}
	echo "<a href=zapatillas.php><button type='button' class='btn btn-primary'>Regresar</button></a>";
	?>
</body>

</html>