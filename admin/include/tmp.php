function carga_imagen ($img,$nombre){
    $archivos_disp_ar = array('jpg', 'jpeg');
    $array_nombre = explode('.',$nombre);
    $cuenta_arr_nombre = count($array_nombre);
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
   
  if(in_array($extension, $archivos_disp_ar)){
    
    list($ancho,$alto) = getimagesize($img);
    $carpeta = "images/gallery";
    $max_ancho = 2048;
	$max_alto = 1152;
    
	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){ 
    	$img_original = imagecreatefromjpeg($img);
    	$x_ratio = $max_ancho / $ancho;
    	$y_ratio = $max_alto / $alto;
    	
    	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){ 
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
        	}
    	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
    	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    	imagedestroy($img_original);
    	$calidad=100;
    	$nuevo_foto = time().'_'.rand(0,100).'.'.$extension;
    	$nuevo_foto_carpeta = '../../'.$carpeta.'/'.$nuevo_foto;
    	imagejpeg($tmp,$nuevo_foto_carpeta,$calidad); 
        chmod($nuevo_foto_carpeta,0777);

        ////// CREACION THUMBS /////////
        $carpeta = "images/gallery/thumbs";
        $img_original = imagecreatefromjpeg($nuevo_foto_carpeta);
    	$max_ancho = 240;
    	$max_alto = 133;
    	
    	list($ancho,$alto)=getimagesize($nuevo_foto_carpeta);
    	
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
        	}
    	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
    	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    	imagedestroy($img_original);
    	$calidad=80;
    	$nuevo_mini_carpeta = '../../'.$carpeta.'/'.$nuevo_foto;
    	imagejpeg($tmp,$nuevo_mini_carpeta,$calidad); 
        chmod($nuevo_mini_carpeta,0777);
        return $nuevo_foto;
    } else {

    }
     
  } else {
    $error = "Este tipo de archivo no es permitido";
     return $error;
  }
  
}
?>