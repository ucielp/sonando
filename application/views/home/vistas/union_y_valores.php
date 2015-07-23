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
					<div class="row genericbanner">
						<img src="img/unionyvalores.jpg" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-12">
					<br/>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 genericpagecol">
					<h2></h2>
					<p>Soñando con el gol comenzó a realizar torneos de fútbol en el mes de Noviembre del año 2007 y 

						en los sucesivos años hubo un progreso paulatino de Equipos, que posibilitaron un torneo cada vez 

						más competitivo pero teniendo todos ellos, como principal valor la cooperación, la ayuda mutua y 

						el respecto por el prójimo.  El requisito principal para participar en la Liga, más allá del juego, pasa 

						por que se pregonen los valores de buena Fe, solidaridad,  compañerismo, que es la base para un 

						trabajo de un conjunto exitoso. La cohesión entre los integrantes ayuda a que se exploten las 

						capacidades individuales, obteniendo como resultado que la acción del grupo sea mejor

						Un equipo  puede consagrarse campeón, pero si sus miembros no comparten valores, normas de 

						conducta e iguales metas, el campeonato queda vacío y sin sentido alguno. En soñando con el gol 

						los verdaderos campeones son aquellos elencos que cumplen con las siguientes pautas: ser 

						respetuoso con el prójimo y tener una buena convivencia con la mayor cantidad de compañeros 

						posibles, para saber cuáles son sus necesidades y los valores que pueden aportar al resto del 

						equipo.
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 genericpagecol">
					<p>La mejor jugada dentro de un plantel  es la aportada por el compañerismo, donde un grupo de 

						personas que aprenden a tratarse con un respeto mutuo y con una visión constructiva tiene 

						muchas más posibilidades de alcanzar más de lo que se proponen, que aquellos donde la unión es 

						forzada y tiende en definitiva al individualismo.  Para poder y gozar del torneo, todos aquellos 

						jugadores que quieran inscribirse, tienen que surgirle con espontaneidad la palabra solidaridad y 

						de esa forma serán recibidos con los brazos abiertos por Soñando con el Gol
					</p>
				</div>
				<div class="col-xs-12">
					<br/>
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
