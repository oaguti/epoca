function aparecer(id){
    tipo = id;
    $('#fondo').fadeIn(600);
     }
function cerrar() {
    $('#fondo').fadeOut(1000);
    clearFileInputField('upload');
    }
function clearFileInputField(tagId) {
    document.getElementById(tagId).innerHTML = document.getElementById(tagId).innerHTML;
    }
function enviar(){
	if(tipo == 1){
        var ruta = "include/subir_archivo.php";
    } else {
        var ruta = "include/subir_img_prod.php";
    }
    var archivos = document.getElementById("archivos");//Damos el valor del input tipo file
    var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo
    var data = new FormData();
    
        
    for(i=0; i<archivo.length; i++){
    data.append('archivo'+i,archivo[i]);
    }
    
    $.ajax({
           data:  data,
           url:   ruta,
           type:  'post',
           contentType:false,
           processData:false,
           cache:false,
           beforeSend: function () {
           $("#msj").html("Subiendo archivo...");
           },
           success:  function (response) 
           {
            $("#msj").html(response);
                if(tipo == 1){
                    $("#archivo").val(response);  
                } else {
                    $("#imagen").val(response);    
                }     
      
           }
    });
}