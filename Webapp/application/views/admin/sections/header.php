<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php
            $adminlogo=$this->auth_model->selectbackendsettings();
            $user_role=$this->session->userdata('role');
       
            $user_id=$this->session->userdata('admin_id');
            $userProfile=$this->Users_model->get_profile($user_id);
            ?>
          
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>admintemplate/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>admintemplate/css/style-icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>admintemplate/css/sass/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>admintemplate/css/genarate-offer-modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>admintemplate/css/quot-offer-style.css">


  
     
    <!-- end datatable -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>admintemplate/css/daterangepicker.css" />
   <!-- lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylehseet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/aa09da2cac.js" crossorigin="anonymous"></script>
    <title><?php echo $adminlogo['admin_pagetitle']?></title>
  </head>
  <style>
    .avarar-box{
    position: relative;
}

.user-menu-drop{
    position: absolute;
    right: 62%;
    top: 0;
    min-width: 10rem;
    display: none;
}

.avatar-container{
    display: flex;
    align-items: center;
    cursor: pointer;
}

.drp-icon-arrow{
    display: block;
    width: 12px;
    line-height: 0px;
    margin-left: 6px;
}

.drp-icon-arrow svg{
    width:100%;
    height:auto;
}

.showusermenu{
    display: block !important;
}

.dv-item-q{
    color: #000;
    font-family: 'Lato' !important;
}
.dv-title-summary-pay{
  color: #000;
}

.dv-title-summary-pay{
  color: #000;
}

.dv-time-n-date p{
  margin-bottom:0px;
}

.flex-div--ox a img {
    width: 79px;
    border-radius: 3px !important;
    background: #f6f6f6;
    padding: 1px;
}

    </style>
  <body>

    <div class="main v-application__wrap">
        <nav class="bx-shadow-----ap v-navigation-drawer v-navigation-drawer--left">
            <div class="v-navigation-drawer__content">
            <div class="settings-header">
           <!-- profile bg -->
            <div class="bg-profile">
            <?php
                                if($userProfile['cover_photo']!=NULL)
                                {
                                ?>
      <img src="<?php echo base_url(); ?>uploads/userprofile/<?php echo $userProfile['cover_photo']; ?>">
            
              <?php
                                }
                                else
                                {
                                  ?>
                                    <img src="https://54.166.94.49/debit/uploads/userprofile/Admin-Profile-PNG-Clipart5.png">
                                  <?php
                                }
                                ?>
   

            
            
            </div>
           
            <!-- profile body -->
            <div class="card-body text-center flex-div--ox" style="position:relative; z-index:4;">
             <a href="#">
             <?php
                                if($userProfile['profile_photo']!=NULL)
                                {
                                ?>
              <img src="<?php echo base_url(); ?>uploads/userprofile/<?php echo $userProfile['profile_photo']; ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt=""></a>
           <?php
                                }
                                else
                                {
                                  ?>
 <img src="https://54.166.94.49/debit/uploads/userprofile/Admin-Profile-PNG-Clipart4.png" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt=""></a>

                                  <?php
                                }
                                ?>
             <div class="adm-name-d">
                <h6 class="mb-0 text-white text-shadow-dark"><?php echo $userProfile['name'] ?>  <?php echo $userProfile['last_name'] ?></h6>
              <!--<span class="font-size-sm text-white text-shadow-dark"> Last Logged in: <?php echo $this->session->userdata('last_login') ?></span>-->
            </div>
            </div>

            <div class="sidebar-user-material-footer">
            <!-- <a href="#user-nav" class="myaccount d-flex justify-content-between align-items-center text-shadow-dark legitRipple collapsed"><span>My account</span></a> -->
            </div>
          </div>
          <!-- <div class="myaccount-list">
          <div class="acc__title_not">
             <a href="<?php echo base_url(); ?>admin/Auth/EditProfile/<?php echo $this->session->userdata('admin_id')?>">
             <span><i class="fa fa-pencil-square-o"></i></span>Edit Profile</a></div>
             <div class="acc__title_not">
             <a href="<?php echo base_url(); ?>/admin/Dashboard/Logout">
             <span><i class="fa-solid fa-power-off"></i></span>Logout</a></div>
          </div> -->

            <div class="settings-panel">
              <div class="panel-sectin-name">Main Menus</div>
            <div class="acc__title_not">
             <a href="<?php echo base_url() ?>admin/Dashboard">
             <span><i class="fa-solid fa-desktop"></i></span>Dash Board</a></div>
                <div class="scrollnavbar">
                    <div class="pa-40">

                        <div class="acc">

                        <!-- <div class="acc__card">

                             
                            </div> -->
                            <?php
               $activee= $this->uri->segment(2);
            
               ?>

