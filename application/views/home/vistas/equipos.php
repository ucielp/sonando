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
							<img class="bannerphoto" src="img/intlibres2.jpg"/>
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
				
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="display: none;">
					<div class="equipos">
					<table class="tablascg">
						<thead>
							<tr>
								<th>Equipo</th>
							</tr>
						</thead>
						<tbody>
					
				
	<?php 
	# Defino la cantidad de divs en este caso son 4
	$cant_por_fila = round(count($equipos_activos)/4);
	$k=0;
	?>
		<?php foreach ($equipos_activos as $equipo): 
			if(!fmod($k,$cant_por_fila)){?>
				</tbody>
					</table>
					</div>
				</div>
		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="equipos">
					<table class="tablascg">
						<thead>
							<tr>
								<th>Equipo</th>
							</tr>
						</thead>
						<tbody>

			<?php } ?>
	

						<?php $i = 0; ?>
							<tr class="<?php echo "" . ( ($i & 1) ? 'alt' : '' );?>">
								<td class="t"><a href="<?php echo base_url();?>equipos/equipo/<?php echo  $equipo->id;?>"><?php echo $equipo->e_name; ?></a></td>
							</tr>
	               
						<?php  $i++; $k++; endforeach; ?>
						</tbody>
					</table>
					</div>
				</div>

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
