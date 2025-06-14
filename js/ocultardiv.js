var formulario;
var cancelar;
var formulario2;
//var cancelar2;


window.onload = function () {
    formulario = document.getElementById("formulario");
    cancelar = document.getElementById("cancelar"); 
   
  
    formulario2 = document.getElementById("formulario2");
    //cancelar2 = document.getElementById("cancelar2");
    
    var agregar = document.getElementById("agregar"); agregar.onclick = mostrarformulario;     
    var ocultar = document.getElementById("boton");    
 

    ocultar.onclick = ocultarformulario;

    
   var eliminar = document.getElementById("eliminar");
   eliminar.onclick = mostrarformulario2;

    var ocultar2 = document.getElementById("boton_cancelar");
    
    ocultar2.onclick = ocultarformulario2;
    
    
    
        
    formulario.classList.add("escondido");
   // cancelar.classList.add("escondido");
    formulario2.classList.add("escondido");
    
    formulario.classList.add("escondido");
}



function mostrarformulario() {
    
formulario.classList.remove("escondido");
cancelar.classList.remove("escondido");
  
    
}

function ocultarformulario() {
    formulario.classList.add("escondido");
    //cancelar.classList.add("escondido");
}

function mostrarformulario2() {
    formulario2.classList.remove("escondido");
    
    
}


function ocultarformulario2() {
    formulario2.classList.add("escondido");
    
    
}



