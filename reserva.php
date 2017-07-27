<?php 
header('Content-Type: text/html; charset=UTF-8');
	
	$keys_post = array_keys($_GET); 
    foreach ($keys_post as $key_post) 
     { 
      $$key_post = $_GET[$key_post];
      
      error_log("variable $key_post viene desde $ _POST"); 
     }

$item = 5;
include('header.php');
?>
<section id="feature" >
    
        <div class="center wow fadeInDown">
            <h2><?php echo MENU5 ?></h2>
        </div>
        <div class="image-large img-reserva">
            <div class="container"></div>
        </div>
        <div class="container">

                    <form action="reservar.php" name="form_reserva" id="form_reserva" method="POST">
    				<div class=" col-md-6 fadeInDown">
                        <div class="col_20">
                        <span><?php echo FORM_TEXT11 ?></span>
                        <?php listar_titulo($idioma_actual) ?>
                        </div>
                        <div class="col_40">
                            <span><?php echo FORM_TEXT1 ?></span>
            				<input type="text" value=""  id="nombre" name="nombre" required="required">
        				</div>
                        <div class="col_40">
                            <span><?php echo FORM_TEXT2 ?></span>
            				<input type="text" value=""  id="apellido" name="apellido" >
                        </div>
    				<span>E-mail</span>
                    <input type="text" value="<?php if(isset($email)) {echo $email; }?>"  id="email" name="email" required="required">
    				<span><?php echo FORM_TEXT4 ?></span>
                    <input type="text" value="<?php if(isset($checkin)) {echo $checkin;} ?>"  id="checkin" class="fecha" name="checkin" required="required">
                    <span><?php echo FORM_TEXT3 ?></span>
                    <input type="text" value="<?php if(isset($checkout)) {echo $checkout;} ?>"  id="checkout" class="fecha" name="checkout" required="required">
                    </div>
                    <div class=" col-md-6 fadeInDown">
                        <div class="col_30">
                            <span><?php echo FORM_TEXT7 ?> <i class="fa fa-plane" aria-hidden="true"></i></span>
                            <span class="opciones">
                            	<div class="opcion">
                            		<input type="radio" name="aeropuerto" value="<?php echo FORM_OPC1 ?>">&nbsp;
                            		<label class="label"><?php echo FORM_OPC1 ?></label>
                            	</div>
                            	<div class="opcion">
                            		<input type="radio" name="aeropuerto" value="<?php echo FORM_OPC1 ?>">&nbsp;
                            		<label class="label"><?php echo FORM_OPC2 ?></label>
                            	</div>
                            </span>
                        </div>
                        <div class="col_70">
                            <span><?php echo FORM_TEXT9 ?>:</span>
                            <input type="text" value=""  id="vuelo" name="vuelo">
                        </div>
                    
                    <div class="wrap_room">
                        <div class="nhabit">
                            <span><?php echo FORM_TEXT10 ?></span>
                            <input type="text" value="<?php if(isset($rooms)) {echo $rooms;} ?>"  id="rooms" name="rooms" required="required">
                        </div>
                        <div class="nhabit">
                            <span><?php echo FORM_TEXT12 ?></span>
                            <input type="text" value=""  id="huesped" name="huesped" required="required">
                        </div>
                        <div class="habitacion">
                            <span><?php echo FORM_TEXT6 ?></span>
                            <select name="habit" class="dato" id="habit">
                                        <?php option_name_hab($habit,$idioma_actual);?>
                            </select>
                        </div>
                    </div class="wrap_room">
                        <span class="titulo"><?php echo FORM_TEXT13 ?></span>
                        <textarea name="adicional" id="adicional"></textarea>
                    <div>
                    </div>
                    <input type="submit" value="<?php echo BT_RS ?>" class="boton">
                    <input type="hidden" value="<?php echo $idioma_actual ?>" name="idioma" id="idioma">
                    
                    </div>
                    </form>
        </div>
    
</section>
<?php include('footer.php');?>