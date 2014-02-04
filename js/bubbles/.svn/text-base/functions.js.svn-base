jQuery(function ($){

	$('.blink').focus(function () {
		if ($(this).val() == $(this).attr('title')) {
			$(this).val('');
		}
	}).blur(function () {
		if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
		}
	});
	
	var productSlider = {};
	
	/*$('#buy-now').mouseover(function() {
		$('.dd-store').slideDown().mouseout(function(evt) {
			if ($(evt.toElement).parents('.dd-store').length == 0 && !$(evt.toElement).hasClass('dd-store')) {
				$(this).slideUp();
			}
		});
		initProductSlider();
	}).click(function() {
		$('.dd-store').slideToggle();
		initProductSlider();
		return false;
	});*/
	
	var wasOpened = false;
	var isOpened = false;
	var isBuyHovered = false;
	var isProdHovered = false;
	$('#buy-now').mouseover(function() {
		//if(!wasOpened){
			initProductSlider();
			//$('.products-navigation a[data-filter]:first').trigger('click');
		//	wasOpened = true;
		//};
		$('.dd-store').slideDown();
		$('.products-navigation a[data-filter]:first').trigger('click');
		isOpened = true;
		isBuyHovered = true;
	}).mouseleave(function(){
		window.setTimeout(function(){
			if(isOpened && !isProdHovered){
				$('.dd-store').slideUp();
			};
		}, 2000);
		isBuyHovered = false;
	});
	$('.dd-store').mouseenter(function() {
		isProdHovered = true;
	}).mouseleave(function(){
		window.setTimeout(function(){
			if(isOpened && !isBuyHovered){
				$('.dd-store').slideUp();
			};
		}, 2000);
		isProdHovered = false;
	});
	
	// Products Filter
	var holder = $('.dd-store');
	var filters = holder.find('.products-navigation a[data-filter]');
	var items = holder.find('.products-slider li');
	
	filters.bind('click', function() {
		filters.removeClass('active');
		$(this).addClass('active');
		
		var filter = $(this).attr('data-filter');
		items.hide();
		
		switch (filter) {
			case 'ALL':
				items.show();
				break;
			default:
				items.filter('.' + filter).show();
				break;
		}
		
		initProductSlider();
		
		return false;
	});
	
	initProductSlider();

	// Team Members Slider
	(function() {
		var slider = $('.team-members');
		var ul = slider.find('ul');
		
		var animation = null;
		
		ul.wrap('<div class="slider-wrapper" />');
		
		ul.each(function() {
			var ul = $(this);
			var lis = ul.find('li');
			
			ul.width(lis.length * lis.outerWidth(true) * 2);
			lis.clone().appendTo(ul);
		});
		
		function animationStart() {
			animationStop();
			
			animation = setInterval(function() {
				var left = parseInt(ul.css('left'));
				if (Math.abs(left) * 2 > ul.width()) {
					ul.css('left', 0);
				} else {
					ul.css('left', left - 1 + 'px');
				}
			}, 16);
		}
		
		function animationStop() {
			clearInterval(animation);
			animation = false;
		}
		
		animationStart();
		
		ul.hover(function() {
			animationStop();
		}, function() {
			animationStart();
		});
		
		ul.find('.ttip').hover(function() {
			$(this).find('span').show().css('top', '-74px').stop().animate({ top: '-94px', opacity: 1 }, 200).end().parent('li').css('z-index', '15');
		}, function() {
			$(this).find('span').stop().animate({ top: '-134px', opacity: 0 }, 200, function() {
				$(this).hide();
			}).end().parent('li').css('z-index', 0);
		});
	})();

	if ($('.history-slider').length) {
		var $slider3 = $('.history-slider:not(.editable) ul').bxSlider({ 
		    displaySlideQty: 7,
		    moveSlideQty: 1,
		    controls: false
		});
		$('.history-slider-controls a.prev').click(function(){
			$slider3.goToPreviousSlide();
			return false;
		});
		$('.history-slider-controls a.next').click(function(){
			$slider3.goToNextSlide();
			return false;
		});
	};

	function mySideChange(front) {
        if (front) {
            $(this).parent().find('.front-side').show();
            $(this).parent().find('.back-side').hide();
            
        } else {
            $(this).parent().find('.front-side').hide();
            $(this).parent().find('.back-side').show();
        }
    }
    
    $('.bubble').not('.static').hover(
        function () {
            $(this).find('> div').stop().rotate3Di('flip', 250, {direction: 'clockwise', sideChange: mySideChange});
        },
        function () {
        	$(this).find('> div').stop().rotate3Di('unflip', 500, {sideChange: mySideChange});
            
        }
    );

	$('.team-members li a.ttip').hover(
		function() {
			$(this)
			.find('span')
				.show()
				.css('top','-74px')
				.stop()
				.animate({
					top: '-94px',
					opacity: 1
				}, 200)
			.end()
			.parent('li')
				.css('z-index','2');
		},
		function() {
			$(this)
			.find('span')
				.stop()
				.animate({
					top: '-134px',
					opacity: 0
				}, 200, function() {
					$(this).hide();
				})
			.end()
			.parent('li')
				.css('z-index','0');
			
		}
	);
	
	$('.history-slider li a.ttip').hover(
		function() {
			var span = $(this).find('span').show().css('opacity', 0);
			var bodyttip = span.clone().addClass('bodyttip').appendTo($('body'));
			
			var offsetLeft = span.offset().left;
			var offsetTop = span.offset().top - parseInt(span.css('top'));
			
			bodyttip.css({ left: parseInt(offsetLeft) + 'px', top: parseInt(offsetTop) + 'px' });
			
			bodyttip
				.css('top', (offsetTop - 74) + 'px')
				.stop()
				.animate({
					top: (offsetTop - 94) + 'px',
					opacity: 1
				}, 200)
			.end();
			
			span.parent().css('z-index: 2');
		},
		function() {
			var span = $(this).find('span');
			
			var offsetLeft = span.offset().left;
			var offsetTop = span.offset().top - parseInt(span.css('top'));
			
			var bodyttip = $('body > .bodyttip');
			
			bodyttip
				.stop()
				.animate({
					top: (offsetTop - 134) + 'px',
					opacity: 0
				}, 200, function() {
					bodyttip.remove();
				})
			.end();
			
			span.parent().css('z-index: 1');
		}
	);

});

