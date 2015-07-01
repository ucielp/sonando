		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container" id="contentarea">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" id="areacontenidos">
					<div id="controtator">
						<div class="bannerfblike"><iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsonando.conelgol&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; width:125px; height:25px"></iframe></div>
						<div class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="3000" data-cycle-pause-on-hover="true" data-cycle-speed="200">
							<img src="img/predio1.jpg" class="img-responsive"/>
							<img src="img/predio2.jpg" class="img-responsive"/>
							<img src="img/predio3.jpg" class="img-responsive"/>
							<img src="img/predio4.jpg" class="img-responsive"/>
							<img src="img/predio5.jpg" class="img-responsive"/>
							<div class="cycle-pager"></div>
						</div>
					</div>
					<div id="conttext">
						<h2>Historia</h2>
						<p>La vida del Torneo Stella, se remonta a fines del 2007, cuando un grupo de ex alumnos del colegio Stella Maris, amantes del deporte, especialmente del futbol se junto para darle un lugar al juego mas popular de Rosario.</p>
						<p>Es asi que en Noviembre del 2007, en el campo de deportes del colegio Stella Maris, y conjuntamente con ellos, se organizó y desarrolló el primer torneo corto de futbol siete.</p>
						<p>18 equipos de categoria libre, 4 de mayores de 35 y algunos de infantiles le dieron el comienzo a esta historia, ahora el descenlace depende de vos.<br/>
						<strong>Te esperamos!!!</strong></p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="sidebar">
					<div class="instalaciones">
						<h3>Instalaciones</h3>
						<h4>
							El Torneo cuenta con<br/>
							seguridad<br/>
							asistencia médica<br/>
							estacionamiento<br/>
							buffet<br/>
							ambulancia<br/>
							<br/>
							Staff<br/>
							prof. de ed. física<br/>
							preparadores físicos<br/>
							kinesiologos<br/>
							nutricionistas<br/>
							médicos
						</h4>
						<a href="<?php echo base_url(); ?>contacto"><img src="img/contacto.jpg" class="img-responsive"/></a>
					</div>
					<div class="comollegar">
						<a href="<?php echo base_url(); ?>comollegar"><img src="img/comollegar2.jpg" class="img-responsive"/></a>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>