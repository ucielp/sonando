<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="X-UA-Compatible" content="ie=8" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.gif" type="image/gif">

<title><?php echo $title; ?></title>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/fixture.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/posiciones.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/notas.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/contacto.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/preinscripcion.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/equipos.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/goleadores.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/nosotros.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/sanciones.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/twitter.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/banner.css" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.miniColors.css" type="text/css" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/ie_style.css" type="text/css" >
<![endif]-->	
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,60	0,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.miniColors.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.placehold.min.js"></script>
<script src="<?php echo base_url();?>js/bubbles/jquery-css-transform.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bubbles/rotate3Di.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/bubbles/functions.js" type="text/javascript"></script>

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAbOd_d_a4SYm-T6fDAmk6zBQ65V4I35QkyvHAPBchMUfZFypIUBRQ_6o0f2QKuzVoJDqhnXtMdpMVEQ" type="text/javascript"></script>

<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
        elements : "textarea_info_equipo",
		theme : "advanced",
		theme_advanced_disable: "styleselect,formatselect,removeformat"
	});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43175694-2', 'sonandoconelgol.com.ar');
  ga('send', 'pageview');

</script>

	<!-- Anything Slider optional plugins -->
	<script src="<?php echo base_url(); ?>js/anything-slider/js/jquery.easing.1.2.js"></script>
	<!-- http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js -->
	<script src="<?php echo base_url(); ?>js/anything-slider/js/swfobject.js"></script>

	<!-- Demo stuff -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/demos/css/page.css" media="screen">

	<!-- AnythingSlider -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/anythingslider.css">
	<script src="<?php echo base_url(); ?>js/anything-slider/js/jquery.anythingslider.js"></script>

	<!-- AnythingSlider video extension; optional, but needed to control video pause/play -->
	<script src="<?php echo base_url(); ?>js/anything-slider/js/jquery.anythingslider.video.js"></script>

	<!-- Ideally, add the stylesheet(s) you are going to use here,
	 otherwise they are loaded and appended to the <head> automatically and will over-ride the IE stylesheet below -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/theme-metallic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/theme-minimalist-round.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/theme-minimalist-square.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/theme-construction.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/theme-cs-portfolio.css">

	<!-- Older IE stylesheet, to reposition navigation arrows, added AFTER the theme stylesheet above -->
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/anything-slider/css/anythingslider-ie.css" type="text/css" media="screen" />
	<![endif]-->
	<script>
		$(function(){
			$('#slider1').anythingSlider({
				theme           : 'metallic',
				easing          : 'easeInOutBack',
				autoPlay            : true,
				delay               : 5000,      // How long between slideshow transitions in AutoPlay mode (in milliseconds)
				animationTime       : 600,       // How long the slideshow transition takes (in milliseconds)
				easing              : "swing",    // Anything other than "linear" or "swing" requires the easing plugin
				onSlideComplete : function(slider){
					// alert('Welcome to Slide #' + slider.currentPage);
				}
			});
		});
	</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27135950-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body class="bg_4">
	<div id="header">
		<div id="top"></div>
		<div id="logo_nav_container">
            <a id="logo" href="<?php echo base_url(); ?>home"><span>Soñando con el Gol</span></a>
            <div id="nav">
                <ul>
                    <li><a href="<?php echo base_url(); ?>posiciones"><span>Posiciones</span></a></li>
                    <li><a href="<?php echo base_url(); ?>fixture"><span>Fixture</span></a></li>
                    <li><a href="<?php echo base_url(); ?>equipos"><span>Equipos</span></a></li>
                    <li><a href="<?php echo base_url(); ?>goleadores"><span>Goleadores</span></a></li>
                    <li class="right"><a href="<?php echo base_url(); ?>nosotros"><span>Nosotros</span></a></li>
                    <li><a href="<?php echo base_url(); ?>notas"><span>Notas</span></a></li>
                    <li><a href="<?php echo base_url(); ?>sanciones"><span>Sanciones</span></a></li>
                    <li><a href="<?php echo base_url(); ?>contacto"><span>Contacto</span></a></li>
                </ul>
            </div>
		</div> <!-- END logo_nav_container -->
	</div>
    <div id="wrapper">
      <div id="container">
