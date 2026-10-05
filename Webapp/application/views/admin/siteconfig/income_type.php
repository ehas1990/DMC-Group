<div class="work-container">
<div class="path-header">
    <h3>List Income Type</h3>
    <div class="path-root">
        <a class="index-root" href="#">Settings </a>
        <span><i class="fa-solid fa-angle-right"></i></span>
        <a class="stading-root" href="#">List Income Type</a>
    </div>
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
<div class="add_ftm-grp flex-grp a_link">

     <a  style="color:rgb(38 131 254);" class="submit-btn" href="<?php echo base_url() ?>admin/Settings/AddIncomeType">Add</a>
         </div>
         <br>
<div class="work-box card-text curve-v v-box-shadow-box">

    <div class="list-user-table">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>Sl No</th> 
                    <th>Income Type</th>
                    <th>Action</th>
                </tr>
            </thead>
    
     
            <tbody>
            <?php 
     
     $i=1;
     foreach($userrole as $row) : 
   

     
     ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->income_type; ?> </td>
                    <td>    
                    <?php
    if($row->status==1)
    {
      ?>
      <a href='<?php echo base_url(); ?>admin/Dashboard/enable/<?php echo $row->id ; ?>?table=<?php echo base64_encode('income_type'); ?>'style="color:#1abc9c" title="enable" ><img src="https://img.icons8.com/fluency/20/null/lock-2.png"/></a>&nbsp;
      <?php
    }
    else
    {
      ?>
        <a href="<?php echo base_url(); ?>admin/Dashboard/desable/<?php echo $row->id ; ?>?table=<?php echo base64_encode('income_type'); ?>" style="color:#f1c40f" title="disable"><img src="https://img.icons8.com/fluency/20/null/unlock-2.png"/></a>&nbsp;
      <?php
    }
    ?>
                    <a  href="<?php echo base_url() ?>admin/Settings/EditIncomeType/<?php echo $row->id ?>"><label class="badge badge-success">Edit</label></a> <a style="color:red;" class="label label-inverse-danger delete" 
    href="<?php echo base_url(); ?>admin/Dashboard/delete/<?php echo $row->id ; ?>?table=<?php echo base64_encode('income_type'); ?>"><svg title="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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
