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
					<div class="row genericbanner">
						<img src="img/unionyvalores.jpg" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-12">
					<br/>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 genericpagecol">
					<h2>Titulo ejemplo</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam luctus in erat ac cursus. Morbi rutrum nec enim id euismod. Duis vestibulum neque non sollicitudin lobortis. Etiam sed metus at felis auctor ornare ut venenatis nunc. Vestibulum in est tristique, ullamcorper augue in, consequat odio. Duis nulla ipsum, sollicitudin et velit vitae, vulputate eleifend augue. Nulla finibus dolor ac ante viverra ultricies sit amet accumsan est. Etiam et nisi pharetra, blandit augue ut, aliquet ex. Donec malesuada tellus nulla, eu elementum dolor feugiat id. Sed vestibulum neque in quam aliquet rutrum. Etiam metus eros, por</p>
					<p>Duis quis elit et sapien bibendum semper. Fusce quis tincidunt lorem. Donec bibendum mauris id dolor dignissim, varius finibus metus semper. Vestibulum consequat tristique nulla, eu condimentum ligula hendrerit a. Pellentesque eget mauris sit amet tellus viverra imperdiet. Vivamus eu elementum eros. Sed tellus nisi, viverra eget placerat sit amet, scelerisque quis nulla. Aenean nisl lacus, sollicitudin sit amet ultrices ut, rhoncus ornare tortor. In metus urna, sagittis in dapibus quis, dictum quis ante. Pellentesque quis metus metus. Praesent pellentesque pharetra magna vel luctus. Mauris at ante augue. Ut euismod quam ut accu</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 genericpagecol">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam luctus in erat ac cursus. Morbi rutrum nec enim id euismod. Duis vestibulum neque non sollicitudin lobortis. Etiam sed metus at felis auctor ornare ut venenatis nunc. Vestibulum in est tristique, ullamcorper augue in, consequat odio. Duis nulla ipsum, sollicitudin et velit vitae, vulputate eleifend augue. Nulla finibus dolor ac ante viverra ultricies sit amet accumsan est. Etiam et nisi pharetra, blandit augue ut, aliquet ex. Donec malesuada tellus nulla, eu elementum dolor feugiat id. Sed vestibulum neque in quam aliquet rutrum. Etiam metus eros, por</p>
					<p>Duis quis elit et sapien bibendum semper. Fusce quis tincidunt lorem. Donec bibendum mauris id dolor dignissim, varius finibus metus semper. Vestibulum consequat tristique nulla, eu condimentum ligula hendrerit a. Pellentesque eget mauris sit amet tellus viverra imperdiet. Vivamus eu elementum eros. Sed tellus nisi, viverra eget placerat sit amet, scelerisque quis nulla. Aenean nisl lacus, sollicitudin sit amet ultrices ut, rhoncus ornare tortor. In metus urna, sagittis in dapibus quis, dictum quis ante. Pellentesque quis metus metus. Praesent pellentesque pharetra magna vel luctus. Mauris at ante augue. Ut euismod quam ut accu</p>
				</div>
				<div class="col-xs-12">
					<br/>
				</div>
			</div>
		</div>
		
		<?php $this->view('home/temp/nav_bar');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cycle2.min.js"></script>
		<script src="js/scripts.js"></script>
  </body>
</html>