    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates"><?php echo FOOTER2 ?> </a>. <?php echo FOOTER1 ?>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php"><?php echo MENU1 ?></a></li>
                        <li><a href="casa.php"><?php echo MENU2 ?></a></li>
                        <li><a href="reserva.php"><?php echo MENU5 ?></a></li>
                        <li><a href="contacto.php"><?php echo MENU8 ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/fancybox/jquery.fancybox.pack.js"></script>
    <?php
    if($idioma_actual == 1) {
        echo '<script src="js/main.js"></script>';
    } else {
        echo '<script src="js/main_us.js"></script>';
    }
    
    ?>
    <script src="js/wow.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
            
            console.log("variable : "+varjs);
            if(varjs == 1 ) {
                $(".fancybox").fancybox();
                $(".fancybox").trigger('click');
            }
           
        });
    </script>
   
    <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'Lw8TlcRwZI';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
<?php mysql_close($demo);?>