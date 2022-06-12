//Aqui es donde usará jQuery
$(document).ready(function(){
    console.log("hola");
    id=null;
    $(document).on('click', '#btnEnviar', function(){
        console.log("Hola");
        Email=$("#Email").val();
     
        //Incluir todas las validaciones..
        if(Email!=""){
            ajaxOlvidoPass(Email);
        }
        else{
            Swal.fire({
                text:"Digite los datos del correo",
                icon: "Error",
                title: "Email"
            })
        }

    });
    $(document).on('click', '#btnCancelar', function(){
        $(location).attr('href',"Login.php");
    });
  });

// Aqui viene el uso de AJAX con jQuery
function ajaxOlvidoPass(){
    Email=$("#Email").val();
    console.log(Email);
        $.ajax({ // sin utilizar XML,... usar json
            data: { //Datos a enviar
                   "Email" : Email
            },
            type: "POST",
            dataType: "json",
            url: "./../../controlador/ajax/ajaxOlvidarPass.php"
        })
         .done(function(response) { 
             console.log(response);
            // Cuando no hay problema
            var mens=response.msg;

            if(mens!=""){
                Swal.fire({
                    text:mens,
                    //icon: response.type,
                    title: "Envío de Email"

                }).then((result) => {
                    if (result.isConfirmed) {
                    $(location).attr('href',response.ruta); //Redireccinar a una ruta
                    }
                  })
                
               
            }
            /* hacer append, modificar o eliminar de lo ingresau */
         })
         .fail(function(jqXHR, textStatus, errorThrown) {  // Si encuentra algun problema

            Swal.fire({
                title: "ALERTA",

                text: "La solicitud a fallado: " +  errorThrown
            });
        });
}

function regresar(){
    window.location.href ="/../../Vista/Login.php"
  }



function onSignIn(googleUser){

    let profile = googleUser.getBasicProfile()
    localStorage.setItem('id', profile.getId())
    localStorage.setItem('name', profile.getName())
    localStorage.setItem('email', profile.getEmail())
    localStorage.setItem('image', profile.getImageUrl())
    
    window.location.replace("tabata.php")
}

