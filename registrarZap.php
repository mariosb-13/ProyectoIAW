<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
	// Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
	header("Location: login.php");
	exit();
}

$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM zapatillas";

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

	<title>Snkrs.Pro - Registrar</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Registrar zapatilla</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<!-- Completar atributos de form -->
				<form id="registro" name="registro" autocomplete="off" method="post" action="registrarZap2.php">
					<div class="form-group">
						<label for="marca">Marca</label>
						<select name="marca" id="marca" class="form-control" required>
							<option value="Nike">Nike</option>
							<option value="Adidas">Adidas</option>
							<option value="New Balance">New Balance</option>
							<option value="Puma">Puma</option>
							<option value="Converse">Converse</option>
							<option value="Vans">Vans</option>
							<option value="Lacoste">Lacoste</option>
							<option value="Salomon">Salomon</option>
							<option value="Reebok">Reebok</option>
						</select>
						<input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
					</div>
					<div class="form-group">
						<label for="Modelo">Modelo:</label>
						<input type="text" id="modelo" name="modelo" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="fecha_nac">Stock:</label>
						<input type="number" id="stock" name="stock" class="form-control" required>
					</div>

					<input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" class="form-control" required>

					<div class="form-group">
						<label for="fecha_nac">Precio:</label>
						<input type="number" id="precio" name="precio" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Registrar">
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