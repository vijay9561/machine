<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Spare Details</h2>
            <ol>
                
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li>Spare Details</li>
                <li><button onclick="history.back()" class="btn btn-primary btn-sm">Back</button></li>
               
            </ol>
        </div>

    </div>
</section>
<section id="team" class="team">
    <?php $dataFetch = $this->db->query("select *from tbl_spare where id='" . base64_decode($_GET['view']) . "'")->row(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php if (!empty($dataFetch->images_shop)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->images_shop; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image2)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image2; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image3)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image3; ?>" class="sliderimg img-thumbnail"  loading="lazy"/>
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image4)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image4; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider crausalslider">
                        <ul class="slides">
                            <?php if (!empty($dataFetch->images_shop)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->images_shop; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image2)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image2; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image3)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image3; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image4)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/spare/<?php echo $dataFetch->prod_image4; ?>" style="height: 125px;" class="img-thumbnail"  loading="lazy" />
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
               
            </div>
            <div class="col-md-6">
            <table class="table table-bordered">
           <thead>
            <tr><th colspan="2" class="thcolor">View Spare Details</th></tr>   
           </thead>
           <tbody>
             <tr><th>WhatApp Share</th><td> 
             <a href="whatsapp://send?text= I sell spare parts
do you need any parts
मैं स्पेयर पार्ट्स बेचता हूं
क्या आपको किसी पार्टस कि आवश्यकता है   <?php  echo urlencode(site_url().'spareDetails?view='.$dataFetch->id); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a>    
            </td></tr>  
            <tr><th>Name (दुकान फर्म ,या अपका नाम )</th><td><?php echo $dataFetch->full_name; ?></td></tr>
           <tr><th>Mobile no. (मोबइल न.)</th><td>
            <?php if($this->session->userdata('user_id')) { ?>
             <a style="width:100%" href="tel:<?php echo  $dataFetch->mobile_no; ?>" class="btn btn-success btn-block">Call</a> 
                <?php }else{ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Contact</button> 
                  <?php } ?>
        </td></tr>  
            <tr><th>Shop address (शॉप पत्ता)</th><td><?php echo $dataFetch->shop_address; ?></td></tr> 
            <tr><th>District (जिला)</th><td><?php echo $dataFetch->district; ?></td></tr>
            <tr><th>State (राज्य)</th><td><?php echo $dataFetch->state; ?></td></tr> 
            <tr><th>About your shop (तुमच्या दुकानाबद्दल)</th><td><?php echo $dataFetch->about_your_shop; ?></td></tr> 
           </tbody>
            </table>
            </div>
        </div>

    </div>
</section>