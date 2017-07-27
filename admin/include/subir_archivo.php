<?php
foreach ($_FILES as $key) {
    if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      $nombre = $key['name'];//Obtenemos el nombre del archivo
      $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      $tamano= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
      //move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
      //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
       $resultado = carga_archivo($temporal,$nombre);
       echo $resultado;
    } else {
      echo $key['error']; //Si no se cargo mostramos el error
    }
}

function carga_archivo ($img,$nombre){
    $archivos_disp_ar = array('pdf', 'docx','xlsx');
    $array_nombre = explode('.',$nombre);
    $cuenta_arr_nombre = count($array_nombre);
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
   
  if(in_array($extension, $archivos_disp_ar)){
     
      $carpeta = "archivos";
      $nuevo_pdf = time().'_'.rand(0,100).'.'.$extension;
	  $nuevo_carpeta = '../../'.$carpeta.'/'.$nuevo_pdf;
      $mover_pdf = move_uploaded_file($img , $nuevo_carpeta); 
      chmod($nuevo_carpeta,0777); 
      return $nuevo_pdf;
    
  } else {
    $error = "Extension : ".$extension;
    return $error;
  }
}
?>