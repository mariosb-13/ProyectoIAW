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

<body>
	<?php
	require 'conexion.php';

	session_start();

	if (!isset($_SESSION['usuario'])) {
		// Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
		header("Location: login.php");
		exit();
	}

	$usuario = $_SESSION['usuario'];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Modelo = $_POST['modelo'];
		$Marca = $_POST['marca'];
		$Stock = $_POST['stock'];
		$Precio = $_POST['precio'];

		// Verificar que el stock no sea menor que 0
		if ($Stock < 0) {
			echo "<div class='alert alert-danger' role='alert'>El stock no puede ser menor que 0</div>";
			echo "<a href='registrarZapatillas.php'><button type='button' class='btn btn-primary'>Regresar</button></a>";
			exit();
		}

		// Verificar que el precio no sea menor que 0
		if ($Precio < 0) {
			echo "<div class='alert alert-danger' role='alert'>El precio no puede ser menor que 0</div>";
			echo "<a href='registrarZapatillas.php'><button type='button' class='btn btn-primary'>Regresar</button></a>";
			exit();
		}

		// Verificar si ya existe una zapatilla con el mismo modelo y marca
		$sql = "SELECT * FROM zapatillas WHERE Modelo = ? AND Marca = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ss", $Modelo, $Marca);
		$stmt->execute();
		$resultado = $stmt->get_result();

		if ($resultado->num_rows > 0) {
			echo "<div class='alert alert-danger' role='alert'>Ya existe una zapatilla con el mismo modelo y marca</div>";
			echo "<a href='registrarZap.php'><button type='button' class='btn btn-primary'>Regresar</button></a>";
			exit();
		}

		// Si no existe, insertar la nueva zapatilla
		$sql = "INSERT INTO zapatillas (Modelo, Marca, Stock, Precio) VALUES (?, ?, ?, ?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ssii", $Modelo, $Marca, $Stock, $Precio);

		if ($stmt->execute()) {
			echo "<div class='alert alert-primary' role='alert'>Zapatilla agregada</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Ha habido un error al agregar la zapatilla</div>";
		}
		echo "<a href='zapatillas.php'><button type='button' class='btn btn-primary'>Regresar</button></a>";
	}

	$mysqli->close();
	?>

</body>

</html>
