$(document).ready(function(){
    
    ajax_Ver_Producto();
})

var id_producto_a=0;

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

$(document).on('submit','#modalr',function(e){
    e.preventDefault();
    Nombre=$("#Nombre").val();
    Descripcion=$("#Descripcion").val();
    imagen=$("#imagen").val();
    Stock=$("#Stock").val();
    Vendidos=$("#Vendidos").val();
    Valor=$("#Valor").val();
    
    ajax_Registrar_Producto(Nombre,Descripcion,imagen,Stock,Vendidos,Valor);
});
// Modal Editar
$(document).on('submit','#modal_e',function(e){
    e.preventDefault();
    Nombre=$("#Nombre_e").val();
    Descripcion=$("#Descripcion_e").val();
    imagen=$("#imagen_e").val();
    Stock=$("#Stock_e").val();
    Vendidos=$("#Vendidos_e").val();
    Valor=$("#Valor_e").val();

    ajax_Editar_Producto(Nombre,Descripcion,imagen,Stock,Vendidos,Valor);
    
});

function Eliminar_producto(idProducto){
    console.log(idProducto);
        $.ajax({
            data:{
                "idProducto":idProducto
            },
            type:"post",
            //dataType:"json",
            cache: false,
            url:"./../../../controlador/ajax/ajaxEliminarProducto.php"
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
                    title:"Registrar Producto"
    
                })
                .then((result) =>{
                    limpiar_tabla();               
                })
            }
        })
}


function ajax_Registrar_Producto(Nombre,Descripcion,imagen,Stock,Vendidos,Valor){
    $.ajax({
        data:{
            "Nombre":Nombre,
            "Descripcion":Descripcion,
            "imagen":imagen,
            "Stock":Stock,
            "Vendidos":Vendidos,
            "Valor":Valor            
        },
        type : "POST",
        //dataType:"JSON",
        cache: false,
        url:"./../../../controlador/ajax/ajax_Registrar_Producto.php",
        success:function(result){
           /* $('#modal_Crear_Producto').modal('hide');  
            insertar_Producto_en_Tabla(Marca,Modelo,Fecha_Ingreso,Cantidad,Precio,Codigo,imagen); */
            console.log("hola");
        }})
        .done(function(out) {
            console.log(out);
             var response=JSON.parse(out);
             var msj = response.msg;
             var est=response.estado;
             console.log(response);            
                 limpiar_tabla();          
     
             if(msj!=""){
                 Swal.fire({
                     text: msj,
                     //icon: response.type,
                     title:"Registrar producto"
     
                 })
                 .then((result) =>{
                     $("#modal_Crear_Producto").modal('hide');
                     limpiar_modal();
                     if(result){
     
                     }
                 })
             }
         })
}

function ajax_Editar_Producto(Nombre,Descripcion,imagen,Stock,Vendidos,Valor){
     
    $.ajax({
        data:{
            "IdUsuario":id_producto_a,
            "Nombre":Nombre,
            "Descripcion":Descripcion,
            "imagen": imagen,
            "Stock":Stock,
            "Vendidos": Vendidos,
            "Valor":Valor

        },
        type:"post",
        //dataType:"json",
        cache: false,
        url:"./../../../controlador/ajax/ajaxEditarProducto.php"
    })
    .done(function(out) {
       console.log(out);
        var response=JSON.parse(out);
        var msj = response.msg;
        var est=response.estado;
        console.log(response);
            limpiar_tabla();

        if(msj!=""){
            Swal.fire({
                text: msj,
                //icon: response.type,
                title:"Editar Producto"

            })
            .then((result) =>{
                $("#modal_Editar_Producto").modal('hide');
                if(result){                

                }
            })
        }
    })
   
}

function insertar_Producto_en_Tabla(result){
    console.log(result);
    let Producto=''
    $.each(result, function(i){
        Producto +='<tr id=' +result[i].idProducto+ '>'
        +'<td width="100"  style=" border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Nombre+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Descripcion+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].imagen+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Stock+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Vendidos+'</td>'
        +'<td width="20" style="border: 1px solid #dddddd; text-align: left;padding: 8px;">'+result[i].Valor+'</td>'
        +'<td width="150" style="border: 1px solid #dddddd; text-align: left;padding: 8px;"><button onclick="insertar_Datos_Producto_Modal('+result[i].idProducto+')" class="editar mr-3 btn btn-info btn-md" role="button" aria-pressed="true">Editar</button>'

        +'<button onclick="Eliminar_producto('+result[i].idProducto+')" class="btn btn-danger btn-md" role="button" aria-pressed="true">Eliminar</a></td>'
        +'</tr>'
    }) 
    $("#Producto_Registrado tbody").append(Producto)
    //insertar_Datos_Producto_Modal()
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
function insertar_Datos_Producto_Modal(idProducto) {

         // let idUsuario=$(this).closest("tr").attr("id");
          //console.log(idUsuario);
          $.ajax({
              type:'POST',
              data:{idProducto:parseInt(idProducto,10)},
              url:"./../../../controlador/ajax/ajax_Ver_Producto_id.php",
              success: function(data) {
                  console.log(data);
                  let producto=JSON.parse(data)
             
                  $("#modal_Editar_Producto").modal('show');
                  id_producto_a=(idProducto);
                  
                  $("#modal_Editar_Producto input[id='idUsuario']").val(producto.idproducto)
                  $("#modal_Editar_Producto input[id='Nombre_e']").val(producto.Nombre)
                  $("#modal_Editar_Producto input[id='Descripcion_e']").val(producto.Descripcion)
                  $("#modal_Editar_Producto input[id='imagen_e']").val(producto.Imagen)
                  $("#modal_Editar_Producto input[id='Stock_e']").val(producto.Stock)
                  $("#modal_Editar_Producto input[id='Vendidos_e']").val(producto.Vendidos)
                  $("#modal_Editar_Producto input[id='Valor_e']").val(producto.Valor)
              }
          })
     
      
  }
function limpiar_modal(){


    // Modal Crear
    $("#modal_Crear_Producto input[id='Nombre']").val("");
    $("#modal_Crear_Producto input[id='Descripcion']").val("");
    $("#modal_Crear_Producto input[id='imagen']").val("");
    $("#modal_Crear_Producto input[id='Stock']").val("");
    $("#modal_Crear_Producto input[id='Vendidos']").val("");
    $("#modal_Crear_Producto input[id='Valor']").val("");
}

function limpiar_tabla(){
    var r=$("#Producto_Registrado tr").length;
    var tabla=$("#Producto_Registrado");
    console.log(r);
    for(i=1;i<r;i++){
        document.getElementById("Producto_Registrado").deleteRow(1);
    }
    ajax_Ver_Producto();
}
