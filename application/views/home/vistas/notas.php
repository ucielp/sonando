		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<div class="row" id="navlogo">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padtop20 xsnopadding">
						<a href="https://www.facebook.com/sonando.conelgol" class="hidden-xs" target="_blank"><img src="<?php echo base_url(); ?>img/facebook_logo.png" width="30"/></a>
						<a href="https://twitter.com/SonandoConElGol" class="hidden-xs" target="_blank"><img src="<?php echo base_url(); ?>img/twitter_logo.png" width="45"/></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainmenu" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
						<h1><a href="index.html"><img src="<?php echo base_url(); ?>img/logo.png" class="logo"/></a></h1>
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
								<li><a href="https://www.facebook.com/sonando.conelgol/photos_stream" target="_blank">Fotos</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
								<li class="active"><a href="#">Notas</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
								<li><a href="contacto.html">Contacto</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
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
						<div class="pull-right consonline"><a href="contacto.html"><img src="<?php echo base_url(); ?>img/arrow_right.png"/> Consultas Online</a></div>
					</div>
				</div>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row">
				<?php if ($notas){ ?>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="listanotas">
					<?php foreach($notas as $nota): ?>
							<div class="notacont">
								<h2><?php echo $nota->fecha; ?></h2>
								<h3><a href="nota1.html"><?php echo $nota->titulo; ?></a></h3>
								<p><?php echo $nota->texto;?></p>
								<?php if($nota->audio != '') { ?>
									<div class="conaudio"><a href="<?php echo base_url(); ?>uploads/notas/<?php echo $nota->audio; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/audioicon.png" class="img-responsive"/></a></div>
								<?php } ?>
								<?php if($nota->foto != '') { ?>
									<div class="confoto"><img src="<?php echo base_url();?>uploads/notas/<?php echo $nota->foto; ?>" class="img-responsive"/></div>
								<?php } ?>
							</div>
					<?php endforeach;  ?>
					</div>
				<?php }	else {?> 
					<div class="nota_separador">
						<div class="nota_header">
							<h1><?php echo"" ?></h1>
						</div>
						<img src="<?php echo base_url(); ?>images/notas/separador.png" />
					</div>
				<?php } ?>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div id="notassidebar">
						<a href="<?php echo base_url(); ?>unionyvalores"><img src="<?php echo base_url(); ?>img/sidebarizq1off.png" class="img-responsive"/></a>
						<a href="<?php echo base_url(); ?>laseleccion"><img src="<?php echo base_url(); ?>img/sidebarizq2off.png" class="img-responsive"/></a>
					</div>
				</div>
			</div>
			<?php echo $this->pagination->create_links(); ?></div>	
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
						<div class="pull-right xsnopull"><a href="#"><img src="<?php echo base_url(); ?>img/developedby.jpg"/></a></div>
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