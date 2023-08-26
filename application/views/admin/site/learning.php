<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="fa fa-graduation-cap"></i>
            </span>
            Learning Path
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($_GET['add'])) {

            ?>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-shopping-bag"></i> Add New Learning Path <a href="<?php echo site_url(); ?>learningpath" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
                    </div>
                    <div class="card-body">
                        <form method="post" id="submit_learningpath" enctype="multipart/form-data">
                            <div class="alert alert-danger" style="display:none;" id="error_message_login"></div>
                            <div class="alert alert-success" style="display:none;" id="success_message_login"></div>
                         <div class="form-group">
                             <label for="title">Title</label>
                           <input type="text" name="title" id="title" placeholder="Title" class="form-control" /> 
                         </div>
                         <div class="form-group">
                         <label for="url">URL</label>
                           <input type="text" name="url" id="url" placeholder="URL" class="form-control" /> 
                         </div>
                         <div class="form-group">
                         <label for="description">Description</label>
                           <textarea type="text" name="description" id="description" placeholder="Description" class="form-control" rows="4"></textarea> 
                         </div>
                         <div class="form-group">
                         <label for="url">Upload Image<br></label>
                         <br>
                           <input type="file" name="images" id="images" placeholder="Image"  /> 
                         </div>
                         <button type="submit" id="Learning_customers" class="btn btn-gradient-primary mr-2">Change Save</button>
                        </form>
                    </div>
                </div>

                <?php }else if (isset($_GET['view'])) {
$datafetch=$this->db->query("select *from tbl_learning where id='".base64_decode($_GET['view'])."'")->row();
?>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-shopping-bag"></i> View Learning Path <a onclick="history.back()" class="btn btn-gradient-info btn-sm"> Back <i class="fa fa-refresh"></i></a>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
                          <thead>
                              <tr><th>Title</th><td><?php echo $datafetch->title; ?></td></tr>
                              <tr><th>URL</th><td> <a href="<?php echo $datafetch->url; ?>" target="_blank"><?php echo $datafetch->url; ?></a></td></tr>
                              <tr><th>Description</th><td><?php echo $datafetch->description; ?></td></tr>
                             <tr><th>Created Date</th><td><?php echo $datafetch->created_at; ?></td></tr>
                             <tr><th>Profine Image</th><td> <?php if(!empty($datafetch->image)) { ?>   <img src="<?php base_url(); ?>assets/learning/<?php echo $datafetch->image;?>" loading="lazy" style="width:50%;height:200px;border-radius: unset;margin-bottom:10px"/> <?php } ?></td></tr>
                          </thead>
              </table>          
              
        </div>
    </div>

            <?php } else { ?>
                <div class="card">
                    <div class="card-header">
                        <i class="mdi mdi-table-large"></i>Learning Path <a href="<?php echo site_url(); ?>learningpath?add=new" class="btn btn-gradient-info btn-sm"> Add New <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card-body">

                        <?php if ($this->session->userdata('success')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->userdata('success'); ?>
                            </div>
                        <?php $this->session->unset_userdata('success');
                        } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="learning_table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>URL</th>
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