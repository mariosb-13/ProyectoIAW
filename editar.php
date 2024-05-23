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
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Snkrs.Pro</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Socios</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<!-- Completar atributos de form -->
				<form id="registro" name="registro" autocomplete="off" action="editar2.php" method="post">
					<!-- Incluir el id en algún div de estos-->
					<div class="form-group">
						<label>
							<p>Nombre completo:</p>
							<input type="text" name="nombre" maxlength="50" size="50" required value="<?php echo $fila['nombre'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Teléfono:</p>
							<input type="text" name="telefono" maxlength="50" size="50" required value="<?php echo $fila['telefono'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Fecha nacimiento</p>
							<input type="date" name="fecha_nac" maxlength="50" size="50" required value="<?php echo $fila['fecha_nacimiento'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Categoria</p>
							<select name="categoria" id="categoria" class="form-control" required>
							<option value="AMATEUR">AMATEUR</option>
							<option value="PROFESIONAL">PROFESIONAL</option>
							</select>
						</label>
						<input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Editar">
						
					</div>
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