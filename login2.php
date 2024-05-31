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

    <title>Snkrs.Pro - Iniciar Sesión</title>
</head>

<body>
    <?php
    require 'conexion.php';

    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];

    // Preparar la consulta SQL para evitar inyecciones SQL
    $sql = $mysqli->prepare("SELECT * FROM usuarios WHERE Usuario = ? AND Password = ?");

    $sql->bind_param("ss", $usuario, $passwd);
    $sql->execute();

    // Obtener los resultados de la consulta
    $resultado = $sql->get_result();
    $fila = $resultado->fetch_assoc();

    if ($fila > 0) {
        // Usuario y contraseña correctos
        header("Location: zapatillas.php?usuario=$usuario");
        exit();
    } else {
        // Usuario/contraseña incorrectos
        echo "<div class='container mt-4'>
            <div class='alert alert-danger text-center' role='alert'>
                Usuario o contraseña incorrectos. <a href='login.php' class='alert-link'>Volver a intentar</a>.
            </div>
          </div>";
    }

    // Liberar los resultados y cerrar la declaración
    $sql->close();
    ?>

</body>

</html>