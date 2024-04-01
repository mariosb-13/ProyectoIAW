<?php

try {
    $mysqli = new mysqli("localhost", "root", "", "proyectoiaw");
} catch (mysqli_sql_exception $e) {
    echo "Fallo al conectar a MySQL: (" , $e->getCode() , ")", $e->getMessage();
}

?>