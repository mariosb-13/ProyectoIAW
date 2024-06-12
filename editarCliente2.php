<?php
require 'conexion.php';

$id = $_POST['id'];

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

<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];

// Verificar que el número de teléfono no sea negativo
if ($telefono < 0) {
    echo "<div class='container mt-4'>
     <div class='alert alert-danger text-center' role='alert'>
				<strong>Éxito:</strong> El número de teléfono no es válido.
				<br><a href='clientes.php' class='btn btn-danger mt-2'>Ver clientes</a>
			</div>
            </div>";
    exit();
}

// Se prepara y ejecuta la sentencia
$sql = "UPDATE clientes SET Nombre='$nombre', Apellido='$apellido', Email='$email', Telefono='$telefono', Ciudad='$ciudad' WHERE id_cliente='$id'";
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

	<title>Snkrs.Pro - Editar Cliente</title>
</head>

<body>
	<div class="container mt-4">
		<?php
		if ($resultado > 0) {
			echo "<div class='alert alert-success text-center' role='alert'>
				<strong>Éxito:</strong> El cliente ha sido modificado correctamente.
				<br><a href='clientes.php' class='btn btn-success mt-2'>Ver clientes</a>
			</div>";
		} else {
			echo "<div class='alert alert-danger text-center' role='alert'>
				<strong>Error:</strong> Ha habido un error al modificar el cliente.
				<br><a href='clientes.php' class='btn btn-danger mt-2'>Regresar</a>
			</div>";
		}
		?>
	</div>
</body>

</html>
