<style>
.headlink{
  color: white !important;
 text-decoration: none !important;
}
</style>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <a href="<?php echo site_url(); ?>viewMachinary" class="headlink"> <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Machinary & Part
            <i class="fa fa-4x fa-truck mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_machine_cell)) {
                              echo $tbl_machine_cell->total_count;
                            } else {
                              echo '0';
                            } ?></h2>

        </div></a>
      </div>
    </div>
    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
      <a href="<?php echo site_url(); ?>driver-list" class="headlink">   <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Drivers
            <i class="fa fa-4x fa-dribbble mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_drivers)) {
                              echo $tbl_drivers->total_count;
                            } else {
                              echo '0';
                            } ?></h2>
        </div></a>
      </div>
    </div>
    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
      <a href="<?php echo site_url(); ?>owner-list" class="headlink"> <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Owner
            <i class="fa fa-4x fa-users mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_owner)) {
                              echo $tbl_owner->total_count;
                            } else {
                              echo '0';
                            } ?></h2>
        </div></a>
      </div>
    </div>

    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
      <a href="<?php echo site_url(); ?>mechanics-list" class="headlink">  <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Total Mechanics
            <i class="fa fa-4x fa-arrows mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_mechanics)) {
                              echo $tbl_mechanics->total_count;
                            } else {
                              echo '0';
                            } ?></h2>
        </div></a>
      </div>
    </div>


    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
      <a href="<?php echo site_url(); ?>civilList" class="headlink"> <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Engineer Or Supervisor
            <i class="fa fa-4x fa-building mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_civil)) {
                              echo $tbl_civil->total_count;
                            } else {
                              echo '0';
                            } ?></h2>
        </div></a>
      </div>
    </div>

    <div class="col-md-6 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
      <a href="<?php echo site_url(); ?>spareList" class="headlink"> <div class="card-body">
          <img src="<?php echo base_url(); ?>support_assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Spare Part
            <i class="fa fa-4x fa-wrench mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5"><?php if (!empty($tbl_spare)) {
                              echo $tbl_spare->total_count;
                            } else {
                              echo '0';
                            } ?></h2>
        </div></a>
      </div>
    </div>

  </div>
</div>