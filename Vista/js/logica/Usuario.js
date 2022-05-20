$(document).ready(function() {
    VerUsuario()
})

function VerUsuario() {
    $.ajax({url:"../../controlador/ajax/ajaxVerUsuario.php",
    success: function(result){
        agregar_Usuario_tabla(JSON.parse(result))
    }
    })
}
function agregar_Usuario_tabla(result){
    let usuario=' '
    $.each(result, function(i){
        usuario +='<tr id='+result[i].id+'>'
        +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Nombre+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Apellido+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Email+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Usuario+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Password+'</td>'
                
        +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><a href=".#" class="editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</a>'

        +'<a href="../controlador/accion/ac_eliminar_Usuario.php?idUsuario='+result[i].id+'" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
        +'</tr>'
    })
    $("#usuario_Registrados tbody").append(usuario)
    insertar_Datos_Usuario_Modal()
}
function insertar_Datos_Usuario_Modal(){
    $(".Editar").on("click", function(){
        let idUsuario=$(this).closest("tr").attr("id");
        
        $.ajax({
            type: "POST",
            data:{idUsuario: parseInt(idUsuario,10)},
            success: function(data){
                let usuario=json.parse(data)
                $("#modal_Editar_Usuario").modal("show");
                $("#modal_Editar_Usuario input[name='idUsuario']").val(idUsuario.idUsuario)
                $("#modal_Editar_Usuario input[name='Nombre']").val(usuario.Nombre)
                $("#modal_Editar_Usuario input[name='Apellidos']").val(usuario.Apellido)
                $("#modal_Editar_Usuario input[name='Email']").val(usuario.Email)
                $("#modal_Editar_Usuario input[name='Usuario']").val(usuario.Usuario)
                $("#modal_Editar_Usuario input[name='Password']").val(usuario.Password)
                if(usuario.Administrador== 1){
                    $("#modal_Editar_Usuario .rol opcion:eq(1)").prop('selected,true')
                }else{
                    $("#modal_Editar_Usuario .rol opcion:eq(0)").prop('selected,tre')
                }
            }
        })  
    })
}