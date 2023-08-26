 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <?php
           $current=$this->db->query("select *from Users where id='".$this->session->userdata('ADMIN_ID')."'")->row();
          ?>
         <?php if($this->session->userdata('USERTYPE')=='Admin'){ ?> 
          <a class="navbar-brand brand-logo" href="<?php echo site_url(); ?>dashboard" style="color: white;font-weight:bold;">MeraMachine </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo site_url(); ?>dashboard" style="color: white;font-weight:bold;">MeraMachine</a>
         <?php }else{ ?>
         
         <?php } ?>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
                <h3 style="color:#fff;font-weight:bold;">Admin Panel</h3>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?php echo base_url(); ?>support_assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $this->session->userdata('USERNAME'); ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url(); ?>Logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
          <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url(); ?>change_password">
                <i class="fa fa-pencil mr-2 text-primary"></i>
                Change Password
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="<?php echo site_url(); ?>Logout">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

 <div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo base_url(); ?>support_assets/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $this->session->userdata('USERNAME'); ?></span>
               <!-- <span class="text-secondary text-small">Project Manager</span>-->
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Dashboard'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>dashboard">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

          

          <!---->

          <li class="nav-item <?php if($title=='View Machinary'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>viewMachinary">
              <span class="menu-title">Machinary List</span>
              <i class="fa fa-truck menu-icon"></i>
            </a>
          </li>

          <li class="nav-item <?php if($title=='Driver'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>driver-list">
              <span class="menu-title">Driver List</span>
              <i class="fa fa-dribbble menu-icon"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Owener'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>owner-list">
              <span class="menu-title">Owner List</span>
              <i class="fa fa-users menu-icon"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Mechanics'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>mechanics-list">
              <span class="menu-title">Mechanics List</span>
              <i class="fa fa-arrows  menu-icon"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Users List'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>usersList">
              <span class="menu-title">Users List</span>
              <i class="fa fa-user  menu-icon"></i>
            </a>
          </li>

          <li class="nav-item <?php if($title=='Civil List'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>civilList">
              <span class="menu-title">Eng Or Supervisor</span>
              <i class="fa fa-building  menu-icon"></i>
            </a>
          </li>
          <li class="nav-item <?php if($title=='Spare List'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>spareList">
              <span class="menu-title">Spare Part</span>
              <i class="fa fa-wrench  menu-icon"></i>
            </a>
          </li>

          <li class="nav-item <?php if($title=='Learning Path'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>learningpath">
              <span class="menu-title">Learning Path</span>
              <i class="fa fa-graduation-cap  menu-icon"></i>
            </a>
          </li>

          <li class="nav-item <?php if($title=='Driver Types'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>driverTypes">
              <span class="menu-title">Driver Type</span>
              <i class="fa fa-dribbble  menu-icon"></i>
            </a>
          </li>

          <li class="nav-item <?php if($title=='Machine Type'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>machineType">
              <span class="menu-title">Machinary Type</span>
              <i class="fa fa-microchip  menu-icon"></i>
            </a>
          </li>
          
          <!--<li class="nav-item <?php if($title=='Type Institute'){ echo 'active'; } ?>">
              <a class="nav-link" href="<?php echo site_url(); ?>type_institute">
              <span class="menu-title">Type of Institute</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>-->

        
        <!--  <li class="nav-item <?php if($title=='Register' || $title=='Customer List'){ echo 'active'; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Customer</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="ui-users">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>Registration">Create Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url() ?>Customer-List">Customer List</a></li>
              </ul>
            </div>
          </li>-->
        
           
        
        </ul>
      </nav>
     
     
     
     