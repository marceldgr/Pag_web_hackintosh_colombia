
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
$(document).on('submit','#formlg',function(e){
    e.preventDefault();
    Email=$("#Email_log").val();
    Password=$("#password_log").val();
    if(Email!="" && Password!=""){
        ajaxLogin(Email,Password);

    }
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
        var limite=out.indexOf(');');
        
        //console.log(out);
        out=out.slice(24,limite);
        console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        console.log(response.ruta);
        window.location.href =response.ruta;
        /*if(msj!=""){
            Swal.fire({
                text: msj,
                icon: response.type,
                title:"Inicio de Sesion"

            })
            .then((result) =>{
                if(result.isConfirmed){
                    $(Location).attr('href',response.ruta);
                }
            })
        }*/ 
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(textStatus);
        Swal.fire({
            title:"alerta",
            text:"la solicitud a fallado"+errorThrown

        });
    });

}













/*function onSignIn(googleUser){
    let profile=googleUser.getBasicProfile()
    localStorage.setItem('id',profile.getId())
    localStorage.setItem('name',profile.getName())
    localStorage.setItem('email',profile.getEmail())
    localStorage.setItem('image',profile.getImageUrl())
    window.location.replace(" ")
}
$(document).ready(function(){
    
    $(document).on('click','#btnIniciar',function(){
        user=$("#Email_log").val();
        pass=$("#password_log").val();

        if(user!="" && pass!=""){
            console.log('valida datos');
            ajaxLogin(user,pass);
        }

    });
});

function ajaxLogin(user,pass){
    console.log("ajax login "+ user +" "+ pass);
    $.ajax({
        type:"POST",
        //url:"/Pag_web_hackintosh_colombia/controlador/ajax/ajaxLogin.php",
        url:"./../controlador/ajax/ajaxLogin.php",
        dataType:"json",
        data:{
            "user" : user,
            "pass" : pass
        }
    })
    .done(function(response){
        console.log("entro");
        
        var mens=response.msg;
        if(mens!="0"){
            alert('hola');
            $(location).attr('href',response.ruta);
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(textStatus);
        console.log(errorThrown);
    })
    .always(function(){
        console.log("Complete");
    })
    
}*/