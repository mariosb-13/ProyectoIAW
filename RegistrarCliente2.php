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

    <title>Snkrs.Pro - Registrar Cliente</title>
</head>

<body>
    <?php
    require 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $ciudad = $_POST['ciudad'];

        // Verificar que el número de teléfono no sea negativo
        if ($telefono < 0) {
            echo "<div class='container mt-4'>
                <div class='alert alert-danger text-center' role='alert'>
                    El número de teléfono no es válido. <a href='registrarCliente.php' class='alert-link'>Volver a intentar</a>.
                </div>
                </div>";
        } else {
            // Preparar y ejecutar la sentencia
            $sql = "INSERT INTO clientes (Nombre, Apellido, Email, Telefono, Ciudad) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssis", $nombre, $apellido, $email, $telefono, $ciudad);

            if ($stmt->execute()) {
                echo "<div class='container mt-4'>
                    <div class='alert alert-success text-center' role='alert'>
                        El cliente ha sido registrado correctamente. <a href='clientes.php' class='alert-link'>Ver clientes</a>.
                    </div>
                    </div>";
            } else {
                echo "<div class='container mt-4'>
                    <div class='alert alert-danger text-center' role='alert'>
                        Ha ocurrido un error al registrar el cliente. <a href='registrarCliente.php' class='alert-link'>Volver a intentar</a>.
                    </div>
                    </div>";
            }
            $stmt->close();
        }
    }
    ?>
</body>

</html>
