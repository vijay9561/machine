
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-users"></i>                 
              </span>
            Owner List
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['view'])){
              $datafetch=$this->db->query("select *from tbl_owner where id='".base64_decode($_GET['view'])."'")->row();
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> View Owner Details  <a onclick="history.back()" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <table class="table table-bordered">
                          <thead>
                          <tr><th>Farm name</th><td><?php echo $datafetch->owner_farm;?></td></tr>
                              <tr><th>Full name</th><td><?php echo $datafetch->owner_full_name;?></td></tr>
                              <tr><th>Mobile no</th><td><?php echo $datafetch->mobile_no; ?></td></tr>
                              <tr><th>Machine name</th><td><?php echo $datafetch->machine_name; ?></td></tr>
                              <tr><th>Age</th><td><?php echo $datafetch->age; ?></td></tr>
                              <tr><th>Address</th><td><?php echo $datafetch->address; ?></td></tr>
                              <tr><th>State</th><td><?php echo $datafetch->state; ?></td></tr>
                              <tr><th>District</th><td><?php echo $datafetch->district; ?></td></tr>
                              <tr><th>More details</th><td><?php echo $datafetch->more_details; ?></td></tr>
                             <tr><th>Event Fees</th><td><?php echo $datafetch->create_date; ?></td></tr>
                             <tr><th>Profine Image</th><td> <?php if(!empty($datafetch->profile_image)) { ?>   <img src="<?php base_url(); ?>assets/owner/<?php echo $datafetch->profile_image;?>" loading="lazy" style="width:40%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr>
                          </thead>
              </table>          
              
              </div>     
            </div>
           <?php }else{ ?> 
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Owner List
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="owner_table">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Full name</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th style="width:22%;">Action</th>
                              </tr>
                          </thead>    
                      </table>   
                  </div>
              </div>
            </div>
            <?php } ?>
           </div>
          </div>   
        </div>
         
     