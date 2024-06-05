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
    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <h1 class="card-title text-center">Iniciar Sesión</h1>
                <form action="login2.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwd" class="form-label">Contraseña</label>
                        <input type="password" name="passwd" id="passwd" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <a href="cambiarPasswd.php" class="text-secondary">¿Ha olvidado la contraseña?</a>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-custom">Iniciar sesión</button>
                    </div>
                    <div class="text-center">
                        <a href="index.php" class="btn btn-danger btn-custom">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
