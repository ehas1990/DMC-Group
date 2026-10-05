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
                    <h3>Add Services</h3>
                    <div class="path-root">
                        <a class="index-root" href="#">Settings </a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <a class="stading-root" href="#">Add Services</a>
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
<?php echo form_open_multipart('admin/Dashboard/SaveServices'); ?>     


                        <div class="row">
                           
                            <div class="col-lg-6 col-mb">
                                <div class="add_ftm-grp">
                                    <input type="text" name="service_type"  class="input-box" placeholder="Service Type" required>
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
