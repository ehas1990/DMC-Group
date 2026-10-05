<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">MailChimp API </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page"> MailChimp API</li>
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
        <?php echo form_open_multipart('admin/Dashboard/Updatemailchimpapi'); ?>
         
          <input class="form-control" value="<?php echo $mailapi['id']; ?>" name="id" type="hidden">
          
      
          <div class="col-sm-8">
            <div class="form-group">
              <label for="exampleInputUsername1">MailChimp API</label>
              <input type="text" name="api"  value="<?php echo $mailapi['api']; ?>" class="form-control"  placeholder="MailChimp API" required>
            </div>
          
                     
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-light">Reset</button>
          </form>
        </div>
      </div>
    </div>
  
  
  </div>
</div>
