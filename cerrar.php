<?php
session_start();
// Cerrar la sesion del usuario que este logueado
session_destroy();
header("Location: index.php");
?>