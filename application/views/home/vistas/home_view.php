		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container" id="contentarea">
			<div class="row">
				<div class="col-xs-12">
					<div class="bannerfblike"><iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsonando.conelgol&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; width:125px; height:25px"></iframe></div>
						<div id="mainbanner">
							<div class="bannerphoto cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="3000" data-cycle-pause-on-hover="true" data-cycle-speed="200">
								<img src="img/libres1off.png" onclick="window.location.href='<?php echo base_url(); ?>libres'" class="img-responsive"/>
								<img src="img/libres2off.png" onclick="window.location.href='<?php echo base_url(); ?>libres'" class="img-responsive"/>
								<img src="img/libres3off.png" onclick="window.location.href='<?php echo base_url(); ?>copaargentina'" class="img-responsive"/>
								<img src="img/libres4off.png" onclick="window.location.href='<?php echo base_url(); ?>laseleccion'" class="img-responsive"/>
								<div class="cycle-pager"></div>
							</div>
						</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="areasecciones">
					<div class="row">
						<div class="col-xs-6 boxseccion">
							<a href="https://www.facebook.com/sonandoinferiores" target="_blank"><img src="img/secc1off.png" class="img-responsive"/></a>
						</div>
						<div class="col-xs-6 boxseccion">
							<a href="https://www.facebook.com/sonandoconelgolfemenino" target="_blank"><img src="img/secc2off.png" class="img-responsive"/></a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 boxseccion">
							<a href="#" data-toggle="modal" data-target="#modal-video"><img src="img/secc3.png" class="img-responsive"/></a>
						</div>
						<div class="col-xs-6 boxseccion">
							<a href="<?php echo base_url(); ?>laseleccion"><img src="img/secc4off.png" class="img-responsive"/></a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 boxseccion">
							<a href="<?php echo base_url(); ?>copaargentina"><img src="img/secc5off.png" class="img-responsive"/></a>
						</div>
						<div class="col-xs-6 boxseccion">
							<a href="<?php echo base_url(); ?>unionyvalores"><img src="img/secc6off.png" class="img-responsive"/></a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 boxsecbutton">
							<a href="https://www.facebook.com/torneoempresas" target="_blank"><div class="secbutton">EMPRESAS</div></a>
						</div>
						<div class="col-xs-6 boxsecbutton">
							<a href="#"><div class="secbutton">+30</div></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="sidebar">
					<div class="avisosnovedades">
						<h3>&deg; &nbsp;&nbsp;&nbsp; Avisos y Novedades &nbsp;&nbsp;&nbsp; &deg;</h3>
						<div id="twitter_container">
							<a class="twitter-timeline" href="https://twitter.com/SonandoConElGol" data-widget-id="352500703337529344">Tweets by @SonandoConElGol</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
					<div class="comollegar">
						<a href="<?php echo base_url(); ?>comollegar"><img src="img/comollegar.png" class="img-responsive"/></a>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12" id="publibar">
					<!--<?php foreach ($marcas as $marca): ?>
						<div class="publibox">
							<a target="_blank" href="<?php echo $marca->link;?>">
								<img width="67" alt="<?php echo $marca->nombre;?>" src="<?php echo base_url(); ?>images/home/banner/<?php echo $marca->image_url;?>" class="img-responsive"/>
							</a>
						</div>
					<?php endforeach;?> -->
					<div class="publibox"><a href="#"><img src="img/publi1off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi2off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi3off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi4off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi5off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi1off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi2off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi3off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi4off.jpg" class="img-responsive"/></a></div>
					<div class="publibox"><a href="#"><img src="img/publi5off.jpg" class="img-responsive"/></a></div>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>
		
		<div class="modal fade" id="modal-video">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<div class="custommodalclose" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></div>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/b9d1lFgaRq0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
		<script>
			$(document).ready(function(){
				if ( $(window).width() > 767 ) {
					$('#modal-video').modal('show');
				}
			});
		</script>
  </body>
</html>