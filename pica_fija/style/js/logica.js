var arrn=[-1,-1,-1,-1];
var n_intento=0;
var intentos=new Array();
var np=0;
var nf=0;
var tablaIntentos=document.getElementById('tbIntentos');

nuevo_juego();


/* Agregar el evento click a los botones de clase btnumero */
const botonesNumeros=document.querySelectorAll('.btnumero');

botonesNumeros.forEach(boton => {  
    boton.addEventListener('click',() =>{
        let display=document.getElementById("numero");
        let nmr=boton.innerHTML;      
        display.value+=nmr;
    })
})



function Generar_numero(){
    arrn[0]=Math.floor(Math.random() * 10);
    var  nr;
    for( i=1;i<4;i++){      
            
        do {
            nr=Math.floor(Math.random() * 10);
            console.log(nr)        
        } while (arrn.includes(nr));
        arrn[i]=nr  
        
    }
}
function jugar(){
    if(n_intento==10){
        alert('No tiene mas intentos');
        return 0;
    }
    if(validar_numero()){
        comparar_numeros();
        var numeroIngresado=document.getElementById("numero").value;
        intentos[n_intento]={n:numeroIngresado,p:np,f:nf,ni:n_intento+1}
        n_intento++;
        cargar_datos_tabla();
        Limpiar_texto();
    }else{
        alert('Numero no valido');
    }
    
    
}
function validar_numero(){
    var numeroIngresado=document.getElementById("numero").value;
    arrd=extraerDigitos(numeroIngresado);
    let arraux=extraerDigitos(numeroIngresado);
    console.log (arrd);
    let aux=0;
    if(arrd.length!=4){
        return false;
    }
    for(i=0;i<4;i++){
        aux=arraux[i];
        arraux[i]=-1;
        if(arraux.includes(aux)){
            console.log('Numero repetido');
            return false;
            break;
        }
    } 
    return true;
}

function extraerDigitos(numero){
    return [...`${numero}`].map(c => parseInt(c)); 
}
function comparar_numeros(){
     np=0;
     nf=0;

    for(i=0;i<4;i++){
        if(arrn[i]==arrd[i]){
            nf++;
        }else if(arrn.includes(arrd[i])){
            np++;
        }
    }
    if(nf==4){
        console.log('Numero encontrado ');
        alert('Numero encontrado ');
        console.log(intentos)
    }else{
        console.log('picas '+ np + ' fijas ' +nf);
    }  

}
function cargar_tabla(){
    let cuerpotabla=document.createElement('tbody');
    
    intentos.forEach(i =>{
        let fila=document.createElement('tr');
        let td=document.createElement('td');
        td.innerText=i.n;
        fila.appendChild(td);

        td=document.createElement('td');
        td.innerText=i.p;
        fila.appendChild(td);

        td=document.createElement('td');
        td.innerText=i.f;
        fila.appendChild(td);

        td=document.createElement('td');
        td.innerText=i.ni;
        fila.appendChild(td);


        cuerpotabla.appendChild(fila);


    });

    tablaIntentos.appendChild(cuerpotabla);
}

function cargar_datos_tabla(){
    for(i=1;i<=10;i++){
        if(i<=n_intento){
            let celdas=document.getElementById('tbIntentos').rows[i].cells;
            celdas[0].innerText=intentos[i-1].n;
            celdas[1].innerText=intentos[i-1].p;
            celdas[2].innerText=intentos[i-1].f;
            celdas[3].innerText=intentos[i-1].ni;
        }
    }
}
function limpiar_tabla(){
    for(i=1;i<=10;i++){
       
        let celdas=document.getElementById('tbIntentos').rows[i].cells;
        celdas[0].innerText=".";
        celdas[1].innerText=".";
        celdas[2].innerText=".";
        celdas[3].innerText=".";
      
    }
}
function nuevo_juego(){
    arrn=[-1,-1,-1,-1]
    n_intento=0;
    np=0;
    nf=0;
    Generar_numero();
    limpiar_tabla();
    //console.log (arrn);
    Limpiar_texto();
    
}
function Limpiar_texto(){
    let display=document.getElementById("numero");           
    display.value="";
    display.focus();
}