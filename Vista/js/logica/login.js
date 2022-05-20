
/*$(document).ready(function() {
    id=null;
<<<<<<< HEAD
    $(document).on('click','#btnEntrar',function(){
        Email=$("#Email_log").val();
        Password=$("#password_log").val();
        if(Email!=" " && Password!=" "){
            ajaxLogin(Email,Password);
=======
    $(document).on('click','#btn_entrar',function(){
        Email=$("#Email").val();
        Password=$("#Password").val();
        if(Email!=" " && Password!=" "){
            ajax_Login(Email,Password);
>>>>>>> 159eed4193ef3bc980880d60deed445098270990

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
<<<<<<< HEAD

function ajaxLogin(Email, Password){
=======
function ajax_Login(Email, Password){
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
    $.ajax({
        data:{
            "Email": Email,
            "Password": Password
        },
<<<<<<< HEAD
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
=======
        type:"POST",
        dataType:"json",
        url:"../controlador/ajax/ajaxLogin.php"
    })
    .done(function(response) {
        var mesj = response.msg;
        if(mesj!=""){
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
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
        }*/ 
    })
<<<<<<< HEAD
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(textStatus);
=======
    .fail(function(jqxhr, textStatus, errorThrown){
>>>>>>> 159eed4193ef3bc980880d60deed445098270990
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
