
var formulario;
var ocultar;
var mostrar;
var mostrar2;
var ocultar2;
var formulario2;


window.onload = function () {
    formulario = document.getElementById("formulario");
    
    formulario2 = document.getElementById("formulario2");
    
    ocultar = document.getElementById("boton");
    ocultar2 =document.getElementById("cancelar2");
    
    mostrar = document.getElementById("agregar");
    mostrar2 = document.getElementById("eliminar"); 
    
        
    
    
    formulario.classList.add("escondido"); 
    formulario2.classList.add("escondido");
    
    mostrar.onclick = mostrarf;
    mostrar2.onclick = mostrarf2;
    
    ocultar.onclick = ocultarf;
    ocultar2.onclick = ocultarf2;
    
}

function mostrarf() {
    
    
    formulario.classList.remove("escondido");
    
}

function ocultarf(){
    formulario.classList.add("escondido");
}

function mostrarf2(){
    formulario2.classList.remove("escondido");
}

function ocultarf2(){
        formulario2.classList.add("escondido");

}