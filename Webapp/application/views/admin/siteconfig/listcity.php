<div class="work-container">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

      
    $(document).on('change', '#state_id', function() {
  // Does some stuff and logs the event to the console
  var state_id = $(this).val();
  $.ajax({
            type: "POST",
            url: '<?php echo base_url()?>admin/Dashboard/getCityList/'+state,
            data: $('#frm').serialize(),
            success: function(response)
            {
                $('#city').html(response);
                $('#city').selectpicker();
                
           }
       });
   
});
      
  </script> -->
  
   <div class="path-header flex-p--v">
                        <div class="cover--path">
                        <h3>List Pickup Points</h3>
                    
                    </div>
                   
</div>
<?php if($this->session->flashdata('success')): ?>
<?php echo '<div class="alert alert-success icons-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>
<p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('danger')): ?>
<?php echo '<div class="alert alert-danger icons-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>
<p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
<?php endif; ?>
<div class="add_ftm-grp flex-grp a_link">

<a  style="background: #4caf50; border-radius: 50px;" data-toggle="modal" data-target="#adduser" class="submit-btn-alink" >
     <i class="fa-solid fa-plus"></i>
     Create New </a>
         </div>
         <br>
<div class="work-box card-text curve-v v-box-shadow-box">

    <div class="list-user-table">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>Sl No</th> 
                    <th>Pickup Points</th>
                    <th>Action</th>
                </tr>
            </thead>
    
     
            <tbody>
            <?php 
     
     $i=1;
     foreach($userrole as $row) { 
   
     
     ?>
       
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->city_name; ?> </td>
                    <td>    
                    <?php
    if($row->status==1)
    {
      ?>
      
      <a href="<?php echo base_url(); ?>admin/Dashboard/enable/<?php echo $row->id ; ?>?table=<?php echo base64_encode('city'); ?>" style="color:#1abc9c" title="enable" ><img src="https://img.icons8.com/fluency/20/null/lock-2.png"/></a>&nbsp;
 
    <?php
    }
    else
    {
      ?>
        <a href="<?php echo base_url(); ?>admin/Dashboard/desable/<?php echo $row->id ; ?>?table=<?php echo base64_encode('city'); ?>" style="color:#f1c40f" title="disable"><img src="https://img.icons8.com/fluency/20/null/unlock-2.png"/></a>&nbsp;
      <?php
    }
    ?>
    
  <a  data-toggle="modal" data-id="<?php echo  $row->id;?>"  data-target="#editModal<?php echo $row->id ?>"  href="#"><label class="badge badge-success">Edit</label></a>   

  <a style="color:red;" href="<?php echo base_url(); ?>admin/Dashboard/delete/<?php echo $row->id ; ?>?table=<?php echo base64_encode('city'); ?>">Delete</a>

</td>


                </tr>
                                                    
<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered maxwidth--medium" role="document">
    <div class="modal-content modal-content-radius-twt">
      <div class="modal-header">
        <h5 class="modal-title addusertitle--v" id="addusertitle">Update Pickup Points </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="adduser--modal-container">
        <form  method="post" action="<?php echo base_url() ?>admin/Dashboard/UpdateCity"  onsubmit="return check()" >
        <input class="form-control" value="<?php echo $row->id;  ?>" name="id" type="hidden">
           
                            <div class="row">
                           
                          

                           
                           
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                    <input type="text" name="city_name"  value="<?php echo $row->city_name; ?>" class="input-box" placeholder="Pickup Points" required>
                                    </div>
                                </div>
                              
                            </div>
            
                        
        </div>
      </div>
      <div class="modal-footer">
        <div class="add_ftm-grp flex-group-btn modal-grp-frm--btn-container mtop-20">
        <button class="modal--x" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit"  class="modal-submit-btn">Update</button>
                            </div>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- //end model -->
                <?php 
       $i++;
                                       }
                                        ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
</div>

<div class="menu-container">
<div class="menuheader">
<div class="close-call">
<svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.22566 4.81096C5.83514 4.42044 5.20197 4.42044 4.81145 4.81096C4.42092 5.20148 4.42092 5.83465 4.81145 6.22517L10.5862 11.9999L4.81151 17.7746C4.42098 18.1651 4.42098 18.7983 4.81151 19.1888C5.20203 19.5793 5.8352 19.5793 6.22572 19.1888L12.0004 13.4141L17.7751 19.1888C18.1656 19.5793 18.7988 19.5793 19.1893 19.1888C19.5798 18.7983 19.5798 18.1651 19.1893 17.7746L13.4146 11.9999L19.1893 6.22517C19.5799 5.83465 19.5799 5.20148 19.1893 4.81096C18.7988 4.42044 18.1657 4.42044 17.7751 4.81096L12.0004 10.5857L6.22566 4.81096Z" fill="black"/>
</svg>
</div>
</div>

<div class="list-itemlinks">
<ul>
<li><a href="add_user.html">Add User</a></li>
<li><a href="list_user.html">List User</a></li>
</ul>
</div>
</div>

<!-- aDD Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered maxwidth--medium" role="document">
    <div class="modal-content modal-content-radius-twt">
      <div class="modal-header">
        <h5 class="modal-title addusertitle--v" id="addusertitle">Create New Pickup Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="adduser--modal-container">
        <form  method="post" action="<?php echo base_url() ?>admin/Dashboard/SaveCity"  onsubmit="return check()" >

           
                            <div class="row">
                         

                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                    <input type="text" name="city_name"  class="input-box" placeholder="Pickup Points" required>
                                    </div>
                                </div>
                                
                               
                            
                          
            
                        
        </div>
      </div>
      <div class="modal-footer">
        <div class="add_ftm-grp flex-group-btn modal-grp-frm--btn-container mtop-20">
        <button class="modal--x" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit"  class="modal-submit-btn">Save</button>
                            </div>
      </div>
    </div>
    </form>
  </div>
</div>
