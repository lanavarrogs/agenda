const formularioContactos = document.querySelector('#contacto');
console.log(formularioContactos);

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
          empresa = document.querySelector('#nombre').value,
          telefono = document.querySelector('#nombre').value;

    if(nombre === "" || empresa === "" || telefono === ""){
        //Dos parametros texto y clase
       mostrarNotificacion('Todos los campos son obligatorios','error');
    }else{
        
    }
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