<?php
session_start();
// Cerrar la sesion del usuario que este logeado
session_destroy();
header("Location: index.php");
?>