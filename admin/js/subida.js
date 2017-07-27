var status = 0;

function aparecer(id){
     $('#fondo').fadeIn(600);
      tipo = id;   
     }
function cerrar() {
    $('#fondo').fadeOut(1000);
      clearFileInputField('upload');
    }
function clearFileInputField(tagId) {
      document.getElementById(tagId).innerHTML = document.getElementById(tagId).innerHTML;
    }
function enviar(tipo){
    var archivos = document.getElementById("archivos");//Damos el valor del input tipo file
    var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo
    var data = new FormData();
    var ruta = "include/subir_"+tipo+".php";
    console.log(ruta);
   
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
            
              $("#msj").html("Archivo cargado exitosamente");
              $("#imagen").val(response);
           }
    });
}
//funcion que carga las subcategorias
function carga_ruta(){
  if(status== 0) {
    $("#carga_img").fadeIn();
    status = 1;
  }
  
}