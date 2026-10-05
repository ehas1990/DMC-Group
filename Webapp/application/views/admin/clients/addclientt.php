<style>
    .submit-btn1
    {
        
        display: flex;
    align-items: center;
    justify-content: center;
    width: 117px;
    height: 40px;
    border: none;
    color: #fff !important;
    font-weight: 500;
    border-radius: 50px;
    margin-top: 20px;
    margin-left: 14px;
    cursor: pointer;
    padding: 0px 20px;
    background: #9c4740;
            /*margin-left: auto;*/

    }
       .submit-btn2
    {
        
        display: flex;
    align-items: center;
    justify-content: center;
    width: 117px;
    height: 40px;
    border: none;
    color: #fff !important;
    font-weight: 500;
    border-radius: 50px;
    margin-top: 20px;
    margin-left: 14px;
    cursor: pointer;
    padding: 0px 20px;
    background: #252925;
            /*margin-left: auto;*/

    }
</style>
                <div class="work-container">
                    <div class="path-header">
                        <h3>Add Customers</h3>
                        <div class="path-root">
                            <a class="index-root" href="<?php echo base_url() ?>admin/Users/LisClient">Customers </a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <a class="stading-root" href="#">Add Customers</a>
                        </div>
                    </div>
                    <div class="work-box card-text curve-v v-box-shadow-box">
                    <?php echo form_open_multipart('admin/Clients/SaveClients'); ?>   
                            <div class="row">
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="first_name" class="input-box" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <!--<div class="col-lg-6 col-mb">-->
                                <!--    <div class="add_ftm-grp">-->
                                <!--        <input type="text" name="last_name" class="input-box" placeholder="Last Name" required>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text"  name="phoneno" class="input-box" placeholder="Phone Number" required >
                                    </div>
                                </div>

                                <!--<div class="col-lg-6 col-mb">-->
                                <!--    <div class="add_ftm-grp">-->
                                <!--        <input type="email" name="email" class="input-box" placeholder="Email" required>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="col-lg-8 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="text" name="address" class="input-box" placeholder="Address" >
                                    </div>
                                </div>
                            
                            </div>
        

                          

                            <div class="add_ftm-grp flex-grp a_link">
                            <button type="submit"  class="submit-btn" >Save</button>
                              <button class="submit-btn1" id="cancelbutton" >Cancel</button>
                              <a class="submit-btn2" href="<?php echo base_url() ?>admin/Clients/index">Back </a>
                                 
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
   
    return '<div class="row"><div class="col-lg-4 col-mb"> <div class="add_ftm-grp"><input type="text" name="contact_name[]" class="input-box" placeholder="Name"></div>  </div><div class="col-lg-4 col-mb"><div class="add_ftm-grp"><input type="text" name="contact_phone[]" class="input-box" placeholder="Phone Number"></div>  </div><div class="col-lg-4 col-mb"><div class="add_ftm-grp"><input type="text" name="contact_email[]" class="input-box" placeholder="Email"></div>  </div><div class="col-lg-6 col-mb"><div class="add_ftm-grp"><input type="text" name="contact_desigination[]" class="input-box" placeholder="Designation"></div>  </div><div class="col-lg-2 col-mb"><div class="col-lg-2 col-mb flex-center"><button class="btn btn-danger remove" type="button" />-</button><br><br><br></div></div></div>'
                                                        
}  
</script> 
<script>
    $('#cancelbutton').click(function(){
   $('input[type="text"]').val('');
});
</script>