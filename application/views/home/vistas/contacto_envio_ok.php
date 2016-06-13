		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container" id="contentarea">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="infocontacto">
						<h3>Atención al Cliente</h3>
						<h2>0341-3882874</h2>
						
						<div class="desdeface">
							<h4>Desde facebook</h4>
							<a href="https://www.facebook.com/sonando.conelgol" target="_blank"><img src="img/facebook_logo.png" width="20"/> Libres Mayores</a>
							<a href="https://www.facebook.com/sonandoinferiores" target="_blank"><img src="img/facebook_logo.png" width="20"/> Inferiores</a>
							<a href="https://www.facebook.com/sonandoconelgolfemenino" target="_blank"><img src="img/facebook_logo.png" width="20"/> Femenino</a>
							<a href="https://www.facebook.com/torneoempresas" target="_blank"><img src="img/facebook_logo.png" width="20"/> Empresas</a>
						</div>
						
						<div class="pormail">
							<h4>Por email</h4>
							<a href="mailto:info@sonandoconelgol.com.ar" target="_blank">info@sonandoconelgol.com.ar</a>
							<a href="mailto:tribunal@sonandoconelgol.com.ar" target="_blank">tribunal@sonandoconelgol.com.ar</a>
							<a href="mailto:inscripcion@sonandoconelgol.com.ar" target="_blank">inscripcion@sonandoconelgol.com.ar</a>
							<a href="mailto:rrhh@sonandoconelgol.com.ar" target="_blank">rrhh@sonandoconelgol.com.ar</a>
						</div>
						
						<div class="portel">
							<span></span>
							<p>Francisco Pochettino: 0341-153882888</p>
							<p>Pablo Benetti: 0341-153882887</p>
							<p>Santiago Biazzi 0341-155032605</p>
						</div>
					
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="validacion_error"><?php echo $message;?></div>
					<div class="infocontacto">
						<h3>Su mail ha sido enviado satisfactoriamente</h3>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<a href="<?php echo base_url(); ?>comollegar"><img src="img/comollegar3.png" class="img-responsive"/></a>
				</div>
				<div class="col-xs-12"><br/></div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>      
        