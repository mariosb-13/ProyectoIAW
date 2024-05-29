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
    $usuario = $_POST['usuario'];
    $passwd = $_POST['passwd'];

    require 'conexion.php';


    $sql = "SELECT * FROM usuarios WHERE usuario like '$usuario' AND password like '$passwd'";


    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        // Usuario y contraseña correctos
        header("Location: zapatillas.php?usuario=$usuario");
    } else {
        // Usuario o contraseña incorrectos
        echo "<div class='container mt-4'>
                <div class='alert alert-danger text-center' role='alert'>
                    Usuario o contraseña incorrectos. <a href='login.php' class='alert-link'>Volver a intentar</a>.
                </div>
              </div>";
    }
    ?>
</body>

</html>