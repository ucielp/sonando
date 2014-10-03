        <div class="container">
		<div class="header_page">
            <h1>Home</h1>
        </div>
        	<div class="team-members">
            <ul>
    			<?php foreach ($marcas as $marca): ?>
                <li>
                    <a class='editButton' style='display:none;' href=''>EDIT</a>
                    <a href="<?php echo $marca->link;?>" class="ttip" target="_blank" >
                    <img src="<?php echo base_url(); ?>images/home/banner/<?php echo $marca->image_url;?>" alt=""  height="80" />
                    <span><strong><?php echo $marca->nombre;?> </strong></span></a>
				</li>                	
				<?php endforeach;?>
  
            </ul>
		</div><!-- /team-members -->

        <div id="home_wrapper_left_right">
        	<div class="left_links_home">
                <h1>Destacados</h1>
                <div class="accesos_directos">
                	<div class="accesos1">
                        <a href="<?php echo base_url(); ?>fixture"><img src="<?php echo base_url(); ?>images/home/fixture.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>posiciones"><img src="<?php echo base_url(); ?>images/home/posiciones.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>goleadores"><img src="<?php echo base_url(); ?>images/home/goleadores.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>equipos"><img src="<?php echo base_url(); ?>images/home/equipos.png" width="60" height="72" /></a>
				</div>
                    <div class="accesos2">
                    	<a href="<?php echo base_url(); ?>sanciones"><img src="<?php echo base_url(); ?>images/home/saciones.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>inscripcion"><img src="<?php echo base_url(); ?>images/home/inscripcion.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>nosotros#desarrollo_torneo"><img src="<?php echo base_url(); ?>images/home/reglamento.png" width="60" height="72" /></a>
                        <a href="<?php echo base_url(); ?>nosotros#ubicacion"><img src="<?php echo base_url(); ?>images/home/ubicacion.png" width="60" height="72" /></a>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <h1>Últimas Noticias</h1>
                <div id="twitter_container">
                 <a class="twitter-timeline" href="https://twitter.com/SonandoConElGol" data-widget-id="352500703337529344">Tweets by @SonandoConElGol</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </div>
  
        
		</div> <!-- END CONTAINER -->
	</div> <!-- END WRAPPER-->
    
    
