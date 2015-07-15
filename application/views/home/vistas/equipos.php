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
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="equipos">
					<table class="tablascg">
						<thead>
							<tr>
								<th>Equipo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Ferrugem A.C.</td>
							</tr>
							<tr class="alt">
								<td>Sacachispa</td>
							</tr>
							<tr>
								<td>Ficatucho</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
							<tr>
								<td>Carlos</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
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
							<tr>
								<td>Ferrugem A.C.</td>
							</tr>
							<tr class="alt">
								<td>Sacachispa</td>
							</tr>
							<tr>
								<td>Ficatucho</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
							<tr>
								<td>Carlos</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
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
							<tr>
								<td>Ferrugem A.C.</td>
							</tr>
							<tr class="alt">
								<td>Sacachispa</td>
							</tr>
							<tr>
								<td>Ficatucho</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
							<tr>
								<td>Carlos</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
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
							<tr>
								<td>Ferrugem A.C.</td>
							</tr>
							<tr class="alt">
								<td>Sacachispa</td>
							</tr>
							<tr>
								<td>Ficatucho</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
							<tr>
								<td>Carlos</td>
							</tr>
							<tr class="alt">
								<td>Ferrugem A.C.</td>
							</tr>
						</tbody>
					</table>
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