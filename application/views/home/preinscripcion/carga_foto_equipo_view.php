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
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/jugadores_habilitados">Jugadores inscriptos</a></li>
						<li role="presentation" class="active"><a href="<?php echo base_url(); ?>libres/upload_foto_equipo">Info del equipo</a></li>
					</ul>
				</div>
			</div>
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php 	$attributes = array('id' => 'formID_upload_equipo');
					echo form_open_multipart('libres/do_upload_foto_equipo', $attributes); ?>
					<?php foreach ($equipo_info as $info): ?>
					<?php if ($info->historia != "") {?>
						<label for="text" class="error">Historia del Equipo: (opcional)<br /></label>
						<textarea name="text" id="textarea_info_equipo" ><?php echo $info->historia;?></textarea><br /> 
					<?php }else{ ?>
						<label for="text" class="error">Historia del Equipo: (opcional)<br /></label>
						<textarea name="text" id="textarea_info_equipo" ><?php echo $info->historia;?></textarea><br /> 
					<?php } ?>
						<label for="text" class="error">Foto del equipo: (opcional).&nbsp; 
						<?php if ($info->foto != 'silueta.jpg'){ ?>
						<a style="font-size:13px;text-decoration:none;font-weight:700;" href="<?php echo base_url(); ?>uploads/<?php echo $info->foto; ?>" > Ver foto</a>
						<?php }?>
						<br /><br /></label>
						<input type="file" name="userfile" size="20" /><br />
						<div id="camisetas">
							<div id="colores_a_ingresar">
								<label for="text" class="error">Color Camisetas (opcional)<br /><br /></label>
								<label for="text" class="error">Titular:<br /><br /></label>
								<input type="hidden" name="color1" class="colors" size="7" value="<?php echo $info->titular_color1;?>" />
								<input type="hidden" name="color2" class="colors" size="7" value="<?php echo $info->titular_color2;?>" /><br /><br />
								<label for="text" class="error">Alternativa:<br /><br /></label>
								<input type="hidden" name="color3" class="colors" size="7" value="<?php echo $info->alternativa_color1;?>" />
								<input type="hidden" name="color4" class="colors" size="7" value="<?php echo $info->alternativa_color2;?>" /><br /><br />
							</div>
							<div id="colores_ingresados">
								<label>Color Camisetas ya ingresados<br /><br /></label>
								<?php 
								$first = '<div class="';
								$second = '" style="background-color:';
								$third = '"></div>';
								?>
								<div id="colores_titulares">
									<p>Titular</p>
									<?php
										if (!$info->titular_color1 & !$info->titular_color2){
											echo $first . "no-shirt" . $second . "grey" .  $third;
										}
										else if ($info->titular_color1 & $info->titular_color2){
											echo $first . "shirt-left" . $second . $info->titular_color1 . $third;
											echo $first . "shirt-right" . $second . $info->titular_color2 . $third;
										}							
										else{
											if ($info->titular_color1)
											{echo $first . "shirt" . $second . $info->titular_color1 . $third;}
											else 
											{echo $first . "shirt" . $second . $info->titular_color2 . $third;}
										}
									?>
								</div>
								<div id="colores_alternativas">
									<p>Alternativa</p>
								   <?php
										if (!$info->alternativa_color1 & !$info->alternativa_color2){
											echo $first . "no-shirt" . $second . "grey" . $third;
										}
										else if ($info->alternativa_color1 & $info->alternativa_color2){
											echo $first . "shirt-left" . $second . $info->alternativa_color1 . $third;
											echo $first . "shirt-right" . $second . $info->alternativa_color2 . $third;
										}
										else{
											if ($info->alternativa_color1)
											{echo $first . "shirt" . $second . $info->alternativa_color1 . $third;}
											else 
											{echo $first . "shirt" . $second . $info->alternativa_color2 . $third;}
										}							

									?>
								</div>
							</div>
						</div>
						<input type="submit" value="Subir" class="submit" />    
					</form>
					<?php endforeach;?>
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
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.miniColors.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.miniColors.css" type="text/css" />
	<script type="text/javascript">		
	$(document).ready( function() {
		$('.colors').miniColors({
			change: function(hex, rgb) {
				$('#console').prepend('HEX: ' + hex + ' (RGB: ' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ')<br />');
			}
		});
		$('textarea').placehold();
	});
	</script>
  </body>
</html>