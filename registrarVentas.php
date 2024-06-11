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

    <title>Snkrs.Pro - Registrar Venta</title>
</head>

<body>
    <?php
    require 'conexion.php';
    // Obtener clientes y zapatillas para el formulario
    $sql_clientes = "SELECT id_cliente, nombre, apellido FROM clientes";
    $resultado_clientes = $mysqli->query($sql_clientes);

    $sql_zapatillas = "SELECT id_zapatilla, marca, modelo, stock FROM zapatillas";
    $resultado_zapatillas = $mysqli->query($sql_zapatillas);
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Registrar Venta</h1>
            <p class="lead">Registrar una nueva venta en la base de datos.</p>
            <a href="ventas.php"><button type="button" class="btn btn-outline-primary">Volver a Ventas</button></a>
        </div>
    </div>

    <div class="container">
        <form action="registrarVentas2.php" method="post">
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" class="form-control" required>
                    <?php while ($fila = $resultado_clientes->fetch_assoc()) { ?>
                        <option value="<?php echo $fila['id_cliente']; ?>"><?php echo $fila['nombre'] ?> <?php echo $fila['apellido']; ?></option>
                    <?php }; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_zapatilla">Zapatilla:</label>
                <select name="id_zapatilla" id="id_zapatilla" class="form-control" required>
                    <?php while ($fila = $resultado_zapatillas->fetch_assoc()) { ?>
                        <option value="<?php echo $fila['id_zapatilla']; ?>"><?php echo $fila['marca'] ?> <?php echo $fila['modelo']; ?> (Stock: <?php echo $fila['stock']; ?>)</option>
                    <?php }; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta:</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>
</body>

</html>
