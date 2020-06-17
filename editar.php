<?php
    include 'includes/functions/funciones.php';
    include 'includes/layout/header.php';
    $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);

    if(!$id){
        die("No es valido");
    }

    $resultado = obtenerContacto($id);
    $contacto = $resultado->fetch_assoc();
?>
    <div class="contenedor-barra">
        <div class="contenedor barra">
            <a href="index.php" class="btn-volver"><i class="fas fa-arrow-left"></i></a>
            <h1>Editar Contacto</h1>
        </div>
    </div>

    <div class="bg-amarillo contenedor sombra">
        <form id="contacto" action="">
            <legend>Edite el contacto</legend>
            <?php include 'includes/layout/formulario.php' ?>
        </form><!--Formulario-->
    </div><!--Contedor-->

<?php include 'includes/layout/footer.php'?>