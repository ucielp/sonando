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
				<div class="row" id="navlogo">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padtop20 xsnopadding">
						<a href="https://www.facebook.com/sonando.conelgol" class="hidden-xs" target="_blank"><img src="img/facebook_logo.png" width="30"/></a>
						<a href="https://twitter.com/SonandoConElGol" class="hidden-xs" target="_blank"><img src="img/twitter_logo.png" width="45"/></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainmenu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
						<h1><a href="index.html"><img src="img/logo.png" class="logo"/></a></h1>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 padtop20 xsnopadding">
						<div id="backlink" class="visible-xs-inline-block"><a href="index.html"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Inicio</a></div>
						<h2>0341 3882874</h2>
					</div>
				</div>
				<div class="row" id="navmenu">
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs">
						<div class="pull-left backhome"><a href="index.html"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Inicio</a></div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div id="mainmenu" class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="predio.html">El Predio</a><img src="img/activemenu.png" class="activearrow"/></li>
								<li><a href="https://www.facebook.com/sonando.conelgol/photos_stream" target="_blank">Fotos</a><img src="img/activemenu.png" class="activearrow"/></li>
								<li><a href="notas.html">Notas</a><img src="img/activemenu.png" class="activearrow"/></li>
								<li><a href="contacto.html">Contacto</a><img src="img/activemenu.png" class="activearrow"/></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Torneos</a>
									<ul class="dropdown-menu">
										<li><a href="libres.html">Mayores</a></li>
										<li><a href="https://www.facebook.com/sonandoinferiores" target="_blank">Inferiores</a></li>
										<li><a href="https://www.facebook.com/sonandoconelgolfemenino" target="_blank">Femenino</a></li>
										<li><a href="https://www.facebook.com/torneoempresas" target="_blank">Empresas</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs">
						<div class="pull-right consonline"><a href="contacto.html"><img src="img/arrow_right.png"/> Consultas Online</a></div>
					</div>
				</div>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div id="libresbanner">
							<img class="bannerphoto" src="img/intlibres6.jpg"/>
							<h2><a href="libres.html">TORNEOS LIBRES</a></h2>
							<h3><a href="libres.html">MAYORES</a></h3>
							<button id="libresmenutoggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#libresmenu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<div class="bgmenulibres hidden-xs"></div>
							<div id="libresmenu" class="collapse navbar-collapse">
								<ul class="nav navbar-nav menulibres">
									<li><a href="equipos.html">Equipos</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
									<li><a href="fixture.html">Fixture</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
									<li><a href="tablas.html">Tablas</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
									<li><a href="inscripcion.html">Inscripci&oacute;n</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
									<li class="active"><a href="reglamento.html">Reglamento</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
				<?php $i = 0;?>
				<?php foreach ($group_reglamento as $group): ?>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="reglamentos">
							<?php if ($i==0) { ?>
								<h2>REQUISITOS</h2>
							<?php }else { ?>
								<h2>SOBRE TORNEO</h2>
							<?php } ?>
							<?php foreach ($group as $item): ?>
							<h3>
								<a target="_blank" href="<?php echo $item['link'] ?>">
									<span class="glyphicon glyphicon-download" aria-hidden="true"></span>
									<?php echo $item['titulo'] ?>
								</a>
							</h3>
							<?php endforeach;?>
						</div>
					</div>
					<?php if ($i==0) { ?>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs">
						<span class="verticalsep"></span>
					</div>
					<?php } $i = $i + 1;?>
				<?php endforeach;?>
			</div>
		</div>
		
		<nav class="navbar">
			<div class="container">
				<div class="row" id="botnav">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<h3>Recibir NEWSLETTER de SCG</h3>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<input type="text" name="newsletteremail" placeholder="Escribe tu email..."/>
						<button role="button">OK</button>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						<div class="pull-right xsnopull"><a href="#"><img src="img/developedby.jpg"/></a></div>
					</div>
				</div>
			</div>
		</nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>