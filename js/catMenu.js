$(function() {
	// Only for views with catMenu	
	$('.catmenu').parent().css('marginBottom','80px');	
	// Let's find all categories with subcategories
	$('.catmenu ul').find('li:has(ul)')
   	.addClass('has-sub')
	.addClass('collapsed')
  	.children('ul').hide();
	// When clicking on control let's do the thing
	$('.catmenu ul').find('li span').click( function(event) {
		if ($(this).parent().hasClass('expanded')) {
			$(this).parent().removeClass('expanded');
			$(this).parent().addClass('collapsed');
		} else {
			$(this).parent().removeClass('collapsed')
			$(this).parent().addClass('expanded');
		}
		$(this).parent().children('ul').toggle('fast');
		
		return false;
	});	
	// Start with the first element expanded
	//~ $('.catmenu ul').closest('li').first().addClass('expanded');
	//~ $('.catmenu ul').closest('li').first().children('ul').show();
	// IE7/8 trick for last-child style
	$('.catmenu ul li:last-child').css('borderBottom','0')
});