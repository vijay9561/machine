<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/meramachine.jpg" style="height: 43px;"></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="<?php echo site_url(); ?>" class="logo me-auto"><img src="<?php echo site_url(); ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="<?php echo site_url(); ?>" <?php if ($page == 'Home') { ?> class="active" <?php } ?>>Home</a></li>
        <!--<li><a href="<?php echo site_url(); ?>cell-machine" <?php if ($page == 'Sell Machine') { ?> class="active" <?php } ?>>Sell Machine</a></li>-->
        <li><a href="<?php echo site_url(); ?>sellBuyMachine" <?php if ($page == 'Buy Machine' || $page == 'Machine Details') { ?> class="active" <?php } ?>>Buy / Sell Machine</a></li>
        <li><a href="<?php echo site_url(); ?>drivers" <?php if ($page == 'Drivers' || $page == 'Add new Driver') { ?> class="active" <?php } ?>>Drivers</a></li>
        <li><a href="<?php echo site_url(); ?>owner" <?php if ($page == 'Owner' || $page == 'Add new Owner') { ?> class="active" <?php } ?>>Owners</a></li>
        <li><a href="<?php echo site_url(); ?>mechanics" <?php if ($page == 'Mechanics' || $page == 'Add New Mechanics') { ?> class="active" <?php } ?>>Mechanics </a></li>
        <li><a href="<?php echo site_url(); ?>sparePart" <?php if ($page == 'Add New Spare Part' || $page == 'Spare Part') { ?> class="active" <?php } ?>>Spare Part </a></li>

        <?php if ($this->session->userdata('user_id')) { ?>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#" onclick="return copyUrl('driver')">Driver Referal Copy Link</a></li>
              <li><a href="#" onclick="return copyUrl('owner')">Owner Referal Copy Link</a></li>
              <li><a href="#" onclick="return copyUrl('machine')">Machinary Referal Copy Link</a></li>
              <li><a href="#" onclick="return copyUrl('mechanics')">Mechanics Referal Copy Link</a></li>
              <li><a href="#" onclick="return copyUrl('spare')">Spare Parth Referal Copy Link</a></li>
              <li><a href="#" onclick="return copyUrl('supervisor')">Eng / Supervisor Referal Copy Link</a></li>
              <li><a href="<?php echo site_url(); ?>logout">Logout</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
        <?php } ?>
        <li><a href="<?php echo site_url(); ?>engineerOrSupervisor" <?php if ($page == 'Engineer Or Supervisor' || $page == 'Add New Engineer And Supervisor') { ?> class="active" <?php } ?>>Eng / Supervisor </a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
<a href="<?php echo site_url(); ?>learningPath" class="fixedbutton btn btn-success" titile="Learning Path"> <i class="bx bxs-book-reader bx-md"></i></a>

<script>
  function copyUrl(name) {
    textName = (name == 'machine') ? 'cell-machine' : (name == 'mechanics') ? 'addNewMechanics' : (name == 'spare') ? 'addNewSparePart' : (name == 'driver') ? 'addNewDrivers' : (name == 'owner') ? 'addNewOwner' : (name == 'supervisor') ? 'addNewEngineerAndSupervisor' : null;
    console.log(textName)
    var referral_code  = '<?php echo $this->session->userdata('referral_code'); ?>'
    var dummy = document.createElement('input'),
      text = BASE_URL + textName + '?referral_code=' + referral_code;
      console.log(text)
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
    alert('Copied successfully')
  }
</script>