        <div class="reserva topform">
            <div class="container">
                <form action="reserva.php" name="reserva" id="reserva" method="GET">
                
                <input type="text" value="<?php echo FORM_TEXT4 ?>" class="dato xdato-3 fecha" id="checkin" name="checkin" required="required">
                <input type="text" value="<?php echo FORM_TEXT3 ?>" class="dato xdato-3 fecha" id="checkout" name="checkout" required="required">
                
                <input type="text" value="E-mail " class="dato xdato-3" id="email" name="email" required="required">
                <select class="dato xdato-2" name="rooms" id="rooms">
                        <option value="" selected=""><?php echo FORM_TEXT6 ?></option>
                                                    <option value="1" >1</option>
                                                    <option value="2">2</option>
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