

$(document).ready(function(){
  $(".v--widht30 button").click(function(){
    $(".v-navigation-drawer").toggleClass("shownavigation")
  })
})


$(document).ready(function(){
    $(".hamburger").click(function(){
        $(".menu-container").addClass("showmenu");
    })

    $(".close-call").click(function(){
        $(".menu-container").removeClass("showmenu");
    })
})

$(document).ready(function(){
   var padd =  $("nav").width();
   $(".work_area").css('padding-left', padd);
})



// dashboard Accordation -------------------------

/* jQuery
================================================== */
$(function() {
    $('.list-item').click(function(j) {
      
      var dropDown = $(this).closest('.acc__card').find('.acc__panel');
      $(this).closest('.acc').find('.acc__panel').not(dropDown).slideUp();
      
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
      } else {
        $(this).closest('.acc').find('.list-item.active').removeClass('active');
        $(this).addClass('active');
      }
      
      dropDown.stop(false, true).slideToggle();
      j.preventDefault();
    });
  });


  $(document).ready(function(){
    $(".list-item").each(function(){
        $(this).click(function(){
            $(".list-item").removeClass("active-link")
            $(this).addClass("active-link")
        })
    })
  })



  // multiselect box -----------------------------------

    $(document).ready(function() {

$('.multiple-checkboxes').multiselect({
  nonSelectedText: "Assigned Staffs",
});
  });


/*  DATA TABLE
======================================================= */

$(document).ready(function() {
    $('#listuser').dataTable();
    } );



    
/*  TAB SECTION
======================================================= */

$('.tab-link').click( function() {
	
	var tabID = $(this).attr('data-tab');
	
	$(this).addClass('active').siblings().removeClass('active');
	
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');
});