<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Club Deportivo La Venta</title>
	</head>
	<body>
		<?php
			$nombre=$_POST['nombre'];
			$telefono=$_POST['telefono'];
			$fecha_nac=$_POST['fecha_nac'];
			$categoria=$_POST['categoria'];
			
			require 'conexion.php';

			
			$sql="INSERT INTO clubDeportivo (nombre,telefono,fecha_nacimiento,categoria) VALUES ('$nombre','$telefono','$fecha_nac','$categoria')";

			$resultado = $mysqli->query($sql);
	
			if($resultado>0){
				echo "<div class='alert alert-primary' role='alert'> Registro agregado </div>";
			}else{
				echo "<p>Ha habido un error al agregar el registro</p>";	
			}
			echo "<a href=index.php><button type='button' class='btn btn-primary'>Regresar</button></a>";
		 
		?>

	</body>
</html>