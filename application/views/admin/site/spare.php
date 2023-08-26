
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-wrench"></i>                 
              </span>
              Spare Part
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['view'])){
              $datafetch=$this->db->query("select *from tbl_spare where id='".base64_decode($_GET['view'])."'")->row();
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> View Spare Part Details  <a onclick="history.back()" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <table class="table table-bordered">
                          <thead>
                              <tr><th>Full name</th><td><?php echo $datafetch->full_name; ?></td></tr>
                              <tr><th>Mobile no</th><td><?php echo $datafetch->mobile_no; ?></td></tr>
                              <tr><th>Shope mobile no</th><td><?php echo $datafetch->shop_mobile_no; ?></td></tr>
                              <tr><th>Shop name Or Dealer name</th><td><?php echo $datafetch->dealer_name; ?></td></tr>
                              <tr><th>Address</th><td><?php echo $datafetch->shop_address; ?></td></tr>
                              <tr><th>State</th><td><?php echo $datafetch->state; ?></td></tr>
                              <tr><th>District</th><td><?php echo $datafetch->district; ?></td></tr>
                              <tr><th>Shop details</th><td><?php echo $datafetch->about_your_shop; ?></td></tr>
                              <tr><th>Create date</th><td><?php echo $datafetch->create_at; ?></td></tr>

                              <tr><th>Shop Image 1</th><td> <?php if(!empty($datafetch->images_shop)) { ?>   <img src="<?php base_url(); ?>assets/spare/<?php echo $datafetch->images_shop;?>" loading="lazy" style="width:40%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr> 
                              <tr><th>Shop Image 2</th><td> <?php if(!empty($datafetch->prod_image2)) { ?>   <img src="<?php base_url(); ?>assets/spare/<?php echo $datafetch->prod_image2;?>" loading="lazy" style="width:40%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr> 
                              <tr><th>Shop Image 3</th><td> <?php if(!empty($datafetch->prod_image3)) { ?>   <img src="<?php base_url(); ?>assets/spare/<?php echo $datafetch->prod_image3;?>" loading="lazy" style="width:40%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr> 
                              <tr><th>Shop Image 4</th><td> <?php if(!empty($datafetch->prod_image4)) { ?>   <img src="<?php base_url(); ?>assets/spare/<?php echo $datafetch->prod_image4;?>" loading="lazy" style="width:40%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr> 
                            </thead>
              </table>          
              
              </div>     
            </div>
           <?php }else{ ?> 
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Spare Part List
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="spare_table">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Full name</th>
                        <th>Mobile no</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Created Date</th>
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
         
     