<?php
require 'conexion.php';

session_start();

if (!isset($_SESSION['usuario'])) {
	// Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
	header("Location: login.php");
	exit();
}

$usuario = $_SESSION['usuario'];

// Obtener si el usuario es admin
$sql = $mysqli->prepare("SELECT administrador FROM usuarios WHERE usuario = ?");
$sql->bind_param("s", $usuario);
$sql->execute();
$resultado = $sql->get_result();
$fila = $resultado->fetch_assoc();
$admin = $fila['administrador'] == 'Si';

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

<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<table>
				<tr>
					<th>
						<p><img class="img" src="images/icono.png"></p>
					</th>
					<th>
						<h1 class="display-3">Hola, <?php echo $usuario ?></h1>
						<p class="lead">Estas son las zapatillas que tenemos en nuestra base de datos</p>
						<a href="index.php"><button type="button" class="btn btn-outline-primary">Volver</button></a>
					</th>
				</tr>
			</table>
		</div>
	</div>

	<div class="container">

		<a href="registrarZap.php"><button type="button" class="btn btn-primary btn-lg">Registrar Zapatilla</button></a>
		<br><br>

		<table id="tabla" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Stock</th>
					<th>Precio</th>
					<!-- Aqui si no eres usuario administrador no podras ver las columnas de editar y eliminar usuarios -->
					<?php if ($admin) { ?>
						<th></th>
						<th></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($fila = $resultado->fetch_assoc()) {
					echo "<tr";
					// Si el nº de stock es menor o igual a 0 se mostrará en color rojo
					if ($fila['Stock'] == 0) {
						echo " class='nostock'";
					}
					echo ">";
					echo "<td>{$fila['Marca']}</td>";
					echo "<td>{$fila['Modelo']}</td>";
					echo "<td>{$fila['Stock']} ud.</td>";
					echo "<td>{$fila['Precio']}€</td>";
					// Aqui si no eres usuario administrador no podras ver las columnas de editar y eliminar usuarios
					if ($admin) {
						echo "<td><a href='editarZap.php?id={$fila['id_zapatilla']}' class='btn btn-warning'>Editar</a></td>";
						echo "<td><a href='eliminarZap.php?id={$fila['id_zapatilla']}' class='btn btn-danger'>Eliminar</a></td>";
					}
					echo "</tr>";
				}
				$mysqli->close();
				?>
			</tbody>
		</table>

	</div>
</body>

</html>