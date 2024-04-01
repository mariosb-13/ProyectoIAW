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
		 require 'conexion.php';

		 // Obtengo el id del registro que quiero borrar
		 $id=$_GET['id'];
 
		 // Se prepara la sentencia SQL
		 $sql="DELETE FROM clubDeportivo WHERE id=$id";
 
		 // Se ejecuta la sentencia y se guarda el resultado en $resultado
		 $resultado= $mysqli->query($sql);
 
		 if($resultado>0){
			 echo "<div class='alert alert-primary' role='alert'> Registro eliminado </div>";
		 }else{
			 echo "<p>Ha habido un error al eliminar el registro</p>";	
		 }
		 echo "<a href=index.php><button type='button' class='btn btn-primary'>Regresar</button></a>";
			
			
		?>

	</body>
</html>