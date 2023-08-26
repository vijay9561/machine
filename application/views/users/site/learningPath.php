<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2> Meramachine Learning Path</h2>
        <ol>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li>Learning</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <?php foreach ($learningPath as $row) { ?>
        <div class="row content learning-content">
          <div class="col-md-4" style="padding:0px">
         <img src="<?php echo base_url(); ?>assets/learning/<?php echo $row->image; ?>" style="width:100%"/>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0">
            <br>
            <h3><?php echo $row->title; ?></h3>
            <p>
             <?php echo $row->description; ?>
            </p>
            <a href="<?php echo $row->url; ?>" style="color:blue;" target="_blank"> <?php echo $row->url; ?></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section><!-- End About Section -->

</main>