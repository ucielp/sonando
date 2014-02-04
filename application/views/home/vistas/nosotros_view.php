		<div class="header_page">
            <h1>Nosotros</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="nosotros_contenedor">
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
            	<h1>Ubicación</h1>
                
			</div>
            <div id="ubicacion">
            	<div id="datos_contacto_mapa">
                    <p>Podés contactarte con nosotros</p>
                    <p>Francisco Pochetino: 0341-155876106</p>
                    <p>Pablo Benetti: 0341-155876088</p>
                    <p>Tambien con los coordinadores</p>
                    <p>Pablo: 0341-155007422</p>
                    <p>Cristian Lucero: 0341-155876092</p>

                    <p>info@sonandoconelgol.com.ar</p>
                </div>
            	<div id="map"></div>
            </div>
			<div class="titular_nosotros">
            	<h1>Desarrollo del Torneo</h1>
            </div>
            <div id="desarrollo_torneo">
                <div class="link_pdf">
                    <h2>Desarrollo Apertura 2013</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/desarrollo_torneo_2013.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
                </div>
                 <div class="link_pdf">
                    <h2>Desarrollo Clausura 2013</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/desarrollo_clausura_2013.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
                </div>
                <!--
                <div class="link_pdf">
                    <h2>Desarrollo Clausura 2012</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/DesarrolloClausura.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
                </div>
                -->
                <div class="link_pdf">
                    <h2>Tribunal de Disciplina</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/reglamento_2013.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
               </div>
               
                 <div class="link_pdf">
                    <h2>Autorización (menores de 18 años)</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/autorizacion.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
               </div>
                <div class="link_pdf">
                    <h2>Acta de deslinde de responsabilidad civil</h2>
                    <a href="<?php echo base_url(); ?>images/nosotros/deslinde_responsabilidad_civil.doc" target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
               </div>
               
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
        
        
