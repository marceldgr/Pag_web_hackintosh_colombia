$(document).ready(function(){
    var dimg=document.getElementById("img_perfil");
            console.log(dimg.src);
  
});
var foto_perfil=$("#foto_perfil").val();
$(document).on("click","#img_perfil",function(){
    $("#nueva_foto").click();
});

$('input[id=nueva_foto]').change(function() {
    //$('#photoCover1').val($(this).val());
    subir_fichero();
});
function subir_fichero(){
    var formData=new FormData();
    var files=$('#nueva_foto')[0].files[0];
    formData.append('files',files);
    console.log(files.name);
    $.ajax({
        url: './../../controlador/ajax/ajax_actualizar_imagen.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false, 

        success: function(out){
            var response=JSON.parse(out);
            console.log(response);
            var dimg=document.getElementById("img_perfil");
            console.log(dimg.src);           
            dimg.src=response.ruta;
            foto_perfil=response.nombre_imagen;
            console.log(dimg.src);
            Swal.fire({
                text: "perfil actualizado",
                //icon: response.type,
                title:"Foto de perfil"

            });
           

        }
    }).done(function(out){
        //console.log(out);
    });
    
   
}

$(document).on('submit','#datos',function(e){
    e.preventDefault();
    Nombre=$("#Nombre").val();
    Apellido=$("#Apellido").val();
    Email=$("#Email").val();
    Usuario=$("#Usuario").val();
    Password=$("#Password").val();
    Adm=$("#Adm").val();
    console.log("hola");
    ajax_Editar_Usuario(Nombre,Apellido,Email,Usuario,Password,Adm);
    
});

function ajax_Editar_Usuario(Nombre,Apellido,Email,Usuario,Password,Administrador){
    id_usuario=$("#id_usuario").val();
    $.ajax({
        data:{
            "IdUsuario":id_usuario,
            "Nombre":Nombre,
            "Apellido":Apellido,
            "Email": Email,
            "Usuario":Usuario,
            "Password": Password,
            "Img_perfil":foto_perfil,
            "Adm":Administrador
        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../../controlador/ajax/ajaxEditarUsuario.php"
    })
    .done(function(out) {
       console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        var est=response.estado;
        console.log(response);     

        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Editar Usuario"

            })
            .then((result) =>{

            })
        }
    })
   
}

