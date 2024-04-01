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
		
		 $id=$_POST['id'];
		 $nombre=$_POST['nombre'];
		 $telefono=$_POST['telefono'];
		 $fecha=$_POST['fecha_nac'];
		 $categoria=$_POST['categoria'];
			
			$sql="UPDATE clubDeportivo SET nombre='$nombre', telefono='$telefono', fecha_nacimiento='$fecha', categoria='$categoria' WHERE id='$id'";
			
			require 'conexion.php';

			$resultado = $mysqli->query($sql);
	
			if($resultado>0){
				echo "<div class='alert alert-primary' role='alert'> Registro modificado </div>";
			}else{
				echo "<p>Ha habido un error al modificar el registro</p>";	
			}
			echo "<a href=index.php><button type='button' class='btn btn-primary'>Regresar</button></a>";
		?>
	</body>
</html>

