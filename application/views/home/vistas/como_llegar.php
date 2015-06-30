<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Soñando con el gol</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

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
								<li class="active"><a href="<?php echo base_url(); ?>contacto">Contacto</a><img src="img/activemenu.png" class="activearrow"/></li>
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
						<div class="pull-right consonline"><a href="<?php echo base_url(); ?>contacto"><img src="img/arrow_right.png"/> Consultas Online</a></div>
					</div>
				</div>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row" style="padding-top: 40px; padding-bottom: 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div id="comollegarmap">
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="comollegarinfo">
						<img src="img/llegar1.png" class="img-responsive"/>
						<a href="http://www.rosario.gov.ar/infomapa" target="_blank"><img src="img/llegar2.png" class="img-responsive"/></a>
						<a href="<?php echo base_url(); ?>contacto"><img src="img/llegar3.png" class="img-responsive"/></a>
					</div>
				</div>
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
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript">
			function initialize() {
				var myLatlng = new google.maps.LatLng(-32.911243, -60.739163);
				var mapOptions = {
					zoom: 15,
					center: myLatlng
				}
				var map = new google.maps.Map(document.getElementById('comollegarmap'), mapOptions);

				var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						title: 'Soñando con el Gol'
				});
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
  </body>
</html>