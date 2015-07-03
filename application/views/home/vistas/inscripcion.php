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
							<img class="bannerphoto" src="img/intlibres5.jpg"/>
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
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="inscripintro">Hacete fan y escribinos por nuestra página de facebook, para que te enviemos las instrucciones y su contraseña.</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<img src="img/insclibr.png" class="img-responsive"/><br/>
					<div class="fb-page" data-href="https://www.facebook.com/sonando.conelgol" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sonando.conelgol"><a href="https://www.facebook.com/sonando.conelgol">Soñando Con El Gol</a></blockquote></div></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<img src="img/inscinfe.png" class="img-responsive"/><br/>
					<div class="fb-page" data-href="https://www.facebook.com/sonandoinferiores" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sonandoinferiores"><a href="https://www.facebook.com/sonandoinferiores">Soñando Con El Gol - Inferiores</a></blockquote></div></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<img src="img/inscfem.png" class="img-responsive"/><br/>
					<div class="fb-page" data-href="https://www.facebook.com/sonandoconelgolfemenino" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sonandoconelgolfemenino"><a href="https://www.facebook.com/sonandoconelgolfemenino">Soñando Con El Gol - Femenino</a></blockquote></div></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="inscripintro">Y luego podrás inscribir a tu equipo haciendo <a href="<?php echo base_url(); ?>libres">click aquí</a></div>
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