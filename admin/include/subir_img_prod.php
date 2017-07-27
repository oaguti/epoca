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
      echo $key['error']; //Si no se cargo mostramos el error
    }
}

function carga_imagen ($img,$nombre){
    
    $array_nombre = explode('.',$nombre);
    $cuenta_arr_nombre = count($array_nombre);
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
   

    if($extension == "png"){
    $carpeta = "img/producto";
    $png = imagecreatefrompng($img);
	/*$max_ancho = 550;
	$max_alto = 300;
	
	list($ancho,$alto)=getimagesize($img);
	
	$x_ratio = $max_ancho / $ancho;
	$y_ratio = $max_alto / $alto;
	
	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
    	}
    	elseif (($x_ratio * $alto) < $max_alto){
    		$alto_final = ceil($x_ratio * $alto);
    		$ancho_final = $max_ancho;
    	}
    	else{
    		$ancho_final = ceil($y_ratio * $ancho);
    		$alto_final = $max_alto;
    	}*/
	$nuevo_mini = time().'_'.rand(0,100).'.'.$extension;
	$nuevo_mini_carpeta = '../../'.$carpeta.'/'.$nuevo_mini;
    
    imagealphablending($png, false);
    imagesavealpha($png, true);
    //$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	//imagesavealpha($tmp, true);
    //$trans_colour = imagecolorallocatealpha($tmp, 255, 255, 255, 0);
    //imagefill($tmp, 0, 0, $trans_colour);
    //$red = imagecolorallocate($tmp, 255, 0, 0);
	imagepng($png,$nuevo_mini_carpeta);
    imagedestroy($png); 
    //chmod($nuevo_mini_carpeta,0777);
    return $nuevo_mini;
    } else {
    $error = "Archivo no permitido";
    return $error;
    }
}
?>