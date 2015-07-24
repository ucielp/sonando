<?php echo form_open_multipart("newsletter");?>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="boxnewsletter">
						<h2>Recibir Newsletter</h2>
						<input type="email" name="newsletteremail" placeholder="Escribe tu email..."/>
						<button role="button">OK</button>
					</div>
					<input name="redirect" type="hidden" value="<?= $this->uri->uri_string() ?>" />

					<div class="boxcopaamerica">
						<a href="<?php echo base_url(); ?>copaargentina"><img src="img/torneocopaargentina.jpg" class="img-responsive"/></a>
					</div>
				</div>
			</div>
	<?php echo form_close();?>
