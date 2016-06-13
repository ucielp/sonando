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
						<li role="presentation" class="active"><a href="<?php echo base_url(); ?>libres/jugadores_preinscriptos">Jugadores preinscriptos</a></li>
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/jugadores_habilitados">Jugadores inscriptos</a></li>
						<li role="presentation"><a href="<?php echo base_url(); ?>libres/upload_foto_equipo">Info del equipo</a></li>
					</ul>
				</div>
			</div>
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php if ($players) {?>
					<table id="table_preinscriptos" cellpadding=0 cellspacing=10>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>DNI</th>
							<th>Nacimiento</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Obra Social</th>
							<th>Foto</th>
							<th>Eliminar</th>

						</tr>
						<?php foreach ($players as $user):?>
						<tr>
							<td><?php echo $user['name']?></td>
							<td><?php echo $user['last_name']?></td>
							<td><?php echo $user['dni'];?></td>
							<td><?php echo $user['birth'];?></td>
							<td><?php echo $user['address'];?></td>
							<td><?php echo $user['phone'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php echo $user['obra_social'];?></td>
							<td>
								<?php if ($user['foto']){ ?>
								<a  href="<?php echo base_url(); ?>uploads/jugadores/<?php echo $user['foto']; ?>" >Ver</a>
								<?php } 
								else{ echo "";
									}?>
							</td>
							<td><?php #le paso un 0 para saber q soy delegado
							 echo (anchor("libres/delete_player_temp/".$user['id'], 'Eliminar'));?></td>
						</tr>
						<?php endforeach; ?>
					</table> 
					<?php }
					#termino el if
					else{ ?>
						<p><h1>No hay jugadores preinscriptos</h1> </p>
					<?php }	?> 
 
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