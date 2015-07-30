		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row">
				<?php if ($notas){ ?>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="listanotas">
					<?php foreach($notas as $nota): ?>
							<div class="notacont">
								<h2><?php echo $nota->fecha; ?></h2>
								<h3><?php echo $nota->titulo; ?></h3>
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
						<a href="<?php echo base_url(); ?>unionyvalores"><img src="img/sidebarizq1off.png" class="img-responsive"/></a>
						<a href="<?php echo base_url(); ?>laseleccion"><img src="img/sidebarizq2off.png" class="img-responsive"/></a>
					</div>
				</div>
			</div>
			<?php echo $this->pagination->create_links(); ?></div>	
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>
