
<div class="nosotros_contenedor">

	<div class="titular_nosotros">
		<h1>Desarrollo del Torneo</h1>
	</div>
	
	<div id="desarrollo_torneo">

	<?php foreach ($items_reglamento as $item): ?>
		<div class="link_pdf">  
		 <h2><?php echo $item->titulo ?></h2>
			<a href="<?php echo base_url(); ?>images/nosotros/<?php echo $item->link . '"'; ?> target="_blank"><img src="<?php echo base_url(); ?>images/nosotros/pdf_icon.png" width="52" height="52" /></a>
		</div>	
	<?php endforeach;?>

               </div>
               
           </div>
	 </div>
 </div>

