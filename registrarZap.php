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

    <title>Snkrs.Pro - Registrar Zapatilla</title>
</head>

<body>
    <?php
    require 'conexion.php';

    session_start();

    if (!isset($_SESSION['usuario'])) {
        // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }

    $usuario = $_SESSION['usuario'];

    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Registrar Zapatilla</h1>
            <p class="lead">Registrar una nueva zapatilla en la base de datos.</p>
            <a href="ventas.php"><button type="button" class="btn btn-outline-primary">Volver a Ventas</button></a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form id="registro" name="registro" autocomplete="off" method="post" action="registrarZap2.php">
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <select name="marca" id="marca" class="form-control" required>
                            <option value="Nike">Nike</option>
                            <option value="Adidas">Adidas</option>
                            <option value="New Balance">New Balance</option>
                            <option value="Puma">Puma</option>
                            <option value="Converse">Converse</option>
                            <option value="Vans">Vans</option>
                            <option value="Lacoste">Lacoste</option>
                            <option value="Salomon">Salomon</option>
                            <option value="Reebok">Reebok</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" id="modelo" name="modelo" maxlength="50" size="50" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" maxlength="10" size="10" class="form-control" required>
                    </div>
                    <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" id="precio" name="precio" maxlength="10" size="10" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
