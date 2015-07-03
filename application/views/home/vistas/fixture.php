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
							<img class="bannerphoto" src="img/intlibres3.jpg"/>
							<h2><a href="libres.html">TORNEOS LIBRES</a></h2>
							<h3><a href="libres.html">MAYORES</a></h3>
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
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="row">
						<div id="leftmenu">
							<div class="list-group" id="desplegable">
								<?php echo $categoryTree ?>
							</div>
							<div class="boxsanciones">
								<a href="https://docs.google.com/spreadsheet/ccc?key=0AuIBKvFOyc--dEpBZm80aXVfeTl3WFdKaTd2bHgyamc&usp=sharing#gid=0" target="_blank">Sanciones <img src="img/amaroja.png"/></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="row">
							<div class="tablastorneo">
								<h2><?php echo $event_name;?></h2>
								<h3>Fecha <?php echo $fecha_nro;?></h3>
								<table class="tablascg">
									<thead>
										<tr>
											<th>Equipo</th>
											<th>RESULTADOS</th>
											<th>Equipo</th>
											<th>Fecha</th>
											<th>Hora</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach($fixture as $partido):?>
										<tr class="<?php echo "" . ( ($i & 1) ? 'alt' : '' );?>">
											<td><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo1;?>"><?php echo $partido->name_equipo1;?></a></td>
											<td><strong>
												<?php if ($partido->cargado){
													if ($partido->team1_pen){ 
														echo "(" . $partido->team1_pen . ") ";
													} echo $partido->team1_res;	?>:<?php echo $partido->team2_res;
													if ($partido->team2_pen){ 
														echo " (" . $partido->team2_pen . ")";}	?>
												</strong></td>
											<?php }else{ ?>- : -</strong></td> <?php }?>
											<td><a href="<?php echo base_url(); ?>equipos/equipo/<?php echo $partido->id_equipo2;?>"><?php echo $partido->name_equipo2;?></a></td>
											<td><?php echo $partido->date;?></td>
											<td><?php echo $partido->time;?></td>
										</tr>
									<?php $i++; endforeach;	?>
									</tbody>
								</table>
								
								
								<h3>Fecha <?php echo $fecha_nro;?></h3>
								<table class="tablascg">
									<thead>
										<tr>
											<th>Equipo</th>
											<th>RESULTADOS</th>
											<th>Equipo</th>
											<th>Fecha</th>
											<th>Hora</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Ferrugem A.C.</td>
											<td><strong>2:2</strong></td>
											<td>Sacashispa</td>
											<td>12/07</td>
											<td>4:00</td>
										</tr>
										<tr class="alt">
											<td>Ferrugem A.C.</td>
											<td><strong>2:2</strong></td>
											<td>Sacashispa</td>
											<td>12/07</td>
											<td>4:00</td>
										</tr>
										<tr>
											<td>Ferrugem A.C.</td>
											<td><strong>2:2</strong></td>
											<td>Sacashispa</td>
											<td>12/07</td>
											<td>4:00</td>
										</tr>
										<tr class="alt">
											<td>Ferrugem A.C.</td>
											<td><strong>2:2</strong></td>
											<td>Sacashispa</td>
											<td>12/07</td>
											<td>4:00</td>
										</tr>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>
		
		<div class="modal fade" id="modal-goleadores">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">GOLEADORES<span>COPA ARGENTINA, DE LA C</span></h4>
					</div>
					<div class="modal-body">
						<table class="tablascg">
							<thead>
								<tr>
									<th>Jugador</th><th>Equipo</th><th>Goles</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Carlos Andrade</td><td>Ferrugem A.C.</td><td><strong>22</strong></td>
								</tr>
								<tr class="alt">
									<td>Pepe Biondi</td><td>Sacachispa</td><td><strong>22</strong></td>
								</tr>
								<tr>
									<td>German Rolon</td><td>Ficatucho</td><td><strong>22</strong></td>
								</tr>
								<tr class="alt">
									<td>Carlos</td><td>Ferrugem A.C.</td><td><strong>22</strong></td>
								</tr>
								<tr>
									<td>Carlos</td><td>Ferrugem A.C.</td><td><strong>22</strong></td>
								</tr>
								<tr class="alt">
									<td>Carlos</td><td>Ferrugem A.C.</td><td><strong>22</strong></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>