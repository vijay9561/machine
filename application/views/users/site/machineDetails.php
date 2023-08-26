<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Machine Details</h2>
            <ol>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li>Machine Details</li>
                <li><button onclick="history.back()" class="btn btn-primary btn-sm">Back</button></li>
            </ol>
        </div>

    </div>
</section>
<section id="team" class="team">
    <?php $dataFetch = $this->db->query("select *from tbl_machine_cell where id='" . base64_decode($_GET['view']) . "'")->row(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php if (!empty($dataFetch->prod_image1)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image1; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image2)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image2; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image3)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image3; ?>" class="sliderimg img-thumbnail"  loading="lazy"/>
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image4)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image4; ?>" class="sliderimg img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider crausalslider">
                        <ul class="slides">
                            <?php if (!empty($dataFetch->prod_image1)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image1; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image2)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image2; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image3)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image3; ?>" style="height: 125px;" class="img-thumbnail" loading="lazy" />
                                </li>
                            <?php } ?>
                            <?php if (!empty($dataFetch->prod_image4)) { ?>
                                <li>
                                    <img src="<?php echo base_url(); ?>/assets/upload/<?php echo $dataFetch->prod_image4; ?>" style="height: 125px;" class="img-thumbnail"  loading="lazy" />
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
               
            </div>
            <div class="col-md-6">
            <table class="table table-bordered">
           <thead>
            <tr><th colspan="2" class="thcolor">View Machine Details</th></tr>   
           </thead>
           <tbody>
           <tr><th>WhatApp Share</th><td>
             <a href="whatsapp://send?text= I want to sell machine and parts
to look for good machinery and parts
मैं मशीन और पार्ट्स बेचना चाहता हूं
अच्छे मशीनरी और पार्ट्स देखने के लिए  <?php echo urlencode(site_url().'machineDetails?view='.$dataFetch->id); ?>"   target="_blank"class="btn btn-success btn-sm"><i class="bx bxl-whatsapp-square bx-md" aria-hidden="true"></i></a>
            </td></tr>  
            <tr><th>The name of the owner or agent (मालिक या एजंट का नाम )</th><td><?php echo $dataFetch->owner_name; ?></td></tr>
            <tr><th>Mobile No (मोबाइल नंबर)</th><td>
            <?php if($this->session->userdata('user_id')) { ?>
             <a style="width:100%" href="tel:<?php echo  $dataFetch->mobile_number; ?>" class="btn btn-success btn-block">Call</a> 
                <?php }else{ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Contact</button> 
                  <?php } ?>
        </td></tr>  
      
            <tr><th>Machine location</th><td><?php echo $dataFetch->machine_location; ?></td></tr>  
            <tr><th>Machinary Name (यंत्राचे नाव)</th><td><?php echo $dataFetch->machine_company_name; ?></td></tr>
            <tr><th>Model name (मॉडेल नाव)</th><td><?php echo $dataFetch->machine_model_name; ?></td></tr>
            <tr><th>Model year (मॉडेल साल)</th><td><?php echo $dataFetch->machine_model_name; ?></td></tr> 
            <tr><th>More information about the vehicle (वाहन के बारे में अधिक जानकारी)</th><td><?php echo $dataFetch->machine_description; ?></td></tr> 
           </tbody>
            </table>
            </div>
        </div>

    </div>
</section>