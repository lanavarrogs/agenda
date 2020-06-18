<?php   
        include 'includes/layout/header.php';
        include 'includes/functions/funciones.php';
?>

<div class="contenedor-barra">
    <h1>Agenda de contactos</h1>
</div>

<div class="bg-amarillo contenedor sombra">
    <form id="contacto" action="">
        <legend>Añada un contacto <span>Todos los campos son obligatorios</span></legend>
        <?php include 'includes/layout/formulario.php' ?>
    </form><!--Formulario-->
</div><!--Contedor-->

<div class="bg-blanco contenedor sombra contactos">
    <div class="contenedor-contactos">
        <h2>Contactos</h2>
        <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contacto">
        <p class="total-contactos"><span></span> Contactos</p>
        <div class="contenedor-tabla">
            <table id="listado-contactos" class="listado-contactos">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead><!--Cabeza de la tabla-->
                <tbody>
                    <?php $contactos = ObtenerContactos();
                        if($contactos->num_rows){  
                            foreach ($contactos as $contacto) { ?>
                            <tr>
                                <td><?php echo $contacto['nombre']?></td>
                                <td><?php echo $contacto['empresa']?></td>
                                <td><?php echo $contacto['telefono']?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $contacto['id_contacto']?>" class="btn-editar btn">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <button data-id="<?php echo $contacto['id_contacto'] ?>" type="button" class="btn-borrar btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php }
                            } 
                        ?>   
                </tbody><!--Cuerpo de la tabla-->
            </table><!--Fin de la tabla-->
        </div><!--Contenedor-tabla-->
    </div><!--Contenedor Contactos-->
</div><!--contactos-->


<?php include 'includes/layout/footer.php'?>