var preloadingImages = [];

preloadImage('img/libres1on.jpg');
preloadImage('img/libres2on.jpg');
preloadImage('img/libres3on.jpg');
preloadImage('img/libres4on.jpg');
preloadImage('img/secc1on.png');
preloadImage('img/secc2on.png');
preloadImage('img/secc4on.png');
preloadImage('img/secc5on.png');
preloadImage('img/secc6on.png');

$(document).ready(function(){
	// MOUSE OVER MAIN BANNER
	$('#mainbanner').mouseover(function(){
		$('.bannerphoto').cycle('pause');
		var bannerimg = $('.bannerphoto img.cycle-slide-active', $(this)).attr('src');
		$('.bannerphoto img.cycle-slide-active', $(this)).attr('src', bannerimg.replace('off', 'on'));
	}).mouseout(function(){
		$('.bannerphoto').cycle('resume');
		var bannerimg = $('.bannerphoto img.cycle-slide-active', $(this)).attr('src');
		$('.bannerphoto img.cycle-slide-active', $(this)).attr('src', bannerimg.replace('on', 'off'));
	});
	
	// MOUSE OVER SECCIONES
	$('.boxseccion').mouseover(function(){
		var seccimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', seccimg.replace('off', 'on'));
	}).mouseout(function(){
		var seccimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', seccimg.replace('on', 'off'));
	});
	
	// MOUSE OVER PUBLICIDADES
	$('.publibox').mouseover(function(){
		var pubimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', pubimg.replace('off', 'on'));
	}).mouseout(function(){
		var pubimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', pubimg.replace('on', 'off'));
	});
	
	// MOUSE OVER NOTAS
	$('#notassidebar a').mouseover(function(){
		var seccimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', seccimg.replace('off', 'on'));
	}).mouseout(function(){
		var seccimg = $('img', $(this)).attr('src');
		$('img', $(this)).attr('src', seccimg.replace('on', 'off'));
	});
	
	$('.collapse').on('show.bs.collapse', function () {
		$(this).siblings('.collapse').removeClass('in').prev('a').addClass('collapsed');
	});
});

function preloadImage(url) {
	var img = new Image();
	img.onload = function() {
			var index = preloadingImages.indexOf(this);
			if (index !== -1) {
					preloadingImages.splice(index, 1);
			}
	}
	preloadingImages.push(img);
	img.src = url;
}