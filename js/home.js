$(function() {
  var viewport = $('.featured .items');
  var scrubber = $('.scrubber .items');

  viewport.find('.item').eq(0).siblings().find('.info').hide();

  if (Browser.isWebkit && Browser.supportsTouch) {
    var controller = new Ediciones.TouchSlider();
    var twitter_controller = new Ediciones.TouchSlider();
    var scrubber_controller = new Ediciones.TouchSlider();
    var poll_controller = new Ediciones.TouchSlider();
    scrubber.css('background', 'url(../images/home/scrubber.png) no-repeat');
  } else {
    var controller = new Ediciones.Slider();
    var twitter_controller = new Ediciones.Slider();
    var scrubber_controller = new Ediciones.Slider();
    var poll_controller = new Ediciones.Slider();
    scrubber.css('background', 'url(../images/home/scrubber-pc.png) center center no-repeat');
  }

  $('.featured .previous').show();
  $('.social .slider .previous').css('opacity', 0.25);
  $('.news .previous').css('opacity', 0.25);
  $('.dots').hover(function() { $(this).css('cursor', 'pointer') });

  // Main Slider
  controller.init(viewport, {
    next: $('.featured .next'), 
    previous: $('.featured .previous')
  });
  // Autoslide the Features slider
  var ap_count = 1;
  var autoplay = setInterval(function() {
    if (ap_count < $('.scrubber .dots .dot').size()) { 
      controller.current_x = controller.limitXBounds(controller.nextPageX(controller.current_x));
      controller.update(controller.current_x, true);
      controller.runHook('move', controller);
      ap_count += 1;
    } else {
      clearInterval(this);
    }
  }, 7000);
  
  $('.featured .next,.featured .previous,.scrubber .dots .dot').click(function() { clearTimeout(autoplay); });

  
});

