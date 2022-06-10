
/*$(document).ready(function() {
    id=null;
    $(document).on('click','#btnEntrar',function(){
        Email=$("#Email_log").val();
        Password=$("#password_log").val();
        if(Email!=" " && Password!=" "){
            ajaxLogin(Email,Password);

        }
    });
});*/
//Login
$(document).on('submit','#formlg',function(e){
    e.preventDefault();
    Email=$("#Email_log").val();
    Password=$("#password_log").val();
    if(Email!="" && Password!=""){
        ajaxLogin(Email,Password);

    }
});

// Registrar
$(document).on('submit','#formrg',function(e){
    e.preventDefault();
  
    Nombre=$("#Nombre").val();
    Apellido=$("#Apellido").val();
    Email=$("#Email").val();
    Usuario=$("#Usuario").val();
    Password=$("#Password").val();
    ajaxRegistro(Nombre,Apellido,Email,Usuario,Password);

});

function ajaxLogin(Email, Password){
    $.ajax({
        data:{
            "Email": Email,
            "Password": Password
        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../controlador/ajax/ajaxLogin.php"
    })
    .done(function(out) {
        /*var inicio =out.indexOf('({')+1;
        var limite=out.indexOf(');');
        console.log(inicio);
        console.log(out);
        out=out.slice(inicio,limite);*/
       // console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        //console.log(response.ruta);
        //window.location.href =response.ruta;
        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Inicio de Sesion"

            })
            .then((result) =>{
               
                if(result){
                   
                   // $(Location).attr('href',response.ruta);
                    window.location.href =response.ruta;
                }
            })
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(textStatus);
        Swal.fire({
            title:"alerta",
            text:"la solicitud a fallado"+errorThrown

        });
    });

}

function ajaxRegistro(Nombre,Apellido,Email,Usuario,Password){
    $.ajax({
        data:{
            "Nombre":Nombre,
            "Apellido":Apellido,
            "Email": Email,
            "Usuario":Usuario,
            "Password": Password,
            "Adm":0
        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../controlador/ajax/ajaxRegistrarUsuario.php"
    })
    .done(function(out) {
        /*var inicio =out.indexOf('({')+1;
        var limite=out.indexOf(');');
        console.log(inicio);
        console.log(out);
        out=out.slice(inicio,limite);*/
       // console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        var est=response.estado;
        console.log(response);
        //console.log(response.ruta);
        //window.location.href =response.ruta;
        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Inicio de Sesion"

            })
            .then((result) =>{
               
                if(result){
                   
                   // $(Location).attr('href',response.ruta);
                    //window.location.href =response.ruta;
                }
            })
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(textStatus);
        Swal.fire({
            title:"alerta",
            text:"la solicitud a fallado"+errorThrown

        });
    });

}











function onSignIn(googleUser){
    let profile=googleUser.getBasicProfile()
    localStorage.setItem('id',profile.getId())
    localStorage.setItem('name',profile.getName())
    localStorage.setItem('email',profile.getEmail())
    localStorage.setItem('image',profile.getImageUrl())
    window.location.replace(" index.html")
}
