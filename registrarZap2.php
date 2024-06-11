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
	<div class="container mt-4">
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
				echo "<div class='alert alert-warning text-center' role='alert'>
					<strong>Error:</strong> El stock no puede ser menor que 0.
					<br><a href='registrarZap.php' class='btn btn-warning mt-2'>Regresar</a>
				</div>";
				exit();
			}

			// Verificar que el precio no sea menor que 0
			if ($Precio < 0) {
				echo "<div class='alert alert-warning text-center' role='alert'>
					<strong>Error:</strong> El precio no puede ser menor que 0.
					<br><a href='registrarZap.php' class='btn btn-warning mt-2'>Regresar</a>
				</div>";
				exit();
			}

			// Verificar si ya existe una zapatilla con el mismo modelo y marca
			$sql = "SELECT * FROM zapatillas WHERE Modelo = ? AND Marca = ?";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("ss", $Modelo, $Marca);
			$stmt->execute();
			$resultado = $stmt->get_result();

			if ($resultado->num_rows > 0) {
				echo "<div class='alert alert-danger text-center' role='alert'>
					<strong>Error:</strong> Ya existe una zapatilla con el mismo modelo y marca.
					<br><a href='registrarZap.php' class='btn btn-danger mt-2'>Regresar</a>
				</div>";
				exit();
			}

			// Si no existe, insertar la nueva zapatilla
			$sql = "INSERT INTO zapatillas (Modelo, Marca, Stock, Precio) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("ssii", $Modelo, $Marca, $Stock, $Precio);

			if ($stmt->execute()) {
				echo "<div class='alert alert-success text-center' role='alert'>
					<strong>Éxito:</strong> La zapatilla ha sido agregada correctamente.
					<br><a href='zapatillas.php' class='btn btn-success mt-2'>Ver zapatillas</a>
				</div>";
			} else {
				echo "<div class='alert alert-danger text-center' role='alert'>
					<strong>Error:</strong> Ha habido un error al agregar la zapatilla.
					<br><a href='registrarZap.php' class='btn btn-success mt-2'>Regresar</a>
				</div>";
			}
		}

		$mysqli->close();
		?>
	</div>
</body>

</html>
