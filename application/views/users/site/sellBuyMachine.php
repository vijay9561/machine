<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Machinary & Part</h2>
            <?php // $this->load->view('users/site/state'); ?>
            <ol>
                <li class="newli"><a href="<?php echo site_url(); ?>cell-machine" class="btn btn-success btn-sm custombuttonSize">Add New Sell Machinary</a></li>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li>Machinary & Part</li>
            </ol>
        </div>

    </div>
</section>
<main id="main">
    <section id="pricing" class="pricing">
        <div class="container">
            <?php if ($this->session->userdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->userdata('success'); ?></div>
            <?php $this->session->unset_userdata('success');
            } ?>
            <div class="row">
                <?php if (isset($_GET['district']) && isset($_GET['state'])) {
                    $searchFetchData = $this->db->query("select *from tbl_machine_cell where state='" . $_GET['state'] . "' and district='" . $_GET['district'] . "' and status='active'")->result();
                    if (count($searchFetchData) >= 1) {
                        foreach ($searchFetchData as $row) { ?>
                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <div class="box featured">
                                    <h3> <?php echo (strlen($row->machine_company_name) <= 18) ? $row->machine_company_name : substr($row->machine_company_name, 0, 18) . '...'; ?>
                                    </h3>
                                    <img src="<?php echo base_url(); ?>assets/upload/<?php echo $row->prod_image1; ?>" class="homeImages" />
                                    <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->machine_location) <= 29) ? $row->machine_location : substr($row->machine_location, 0, 29) . '...'; ?></p>
                                    <div class="btn-wrap">
                                        <a href="<?php echo site_url();  ?>machineDetails?view=<?php echo base64_encode($row->id); ?>" class="btn-buy">View Machinery</a>
                                        <a href="whatsapp://send?text=I want to sell machine and parts
to look for good machinery and parts
मैं मशीन और पार्ट्स बेचना चाहता हूं
अच्छे मशीनरी और पार्ट्स देखने के लिए   <?php echo urlencode(site_url().'machineDetails?view='.base64_encode($row->id)); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a>  
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col-md-12">
                            <a href="<?php echo site_url(); ?>sellBuyMachine"><img src="<?php echo base_url(); ?>assets/img/search.png" class="searchclass" loading="lazy" /></a>
                        </div>
                    <?php }
                } else {
                    $i = 1;
                    foreach ($favourite as $row) { ?>
                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                            <div class="box featured">
                                <div class="ribben">
                                    <p>favourite</p>
                                </div>
                                <h3> <?php echo (strlen($row->machine_company_name) <= 18) ? $row->machine_company_name : substr($row->machine_company_name, 0, 18) . '...'; ?>
                                </h3>
                                <img src="<?php echo base_url(); ?>assets/upload/<?php echo $row->prod_image1; ?>" class="homeImages" />
                                <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->machine_location) <= 29) ? $row->machine_location : substr($row->machine_location, 0, 29) . '...'; ?></p>
                                <div class="btn-wrap">
                                    <a href="<?php echo site_url();  ?>machineDetails?view=<?php echo base64_encode($row->id); ?>" class="btn-buy">View Machinery</a>
                                    <a href="whatsapp://send?text= I want to sell machine and parts
to look for good machinery and parts
मैं मशीन और पार्ट्स बेचना चाहता हूं
अच्छे मशीनरी और पार्ट्स देखने के लिए  <?php  echo urlencode(site_url().'machineDetails?view='.base64_encode($row->id)); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a>  
                                </div>
                            </div>
                        </div>
                <?php if($i===3){ ?>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                            <div class="box featured">
                           <a href="<?php echo site_url(); ?>cell-machine"> <img src="<?php echo base_url(); ?>assets/img/sellyourjcb.jpg" />   </a>
                            </div>
                    </div>
                    <?php } ?>
                    <?php $i++;
                    } ?>

                    <?php $j = $i;
                    foreach  ($fetchMechanics as $row) { ?>
                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                            <div class="box featured">
                                <h3> <?php echo (strlen($row->machine_company_name) <= 18) ? $row->machine_company_name : substr($row->machine_company_name, 0, 18) . '...'; ?>
                                </h3>
                                <img src="<?php echo base_url(); ?>assets/upload/<?php echo $row->prod_image1; ?>" class="homeImages" />
                                <p class="locationheading"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQ5JREFUSEu1lOsRQTEQhc/tQAlUgArohA7QydUBlaADKqAEKmDOTGJMso8k4+Znstlv9+yjw8CnG9g/SgBjABsASwCzENAVwBnAHsDDCtID9MG55YM2O83AAjDKaaGEtJ1LthqgJPLUH+XappcSgJrflcij/Vt5n6Q1kQBW9B4gy0ICWNp7gKwWEiBN3+s00/7fgBeA0W99JAAHaNFY5EsYyO93CXAAsGoEHAGsvQy4Ek6NAA4bC21mwMeaKY7OMnn4oHWIlYW2PbLoLQDfataFuCY8QKlUojQxTW+I2NNsW22r3kJbPlvWdfyjQVznJRJpkCLnNQDaMhMWnod7X5WlZA40SavvvSJXO0w/fAC7NTQZdPI3pQAAAABJRU5ErkJggg==" /> <?php echo (strlen($row->machine_location) <= 29) ? $row->machine_location : substr($row->machine_location, 0, 29) . '...'; ?></p>
                                <div class="btn-wrap">
                                    <a href="<?php echo site_url();  ?>machineDetails?view=<?php echo base64_encode($row->id); ?>" class="btn-buy">View Machinery</a>
                                    <a href="whatsapp://send?text= I want to sell machine and parts
to look for good machinery and parts
मैं मशीन और पार्ट्स बेचना चाहता हूं
अच्छे मशीनरी और पार्ट्स देखने के लिए  <?php  echo urlencode(site_url().'machineDetails?view='.base64_encode($row->id)); ?>"   target="_blank" ><i class="bx bxl-whatsapp-square bx-sm btn btn-success" aria-hidden="true"></i></a>  
                                </div>
                            </div>
                        </div>
                        <?php if($j ===3){ ?>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                            <div class="box featured">
                            <a href="<?php echo site_url(); ?>cell-machine"> <img src="<?php echo base_url(); ?>assets/img/sellyourjcb.jpg" />   </a>
                            </div>
                    </div>
                    <?php } ?>
                <?php $j++;
                    }
                } ?>
            </div>

        </div>
    </section>
</main><!-- End #main -->