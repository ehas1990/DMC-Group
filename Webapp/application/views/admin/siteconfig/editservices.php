<style type="text/css">
    .add_button{
        width: 100%;
    height: 45px;
    border: none;
    border-radius: 4px;
    padding: 13px;
    background-color: #2684ff;
    cursor: pointer;

    }
    .remove{
      width:50px;
      background-color: #cccccc;
      font-weight: 700;
      font-size: 18px;
      color: black;

    }
    </style>
                <div class="work-container">
                <div class="path-header">
                    <h3>Update Services</h3>
                    <div class="path-root">
                        <a class="index-root" href="#">Settings </a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <a class="stading-root" href="#">Update Services</a>
                    </div>
                </div>
                <div class="work-box card-text curve-v v-box-shadow-box">
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
<?php echo form_open_multipart('admin/Dashboard/UpdateServices'); ?>     

<input class="form-control" value="<?php echo $roletype['id']; ?>" name="id" type="hidden">
                        <div class="row">
                           
                            <div class="col-lg-6 col-mb">
                                <div class="add_ftm-grp">
                                    <input type="text" name="service_type"  value="<?php echo $roletype['service_type']  ?>" class="input-box" placeholder="Service Type" required>
                                </div>
                              
                            </div>
</div>
                            <div class="row">
                            <div class="col-lg-6 col-mb">
                                <div class="add_ftm-grp">
                                    <input type="text" name="name[]"  class="input-box" placeholder="Service - Category" >
                                </div>
                              
                            </div>
                              
                         
                            <div class="col-lg-2 col-mb flex-center">
                            <button id="buttonAdd" class="btn btn-primary waves-effect waves-light add_button" type="button" /> +</button>

<br><br><br>
                                    <!-- <div class="cntperson--apend">
                                    <a href="javascript:void(0);" class="btn add_button" title="Add Services Category"><span style="color:white; width:50px;">+</span></a>
                                    </div> -->
                                </div>
                        
                        </div>
                     
                    <div id="TextBoxContainer">
                                              
                                               
                                           
</div>
    

                    </div>
                  
                        <div class="add_ftm-grp flex-grp a_link">
                        <button type="submit"  class="submit-btn" >Submit</button>
                          
                         </div>
                    </form>
                </div>


                <div class="work-box card-text curve-v v-box-shadow-box">

<div class="list-user-table">
    <h6>List of All Service-Category</h6><br><br>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th>Sl No</th> 
                <th>Service Category</th>
                <th>Action</th>
            </tr>
        </thead>

 
        <tbody>
        <?php 
 
 $i=1;
 foreach($servicescategory as $row) : 


 
 ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->name; ?> </td>
                <td>    
                <?php
if($row->status==1)
{
  ?>
  <a href='<?php echo base_url(); ?>admin/Dashboard/enable/<?php echo $row->id  ; ?>?table=<?php echo base64_encode('services_type_cat'); ?>'style="color:#1abc9c" title="enable" ><img src="https://img.icons8.com/fluency/20/null/lock-2.png"/></a>&nbsp;
  <?php
}
else
{
  ?>
    <a href="<?php echo base_url(); ?>admin/Dashboard/desable/<?php echo $row->id  ; ?>?table=<?php echo base64_encode('services_type_cat'); ?>" style="color:#f1c40f" title="disable"><img src="https://img.icons8.com/fluency/20/null/unlock-2.png"/></a>&nbsp;
  <?php
}
?>
<a data-toggle="modal" class="editingTRbutton" data-target="#editModal<?php echo $row->id ; ?>" alt="view" title="View" class="options edit"><label class="badge badge-success">Edit</label> </a>
<a style="color:red;" href="<?php echo base_url(); ?>admin/Dashboard/delete/<?php echo $row->id?>?table=<?php echo base64_encode('services_type_cat'); ?>"><svg title="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</td>
            </tr>


            <!-- //start mb_encoding_aliases -->

<div class="modal fade" id="editModal<?php echo $row->id ; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <form  method="post" action="<?php echo base_url() ?>admin/Dashboard/UpdateMenuCategory"  onsubmit="return check()" >
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <input type="hidden" name="service_type_id" value="<?php echo $row->service_type_id; ?>">
                        <div class="form-group">
                            <label for="editName">Service-Category</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row->name ; ?>" placeholder="Service-Category" required>
                        </div>
                        <div class="modal-footer">
                            <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- endmodal -->


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





<script src="http://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">  
$(function () {  
    $("#buttonAdd").bind("click", function () {  
        var div = $("<div class='row' id='removeddd'>");  
        div.html(GenerateTextbox(""));  
        $("#TextBoxContainer").append(div);  
    });  
   
    $("body").on("click", ".remove", function () {  
        
        $("#removeddd").remove();
    });  
});  
function GenerateTextbox(value) {   
   
    return '<div class="col-lg-6 col-mb"><div class="add_ftm-grp"><input type="text" name="name[]"  class="input-box" placeholder="Service - Category" ></div></div><div class="col-sm-2 flex-center"><button type="button"  class="btn btn-danger remove">-</button></div><br>'
                                                        
}  
</script> 
