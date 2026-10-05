<div class="work-container">
    <div class="flex-path">
<div class="path-header">
    <h3>List Contact details</h3>
    <div class="path-root">
        <a class="index-root" href="#">Careers </a>
        <span><i class="fa-solid fa-angle-right"></i></span>
        <a class="stading-root" href="#">List Contact details</a>
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
<div class="add_ftm-grp flex-grp add_link">

     <!-- <a  style="color:rgb(38 131 254);" class="submit-btn-alink" data-toggle="modal" data-target="#addclient" href="<?php echo base_url() ?>admin/Users/AddClient"><i class="fa-solid fa-plus"></i> Add Client</a> -->
         </div>
</div>
         <br>
<div class="work-box card-text curve-v v-box-shadow-box">

    <div class="list-user-table">
        <table id="expence" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>Sl No</th> 
                   <th>Contact Name</th>
                   <th>Email</th>
                   <th>Phone Number</th>
                   <th>Age</th>
                   <th>Gender</th>
                   <th>Message</th>

                    <th>View Resume</th>

                  
                    <th>Action</th>
                </tr>
            </thead>
    
     
            <tbody>
            <?php 
     
     $i=1;
     foreach($listallclients as $row) : 
   

     
     ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td style="overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 227px;"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?>  </td>
                   
                  <td><?php echo $row->email; ?> </td>
                  <td><?php echo $row->phoneno; ?> </td>
                  <td><?php echo $row->age; ?> </td>

                  <td><?php echo $row->gender; ?> </td>
                  <td>
                    
                  
                  
                  <?php
                                        if($row->status=='1')
                                        {
                                        ?>
  <b> <a href="#" class="form_click" style="color:#0275d8;" data-id="<?php echo $row->id;?>" data-toggle="modal" data-target="#exampleModal<?php echo $row->id; ?>"><label class="badge badge-danger">Read Mesage</label></a><b>

                          <?php
                                        }  

                               else if($row->status=='2')
                                        {
                                            ?>
        <b><a href="#" style="color:#0275d8;" data-id="<?php echo $row->id;?>" data-toggle="modal" data-target="#exampleModal<?php echo $row->id; ?>"><label class="badge badge-success">View Message</label></a></b>


                                            <?php
                                        }
   
                                        ?>   
                  

                  <div class="modal fade" id="exampleModal<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
   
<div class="modal-header">
<h5 class="modal-title" style ="color:green;" id="exampleModalLabel">Message</h5>
<br>


<button type="button" class="close closerefresh" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<h6><?php echo $row->message; ?></h6>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondarymodal closerefresh" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


                 

</td>
<?php
if(!empty($row->resume))
{
?>
                    <td><a href="https://www.dmclog.com/uploads/<?php echo $row->resume; ?> ">View Resume</a></td>
                    <?php
}
else
{
    ?>
    <td>No resume</td>
    <?php
}
?>
                   
                    <td>    
                   
     
                
                    <a style="color:red;" class="label label-inverse-danger delete" 
    href="<?php echo base_url(); ?>admin/Dashboard/delete/<?php echo $row->id ; ?>?table=<?php echo base64_encode('customers'); ?>"><svg title="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>


</td>
                </tr>
                <?php 
       $i++;
  endforeach; ?>
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




<!-- Modal -->
<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered maxwidth--medium" role="document">
    <div class="modal-content modal-content-radius-twt">
      <div class="modal-header">
        <h5 class="modal-title addusertitle--v" id="addusertitle">Add Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="adduser--modal-container">
        <?php echo form_open_multipart('admin/Clients/SaveClients'); ?>   
                            <div class="row">
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="client_name" class="input-box" placeholder="Client Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="address" class="input-box" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <select class="input-box" name="city"  required  >
                                        <option>Select Emirates </option>
                                        <?php
                                            foreach($city as $city)
                                            {
                                            ?>
                                            <option value="<?php echo $city->id?>"><?php echo $city->city_name?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="number" minlength="10" maxlength="12" name="phone" class="input-box" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="email" name="email" class="input-box" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="website"  class="input-box" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="number" minlength="15" maxlength="15" name="vat_reg" class="input-box" placeholder="VAT Registration" required>
                                    </div>  
                                </div>
                            </div>
        

                            <div class="contact-person">
                            <div class="sub-header"><h3>Contact Person</h3></div>
                            <div class="row">
                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="contact_name[]" class="input-box" placeholder="Name">
                                    </div>  
                                </div>

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="number" name="contact_phone[]" class="input-box" placeholder="Phone Number">
                                    </div>  
                                </div>

                                <div class="col-lg-4 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="contact_email[]" class="input-box" placeholder="Email">
                                    </div>  
                                </div>

                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="contact_desigination[]" class="input-box" placeholder="Designation">
                                    </div>  
                                </div>
                                <div class="col-lg-2 col-mb">
                                <div class="col-lg-12 col-mb flex-center pd--0">
                            <button id="buttonAdd" class="btn btn-primary waves-effect waves-light add_button" type="button" /> +</button>

                            <br>
                                </div>
                            </div>

                            
                        </div>
                        <div id="TextBoxContainer">
                                              
                                               
                                           
                        </div>


                        </form>
        </div>
      </div>
                                        </div>
      <div class="modal-footer">
        <div class="add_ftm-grp flex-group-btn modal-grp-frm--btn-container mtop-20">
        <button class="modal--x" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="modal-submit-btn" >Add Client</button>
        <a class="l-child-bg" href="#">Add Project</a>
                            </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        
  $(document).on("click", ".form_click", function(event) {
    event.preventDefault();
        
            var query_id= $(this).data('id');  
           
               
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/Careers/UpdateStatus/"+query_id,
                    type:"POST",
                    data:{query_id:query_id},
                    success:function()
                    {
                        datatable.clear().draw();
                        datatable.rows.add(NewlyCreatedData); // Add new data
   datatable.columns.adjust().draw(); // Redraw the DataTable
                      //alert('sss');
                    }
                });
            });

            $(document).on("click", ".closerefresh", function(event) {
                location.reload(true)

        });
        });
     

</script>
