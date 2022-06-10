$(document).ready(function(){
    //$("#usuarioRegistrados").DataTable();
    ajax_Ver_Usuario();
    
})
var id_usuario_a=0;
var foto_perfil_a="";
// Ver usuarios
function ajax_Ver_Usuario(){
    $.ajax({
        cache: false,
        url:"../../controlador/ajax/ajaxVerUsuario.php",
        success:function(result){
            console.log(result);
            insertar_Usuario_en_Tabla(JSON.parse(result));
            //limpiar_tabla()
        },
            error:function(xhr){
                alert("Ocurrio un error: " + xhr.status+" "+xhr.statusText);
            
        }});
        
}

$(document).on('submit','#modalr',function(e){
    e.preventDefault();
    Nombre=$("#Nombre").val();
    Apellido=$("#Apellido").val();
    Email=$("#Email").val();
    Usuario=$("#Usuario").val();
    Password=$("#Password").val();
    Adm=$("#Administrador").val();
 
    ajax_Registrar_Usuario(Nombre,Apellido,Email,Usuario,Password,Adm);
});

// Modal de editar
$(document).on('submit','#modal_e',function(e){
    e.preventDefault();
    Nombre=$("#Nombre_e").val();
    Apellido=$("#Apellido_e").val();
    Email=$("#Email_e").val();
    Usuario=$("#Usuario_e").val();
    Password=$("#Password_e").val();
    Adm=$("#Administrador_e").val();

    ajax_Editar_Usuario(Nombre,Apellido,Email,Usuario,Password,Adm);
    
});

function limpiar_tabla(){
    var r=$("#usuarioRegistrados tr").length;
    var tabla=$("#usuarioRegistrados");
    console.log(r);
    for(i=1;i<r;i++){
        document.getElementById("usuarioRegistrados").deleteRow(1);
    }
    ajax_Ver_Usuario();
}
function ajax_Registrar_Usuario(Nombre,Apellido,Email,Usuario,Password,Administrador){
     
    $.ajax({
        data:{
            "Nombre":Nombre,
            "Apellido":Apellido,
            "Email": Email,
            "Usuario":Usuario,
            "Password": Password,
            "Adm":Administrador
        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../../controlador/ajax/ajaxRegistrarUsuario.php"
    })
    .done(function(out) {
       console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        var est=response.estado;
        console.log(response);
        if(est!=0 &&est !=2 && est!=3){
            limpiar_tabla();
        }

        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Registrar Usuario"

            })
            .then((result) =>{
                $("#modal_Crear_Usuario").modal('hide');
                limpiar_modal();
                if(result){

                }
            })
        }
    })
   
}

function ajax_Editar_Usuario(Nombre,Apellido,Email,Usuario,Password,Administrador){
     
    $.ajax({
        data:{
            "IdUsuario":id_usuario_a,
            "Nombre":Nombre,
            "Apellido":Apellido,
            "Email": Email,
            "Usuario":Usuario,
            "Password": Password,
            "Img_perfil":foto_perfil_a,
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
        if(est!=0 &&est !=2 && est!=3){
            limpiar_tabla();
        }

        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Editar Usuario"

            })
            .then((result) =>{
                $("#modal_Editar_Usuario").modal('hide');
                if(result){
                    

                }
            })
        }
    })
   
}

function insertar_Usuario_en_Tabla(result){
    let usuario=''
    $.each(result, function(i){
        usuario +='<tr id=' +result[i].id+ '>'
        +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Nombre+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Apellido+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Email+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Usuario+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Password+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Administrador+'</td>'
        +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><button onclick="insertar_Datos_Usuario_Modal('+result[i].id+')" class="editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</button>'

        +'<button onclick="Eliminar_usuario('+result[i].id+')" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</button></td>'
        +'</tr>'
    }) 
    $("#usuarioRegistrados tbody").append(usuario);
   
}



function insertar_Datos_Usuario_Modal(idUsuario) {
  console.log(id_usuario_a);
  console.log(foto_perfil_a);
       // let idUsuario=$(this).closest("tr").attr("id");
        //console.log(idUsuario);
        $.ajax({
            type:'POST',
            data:{idUsuario:parseInt(idUsuario,10)},
            url:"./../../controlador/ajax/ajaxVerUsuario_id.php",
            success: function(data) {
                let usuario=JSON.parse(data)
           
                $("#modal_Editar_Usuario").modal('show');
                id_usuario_a=(usuario.id);
                foto_perfil_a=usuario.Img_perfil;
                
                $("#modal_Editar_Usuario input[id='idUsuario']").val(usuario.id)
                $("#modal_Editar_Usuario input[id='Nombre_e']").val(usuario.Nombre)
                $("#modal_Editar_Usuario input[id='Apellido_e']").val(usuario.Apellido)
                $("#modal_Editar_Usuario input[id='Email_e']").val(usuario.Email)
                $("#modal_Editar_Usuario input[id='Usuario_e']").val(usuario.Usuario)
                $("#modal_Editar_Usuario input[id='Password_e']").val(usuario.Password)
                $("#Administrador_e").val(usuario.Administrador)
                if(usuario.Administrador == 1){
                    $("#modal_Editar_Usuario .rol option:eq(1)").prop('selected', true)
                    
                }else{
                    $("#modal_Editar_Usuario .rol option:eq(0)").prop('selected', true)
                }
            }
        })
   
    
}

function Eliminar_usuario(idUsuario){
console.log(idUsuario);
    $.ajax({
        data:{
            "IdUsuario":idUsuario
        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../../controlador/ajax/ajaxEliminarUsuario.php"
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
                title:"Registrar Usuario"

            })
            .then((result) =>{
                limpiar_tabla();               
            })
        }
    })
}

function limpiar_modal(){
    // modal Editar
    $("#modal_Editar_Usuario input[id='idUsuario']").val("");
    $("#modal_Editar_Usuario input[id='Nombre_e']").val("");
    $("#modal_Editar_Usuario input[id='Apellido_e']").val("");
    $("#modal_Editar_Usuario input[id='Email_e']").val("");
    $("#modal_Editar_Usuario input[id='Usuario_e']").val("");
    $("#modal_Editar_Usuario input[id='Password_e']").val("");
    $("#Administrador_e").val("");

    // Modal Crear
    $("#modal_Crear_Usuario input[id='idUsuario']").val("");
    $("#modal_Crear_Usuario input[id='Nombre']").val("");
    $("#modal_Crear_Usuario input[id='Apellido']").val("");
    $("#modal_Crear_Usuario input[id='Email']").val("");
    $("#modal_Crear_Usuario input[id='Usuario']").val("");
    $("#modal_Crear_Usuario input[id='Password']").val("");
    $("#Administrador_e").val("");
}
