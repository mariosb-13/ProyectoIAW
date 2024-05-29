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
		<?php
			$Modelo=$_POST['modelo'];
			$Marca=$_POST['marca'];
			$Stock=$_POST['stock'];
			
			require 'conexion.php';

			
			$sql="INSERT INTO zapatillas (Modelo,Marca,Stock) VALUES ('$Modelo','$Marca','$Stock')";

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