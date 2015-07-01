		<nav class="navbar navbar-fixed-top" id="topnav">
			<div class="container">
				<?php $this->view('home/temp/nav_logo');?>
				<?php $this->view('home/temp/nav_menu');?>
			</div>
		</nav>

		<div class="container fondogris" id="contentarea">
			<div class="row" style="padding-top: 40px; padding-bottom: 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div id="comollegarmap">
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="comollegarinfo">
						<img src="img/llegar1.png" class="img-responsive"/>
						<a href="http://www.rosario.gov.ar/infomapa" target="_blank"><img src="img/llegar2.png" class="img-responsive"/></a>
						<a href="<?php echo base_url(); ?>contacto"><img src="img/llegar3.png" class="img-responsive"/></a>
					</div>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript">
			function initialize() {
				var myLatlng = new google.maps.LatLng(-32.911243, -60.739163);
				var mapOptions = {
					zoom: 15,
					center: myLatlng
				}
				var map = new google.maps.Map(document.getElementById('comollegarmap'), mapOptions);

				var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						title: 'Soñando con el Gol'
				});
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
  </body>
</html>