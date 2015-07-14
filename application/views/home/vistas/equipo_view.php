		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row">
			<?php if ($equipo_infos){
				foreach ($equipo_infos as $equipo_info): ?>
				<div class="team_name">
					<p><?php echo $team_name;?></p>
				</div>
				<div class="contenedor1">
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
				<div class="equipo_foto">
					<img src="<?php echo base_url();?>uploads/<?php echo $equipo_info->foto; ?>" />
				</div>
				<div class="equipo_historia">
					<h1>Historia del Equipo</h1>
					<?php echo $equipo_info->historia; ?>
				</div>

				<?php endforeach; } ?>
				<div class="tabla_jugadores">
					<h1>Jugadores</h1>
					
					
					<table class="equipos">
						<thead>
							<tr>
								<th class="t">Jugador</th>
								<th class="o">Goles</th>
							</tr>
						 </thead>
						<tbody>
							<?php $i=1;
							if ($players_infos){ 
							foreach ($players_infos as $players_info): ?>
							<tr class="<?php echo "" . ( ($i & 1) ? 'odd' : 'even' );?>">
								<td class="t"><span class="change_may_min"><?php echo $players_info['name'] . " " .  $players_info['last_name']; ?></span></td>
								<td class="o"><?php echo $players_info['goal']; ?></td>
						   </tr>
						   <?php $i++; endforeach; }?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>