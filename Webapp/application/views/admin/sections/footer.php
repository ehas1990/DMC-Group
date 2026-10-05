  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!-- Payment  Modal -->

<!-- TO do Modal -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  
    <script src="<?php echo base_url() ?>admintemplate/js/main.js"></script>
   
    <!-- <script src="http://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>

<script src="<?php echo base_url() ?>admintemplate/vendors/lightbox2/dist/js/lightbox.min.js"></script>
<script src="<?php echo base_url() ?>admintemplate/vendors/chart.js/Chart.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
 
   
      autoUpdateInput: false,
      locale: {
        format: 'MM/DD/YYYY',
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
  
        
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
<script>
    $(document).ready(function(){  
       
    $('.timepicker').timepicker({
      alert('hello')
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
})
});
    </script>
<script>


$(function() {
  $("#mytabs a:first").tab("show");

  $(".next").on("click", function() {
    const $active = $(".tab-pane.active");
    const $next = $active.next();
    $(".first").removeClass("current").addClass("done")
    $(".last").addClass("current")
    if ($next.length) {
      $active.removeClass("active show");
      $next.addClass("active show");
    }
  });

  $(".prev").on("click", function() {
    const $active = $(".tab-pane.active");
    const $prev = $active.prev();
    $(".first").addClass("current").removeClass("done")
    $(".last").removeClass("current")
    if ($prev.length) {
      $active.removeClass("active show");
      $prev.addClass("active show");
    }
  });
});

    </script>


    <script>
  $(document).ready(function () {
 
    $('#expence').DataTable({
        scrollX: true,
        "searching": true,
        'iDisplayLength': 100
    });
});
$(document).ready(function () {
 
 $('#expence00').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100
 });
});
$(document).ready(function () {
 
 $('#workinghours').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100,
     dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: 'Shop Details Report'
            }
          
        ]
 });
});

$(document).ready(function () {
 
 $('#humanreport').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100,
     dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: 'Bank Details Reports'
            }
           
        ]
 });
});

$(document).ready(function () {
 
 $('#findpandl').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100,
     dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: 'Find Proft and Loss'
            }
           
        ]
 });
});


$(document).ready(function () {
 
 $('#customers').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100,
     dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: 'CUSTOMERS INTEREST CALCULATION SHEET'
            }
           
        ]
 });
});

$(document).ready(function () {
 
 $('#paymentreport').DataTable({
     scrollX: true,
     "searching": true,
     'iDisplayLength': 100,
     dom: 'Bfrtip',
      buttons: [
            {
                extend: 'excelHtml5',
                title: 'CUSTOMERS PAYMENT REPORT'
            }
           
        ]
 });
});
  </script>
   <script>
  setTimeout(function() {
    document.querySelector('.alert').remove();
}, 5000);

</script>

     <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
	$( ".delete" ).click(function() {
  
	  if(confirm( "Are you really need to delete this data?" ))
	  {
	  return true;
	  }
	  else
	  {
	  return false;
	  }
	});
  $(document).on("click",".sendapproval",function() {
    if(confirm( "Are you sure to  send offer approval ?" ))
	  {
	  return true;
	  }
	  else
	  {
	  return false;
	  }

  });
  $(document).on("click",".approved",function() {
    if(confirm( "Are you sure to approved this offer ?" ))
	  {
	  return true;
	  }
	  else
	  {
	  return false;
	  }

  });
  $(document).on("click",".rejected",function() {
    if(confirm( "Are you sure to Reject this offer ?" ))
	  {
	  return true;
	  }
	  else
	  {
	  return false;
	  }

  });
  </script>
  
  <script>
        $(".avatar-container").click(function(){
            $(".user-menu-drop").toggleClass("showusermenu");
        })
    </script>


<script>
  $('.myaccount').click(function() { 
  $('.myaccount-list').slideToggle(200);
});
</script>

<script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor1');
  </script>
   <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor2');
  </script>



  </body>
</html>