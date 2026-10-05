   <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Change Password </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"> Restaurant</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Change Password</li>
                </ol>
              </nav>
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
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>restaurant/changePassword" name="f1" onsubmit="return check()" >
                 
                   
                    
                    	 <div class="row">
                    	 	<div class="col-sm-3"></div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" name="old_pass" value="" class="form-control"  placeholder="Old Password" >
                         
                      </div>
                     </div>
                     <div class="col-sm-3"></div>
                 </div>
                
                   <div class="row">
                   	<div class="col-sm-3"></div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" name="new_pass" value="" class="form-control"  placeholder="New Password" onblur="check()" id="txtPassword">
                         <span class="change-pass-icon"><i class="icon-eye-close toggle-password" toggle="#password-field"></i></span>
                    <output name="result2" id="result2" style="color:red;text-align: left;
    font-size: 14px; width:90%;"></output>
                      </div>
                     </div>
                     <div class="col-sm-3"></div>
                 </div>
                 <div class="row">
                 	<div class="col-sm-3"></div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1"> Confirm Password</label>
                        <input type="password" name="cpass" value="" class="form-control"  placeholder="Confirm Password" onblur="check()" id="txtConfirmPassword">
                        <span class="change-pass-icon"><i class="icon-eye-close toggle-cnfrmpassword" toggle="#password-field"></i></span>
                    <output name="result" id="result" style="color:red;text-align: left;
    font-size: 14px; width:90%;"></output>
                      </div>
                     </div>
			<div class="col-sm-3"></div>
                   </div>

                  <div class="row">
                 	<div class="col-sm-3"></div>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button type="reset" class="btn btn-light">Reset</button>
                  </div>
              </div>
                    </form>
                  </div>
                </div>
              </div>
            
            
            </div>
          </div>
        

     