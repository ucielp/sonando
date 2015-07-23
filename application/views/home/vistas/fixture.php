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
					<div class="row">
						<div id="libresbanner">
							<img class="bannerphoto" src="img/intlibres3.jpg"/>
							<h2><a href="<?php echo base_url(); ?>libres">TORNEOS LIBRES</a></h2>
							<h3><a href="<?php echo base_url(); ?>libres">MAYORES</a></h3>
							<button id="libresmenutoggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#libresmenu" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
							<div class="bgmenulibres hidden-xs"></div>
							<?php $this->view('home/temp/libres_menu');?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="row">
						<div id="leftmenu">
							<div class="list-group" id="desplegable">
								<?php echo $categoryTree ?>
							</div>
							<div class="boxsanciones">
								<a href="https://docs.google.com/spreadsheet/ccc?key=0AuIBKvFOyc--dEpBZm80aXVfeTl3WFdKaTd2bHgyamc&usp=sharing#gid=0" target="_blank">Sanciones <img src="img/amaroja.png"/></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="row">
							<div class="tablastorneo">

								<?php
									
									?>
									</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
	<script type="text/javascript">
		$('#leftmenu a.hoja').bind( "click", function(e) {
			e.preventDefault();
			$(".tablastorneo").html('<h1 class="ajax-loader"><img src="<?php echo base_url(); ?>images/ajax-loader.gif" /></h1>');
			var href = $(this).attr("href");
			$(".tablastorneo").load(href);
			$("body, html").animate({ 
					scrollTop: $( ".tablastorneo" ).offset().top - 115
			}, 600);
		});
	</script>
  </body>
</html>
