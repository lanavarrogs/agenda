<?php include 'includes/layout/header.php'?>

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
        <p class="total-contactos"><span>2</span> Contactos</p>
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
                    <tr>
                        <td>Luis Angel</td>
                        <td>Udemy</td>
                        <td>55862667</td>
                        <td>
                            <a href="editar.php?id=1" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="1" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody><!--Cuerpo de la tabla-->
            </table><!--Fin de la tabla-->
        </div><!--Contenedor-tabla-->
    </div><!--Contenedor Contactos-->
</div><!--contactos-->


<?php include 'includes/layout/footer.php'?>