    
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-truck"></i>                 
              </span>
              Machinary & part
            </h3>
          </div>
          <div class="row">
           <div class="col-md-12">
            <?php if(isset($_GET['add'])){
              
                ?>   
            <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Add New Event            
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="product_master_forms">
              
                <div class="form-group">
                <label>Event Name</label>  
                <input type="text" class="form-control" value="" name="event_name" id="event_name" placeholder="Event Name">
                </div>
                <div class="form-group">
                <label>Event Fees</label>  
                <input type="text" class="form-control"  name="event_fees" id="event_fees" placeholder="Event fees">
                </div>
                <div class="form-group">
                <label>Accommodation Fees</label>  
                <input type="text" class="form-control"  name="accommodation_fees" id="accommodation_fees" placeholder="Accommodation Fees">
                </div>
                  <div class="form-group">
                <label>Event Image </label>  
                <input type="file" class="form-control" value="" name="event_photo" id="event_photo" accept="image/png, image/gif, image/jpeg">
                </div>   
                <div class="form-group">
                <label>Event Description </label>  
                <textarea type="text" class="form-control" value="" name="event_description" id="event_description" rows="8" placeholder="Event Description"></textarea>
                </div>
                <div class="form-group">
                <label>Event Date</label>  
                <input type="text" class="form-control" autocomplete="off" name="event_date" id="event_date" placeholder="Event Date">
                </div>
                  <button type="submit" id="product__button" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
             
            </div>
            <?php }elseif(isset($_GET['update'])){
                $id= base64_decode($_GET['update']);
                $rows=$this->db->query("select *from  tbl_chess_event where id='$id'")->row();
                ?> 
               
           <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> Update Product Details
            </div>
              <div class="card-body">
               <div class="alert alert-danger" id="error_message_change" style="display:none;"></div> 
               <form method="post" id="product_master_upate">
               <input value="<?php  echo $rows->id; ?>" type="hidden" name="id">
               <div class="form-group">
                <label>Event Name</label>  
                <input type="text" class="form-control"  name="event_name" value="<?php  echo $rows->event_name; ?>" id="event_name" placeholder="Event Name">
                </div>
                <div class="form-group">
                <label>Event Fees</label>  
                <input type="text" class="form-control"  name="event_fees" value="<?php  echo $rows->event_fees; ?>" id="event_fees" placeholder="Event fees">
                </div>
                <div class="form-group">
                <label>Accommodation Fees</label>  
                <input type="text" class="form-control"  name="accommodation_fees" value="<?php  echo $rows->accommodation_fees; ?>" id="accommodation_fees" placeholder="Accommodation Fees">
                </div>
                <div class="form-group">
                <label>Event Image </label>  
                <input type="file" class="form-control"  name="event_photo"  id="event_photo" accept="image/png, image/gif, image/jpeg">
                <input type="hidden" value="<?php  echo $rows->event_photo; ?>" name="hidden_image">
                </div>   
                <div class="form-group">
                <label>Event Description </label>  
                <textarea type="text" class="form-control"  name="event_description" id="event_description" rows="8" placeholder="Product Price"><?php echo trim($rows->event_description); ?></textarea>
                </div>
                <div class="form-group">
                <label>Event Date</label>  
                <input type="text" class="form-control" autocomplete="off" name="event_date" id="event_date"  value="<?php  echo date('Y-m-d H:i',strtotime($rows->event_date)); ?>" placeholder="Event Date">
                </div>
                  <button type="submit" id="product__button" class="btn btn-gradient-primary mr-2">Change Save</button>
                  </form>
              </div>
            </div>
            <?php }elseif(isset($_GET['view'])){ 
                $id= base64_decode($_GET['view']);
                $rows=$this->db->query("select *from tbl_machine_cell where id='$id'")->row();
              ?>
         <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> View Machinary Details  <a onclick="history.back()" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <table class="table table-bordered">
                          <thead>
                     <tr>  <th>Full name</th><td><?php  echo $rows->owner_name; ?></td>
                     <tr>  <th>Mobile no</th><td><?php  echo $rows->mobile_number; ?></td>
                     <tr>  <th>Machine Location</th><td><?php  echo $rows->machine_location; ?></td>
                     <tr>  <th>Machine Company Name</th><td><?php  echo $rows->machine_company_name; ?></td></tr>
                     <tr>  <th>Machine Model Name</th><td><?php  echo $rows->machine_model_name; ?></td></tr>
                     <tr>  <th>Machine Model Year</th><td><?php  echo $rows->model_year; ?></td></tr>
                     <tr>  <th>Machine Description</th><td><?php  echo $rows->machine_description; ?></td></tr>
                    <tr> <th>Created At</th><td><?php  echo date('d-m-Y',strtotime($rows->created_date)); ?></td> </tr>
                    <tr> <th> Images </th><td>
                      <img src="<?php base_url(); ?>assets/upload/<?php echo $rows->prod_image1;?>" loading="lazy" style="width:100%;height:300px;border-radius: unset;margin-bottom:10px"/>
                     <?php if(!empty($rows->prod_image2)) { ?> <img src="<?php base_url(); ?>assets/upload/<?php echo $rows->prod_image2;?>" loading="lazy" style="width:100%;height:300px;border-radius: unset;margin-bottom:10px"/> <?php } ?>
                     <?php if(!empty($rows->prod_image3)) { ?>    <img src="<?php base_url(); ?>assets/upload/<?php echo $rows->prod_image3;?>" loading="lazy" style="width:100%;height:300px;border-radius: unset;margin-bottom:10px"/> <?php } ?>
                     <?php if(!empty($rows->prod_image4)) { ?>   <img src="<?php base_url(); ?>assets/upload/<?php echo $rows->prod_image4;?>" loading="lazy" style="width:100%;height:300px;border-radius: unset;margin-bottom:10px"/> <?php } ?>
                    
                  </td> </tr>
                   
                     </thead>
              </table>
              </div>
            </div>
            <?php }elseif(isset($_GET['youtube'])){ 
               $id= base64_decode($_GET['youtube']);
               $rows=$this->db->query("select *from tb_product where id='$id'")->row();
              ?>   
              <div class="card">
            <div class="card-header">
              <i class="mdi mdi-account"></i> YouTube Video    <a href="<?php echo site_url() ?>product" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
            </div>
              <div class="card-body">
              <iframe style="width:100%;height:500px;" src="<?php echo $rows->youtub_url; ?>"></iframe>  
              </div>
            </div>
            <?php }else{ ?>  
                <div class="card">
            <div class="card-header">
                <i class="mdi mdi-table-large"></i> Chess Event 
                <a href="<?php echo site_url() ?>event?add=new" class="btn btn-gradient-info btn-sm"> Add New <i class="fa fa-plus"></i></a>
            </div>
              <div class="card-body">
                  
                 <?php if($this->session->userdata('success')){ ?>
                  <div class="alert alert-success">
                      <?php echo $this->session->userdata('success'); ?>
                  </div>
                 <?php $this->session->unset_userdata('success'); } ?>
                  <div class="table-responsive">
                      <table class="table table-bordered" id="cellMachineList">
                          <thead>
                              <tr>
                        <th>Sr.no</th>
                        <th>Full name</th>
                        <th>Mobile no.</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Status</th> 
                        <th style="width:170px;">Action</th>
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
     