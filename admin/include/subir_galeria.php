<?php
//creaciones de variable globales
$extension;
$nuevo_foto;
$ancho;
$alto;
$carpetabig = "images/gallery";
$carpetathumbs = "images/gallery/thumbs";

foreach ($_FILES as $key) {
    
    
    if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      $nombre = $key['name'];//Obtenemos el nombre del archivo
      $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      $tamano= ($key['size'] / 1000)."Kb";//Obtenemos el tamaño en KB
      //move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
      //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
      validarjpg($nombre);
      
    } else {
      switch ($key['error']){
        case 1:
            echo 'El archivo subido excede la directiva upload_max_filesize en php.ini.';
            echo 'tamano de archivo: '.$tamano;
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
function crearjpg($max_ancho,$max_alto,$carpeta){
    global $ancho,$alto,$nuevo_foto,$temporal;
    $img_original = imagecreatefromjpeg($temporal);
    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;
        
     if (($x_ratio * $alto) < $max_alto){
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
        $nuevo_archivo = '../../'.$carpeta.'/'.$nuevo_foto;
        imagejpeg($tmp,$nuevo_archivo,$calidad); 
        chmod($nuevo_archivo,0777);
}

function carga_imagen ($img){
    global $extension, $nuevo_foto,$ancho,$alto,$carpetabig,$carpetathumbs,$temporal;
    $nuevo_foto = time().'_'.rand(0,100).'.'.$extension;
    list($ancho,$alto) = getimagesize($img);
    $ruta = '../../'.$carpetabig."/".$nuevo_foto;
    $max_ancho = 2048;
    $max_alto = 1152;

    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){ 
        crearjpg(290,220,$carpetathumbs);
        move_uploaded_file($temporal, $ruta);
        chmod($ruta,0777);
        
    } else {
        crearjpg(2048,1152,$carpetabig); 
        crearjpg(290,220,$carpetathumbs);
    }

    $resultado = $nuevo_foto;
    echo $resultado;
}

function validarjpg() {
    global $resultado,$nombre,$temporal,$extension;
    $archivos_disp_ar = array('jpg', 'jpeg');
    $array_nombre = explode('.',$nombre);
    $cuenta_arr_nombre = count($array_nombre);
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);

    if(in_array($extension, $archivos_disp_ar)){
        carga_imagen($temporal);
    } else {
       $resultado = "Este tipo de archivo no es permitido";
       echo $resultado;
    }
}
?>