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

    //Obtiene un Contacto con un id
    function ObtenerContacto($id){
        include 'db.php'; 
        try {
            return $conexion->query("SELECT id_contacto,nombre,empresa,telefono FROM contactos WHERE id_contacto = $id");
        } catch (\Exception $e) {
            echo "Error" . $e->getMessage() . "<br>";
            return false;
        }
    }


?>