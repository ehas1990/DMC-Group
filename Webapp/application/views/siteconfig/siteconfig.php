      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Backend Settings </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"> Settings</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Backend Settings</li>
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
                  <?php echo form_open_multipart('Dashboard/UpdateSiteconfiguration'); ?>
                   
                    <input class="form-control" value="<?php echo $siteconfiguration['id']; ?>" name="id" type="hidden">
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Logo</label>
                        <input type="file" name="site_logo" class="form-control"  placeholder="Logo">
                      </div>
                      <?php
                      if(!empty($siteconfiguration['site_logo']))
                      {
                        ?>
                      
                      <div class="form-group">
                      <label for="exampleInputEmail1">Current Logo</label>
                      <img src="<?php echo base_url(); ?>assets/backendimages/<?php echo $siteconfiguration['site_logo']; ?>" width="60px">
                      </div>
                      <?php
                      }
                      ?>
                     </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Admin Email</label>
                        <input type="email" name="site_email" value="<?php echo $siteconfiguration['site_email']; ?>" class="form-control"  placeholder="Admin Email">
                      </div>
                     </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Backend/Admin Page Title</label>
                        <input type="text" name="admin_pagetitle"  value="<?php echo $siteconfiguration['admin_pagetitle']; ?>" class="form-control"  placeholder="Backend/Admin Page Title">
                      </div>
                     </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Restaurant Name</label>
                        <input type="text" class="form-control" name="restaurant_name"  value="<?php echo $siteconfiguration['restaurant_name']; ?>" id="exampleInputUsername1" placeholder="Restaurant Name">
                      </div>
                     </div>
                  </div>
                
                     
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                  </div>
                </div>
              </div>
            
            
            </div>
          </div>
        