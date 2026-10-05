
                <div class="work-container">
                    <div class="path-header">
                        <h3>Change Password</h3>
                        <div class="path-root">
                            <a class="index-root" href="#">Dashboard </a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <a class="stading-root" href="#">Change Password</a>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>admin/Dashboard/changePassword" name="f1" onsubmit="return check()" >
                            <div class="row">
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="password"   name="old_pass" value=""  class="input-box" placeholder="Old Password" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="password" name="new_pass" value="" class="input-box" placeholder="New Password" required>
                                        <span class="change-pass-icon"><i class="icon-eye-close toggle-password" toggle="#password-field"></i></span>
          <output name="result2" id="result2" style="color:red;text-align: left;
font-size: 14px; width:90%;"></output>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-mb">
                                    <div class="add_ftm-grp">
                                        <input type="password"   name="cpass" value=""  class="input-box" placeholder="Confirm Password" onblur="check()" id="txtConfirmPassword" required>
                                        <span class="change-pass-icon"><i class="icon-eye-close toggle-cnfrmpassword" toggle="#password-field"></i></span>
          <output name="result" id="result" style="color:red;text-align: left;
font-size: 14px; width:90%;"></output>
                                   
                                      </div>
                                </div>
                            
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

//displaying data on page start here
$(document).ready(function () {

});


</script> 
    <script>
        
        $(document).on('click', '.toggle-password', function() {
      $(this).toggleClass("icon-eye-open ");
      var input = $("#txtPassword");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });

        $(document).on('click', '.toggle-cnfrmpassword', function() {
      $(this).toggleClass("icon-eye-open ");
      var input = $("#txtConfirmPassword");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });

      
    
     </script>

  <script>
    function check()
    {
      
    var pswd = $('#txtPassword').val();

    var pswd2 = $('#txtConfirmPassword').val();
    var status = false;
    var decimal =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  
 

    if(!pswd.match(decimal)) 
    { 
    $("#result2").html('Password must contain 8-20 characters with at least one upper case letter, one lower case letter, one special character and one number');
    return false;
    }
    else
    {
    $("#result2").html('');
    }
    if(pswd!=pswd2)
    {
    $('#result').html('Password Not Matching');
    return false;
    }
    else
    {
    $("#result").html('');
    return true;
    }
    }
    </script>
