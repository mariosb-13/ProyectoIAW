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
    $sql = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario= ?");
    $sql->bind_param("s", $usuario);

    // Ejecutar la consulta
    $sql->execute();

    // Obtener el resultado
    $resultado = $sql->get_result();
    $fila = $resultado->fetch_assoc();

    // Comprueba que la contraseña proporcionada por el usuario es la misma almacenada en la base de datos
    if ($fila && password_verify($passwd, $fila['Password'])) {
        // Iniciar sesión
        session_start();

        // Guardar información del usuario en la sesión
        $_SESSION['usuario'] = $usuario;

        // Redirigir al usuario a la página de zapatillas
        header("Location: index.php");
        exit();
    } else {
        // Usuario/contraseña incorrectos
        echo "<div class='container mt-4'>
                <div class='alert alert-danger text-center' role='alert'>
                    Usuario o contraseña incorrectos. <a href='login.php' class='alert-link'>Volver a intentar</a>.
                </div>
              </div>";
    }

    // Cerrar la declaración y la conexión
    $sql->close();
    $mysqli->close();
    ?>

</body>

</html>
