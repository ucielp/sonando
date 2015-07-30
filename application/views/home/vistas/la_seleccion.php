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
					<div class="row selecbanner">
						<img src="img/laseleccion.jpg" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="seleccionder">
						<h2>CATEGORIAS<br/>mayores, sub21, sub17, sub15</h2>
						<p>El objetivo es disfrutar de esta pasión y unirnos más. Generar un clima de amistad entre los miembros de Soñando con el Gol, buscando crecer día a día, y dar lo mejor de cada uno. Compartiendo una misma camiseta, y buscando un objetivo común: Ser equipo.</p>
						<p><strong>El desafío:</strong> amistosos frente a distintos clubes por Rosario y pueblos aledaños.</p>
						<p><strong>Para ser parte de la selección sólo tenés que jugar en los torneos de Soñando con el Gol y destacarte!</strong></p>
						<br/>
						<h3>Puedes ver la lista de convocados en nuestros Facebook:</h3>
						<h3><a href="https://www.facebook.com/sonando.conelgol">FACEBOOK SCG MAYORES</a></h3>
						<h3><a href="https://www.facebook.com/sonandoinferiores">FACEBOOK SCG INFERIORES</a></h3>
						<br/>
						<br/>
<!--
						<h3><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <a target="_blank" href="#">VER  VIDEOS SELECCIóN SUB 15</a></h3>
-->
						<h3><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <a target="_blank" href="https://www.youtube.com/watch?v=5J27evHAR_U ">VER  VIDEOS SELECCIóN SUB 17</a></h3>
						<h3><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <a target="_blank"href="https://www.youtube.com/watch?v=G3Htctx1gY8">VER  VIDEOS SELECCIóN SUB 21</a></h3>
<!--
						<h3><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <a target="_blank" href="#">VER VIDEOS SELECCIÓN mayores</a></h3>
-->
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="seleccionfotos">
						<a href="#" data-toggle="modal" data-target="#modal-sub21"><img src="img/selecleft1.jpg" class="img-responsive"/></a>
						<a href="#" data-toggle="modal" data-target="#modal-sub17"><img src="img/selecleft2.jpg" class="img-responsive"/></a>
					</div>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>
		
		<div class="modal fade" id="modal-sub21">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/G3Htctx1gY8" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-sub17">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5J27evHAR_U" frameborder="0" allowfullscreen></iframe>
						</div>
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
