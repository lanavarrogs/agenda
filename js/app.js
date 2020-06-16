const formularioContactos = document.querySelector('#contacto'),
      listadoContactos = document.querySelector('#listado-contactos tbody');

//Obtener los eventos
function eventListeners(){
    //Cuando el Formulario de crear o editar se ejecuta
    formularioContactos.addEventListener('submit',leerFormulario);
}
eventListeners();

function leerFormulario(e){
    e.preventDefault();
    //Leer los datos de los inputs
    const nombre = document.querySelector('#nombre').value,
          empresa = document.querySelector('#empresa').value,
          telefono = document.querySelector('#telefono').value,
          accion = document.querySelector('#accion').value;

    if(nombre === "" || empresa === "" || telefono === ""){
        //Dos parametros texto y clase
       mostrarNotificacion('Todos los campos son obligatorios','error');
    }else{
        //Pasa la validacion, crear llamado a Ajax
        const infoContacto = new FormData();
        infoContacto.append('nombre',nombre);
        infoContacto.append('empresa',empresa);
        infoContacto.append('telefono',telefono);
        infoContacto.append('accion',accion);

        if(accion ===  'crear'){
            //Crearemos un nuevo Elemento
            insertarBD(infoContacto);
        }else{
            //editar el contacto
        }
    }
}

/**Inserta en la base de datos AJAX **/
function insertarBD(datos){
    //llamar Ajax
    //Crear el objeto
    const  xhr = new XMLHttpRequest();
    //Abrir la conexion
    xhr.open('POST','includes/models/modelo-contacto.php');
    //Pasar los datos
     xhr.onload = function(){
         if(this.status === 200 ){
             console.log(JSON.parse(xhr.responseText));
             //Leemos la respuesta de php
             const respuesta = JSON.parse(xhr.responseText);

             //Inserta un nuevo elemento a la tabla
             const nuevoContacto = document.createElement('tr');

             nuevoContacto.innerHTML = `
                <td>${respuesta.datos.nombre}</td>
                <td>${respuesta.datos.empresa}</td>
                <td>${respuesta.datos.telefono}</td>
             `;

             //Crear contenedor para los botones
             const contenedorAcciones = document.createElement('td');

             //crear el incono de Editar
             const iconoEditar = document.createElement('i');
             iconoEditar.classList.add('fas','fa-pen-square');

             //Crea el enlace para Editar
             const btnEditar = document.createElement('a');
             btnEditar.appendChild(iconoEditar);
             btnEditar.href = `editar.php?id=${respuesta.id_insertado}`;
             btnEditar.classList.add('btn','btn-editar');

             //agregarlo al padre
             contenedorAcciones.appendChild(btnEditar);

             //crear el icono Eliminar
             const iconoEliminar = document.createElement('i');
             iconoEditar.classList.add('fas','fa-trash-alt');

             //crear el boton de eliminar
             const btnEliminar = document.createElement('button');
             btnEliminar.appendChild(iconoEliminar);
             btnEliminar.setAttribute('data-id',respuesta.datos.id_insertado);
             btnEditar.classList.add('btn','btn-borrar');

             //agregar el boton al padre
             contenedorAcciones.appendChild(btnEliminar);

             //Agregarlo al tr
             nuevoContacto.appendChild(contenedorAcciones);

             //Agregarlo con los contactos
             listadoContactos.appendChild(nuevoContacto);
         }
     }
    //Enviar los datos
    xhr.send(datos);
        
}
//Notificacion en pantalla
function mostrarNotificacion(mensaje,clase){
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase,'notificacion','sombra');
    notificacion.textContent = mensaje;

    //Formulario
    formularioContactos.insertBefore(notificacion,document.querySelector('form legend'));

    //Ocultar y mostrar la notificacion
    setTimeout(()=>{
        notificacion.classList.add('visible');
        setTimeout(()=>{
            notificacion.classList.remove('visible');
            setTimeout(()=>{
                notificacion.remove();
            },500)
        },2000);    
    },100);
}