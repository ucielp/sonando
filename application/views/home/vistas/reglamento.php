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
							<img class="bannerphoto" src="img/intlibres6.jpg"/>
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
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>