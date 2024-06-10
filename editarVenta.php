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

    <title>Snkrs.Pro - Editar Venta</title>
</head>

<body>
    <?php
    require 'conexion.php';

    if (!isset($_GET['id'])) {
        header("Location: ventas.php");
        exit();
    }

    $id_venta = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $id_zapatilla = $_POST['id_zapatilla'];
        $cantidad_nueva = $_POST['cantidad'];
        $fecha_venta = $_POST['fecha_venta'];

        // Obtener la cantidad anterior de la venta
        $sql = "SELECT cantidad, id_zapatilla FROM ventas WHERE id_venta = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_venta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $venta_anterior = $resultado->fetch_assoc();
        $cantidad_anterior = $venta_anterior['cantidad'];
        $id_zapatilla_anterior = $venta_anterior['id_zapatilla'];

        // Calcular la diferencia en la cantidad
        $diferencia_cantidad = $cantidad_nueva - $cantidad_anterior;

        // Actualizar el stock de la zapatilla anterior
        $sql = "UPDATE zapatillas SET stock = stock + ? WHERE id_zapatilla = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $cantidad_anterior, $id_zapatilla_anterior);
        $stmt->execute();

        // Actualizar el stock de la nueva zapatilla
        $sql = "UPDATE zapatillas SET stock = stock - ? WHERE id_zapatilla = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $cantidad_nueva, $id_zapatilla);
        $stmt->execute();

        // Actualizar la venta
        $sql = "UPDATE ventas SET id_usuario = ?, id_zapatilla = ?, cantidad = ?, fecha_venta = ? WHERE id_venta = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiisi", $id_usuario, $id_zapatilla, $cantidad_nueva, $fecha_venta, $id_venta);

        if ($stmt->execute()) {
            echo "<div class='container mt-4'>
            <div class='alert alert-success text-center' role='alert'>
            La venta ha sido actualizada correctamente <a href='ventas.php' class='alert-link'>Volver</a>.
            </div>
            </div>";
        } else {
            echo "<div class='container mt-4'>
            <div class='alert alert-danger text-center' role='alert'>
                Ha ocurrido un error al actualizar la venta <a href='editarVenta.php?id=$id_venta' class='alert-link'>Volver a intentar</a>.
            </div>
            </div>";
        }
    } else {
        // Obtener datos de la venta
        $sql = "SELECT * FROM ventas WHERE id_venta = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_venta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $venta = $resultado->fetch_assoc();

        // Obtener usuarios y zapatillas para el formulario
        $sql_usuarios = "SELECT id_usuario, nombre FROM usuarios";
        $resultado_usuarios = $mysqli->query($sql_usuarios);

        $sql_zapatillas = "SELECT id_zapatilla, marca, modelo, stock FROM zapatillas";
        $resultado_zapatillas = $mysqli->query($sql_zapatillas);
    ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Editar Venta</h1>
                <p class="lead">Actualizar los datos de una venta existente.</p>
            </div>
        </div>

        <div class="container">
            <form action="editarVenta.php?id=<?php echo $id_venta; ?>" method="post">
                <div class="form-group">
                    <label for="id_usuario">Usuario:</label>
                    <select name="id_usuario" id="id_usuario" class="form-control" required>
                        <?php while ($fila = $resultado_usuarios->fetch_assoc()): ?>
                            <option value="<?php echo $fila['id_usuario']; ?>" <?php echo $fila['id_usuario'] == $venta['id_usuario'] ? 'selected' : ''; ?>><?php echo $fila['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_zapatilla">Zapatilla:</label>
                    <select name="id_zapatilla" id="id_zapatilla" class="form-control" required>
                        <?php while ($fila = $resultado_zapatillas->fetch_assoc()): ?>
                            <option value="<?php echo $fila['id_zapatilla']; ?>" <?php echo $fila['id_zapatilla'] == $venta['id_zapatilla'] ? 'selected' : ''; ?>><?php echo $fila['marca'] . " " . $fila['modelo']; ?> (Stock: <?php echo $fila['stock']; ?>)</option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?php echo $venta['cantidad']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_venta">Fecha de Venta:</label>
                    <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" value="<?php echo $venta['fecha_venta']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Venta</button>
            </form>
            <br>
            <a href="ventas.php"><button type="button" class="btn btn-outline-primary">Volver a Ventas</button></a>
        </div>
    <?php
    }
    ?>
</body>

</html>
