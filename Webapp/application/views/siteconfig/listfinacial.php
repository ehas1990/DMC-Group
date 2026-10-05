
        <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Financial Settings</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Financial Settings</li>
              </ol>
            </nav>
          </div>
          <div class="col-sm-4">
<a href="<?php echo base_url('admin/FinancialSettings') ?>" class="btn btn-primary btn-fw"><i class="ti-plus"></i>Add New</a>
</div><br> 
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
        
            <div class="col-lg-12 grid-margin stretch-card">
         
              <div class="card">
                <div class="card-body">
              
               
                  <table id="example"  class="table table-striped table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th class="font-weight-bold"> # </th>
                        <th class="font-weight-bold">Currency</th>
                        <th class="font-weight-bold">Tax Type</th>
                        <th class="font-weight-bold" >Tax Value </th>
                        <th class="font-weight-bold" >Action </th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                         
                         $i=1;
                         foreach($fiancial as $fiancial) : 
                         
                         ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $fiancial->currency; ?> </td>
                        <td> <?php echo $fiancial->tax_type; ?> </td>
                        <td> <?php echo $fiancial->tax_value; ?> </td>
                       
                        <td> 
                        <?php
                        if($fiancial->status==1)
                        {
                          ?>
                          <a href='<?php echo base_url(); ?>admin/Notifications/enable/<?php echo $fiancial->id ; ?>?table=<?php echo base64_encode('financial_settings'); ?>'style="color:#1abc9c" title="enable" ><i class="icon-lock-open"></i></a>&nbsp;
                          <?php
                        }
                        else
                        {
                          ?>
                            <a href="<?php echo base_url(); ?>admin/Notifications/desable/<?php echo $fiancial->id ; ?>?table=<?php echo base64_encode('financial_settings'); ?>" style="color:#f1c40f" title="disable"><i class="icon-lock"></i></a>&nbsp;
                          <?php
                        }
                        ?>

                      <a style="color:#1bdbe0;" title="Edit" href='<?php echo base_url(); ?>admin/EditFinancial/<?php echo $fiancial->id ; ?>'"><i class="icon-note"></i></a>&nbsp;
                          <a style="color:red;" title="Delete" class="label label-inverse-danger delete" 
                        href="<?php echo base_url(); ?>admin/Notifications/delete_mail/<?php echo $fiancial->id ; ?>?table=<?php echo base64_encode('financial_settings'); ?>"><svg title="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a>
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
      