<?php
foreach ($_FILES as $key) {
    if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      $nombre = $key['name'];//Obtenemos el nombre del archivo
      $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      $tamano= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
      //move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
      //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
      $resultado = carga_imagen($temporal,$nombre);
      echo $resultado;
    } else {
      switch ($key['error']){
        case 1:
            echo 'El archivo subido excede la directiva upload_max_filesize en php.ini.';
            
        break;
        case 2:
            echo 'El archivo subido excede la directiva MAX_FILE_SIZE que fue especificada en el formulario HTML.';
        break;
        case 3:
            echo 'El archivo subido fue sólo parcialmente cargado.';
        break;
        case 4:
            echo 'Ningún archivo fue subido.';
        break;
        default:
            echo $key['error'].", otro codigo"; //Si no se cargo mostramos el error
        break;
      }
      
    }
}

function carga_imagen ($img,$nombre){
    
    $array_nombre = explode('.',$nombre);
    $cuenta_arr_nombre = count($array_nombre);
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
     
    if($extension == "mp4"){
        $carpeta = "video";
        $nuevo_mini = time().'_'.rand(0,100).'.'.$extension;
    	$nuevo_mini_carpeta = '../../'.$carpeta.'/'.$nuevo_mini;
    	//chmod($nuevo_mini_carpeta,0777);
        move_uploaded_file($img, $nuevo_mini_carpeta);
        return $nuevo_mini;
    } else {
        $error = "Tipo de archivo no es permitido";
        return $error;
    }
}
?>