jQuery(document).on('btn_entrar','formulario_login',function(event){
    event.preventDefault();
    jQuery.ajax({
        url:'',
        type:'POST',
        dataType:'json',
        data:$(this).serialize(),
        beforeSend:function(){

        }
    })
})