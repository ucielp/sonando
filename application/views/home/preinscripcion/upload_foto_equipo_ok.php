		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=680683688730702";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div id="libresbanner">
							<img class="bannerphoto" src="<?php echo base_url(); ?>img/intlibres5.jpg"/>
							<h2><a href="<?php echo base_url(); ?>libres">TORNEOS LIBRES</a></h2>
							<h3><a href="<?php echo base_url(); ?>libres">MAYORES</a></h3>
							<button id="libresmenutoggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#libresmenu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<div class="bgmenulibres hidden-xs"></div>
							<?php $this->view('home/temp/libres_menu');?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><h2 class="nombreequipo">Equipo: <?php echo $team_name;?></h2></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="<?php echo base_url(); ?>libres/logout" class="cerrarSesion pull-right">CERRAR SESION &nbsp;<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ul class="nav nav-pills inscripcionmenu">
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/preinscribir">Preinscripción</a></li>
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/asignar_responsables">Asignar responsables</a></li>
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/jugadores_preinscriptos">Jugadores preinscriptos</a></li>
						<li role="presentation" class="active"><a href="<?php echo base_url(); ?>libres/jugadores_habilitados">Jugadores inscriptos</a></li>
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/upload_foto_equipo">Info del equipo</a></li>
					</ul>
				</div>
			</div>
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h1>Tu foto ha sido cargada con éxito!</h1>
					<h1>Se han actualizado los datos de la Historia y de la camiseta.</h1>
			
					<div id="upload_photo_success">
						<img src="<?php echo base_url(); ?>uploads/<?php echo $url_img; ?>" />
					</div>
					<p><a href="<?php echo site_url('libres/preinscribir');?>">Volver</a></p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			</div>
			<br/>
			<br/>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.cycle2.min.js"></script>
  </body>
</html>