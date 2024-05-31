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

	$nombre = $_POST['nombre'];
	$usuario = $_POST['usuario'];
	$passwd = $_POST['passwd'];
	$passwd_segura = password_hash($passwd, PASSWORD_DEFAULT);

	//Preparo una sentencia para obtener los datos que quiero de la BD
	$sql = "SELECT * FROM usuarios where usuario LIKE '$usuario' limit 1";

	$resultado = $mysqli->query($sql);

	$fila = $resultado->fetch_assoc();

	if ($fila <= 0) {

		//Se prepara la sentencia SQL
		$sql = "INSERT INTO usuarios (nombre,usuario,password) VALUES('$nombre','$usuario','$passwd_segura')";
		$resultado = $mysqli->query($sql);

		//Se ejecuta la sentencia y se guarda el resultado en $resultado
		echo "<div class='container mt-4'>
		<div class='alert alert-success text-center' role='alert'>
		El usuario ha sido añadido correctamente <a href='index.php' class='alert-link'>Volver</a>.
		</div>
	  </div>";
	} else {
		echo "<div class='container mt-4'>
		<div class='alert alert-danger text-center' role='alert'>
			Ya existe un usuario con ese nombre <a href='registrarUsu.php' class='alert-link'>Volver a intentar</a>.
		</div>
	  </div>";
	}


	?>

</body>

</html>