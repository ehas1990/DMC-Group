<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Financial Settings </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Financial Settings</li>
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
        <?php echo form_open_multipart('admin/Dashboard/SaveFinancialSettings'); ?>     
          <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Currency</label>
              <input type="text" name="currency"  class="form-control"  placeholder="Currency" required>
            </div>
           </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Tax Type </label>
              <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="tax_type" required>
              <option > Select One </option>   
              <option value="GST"> GST </option>
             <option value="VAT"> VAT </option>
                      </select>
            </div>
           </div>
         </div>
         <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputUsername1" >Tax Value</label>
              <input type="text" name="tax_value"  class="form-control only-numeric"  placeholder="Tax Value" required>
              <br>
      <span class="error" style="color: red; display: none">*<Datag> Digits Only </Datag></span>   
            </div>
           </div>
              </div>
      
              <div class="row">
                  <div class="col-sm-6">
                       <div class="checkbox-fade fade-in-primary checkbox">
                                                               <!-- <input type="checkbox" id="myCheck"> -->
                                                              
                         <label id="enable">Active</label>
                            <label id="disable">Inactive</label>
                            <input value="1"  type="checkbox" id="checkedvalue" name="status" class="cr cr-icon  checkoption" checked="">
                           <!-- <span class="cr"><i class="cr-icon icofont icofont-verification-check txt-primary"></i></span> -->
                                                            
                                                        </div>
                                                        </div>
                                                    </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  
  
  </div>
</div>
