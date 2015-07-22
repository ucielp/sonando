<div class="row" id="navmenu">
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs">
		<div class="pull-left backhome"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Inicio</a></div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<div id="mainmenu" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="<?=($this->uri->segment(1)==='predio')?'active':''?>"><a href="<?php echo base_url(); ?>predio">El Predio</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
				<li><a href="https://www.facebook.com/sonando.conelgol/photos_stream" target="_blank">Fotos</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
				<li class="<?=($this->uri->segment(1)==='notas')?'active':''?>"><a href="<?php echo base_url(); ?>notas">Notas</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
				<li class="<?=($this->uri->segment(1)==='contacto')?'active':''?>"><a href="<?php echo base_url(); ?>contacto">Contacto</a><img src="<?php echo base_url(); ?>img/activemenu.png" class="activearrow"/></li>
				<li class="dropdown "<?=($this->uri->segment(1)==='libres')?'active':''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Torneos</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>libres">Mayores</a></li>
						<li><a href="https://www.facebook.com/sonandoinferiores" target="_blank">Inferiores</a></li>
						<li><a href="https://www.facebook.com/sonandoconelgolfemenino" target="_blank">Femenino</a></li>
						<li><a href="https://www.facebook.com/torneoempresas" target="_blank">Empresas</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-xs">
		<div class="pull-right consonline"><a href="<?php echo base_url(); ?>contacto"><img src="<?php echo base_url(); ?>img/arrow_right.png"/> Consultas Online</a></div>
	</div>
</div>