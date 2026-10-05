// Preloader
jQuery(window).load(function() {
	$(".lds-ripple").animate({top:'150%', opacity:'0'},{ duration: 500 }, "bounce");
	$("#preloader").delay(500).animate({opacity:'0'}, 1500, function(){
		$(this).hide();
	});
	$("body").css( "position", "static" );
});

// Expand / Collapse Menu
$(function() {		
	$('#btnMenu').click(function(){
		$('.secSubNavi').hide();
		$('.secContD').show();
		$('#btnMenu').toggleClass('change');
		$('#btnMenu').addClass('colorWhite');
		$('.secMainNavi li').each(function(i) {
			var $li = $(this);
			setTimeout(function() {
				$li.toggleClass('naviSlideIn');
			}, i*50); // delay 100 ms
		});
		$('aside').fadeToggle("1000");
		$('.secContD').toggleClass('naviSlideIn');
	});
});

// Cover Animation
$(window).scroll( function(){
    if( $(window).scrollTop() > 10 ) {
      $('.secCover').addClass("active");
    }  else {
      $('.secCover').removeClass("active");
    }
});