const formularioContactos = document.querySelector('#contacto');

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
            //Leemos la respuesta de php
            const respuesta = JSON.parse(xhr.responseText);
            console.log(respuesta);
        }
    }
    //Enviar los datos
    xhr.send(datos)
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