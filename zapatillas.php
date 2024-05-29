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
$usuario = $_GET["usuario"];
?>

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
					</th>

				</tr>
			</table>
		</div>
	</div>


	<div class="container">

		<br>
		<div class="form-group">
			<?php echo "<a href='registrarZap.php?usuario=$usuario'><button>Registrar Zapatilla</button></a>" ?>
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
					echo "<td>$fila[Precio]€</td>";

					echo "<td><a href='editar.php?id=$fila[id_zapatilla]' class='btn btn-warning'>Editar</a></td>";
					echo "<td><a href='eliminar.php?id=$fila[id_zapatilla]&usuario=$usuario' class='btn btn-danger'>Eliminar</a></td>";
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