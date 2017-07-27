function enviar(){
    console.log("enviando form");
    var form2 = $('#edit-room');
    form2.fadeOut();
    $('#edit-room').submit(function(event){
        console.log("ejecutando envio");
        event.preventDefault();
        		var form_status = $('<div class="form_status"></div>');
        		$.ajax({
        			url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    beforeSend: function(){
        				$('#edit-room').prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Enviando información ...</p>').fadeIn() );
        			},
                    success: function(data){
                    /*Se ejecuta cuando termina la petición y esta ha sido correcta */
                        form_status.html('<p>Precio de habitacion actualizado</p>').delay(3000).fadeOut();
                        
                    },
                    error: function(data){
                    /*Se ejecuta si la peticón ha sido erronea*/
                        form_status.html('<p>Error al enviar el formulario</p>').delay(3000).fadeOut();
                    }
       		})
    });
}