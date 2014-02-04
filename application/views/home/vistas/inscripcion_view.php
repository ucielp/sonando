        <div class="header_page">
            <h1>Inscripción</h1>
            <h2>Ingrese su usuario y contraseña para preinscribir a sus jugadores</h2>
        </div>
        <div class="preinscripcion_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
        	<div id="acceso-login">
			<?php $attributes = array('id' => 'formID_home'); ?>
            <?php echo form_open("inscripcion", $attributes);?>
                
              <p>
                <label for="email">Usuario</label>
                <?php echo form_input($email);?>
              </p>
              
              <p>
                <label for="password">Contraseña</label>
                <?php echo form_input($password);?>
                <!--<a href="<?php echo site_url('auth/forgot_password'); ?>"><u>Forgot Password</u></a>-->
              </p>
              <?php $submit_home_data = array('name' => 'submit', 'id' => 'submit', 'class' => 'submit', 'value' => 'Ingresar'); ?>
              <p><?php echo form_submit($submit_home_data);?></p>
        
              <?php echo form_close();?>
            </div>
        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->

<!--<div id="footer_wrapper">
	<div id="footer_outer">

	<div id="footer1">
    	<?php foreach ($marcas as $marca): ?>
        <a href="http://<?php echo $marca->link; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/home/<?php echo $marca->image_url; ?>" alt="" width="150" height="60" /></a>
        <?php endforeach; ?>
	</div>

	</div>
</div> -->

<input id="num" value="4" type="hidden">

<script type="text/javascript">
	$(document).ready(function(){
		var nro_de_publicidades = document.getElementById('num').value;
		$("#footer1").css({"width": (nro_de_publicidades * 150 * 2 * 2) + "px"});
		$("#footer1").append($("#footer1 a").clone());
		$("#footer1").animate({left: ['-='+nro_de_publicidades * 150, 'linear']}, 5000, function() {});
		setInterval(function() {
			$("#footer1").stop(false, true).css({"left": 60});
			$("#footer1").animate({left: ['-='+nro_de_publicidades * 150, 'linear']}, 5000, function() {});
		}, 5000);
});
</script>