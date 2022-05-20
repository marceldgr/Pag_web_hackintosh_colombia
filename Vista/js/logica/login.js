
$(document).ready(function() {
    id=null;
    $(document).on('click','#btn_entrar',function(){
        Email=$("#Email").val();
        Password=$("#Password").val();
        if(Email!=" " && Password!=" "){
            ajax_Login(Email,Password);

        }
    });
});
function ajax_Login(Email, Password){
    $.ajax({
        data:{
            "Email": Email,
            "Password": Password
        },
        type:"POST",
        dataType:"json",
        url:"../controlador/ajax/ajaxLogin.php"
    })
    .done(function(response) {
        var mesj = response.msg;
        if(mesj!=""){
            Swal.fire({
                text: mesj,
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
    .fail(function(jqxhr, textStatus, errorThrown){
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