function initProductSlider() {
	//$(productSlider.additionalLis).remove();
	productSlider = {};
	
	productSlider.slider = $('.dd-store .products-slider');
	productSlider.ul = productSlider.slider.find('> ul');
	productSlider.lis = productSlider.ul.find('> li:visible');
	productSlider.first = 0;
	productSlider.last = 5;
	
	productSlider.ul.css('left', '0px');
	//productSlider.additionalLis = productSlider.lis.clone().appendTo(productSlider.ul);
	
	productSlider.slide = function(index) {
		if (typeof(index) == 'undefined') index = 1;
		
		if (index < 0 && productSlider.first <= 0) {
			productSlider.first += productSlider.lis.length;
			productSlider.last = productSlider.first + 5;
			productSlider.ul.css('left', '-' + productSlider.first*productSlider.lis.outerWidth(true) + 'px');
		}
		
		productSlider.nextFirst = productSlider.first+index;
		productSlider.nextLast = productSlider.last+index;
		
		productSlider.ul.animate({left: '-' + productSlider.nextFirst*productSlider.lis.outerWidth(true) + 'px'}, 400, function() {
			if (productSlider.nextFirst == productSlider.lis.length) {
				productSlider.first = 0;
				productSlider.last = 5;
				productSlider.ul.css('left', '0px');
			} else {
				productSlider.first = productSlider.nextFirst;
				productSlider.last = productSlider.nextLast;
			}
		});
	}
	
	productSlider.slideNext = function() {
		productSlider.slide(+1);
	}
	
	productSlider.slidePrev = function() {
		productSlider.slide(-1);
	}
	
	$('.dd-store .slider-controls .next').unbind('click').bind('click', function() {
		productSlider.slide(+1);
		return false;
	});
	
	$('.dd-store .slider-controls .prev').unbind('click').bind('click', function() {
		productSlider.slide(-1);
		return false;
	});
}