<?php
    error_reporting(E_ALL ^ E_NOTICE);

    if($_POST['accion'] == 'crear'){
        //Crear un nuevo registro en la base de datos
            require_once('../functions/db.php');
            //Obeteniendo los valores del metodo POST
            $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
            $empresa = filter_var($_POST['empresa'],FILTER_SANITIZE_STRING); 
            $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);

            try {
                $stmt = $conexion->prepare("INSERT INTO contactos(nombre,empresa,telefono) VALUES (?,?,?)");
                $stmt->bind_param("sss", $nombre ,$empresa ,$telefono);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'datos' => array(
                            'nombre' => $nombre,
                            'empresa'=> $empresa,
                            'telefono'=> $telefono,
                            'id_insertado' => $stmt->insert_id
                        ),
                    );
                }
                $stmt->close();
                $conexion->close();
            } catch (Exception $e) {
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
        echo json_encode($respuesta);
    }

    if($_GET['accion'] == 'borrar'){
        require_once('../functions/db.php');
        $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        try {
            $stmt = $conexion->prepare("DELETE FROM contactos WHERE id_contacto = ? ");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }
            $stmt->close();
            $conexion->close();
        } catch (\Exception $e) {
            $respuesta = array(
                'error' => $e_getMessage()
            );
        }
        echo json_encode($respuesta);
    }

    if($_POST['accion'] == 'editar'){
        require_once('../functions/db.php');
            //Validar las entradas
            $id= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
            $empresa = filter_var($_POST['empresa'],FILTER_SANITIZE_STRING); 
            $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
            try {
                $stmt = $conexion->prepare("UPDATE contactos SET nombre=?,empresa=?,telefono=? WHERE id_contacto = ?");
                $stmt->bind_param("sssi",$nombre,$empresa,$telefono,$id);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $respuesta = array(
                        'respuesta'=>'correcto'
                    );
                }else{
                    $respuesta =array(
                        'respuesta' => 'error'
                    );
                }
                $stmt->close();
                $conexion->close();
            } catch (\Exception $e) {
                $respuesta = array(
                    'error' => $e->getMessage()
                );
            }
        echo json_encode($respuesta);
    }

?>