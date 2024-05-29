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
			$nombre=$_POST['nombre'];
			$usuario=$_POST['usuario'];
			$passwd=$_POST['passwd'];
			
			require 'conexion.php';

			
			$sql="INSERT INTO usuarios (Nombre, Usuario, Password)VALUES ('$nombre','$usuario','$passwd')";

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