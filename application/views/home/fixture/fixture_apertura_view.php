        <div class="header_page">
            <h1>Categorías</h1>
            <h2>&nbsp;</h2>
        </div>
        <div class="categorias_all_contenedor">
        	<div id="infoMessage"><?php echo $message;?></div>
                
                <!-- table class="categorias_all">
                <thead>
                    <tr>
                        <th class="t">
						<a href="<?php echo base_url();?>fixture/promociones">
         				Promociones y ascensos </a>
                        </span></th>
                    </tr>
                 </thead>
			</table -->
        	
			<?php foreach ($categories as $category): ?>
            <table class="categorias_all">
                <thead>
                    <tr>
                        <th class="t">
         <a href="<?php echo base_url();?>fixture/ver_fase_apertura/<?php echo $category->category;?>">
         Categoría <span style="text-transform:uppercase;"><?php echo $category->category;?></a>
                        </span></th>
                    </tr>
                 </thead>
			</table>
            <?php endforeach; ?>
            
        </div>

       </div> <!-- END CONTAINER-->
	</div> <!-- END WRAPPER -->