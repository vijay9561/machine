<!DOCTYPE html>
<html lang="en">
	 <?php $this->load->view('users/layout/head'); ?>
	 <body class="host_version"> 
   <!-- Loader -->
	<?php  $this->load->view('users/layout/header'); ?>
	 <?php $this->load->view('users/layout/main_view',$data);?>
	  <?php $this->load->view('users/layout/footer');?>   
</body>
</html>
    