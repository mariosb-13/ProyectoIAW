<?php
require 'conexion.php';

$id = $_GET['id'];

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
	<div class="container">
		<div class="row">
			<h1>Editar Usuario</h1>
		</div>

		<div class="row">
			<div class="col-md-8">
				<form id="registro" name="registro" autocomplete="off" action="editarUsu2.php" method="post">
					<div class="form-group">
						<label>
							<p>Nombre:</p>
							<input type="text" name="nombre" maxlength="20" size="20" required value="<?php echo $fila['Nombre'] ?>">
						</label>
					</div>
					<div class="form-group">
						<label>
							<p>Usuario:</p>
							<input type="text" name="usuario" maxlength="50" size="50" required value="<?php echo $fila['Usuario'] ?>">
						</label>
					</div>

					<div class="form-group">
						<label>
							<p>Contraseña:</p>
							<input type="password" name="passwd" maxlength="10" size="10" required readonly value="********">
						</label>
                        <p>Si desea cambiar la contraseña, haga clic <a href="cambiarPassword.php?id=<?php echo $id ?>">aquí</a>.</p>
					</div>

					<div class="form-group">
						<label for="administrador">Administrador</label>
						<select name="administrador" id="administrador" class="form-control" required>
							<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Editar">
					</div>

					<input type="hidden" name="id" maxlength="10" size="10" required value="<?php echo $id ?>">

				</form>
			</div>
		</div>
	</div>
</body>

</html>