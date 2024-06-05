<?php
require 'conexion.php';

$id = $_GET['id'];

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
	<div class="container">
		<div class="row">
			<h1>Editar Zapatilla</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<form id="registro" name="registro" autocomplete="off" action="editar2.php" method="post">
					<div class="form-group">
						<label>
							<p>Marca:</p>
							<input type="text" name="marca" maxlength="20" size="20" required readonly value="<?php echo $fila['Marca'] ?>">
						</label>
					</div>
					<div class="form-group">
						<label>
							<p>Modelo:</p>
							<input type="text" name="modelo" maxlength="50" size="50" required value="<?php echo $fila['Modelo'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Stock:</p>
							<input type="number" name="stock" maxlength="10" size="10" required value="<?php echo $fila['Stock'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Precio:</p>
							<input type="number" name="precio" maxlength="10" size="10" required value="<?php echo $fila['Precio'] ?>">
						</label>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Editar">
					</div>

					<input type="hidden" name="id" maxlength="10" size="10" required value="<?php echo $id ?>">

				</form>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>