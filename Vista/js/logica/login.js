$(document).ready(function() {
    id=null;
    $(document).on('click','#btnEntrar',function(){
        Email=$("#email").val();
        Password=$("#password").val();
        if(email!=" " && password!=" "){
            ajaxLogin(Email,Password);

        }
    });
});
function ajaxLogin(Email, Password){
    $ajax({
        data:{
            "Email": Email,
            "Password": Password
        },
        type:"POST",
        dataType:"json",
        url:"../../../controlador/ajax/ajaxLogin.php"
    })
    .done(function(response) {
        var msj = response.msg;
        if(msj!=""){
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
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown){
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
    window.location.replace(" ")
}