<?php $this->load->view('auth/header'); ?>

<div class='mainInfo'>

	   
	<div id="infoMessage"><?php echo $message;?></div>
	
	<p>	 <a href="<?php echo site_url('auth/delete_match/' . $match_id)?>"<u>Sí, quiero eliminarlo</u></a></p>



		<p><a href="<?php echo site_url('auth/');?>"><u>Go Back</u></a></p>

</div>

</body>
</html>
