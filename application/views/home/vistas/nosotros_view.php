		<div class="header_page">
            <h1>Nosotros</h1>
            <h2>&nbsp;</h2>
        </div>
		
	

        <div class="nosotros_contenedor">
			<div class="titular_nosotros">
            	<h1>Contacto</h1>
            </div>
			<p>
			<a href="<?php echo base_url(); ?>contacto" target="_blank">Contactarse</a>
			</p>
        	<div class="titular_nosotros">
            	<h1>Historia del Torneo</h1>
            </div>
            <p>La vida del Torneo Stella, se remonta a fines del 2007, cuando un grupo de ex alumnos del colegio Stella Maris, amantes del deporte, especialmente del futbol se junto para darle un lugar al juego mas popular de Rosario.</p>
            <p> Es asi que en Noviembre del 2007, en el campo de deportes del colegio Stella Maris, y conjuntamente con ellos, se organizó y desarrolló el primer torneo corto de futbol siete.</p>
            <p>18 equipos de categoria libre, 4 de mayores de 35 y algunos de infantiles le dieron el comienzo a esta historia, ahora el descenlace depende de vos. Te esperamos!!! </p>
            <div class="titular_nosotros">
            	<h1>El Predio</h1>
            </div>
            
            <ul id="slider1">
				<li class="panel5">
					<div>
						<div class="textSlide">
						<span class="rightside"><img src="<?php echo base_url(); ?>images/nosotros/slider/1.jpg" alt="" width="450" height="290"></span>
							<h3>Instalaciones</h3>
							<p>El Torneo cuenta con</p>
							<ul><li>seguridad</li>
                                <li>asistencia médica</li>
                                <li>estacionamiento</li>
                                <li>buffet</li>
								<li>ambulancia</li>

							</ul>
                            <p>Staff</p>
							<ul><li>prof. de ed. física</li>
                                <li>preparadores físicos</li>
                                 <li>kinesiologos</li>
                                <li>nutricionistas</li>
 								 <li>médicos</li>

							</ul>
						</div>
					</div>
				</li>
                <li><img src="<?php echo base_url(); ?>images/nosotros/slider/2.jpg" alt=""></li>
				<li><img src="<?php echo base_url(); ?>images/nosotros/slider/3.jpg" alt=""></li>
                <li><img src="<?php echo base_url(); ?>images/nosotros/slider/4.jpg" alt=""></li>
                <li><img src="<?php echo base_url(); ?>images/nosotros/slider/5.jpg" alt=""></li>
                <li class="panel5">
					<div>
						<div class="textSlide">
						<span class="rightside"></span>
							<h3>Información de Contacto</h3>
							<p>Te podes contactar con nosotros por medio estos mails</p>

							<br>
							<ul>
								<li>info@sonandoconelgol.com.ar</li>
                                <li>tribunal@sonandoconelgol.com.ar</li>
								<li>inscripcion@sonandoconelgol.com.ar</li>
                                <li>rrhh@sonandoconelgol.com.ar</li>

                                
							</ul>
						</div>
					</div>
				</li>
			</ul>  <!-- END AnythingSlider #1 -->
            
            <div class="titular_nosotros">
            	<h1>Ubicación y contactos</h1>
                
			</div>
            <div id="ubicacion">
            	<div id="datos_contacto_mapa">
                    <p>Las líneas 110 115 y 146 te dejan a unas cuadras del predio. </p>
					<p>Más información en <a href="http://infomapa.rosario.gov.ar/emapa/mapa.htm" target="_blank">infomapa Rosario</a></p>
					<HR align= LEFT WIDTH=80%>
                    <p>Podés contactarte con nosotros</p>
                    <p>Francisco Pochettino: 0341-153882888</p>
                    <p>Pablo Benetti: 0341-153882887</p>
                    <p>Santiago Biazzi 0341-155032605</p>
                    <p>Atencion al ciente: 0341-3882874</p>
                    <p>info@sonandoconelgol.com.ar</p>
                </div>
            	<div id="map"></div>
            </div>
			
            <script type="text/javascript">
            var map = new GMap2(document.getElementById("map"));
            var mapTypeControl = new GMapTypeControl();
            var topRight = new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(10,10));
            var bottomRight = new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,10));
            map.addControl(mapTypeControl, topRight);
            GEvent.addListener(map, "dblclick", function() {
              map.removeControl(mapTypeControl);
              map.addControl(new GMapTypeControl(), bottomRight);
            });
            map.addControl(new GSmallMapControl());
            map.setCenter(new GLatLng(-32.911243, -60.739163), 15);
    
            var marker = new GMarker(new GPoint(-60.739163, -32.911243));
            map.addOverlay(marker);
            </script>
		</div>	

        </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->
        
        
