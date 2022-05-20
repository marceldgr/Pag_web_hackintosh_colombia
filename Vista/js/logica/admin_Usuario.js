$(document).ready(function(){
    ajax_Ver_Usuario();
})
function ajax_Ver_Usuario(){
    $.ajax({
        url:"../../controlador/ajax/ajaxVerUsuario.php",
        success:function(result){
            insertar_Usuario_en_Tabla(JSON.parse(result))
        },
            error:function(xhr){
                alert("Ocurrio un error: " + xhr.status+" "+xhr.statusText);
            
        }});
}
function ajax_Registrar_Usuario(Nombre,Apellido,Email,Usuario,Password,Administrador){
    $.ajax({
        data:{
                "Nombre":Nombre,
                "Apellido":Apellido,
                "Email": Email,
                "Usuario":Usuario,
                "Password":Password,
                "Administrador":Administrador
        },
        type : "POST",
        dataType:"JSON",
        url:"../../controlador/ajax/ajaxRegistrarUsuario.php",
        success:function(result){
            $('#modal_Crear_Usuario').modal('hide');  
            insertar_Usuario_en_Tabla(Nombre,Apellido,Email,Usuario,Password,Administrador); 
        }})
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
        +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><a href="../controlador/accion/ac_editar_Usuario.php" class="editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</a>'

        +'<a href="../controlador/accion/ac_eliminar_Usuario.php?idUsuario='+result[i].id+'" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
        +'</tr>'
    }) 
    $("#usuarioRegistrado tbody").append(usuario)
    insertar_Datos_Usuario_Modal()
}
//Para agregar un usuario en la tabla despues de que se crea
function insertar_Usuario_En_Tabla(Nombre,Apellido,Email,Usuario,Password,Administrador){
    let usuario=''
    let id='0'
    usuario +='<tr id='+id+'>'
    +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Nombre+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Apellido+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Email+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Usuario+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Password+'</td>'
    +'<td width="10" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Administrador+'</td>'
    
    +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><a href="#" class="Editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</a>'

    +'<a href="../controlador/accion/ac_eliminar_Usuario.php?idUsuario='+id+'" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
    +'</tr>'
    $("#usuarioRegistrados tbody").append(usuario);
    insertar_Datos_Usuario_Modal();
}
function insertar_Datos_Usuario_Modal() {
    $(".Editar").on("click", function(){
        let idUsuario=$(this).closest("tr").attr("id");
        $.ajax({
            type:'POST',
            data:{idUsuario:parseInt(idUsuario,10)},
            url:"../../contralador/ajax/ajaxVerUsuario_id.php",
            success: function(data) {
                let usuario=JSON.parse(data)
           
                $("#modal_Editar_Usuario").modal('show');

                $("#modal_Editar_Usuario input[name='idUsuario']").val(usuario.id)
                $("#modal_Editar_Usuario input[name='Nombre']").val(usuario.Nombre)
                $("#modal_Editar_Usuario input[name='Apellidos']").val(usuario.Apellido)
                $("#modal_Editar_Usuario input[name='Email']").val(usuario.Email)
                $("#modal_Editar_Usuario input[name='Usuario']").val(usuario.Usuario)
                $("#modal_Editar_Usuario input[name='Password']").val(usuario.Password)
                if(usuario.Administrador == 1){
                    $("#modal_Editar_Usuario .rol option:eq(1)").prop('selected', true)
                }else{
                    $("#modal_Editar_Usuario .rol option:eq(0)").prop('selected', true)
                }
            }
        })
    })
    
}
