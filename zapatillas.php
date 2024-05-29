<?php
require 'conexion.php';

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

	<title>Snkrs.Pro</title>

	<script>
		$(document).ready(function() {
			$('#tabla').DataTable();
		});
	</script>


</head>
<?php

?>

<body>
	<div class="jumbotron">
		<h1 class="display-3">Hola $usuario</h1>
		<p class="lead">Bienvenido a la página de administración de nuestras zapatillas.</p>
		<hr class="my-2">
		<p>Debera registrarse o iniciar sesión para poder acceder</p>
		<p class="lead">
			<a class="btn btn-primary btn-lg" href="registrarUsu.php" role="button">Registrarse</a>
			<a class="btn btn-primary btn-lg" href="login.php" role="button">Iniciar Sesion</a>
		</p>
	</div>

	<div class="container">
		<div class="row">
			<h1>Zapatillas</h1>
			<!-- <h1><img class="logo" src="images/icono.png"></h1> -->
		</div>
		<br>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
		<br>
		<br>

		<table id="tabla" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Stock</th>
					<th>Precio</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($fila = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>$fila[Marca]</td>";
					echo "<td>$fila[Modelo]</td>";
					echo "<td>$fila[Stock]</td>";
					echo "<td>$fila[Precio]</td>";

					echo "<td><a href='editar.php?id=$fila[id_zapatilla]' class='btn btn-warning'>Editar</a></td>";
					echo "<td><a href='eliminar.php?id=$fila[id_zapatilla]' class='btn btn-danger'>Eliminar</a></td>";
					echo "</tr>";
				}
				$mysqli->close();
				?>
			</tbody>
		</table>

	</div>
	</div>


</body>

</html>