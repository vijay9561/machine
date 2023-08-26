
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-users"></i>                 
              </span>
            User List
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['view'])){
              $datafetch=$this->db->query("select *from tbl_owner where id='".base64_decode($_GET['view'])."'")->row();
                ?>   
            <div class="card">
              <input type="hidden" value="<?php  echo $_GET['view']; ?>" id="referral_ids" name="referral_ids">
            <div class="card-header">
              <i class="fa fa-shopping-bag"></i> View Users List Details  <a href="<?php echo site_url(); ?>usersList" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <div class="table-responsive">
                      <table class="table table-bordered" id="referral_table_list">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Referral Name</th>
                        <th>Referral mobile no</th>
                        <th>Referral to name</th>
                        <th>Referral to mobile no</th>
                        <th>Forum Name</th>
                        <th>Create Date</th>
                        <th style="width:15%">Action</th>
                              </tr>
                          </thead>    
                      </table>   
                  </div>
              
              </div>     
            </div>
           <?php }else{ ?> 
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Users List
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="users_table">
                          <thead>
                              <tr>
                        <th>Sr.No</th>
                        <th>Full name</th>
                        <th>Mobile No</th>
                        <th>Referral Code</th>
                        <th>Create Date</th>
                        <th style="width:15%">Action</th>
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
         
     