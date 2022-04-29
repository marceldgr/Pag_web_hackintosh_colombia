document.getElementById("icon_menu").addEventListener("click",mostrar_menu);

function mostrar_menu(){
    document.querySelector(".menu").classList.toggle("mostrar_menu");
}
window.onscroll = function(){
    var position=window.pageYOffset || document.documentElement.scrollTop;
    var elemento1=document.getElementById("grupo_persona");
    var elemento2=document.getElementById("FondoLaptos");
    elemento1.style.bottom= position * 0.1+"px";
    elemento2.style.top = position *0.1+"px";
    
}