<div id="libresmenu" class="collapse navbar-collapse">
	<ul class="nav navbar-nav menulibres">
		<li class="<?=($this->uri->segment(1)==='equipos')?'active':''?>"><a href="<?php echo base_url(); ?>equipos">Equipos</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
		<li class="<?=($this->uri->segment(1)==='fixture')?'active':''?>"><a href="<?php echo base_url(); ?>fixture">Fixture</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
		<li class="<?=($this->uri->segment(1)==='tablas')?'active':''?>"><a href="<?php echo base_url(); ?>tablas">Tablas</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
		<li class="<?=($this->uri->segment(1)==='inscripcion')?'active':''?>"><a href="<?php echo base_url(); ?>inscripcion">Inscripci&oacute;n</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
		<li class="<?=($this->uri->segment(1)==='reglamento')?'active':''?>"><a href="<?php echo base_url(); ?>reglamento">Reglamento</a><div class="activemarker"></div><img src="img/activemenu2.png" class="activearrow"/></li>
	</ul>
</div>