<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Financial Settings </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Financial Settings</li>
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
        <?php echo form_open_multipart('admin/Dashboard/UpdateFinancialSettings'); ?>     
          <div class="row">
          <input type="hidden" name="id"  value="<?php echo $fiancial['id']?>" >
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Currency</label>
              <input type="text" name="currency"  class="form-control" value="<?php echo $fiancial['currency']?>"   placeholder="Currency" required>
            </div>
           </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Tax Type </label>
              <input type="text" name="tax_type"  value="<?php echo $fiancial['tax_type']?>" class="form-control"  placeholder="Tax Type" required>
              <!-- <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="tax_type" required>
              <option > Select One </option>   
              <option <?php if($fiancial['tax_type']=='GST'){?> selected="selected" <?php }?>  value="GST"> GST </option>
             <option <?php if($fiancial['tax_type']=='VAT'){?> selected="selected" <?php }?>  value="VAT"> VAT </option>
             </select> -->
            </div>
           </div>
         </div>
         
         <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputUsername1" >Tax Value</label>
              <input type="text" name="tax_value"  value="<?php echo $fiancial['tax_value']?>" class="form-control only-numeric"  placeholder="Tax Value" required>
              <br>
         <span class="error" style="color: red; display: none">*<Datag> Digits Only </Datag></span>   
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
