<?php

    //Credenciales de la base de datos
    define('DB_USUARIO','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');
    define('DB_NOMBRE','agendaphp');

    $conexion = new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);

    echo $conexion->ping();

?>