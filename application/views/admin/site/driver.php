
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-dribbble"></i>                 
              </span>
          Driver
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['view'])){
              $datafetch=$this->db->query("select *from tbl_drivers where id='".base64_decode($_GET['view'])."'")->row();
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> View Event Details  <a onclick="history.back()" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <table class="table table-bordered">
                          <thead>
                              <tr><th>Full name</th><td><?php echo $datafetch->full_name; ?></td></tr>
                              <tr><th>Mobile no</th><td><?php echo $datafetch->mobile_no; ?></td></tr>
                              <tr><th>Operator type</th><td><?php echo $datafetch->operator_type; ?></td></tr>
                              <tr><th>Dirstrict</th><td><?php echo $datafetch->district; ?></td></tr>
                              <tr><th>State</th><td><?php echo $datafetch->state; ?></td></tr>
                              <tr><th>Your experience</th><td><?php echo $datafetch->your_experience; ?></td></tr>
                              <tr><th>State</th><td><?php echo $datafetch->state; ?></td></tr>
                              <tr><th>Do you have a license with you? </th><td><?php echo $datafetch->license; ?></td></tr>
                              <tr><th>About you</th><td><?php echo $datafetch->about_you; ?></td></tr>
                             <tr><th>Created Date</th><td><?php echo $datafetch->created_date; ?></td></tr>
                             <tr><th>Profine Image</th><td> <?php if(!empty($datafetch->profile_image)) { ?>   <img src="<?php base_url(); ?>assets/driver/<?php echo $datafetch->profile_image;?>" loading="lazy" style="width:50%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr>
                          </thead>
              </table>          
              
              </div>     
            </div>
           <?php }else{ ?> 
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i>Driver List
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="driver_table">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Full name</th>
                        <th>Mobile No</th>
                        <th>Driver Type</th>
                        <th>Created Date</th>
                        <th>Status</th>
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
         
     