<div class="acc__card">
                              <div class="acc__title"><a href="#" class="list-item">
                              <i class="icon-users"></i>
                              <span> Careers</span></a></div>
                                <div class="acc__panel">
                                    <ul>
        <li><a href="<?php echo base_url() ?>admin/Careers/index"><i class="icon-user-check"></i>List Contacts</a></li>
                                      </ul>
                                  </div>
                            </div>
                         
                            <div class="acc__card">
                              <div class="acc__title"><a href="#" class="list-item">
                              <i class="icon-user"></i>
                              <span> My Account</span></a></div>
                                <div class="acc__panel">
                                    <ul>
        <li><a href="<?php echo base_url(); ?>admin/Auth/EditProfile/<?php echo $this->session->userdata('admin_id')?>"><i class="icon-user-check"></i>Edit Profile</a></li>
                                      </ul>
                                  </div>
                            </div>
                         
                    
                                  
                 <?php
                   if($user_role=='1')
               {
                   ?>
                         
                       
           
           <?php
           
               }
               ?>
            </div>
            </div>
        </div>
        </nav>
        <div class="work_area">
            <div class="work-header">

                <div class="logo-container--v"></div>

                <div class="header--80">
                <div class="left-panel v--widht30">
                    <button><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu vue-feather__content"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
                    <!-- <button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search vue-feather__content"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button> -->
                    <div class="user-admin-badge"><span> Welcome, <?php echo $userProfile['name'] ?> <?php echo $userProfile['last_name'] ?> !</span></div>
                </div>

                <div class="right-panel v--widht30">
                    <!--<button class="left-20"><svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square vue-feather__content"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></button>-->
                
                    <div class="wrp-btn---rt left-20">
                  <!--  <button class="parent-relative">-->
                  <!--  <span class="nft-count">-->
                  <!--</span>  -->
                  <!--  <a href="#" data-toggle="modal" data-target="#notification_panel3" class="noficatoin-i"><svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell vue-feather__content"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>-->
                  <!--  </button>-->
                  <!--  <p>Request For Approval</p>-->
                  </div>

                    <div class="avarar-box left-20">
                        <div class="avatar-container">
                        <div class="avatar"><img src="https://www.dmclog.com/Webapp/uploads/userprofile/dmc_logo_group1.jpg"> </div>
                        <div class="drp-icon-arrow"><svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="https://www.w3.org/2000/svg"><path d="M512 768l448-512H64z" fill="#fff" /></svg></div>
                    </div>
                        <div class="user-menu-drop">
                                <ul>
                                <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown show">
                                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="true">
    
                                <div class="dropdown-menu navbar-dropdown show" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                <img style="width:100px;"  src="https://www.dmclog.com/Webapp/uploads/userprofile/dmc_logo_group1.jpg">               
                                <p class="font-weight-light text-muted mb-0"><?php echo $this->session->userdata('admin_email') ?> </p>
                                </div>
    
                                <a href="<?php echo base_url(); ?>admin/Dashboard/ChangePassword" class="dropdown-item"><i class="dropdown-item-icon icon-lock text-primary"></i>Change Password</a>
    
                                <a href="<?php echo base_url(); ?>admin/Dashboard/Logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                                </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>


</div>
            </div>