<section id="main-slider" class="no-margin">
        
        <div class="reserva">
            <div class="container">
                <form action="reserva.php" name="reserva" id="reserva" method="GET">
                <input type="text" value="<?php echo FORM_TEXT4 ?>" class="dato xdato-3 fecha" id="checkin" name="checkin">
                <input type="text" value="<?php echo FORM_TEXT3 ?>" class="dato xdato-3 fecha" id="checkout" name="checkout">
                <input type="text" value="E-mail " class="dato xdato-3" id="email" name="email">
                <select class="dato xdato-2" name="rooms" id="rooms">
                        <option value="" selected=""><?php echo FORM_TEXT6 ?></option>
                                                    <option value="1" >
                                1                            </option>
                                                    <option value="2">
                                2                            </option>
                                                    <option value="3">
                                3                            </option>
                                                    <option value="4">
                                4                            </option>
                                                    <option value="5">
                                5                            </option>
                                                    <option value="6">
                                6                            </option>
                                                    <option value="7">
                                7                            </option>
                                                    <option value="8">
                                8                            </option>
                                                    <option value="9">
                                9                            </option>
                                                    <option value="10">
                                10                            </option>
                        </select>
                        <select name="habit" class="dato xdato-2" id="habit">
                                <?php option_hab($idioma_actual); ?>
                        </select>
                <input type="submit" value="<?php echo BT_RS;?>" class="boton">
                
                </form>
            </div>
        </div>
        <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
                <li data-target="#main-slider" data-slide-to="3"></li>
                <li data-target="#main-slider" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg3.jpg)"></div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)"></div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg4.jpg)"></div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg1.jpg)"></div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg5.jpg)"></div><!--/.item-->

            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#myCarousel" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#myCarousel" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->