document.getElementById("btn_registrar").addEventListener("click", register);
document.getElementById("btn_iniciar_sesion").addEventListener("click", Iniciar_Sesion);

window.addEventListener("resize",Ancho_paguina);
//variables date
var container_Logins_Register = document.querySelector(".container_logins-registers");
var formulario_Logins = document.querySelector(".formulario_login");
var formulario_Register = document.querySelector(".formulario_register");
var box_Logins = document.querySelector(".box_logins");
var box_Register = document.querySelector(".box_registros");



function Iniciar_Sesion() {
    if (window.innerWidth > 850) {

        formulario_Register.style.display = "none";
        container_Logins_Register.style.left = "10px";
        formulario_Logins.style.display = "block";
        box_Register.style.opacity = "1";
        box_Logins.style.opacity = "0";
    }
    else {
        formulario_Register.style.display = "none";
        container_Logins_Register.style.left = "0px";
        formulario_Logins.style.display = "block";
        box_Register.style.display = "block";
        box_Logins.style.display = "none";

    }
}

function register() {

    if (window.innerWidth > 850) {
        formulario_Register.style.display = "block";
        container_Logins_Register.style.left = "410px";
        formulario_Logins.style.display = "none";
        box_Register.style.opacity = "0";
        box_Logins.style.opacity = "1";
    }
    else {
        formulario_Register.style.display = "block";
        container_Logins_Register.style.left = "0px";
        formulario_Logins.style.display = "none";
        box_Register.style.display = "none";
        box_Logins.style.display = "block";
        box_Logins.style.opacity = "1";
    }
}

Ancho_paguina();

function Ancho_paguina(){
    if(window.innerWidth>850){
        box_Logins.style.display = "block";
        box_Register.style.display="block";
    }
    else{
        box_Register.style.display = "block";
        box_Register.style.opacity = "1";
        box_Logins.style.display="none";
        formulario_Logins.style.display="block";
        formulario_Register.style.display="none";
        container_Logins_Register.style.left="0px";
    }
}