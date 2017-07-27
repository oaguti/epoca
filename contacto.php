<?php
$item = 8;
include('header.php');
?>
<section id="contact-info">
        <div class="center">                
            <h2><?php echo MENU8 ?></h2>
            
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d26782.43889746696!2d-73.2432234879932!3d-3.75930945107709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfb15b9b31e1e5297!2sHotel+Epoca!5e0!3m2!1ses-419!2spe!4v1474256466491" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5><?php echo MENU2 ?></h5>
                                    <p>Ramirez Hurtado 616,<br>
                                    Iquitos - Perú</p>
                                    <p>Telefono:+51 65 224172<br>
                                    Email:reservas@epoca.com.pe</p>
                                </address>

                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->
    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2><?php echo CT_TITULO1 ?></h2>
                
            </div> 
            <div class="row contact-wrap"> 
                
                <form id="main-contact-form" class="contact-form" name="contact-form" method="POST" action="enviar.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <div class="colum">
                                <label><?php echo FORM_TEXT1 ?> *</label>
                                <input type="text" name="name" class="form-control" required="required">
                            </div>
                            <div class="colum">
                                <label><?php echo FORM_TEXT2 ?> *</label>
                                <input type="text" name="name2" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo FORM_TEXT5 ?> *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label><?php echo CT_TEXT1 ?></label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><?php echo CT_TEXT2 ?></label>
                            <input type="text" name="business" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label><?php echo CT_TEXT3 ?> *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label><?php echo CT_TEXT4 ?> *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="<?php echo CT_BT1 ?>">
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
    
<?php include('footer.php');?>