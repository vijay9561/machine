<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Driver's</h2>
      <?php  //$this->load->view('users/site/state');?>
      <ol>
        <li class="newli"><a href="<?php echo site_url(); ?>addNewDrivers" class="btn btn-success btn-sm custombuttonSize">Add New Driver</a></li>
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li>Driver's</li>
      </ol>
    </div>

  </div>
</section>
<section id="team" class="team ">
  <div class="container">
    <?php if ($this->session->userdata('success')) { ?>
      <div class="alert alert-success"><?php echo $this->session->userdata('success'); ?></div>
    <?php $this->session->unset_userdata('success');
    } ?>
    <div class="row">
    <?php  if(isset($_GET['district']) && isset($_GET['state']))
                  {  
                    $searchFetchData =$this->db->query("select *from tbl_drivers where state='".$_GET['state']."' and district='".$_GET['district']."' and status='active'")->result(); 
                    if(count($searchFetchData)>=1){ 
                    foreach ($searchFetchData as $row) {
                      ?>
   <div class="col-lg-6">
          <div class="member d-flex align-items-start">
            <?php if(empty($row->profile_image)){ ?>
                <div class="pic"><img src="<?php echo site_url(); ?>assets/img/default.png" class="img-fluid" alt="" loading="lazy"></div>
                <?php }else{ ?>
              <div class="pic"><img src="<?php echo site_url(); ?>assets/driver/<?php echo $row->profile_image; ?>" class="img-fluid" alt="" loading="lazy"></div>
              <?php } ?>
            <div class="member-info">
              <h4><?php echo $row->full_name; ?></h4>
              <span><?php echo $row->operator_type; ?></span>
              <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->district) <= 29) ? $row->district : substr($row->district, 0, 29) . '...'; ?></p>
              <p><?php echo (strlen($row->about_you) <= 60) ? $row->about_you : substr($row->about_you, 0, 60) . '...'; ?></p>
              <?php if ($this->session->userdata('user_id')) { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ViewDrivers" onclick="viewDriverDetails(<?php echo $row->id; ?>)">View Contact</button>
              <?php } else { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Contact</button>
              <?php } ?>
              <a href="whatsapp://send?text= I am a best operator/driver
are you looking for operator or driver
मैं एक अच्छा ऑपरेटर/ड्राइवर हूं
क्या आप अच्छेऑपरेटर या ड्राइवर की तलाश कर रहे हैं   <?php echo urlencode(site_url().'driver'); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a> 
            </div>
          </div>
        </div>
<?php } }else { ?>
  <div class="col-md-12">
          <a href="<?php echo site_url(); ?>drivers"><img src="<?php echo base_url(); ?>assets/img/search.png" class="searchclass" loading="lazy" /></a>
        </div>
    <?php } } else { $i =1; foreach ($favourite as $row) { ?>
        <div class="col-lg-6">
          <div class="member d-flex align-items-start">
          <?php if(empty($row->profile_image)){ ?>
                <div class="pic"><img src="<?php echo site_url(); ?>assets/img/default.png" class="img-fluid" alt="" loading="lazy"></div>
                <?php }else{ ?>
              <div class="pic"><img src="<?php echo site_url(); ?>assets/driver/<?php echo $row->profile_image; ?>" class="img-fluid" alt="" loading="lazy"></div>
              <?php } ?>
            <div class="member-info">
              <div class="ribben">
                <p>favourite</p>
              </div>
              <h4><?php echo $row->full_name; ?></h4>
              <span><?php echo $row->operator_type; ?></span>
              <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->district) <= 29) ? $row->district : substr($row->district, 0, 29) . '...'; ?></p>
              <p><?php echo (strlen($row->about_you) <= 60) ? $row->about_you : substr($row->about_you, 0, 60) . '...'; ?></p>
              <?php if ($this->session->userdata('user_id')) { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ViewDrivers" onclick="viewDriverDetails(<?php echo $row->id; ?>)">View Contact</button>
              <?php } else { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Contact</button>
              <?php } ?>
              <a href="whatsapp://send?text= I am a best operator/driver
are you looking for operator or driver
मैं एक अच्छा ऑपरेटर/ड्राइवर हूं
क्या आप अच्छेऑपरेटर या ड्राइवर की तलाश कर रहे हैं   <?php echo urlencode(site_url().'driver'); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a> 
            </div>
          </div>
        </div>
       <?php if($i ==3){ ?>
        <div class="col-lg-6">
          <div class="member d-flex align-items-start" style="padding: 22px">
          <a href="<?php echo site_url(); ?>addNewDrivers"> <img src="<?php echo base_url(); ?>assets/img/driver_register.png" style="width:100%" /></a>
          </div>
        </div>
        <?php } ?> 
      <?php $i++; } ?>
      <?php $j=$i; foreach ($fetchDrivers as $row) { ?>
        <div class="col-lg-6">
          <div class="member d-flex align-items-start">
          <?php if(empty($row->profile_image)){ ?>
                <div class="pic"><img src="<?php echo site_url(); ?>assets/img/default.png" class="img-fluid" alt="" loading="lazy"></div>
                <?php }else{ ?>
              <div class="pic"><img src="<?php echo site_url(); ?>assets/driver/<?php echo $row->profile_image; ?>" class="img-fluid" alt="" loading="lazy"></div>
              <?php } ?>
            <div class="member-info">
              <h4><?php echo $row->full_name; ?></h4>
              <span><?php echo $row->operator_type; ?></span>
              <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->district) <= 29) ? $row->district : substr($row->district, 0, 29) . '...'; ?></p>
              <p><?php echo (strlen($row->about_you) <= 60) ? $row->about_you : substr($row->about_you, 0, 60) . '...'; ?></p>
              <?php if ($this->session->userdata('user_id')) { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ViewDrivers" onclick="viewDriverDetails(<?php echo $row->id; ?>)">View Contact</button>
              <?php } else { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Contact</button>
              <?php } ?>
              <a href="whatsapp://send?text= I am a best operator/driver
are you looking for operator or driver
मैं एक अच्छा ऑपरेटर/ड्राइवर हूं
क्या आप अच्छेऑपरेटर या ड्राइवर की तलाश कर रहे हैं   <?php echo urlencode(site_url().'driver'); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a> 
            </div>
          </div>
        </div>
        <?php if($j==3){ ?>
        <div class="col-lg-6">
          <div class="member d-flex align-items-start" style="padding: 22px">
          <a href="<?php echo site_url(); ?>addNewDrivers"> <img src="<?php echo base_url(); ?>assets/img/driver_register.png" style="width:100%" /></a>
          
          </div>
        </div>
        <?php } ?> 
      <?php $j++; } } ?>
    </div>
  </div>
</section>