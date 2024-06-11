<?php
require 'conexion.php';

$id = $_POST['id'];

// Se prepara y ejecuta la sentencia
$sql = "SELECT * FROM usuarios WHERE id_usuario=$id LIMIT 1";
$resultado = $mysqli->query($sql);

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

	<title>Snkrs.Pro - Editar Usuario</title>
</head>

<body>
	<div class="container mt-4">
		<?php
		require 'conexion.php';

		$nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$admin = $_POST['administrador'];

		$sql = "UPDATE usuarios SET Nombre='$nombre', usuario='$usuario', administrador='$admin' WHERE id_usuario='$id'";
		$resultado = $mysqli->query($sql);

		if ($resultado > 0) {
			echo "<div class='alert alert-success text-center' role='alert'>
				<strong>Éxito:</strong> El usuario ha sido modificado correctamente.
				<br><a href='usuarios.php' class='btn btn-success mt-2'>Ver usuarios</a>
			</div>";
		} else {
			echo "<div class='alert alert-danger text-center' role='alert'>
				<strong>Error:</strong> Ha habido un error al modificar el usuario.
				<br><a href='usuarios.php' class='btn btn-danger mt-2'>Regresar</a>
			</div>";
		}
		?>
	</div>
</body>

</html>
