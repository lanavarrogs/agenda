<?php include 'includes/layout/header.php'?>

<div class="contenedor-barra">
    <h1>Agenda de contactos</h1>
</div>

<div class="bg-amarillo contenedor sombra">
    <form id="contacto" action="#">
        <legend>Añada un contacto <span>Todos los campos son obligatorios</span></legend>
        <div class="campos">
            <div class="campo"> 
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Nombre Contacto" id="nombre">
            </div>
            <div class="campo"> 
                <label for="empresa">Empresa:</label>
                <input type="text" placeholder="Nombre Empresa" id="empresa">
            </div>
            <div class="campo"> 
                <label for="telefono">Telefono:</label>
                <input type="tel" placeholder="Telefono Contacto" id="telefono">
            </div>
            <div class="campo enviar">
                <input type="submit" value="Añadir">
            </div>
        </div><!--Campos-->
    </form><!--Formulario-->
</div><!--Contedor-->


<?php include 'includes/layout/footer.php'?>