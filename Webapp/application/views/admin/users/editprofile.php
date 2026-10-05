
<div class="work-container">
                  <div class="path-header flex-p--v">
                        <div class="cover--path">
                        <h3>Update Profile</h3>
                    
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

                <div class="work-box card-text curve-v v-box-shadow-box">
                <?php echo form_open_multipart('admin/Auth/UpdateProfile'); ?>  
                <input class="form-control" value="<?php echo $get_profile['id']; ?>" name="id" type="hidden"> 
                        <div class="row">
                            <div class="col-lg-6 col-mb">
                            <label>First Name</label>
                                <div class="add_ftm-grp">
                                    <input type="text" name="name" value="<?php echo $get_profile['name']; ?>" class="input-box" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-mb">
                            <label>Last Name</label>
                                <div class="add_ftm-grp">
                                    <input type="text" name="last_name" value="<?php echo $get_profile['last_name']; ?>" class="input-box" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-mb">
                            <label>Profile Photo</label>
                                <div class="add_ftm-grp">
                                <input type="file" name="files" value="" class="form-control"  />
                                <br>
                        
                        <?php
            if(!empty(@$get_profile['profile_photo']))
            {
              ?>
            
            <div class="form-group">
            <label for="exampleInputEmail1">Profile Photo</label>
            <img src="<?php echo base_url(); ?>uploads/userprofile/<?php echo $get_profile['profile_photo']; ?>" width="60px">
            </div>
            <?php
            }
            ?>
                       
                          
                       
                    </div>
                                </div>
                         
                            <div class="col-lg-6 col-mb">
                            <label>Cover Photo</label>
                                <div class="add_ftm-grp">
                                <input type="file" name="cover_photo" value="" class="form-control"  />
                                <br>
                       
                        <?php
            if(!empty(@$get_profile['cover_photo']))
            {
              ?>
            
            <div class="form-group">
            <label for="exampleInputEmail1">Cover Photo</label>
            <img src="<?php echo base_url(); ?>uploads/userprofile/<?php echo $get_profile['cover_photo']; ?>" width="60px">
            </div>
            <?php
            }
            ?>
                            

                                </div>
                            </div>
                      
        </div>
        <div class="pt--v--button">
       
        <button type="submit" style="background: #3c8031; border-radius: 50px;" class="submit-btn">Update</button>
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

