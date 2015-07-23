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
							<img class="bannerphoto" src="<?php echo base_url(); ?>img/intlibres2.jpg"/>
							<h2><a href="<?php echo base_url(); ?>libres">TORNEOS LIBRES</a></h2>
							<h3><a href="<?php echo base_url(); ?>libres">MAYORES</a></h3>
							<button id="libresmenutoggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#libresmenu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<div class="bgmenulibres hidden-xs"></div>
							<div id="libresmenu" class="collapse navbar-collapse">
								<?php $this->view('home/temp/libres_menu');?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"></div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="<?php echo base_url(); ?>equipos" class="listaequipos pull-right">[ Ir a Lista de Equipos ]</a></div>
			</div>
			<?php if ($equipo_infos){
			foreach ($equipo_infos as $equipo_info): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h2 class="nombreequipo2"><?php echo $team_name;?></h2></div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><img src="<?php echo base_url();?>uploads/<?php echo $equipo_info->foto; ?>" class="img-responsive"/></div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="camisetas">
							<div class="titular">
								<?php 
								$first = '<div class="';
								$second = '" style="background-color:';
								$third = '"></div>';
								?>
								<?php
										if (!$equipo_info->titular_color1 & !$equipo_info->titular_color2){
											echo $first . "no_shirt_equipo" . $second . "grey" .  $third;
										}
										else if ($equipo_info->titular_color1 & $equipo_info->titular_color2){
											echo $first . "shirt_left" . $second . $equipo_info->titular_color1 . $third;
											echo $first . "shirt_middle" . $second . $equipo_info->titular_color2 . $third;
											echo $first . "shirt_right" . $second . $equipo_info->titular_color1 . $third;
										}							
										else{
											if ($equipo_info->titular_color1)
											{echo $first . "shirt_equipo" . $second . $equipo_info->titular_color1 . $third;}
											else 
											{echo $first . "shirt_equipo" . $second . $equipo_info->titular_color2 . $third;}
										}
									?>
							</div>
							<div class="suplente">
								<?php 
								$first = '<div class="';
								$second = '" style="background-color:';
								$third = '"></div>';
								?>
								<?php
										if (!$equipo_info->alternativa_color1 & !$equipo_info->alternativa_color2){
											echo $first . "no_shirt_equipo" . $second . "grey" .  $third;
										}
										else if ($equipo_info->alternativa_color2 & $equipo_info->alternativa_color2){
											echo $first . "shirt_left" . $second . $equipo_info->alternativa_color1 . $third;
											echo $first . "shirt_middle" . $second . $equipo_info->alternativa_color2 . $third;
											echo $first . "shirt_right" . $second . $equipo_info->alternativa_color1 . $third;
										}							
										else{
											if ($equipo_info->alternativa_color1)
											{echo $first . "shirt_equipo" . $second . $equipo_info->alternativa_color1 . $third;}
											else 
											{echo $first . "shirt_equipo" . $second . $equipo_info->alternativa_color2 . $third;}
										}
									?>
							</div>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="historiaequipo col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2>Historia del Equipo</h2>
					<?php echo $equipo_info->historia; ?>
				</div>
			</div>
			<?php endforeach; } ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="equipos">
					<table class="tablascg">
							<thead>
								<tr>
									<th>Jugador</th><th>Goles</th>
								</tr>
							</thead>
							<tbody>
							<?php $i=1;
								if ($players_infos){ 
									foreach ($players_infos as $players_info): ?>
								<tr class="<?php echo "" . ( ($i & 1) ? '' : 'alt' );?>">
									<td><?php echo $players_info['name'] . " " .  $players_info['last_name']; ?></td><td><strong><?php echo $players_info['goal']; ?></strong></td>
								</tr>
							<?php $i++; endforeach; }?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			</div>
		</div>
		
				<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>
