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

		<div class="container fondoverde" id="contentarea">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div id="libresbanner">
							<img class="bannerphoto img-responsive" src="img/intlibres1.jpg"/>
							<h2>TORNEOS LIBRES</h2>
							<h3>MAYORES</h3>
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
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="avisosnovedades">
						<h3>&deg; &nbsp;&nbsp;&nbsp; Avisos y Novedades &nbsp;&nbsp;&nbsp; &deg;</h3>
						<div id="twitter_container">
							<a class="twitter-timeline" href="https://twitter.com/SonandoConElGol" data-widget-id="352500703337529344">Tweets by @SonandoConElGol</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="boxusuarioycont">
						<img src="img/usuarioycontra.png"/>
						<?php $attributes = array('id' => 'formID_home'); ?>
						<?php echo form_open("libres", $attributes);?>
						<?php echo form_input($email);?>
						<?php echo form_input($password);?>
						<!--<a href="<?php echo site_url('auth/forgot_password'); ?>"><u>Forgot Password</u></a>-->
						<?php $submit_home_data = array('name' => 'submit', 'id' => 'submit', 'class' => 'submit', 'value' => 'Ingresar'); ?>
						<?php echo form_submit($submit_home_data);?>
						<?php echo form_close();?>

					</div>
					<img src="img/fbpageheader.png" class="img-responsive"/>
					<div class="fb-page" data-href="https://www.facebook.com/sonando.conelgol" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sonando.conelgol"><a href="https://www.facebook.com/sonando.conelgol">Soñando Con El Gol</a></blockquote></div></div>
				</div>
					<?php $this->view('home/temp/nav_newsletter');?>

		</div>

		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>
