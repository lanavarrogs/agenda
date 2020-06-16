<?php
    function ObtenerContactos(){
        include 'db.php'; 
        try {
            return $conexion->query("SELECT id_contacto,nombre,empresa,telefono FROM contactos");
        } catch (\Exception $e) {
            echo "Error" . $e->getMessage() . "<br>";
            return false;
        }
    }
?>