<?php
require 'conexion.php';

$id = $_GET['id'];

// Se prepara y ejecuta la sentencia
$sql = "SELECT * FROM clientes WHERE id_cliente =$id LIMIT 1";
$resultado = $mysqli->query($sql);

$fila = $resultado->fetch_assoc();

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="icon" href="images/icono.png" type="image/png">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <title>Snkrs.Pro - Editar Cliente</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Editar Cliente</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form id="registro" name="registro" autocomplete="off" action="editarCliente2.php" method="post">
                    <div class="form-group">
                        <label>
                            <p>Nombre:</p>
                            <input type="text" name="nombre" maxlength="20" class="form-control" required value="<?php echo $fila['Nombre']; ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <p>Apellidos:</p>
                            <input type="text" name="apellidos" maxlength="50" class="form-control" required value="<?php echo $fila['Apellido']; ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <p>Email:</p>
                            <input type="email" name="email" maxlength="50" class="form-control" required value="<?php echo $fila['Email']; ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <p>Teléfono:</p>
                            <input type="number" name="telefono" maxlength="15" class="form-control" required value="<?php echo $fila['Telefono']; ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <p>Ciudad:</p>
                            <input type="text" name="ciudad" maxlength="50" class="form-control" required value="<?php echo $fila['Ciudad']; ?>">
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>
