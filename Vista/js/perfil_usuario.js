$(document).ready(function(){
    
  
});
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

        success: function(response){
            
            console.log(response);
            var dimg=document.getElementById("img_perfil");
            console.log(dimg.src);
            dimg.src="../img/img_perfil_usuarios/"+response;
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

