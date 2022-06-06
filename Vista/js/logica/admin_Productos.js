$(document).ready(function(){
    ajax_Ver_Producto();
})
function ajax_Ver_Producto(){
    $.ajax({
        cache: false,
        url:"./../../../controlador/ajax/ajax_Ver_Producto.php",
        success:function(result){
            console.log(result);
            insertar_Producto_en_Tabla(JSON.parse(result))
        },
            error:function(xhr){
                alert("Ocurrio un error: " + xhr.status+" "+xhr.statusText);
            
        }});
}
function ajax_Registrar_Producto(Marca,Modelo,Fecha_Ingreso,Cantidad,Precio,Codigo,imagen){
    $.ajax({
        data:{
            "Marca":Marca,
            "Modelo":Modelo,
            "Fecha_Ingreso":Fecha_Ingreso,
            "Cantidad":Cantidad,
            "Precio":Precio,
            "Codigo":Codigo, 
            "imagen":imagen,   
         
        },
        type : "POST",
        dataType:"JSON",
        url:"../../controlador/ajax/ajax_Registrar_Producto.php",
        success:function(result){
            $('#modal_Crear_Producto').modal('hide');  
            insertar_Producto_en_Tabla(Marca,Modelo,Fecha_Ingreso,Cantidad,Precio,Codigo,imagen); 
        }})
}

function insertar_Producto_en_Tabla(result){
    let Producto=''
    $.each(result, function(i){
        Producto +='<tr id=' +result[i].id+ '>'
        +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Marca+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Modelo+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Fecha_Ingreso+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Cantidad+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Precio+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Codigo+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].imagen+'</td>'
        +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><a href="../controlador/accion/ac_editar_Usuario.php" class="editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</a>'

        +'<a href="../controlador/accion/ac_Eliminar_Producto.php?idUsuario='+result[i].id+'" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
        +'</tr>'
    }) 
    $("#Productos_Registrados tbody").append(Producto)
    insertar_Datos_Productos_Modal()
}
//Para agregar un producto en la tabla despues de que se crea
function insertar_Producto_En_Tabla(Marca,Modelo,Fecha_Ingreso,Cantidad,Precio,Codigo,imagen){
    let Producto=''
    let id='0'
    Producto +='<tr id='+id+'>'
    +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Marca+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Modelo+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Fecha_Ingreso+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Cantidad+'</td>'
    +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Precio+'</td>'
    +'<td width="10" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+Codigo+'</td>'
    +'<td width="10" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+imagen+'</td>'
    
    +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><a href="#" class="Editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</a>'

    +'<a href="../controlador/accion/ac_Eliminar_Producto.php?idUsuario='+id+'" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
    +'</tr>'
    $("#Productos_Registrados tbody").append(Producto);
    insertar_Datos_Productos_Modal();
}
function insertar_Datos_Productos_Modal() {
    $(".Editar").on("click", function(){
        let idProducto=$(this).closest("tr").attr("id");
        $.ajax({
            type:'POST',
            data:{idProducto:parseInt(idProducto,10)},
            url:"../../contralador/ajax/ajax_Ver_Producto_id.php",
            success: function(data) {
                let producto=JSON.parse(data)
           
                $("#modal_Editar_Producto").modal('show');

                $("##modal_Editar_Producto input[name='idProducto']").val(Producto.id)
                $("#modal_Editar_Producto input[name='Marca']").val(producto.Marca)
                $("#modal_Editar_Producto input[name='Modelo']").val(producto.Modelo)
                $("#modal_Editar_Producto input[name='Fecha_Ingreso']").val(producto.Fecha_Ingreso)
                $("#modal_Editar_Producto input[name='Cantidad']").val(producto.Cantidad)
                $("#modal_Editar_Producto input[name='Precio']").val(producto.Precio)
                $("#modal_Editar_Producto input[name='Codigo']").val(producto.Codigo)
                $("modal_Editar_Producto input[name='imagen']").val(producto.imagen)
                
            }
        })
    })
    
}
