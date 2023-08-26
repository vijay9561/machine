<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Machine Sell</h2>
            <ol>
                <li><a href="<?php echo site_url(); ?>sellBuyMachine" class="btn btn-danger btn-sm">Back</a></li>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li>Machine Sell</li>
            </ol>
        </div>

    </div>
</section>
<section id="team" class="team ">
    <div class="container">

        <div class="row">

            <form method="post" id="insersellmachine" enctype="multipart/form-data">
                <div class="alert alert-danger" id="error_message_register" style="display:none;"></div>
                <div class="alert alert-success" id="success_message_register" style="display:none;"></div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Owner / Agent Name (मालिक या एजंट का नाम )<b style="color:red;"> *</b></label>
                        <input type="text" id="owner_name" name="owner_name" placeholder="eg. mukesh patil" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mobile No (मोबाइल नंबर)<b style="color:red;"> *</b></label>
                        <input type="text" id="mobile_number" name="mobile_number" placeholder="eg: 9999999999" class="form-control">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                    <label class="inputLabel">State (राज्य)<b style="color:red;"> *</b></label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Select State</option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="inputLabel">District (जिला) <b style="color:red;"> *</b></label>
                    <select class="form-control" id="district" name="district" required>
                        <option value="">Select </option>
                    </select>
                </div>
            </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php $tbl_machinary_type = $this->db->query("select *from tbl_machinary_type order by type asc")->result(); ?>
                        <label>Machinary Name (मशीन का नाम)<b style="color:red;"> *</b></label>
                        <select type="text" id="machine_company_name" name="machine_company_name" placeholder="eg: Ashok Layland" class="form-control">
                          <option value="">Select Machinary Name</option>
                         <?php foreach($tbl_machinary_type  as $row){ ?>
                            <option value="<?php echo $row->type; ?>"><?php echo $row->type; ?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Model name (मॉडेल का नाम) </label>
                        <input type="text" id="machine_model_name" name="machine_model_name" placeholder="eg: JCB / 3DX / CAT424" style="resize:none " rows="8" class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Model year (मॉडेल साल) </label>
                        <input type="text" id="model_year" name="model_year" placeholder="eg: 2022" style="resize:none " rows="8" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Machine location (मशीन लोकेशन)<b style="color:red;"> *</b></label>
                        <textarea type="text" id="machine_location" name="machine_location" placeholder="eg: gajanan nagar,Aurangabad -341245" style="resize:none " rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>More information about the vehicle (वाहन के बारे में अधिक जानकारी) </label>
                        <textarea type="text" id="machine_description" name="machine_description" placeholder="More information about the vehicle (वाहन के बारे में अधिक जानकारी)" style="resize:none " rows="2" class="form-control"></textarea>
                    </div>
                </div>
               
              
                <div class="row">
                 

                    <div class="form-group col-md-6">
                        <label> प्रतिमा १ (Image 1)<b style="color:red;"> *</b></label>
                        <input type="file" id="prod_image1" onchange="imageExtensionValidate(this)" accept="image/*" name="prod_image1" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>प्रतिमा २ (Image 2)</label>
                        <input type="file" id="prod_image2" onchange="imageExtensionValidate(this)" accept="image/*" name="prod_image2" class="form-control">
                    </div>
                </div>
                <input type="hidden" value="<?php if(isset($_GET['referral_code'])){ echo $_GET['referral_code']; } ?>" id="referral_code" name="referral_code" />
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                    <p><input type="checkbox" name="submitcheckbox" id="submitcheckbox" /><label> By submit form, you agree to our <a href="<?php echo site_url(); ?>termsAndCondition" style="color:blue" target="_blank"> Terms and Condition</a></label><br></p>     
                        <input type="submit" class="btn btn-primary" id="submit_product" value="Submit" />
                        <a href="<?php echo site_url(); ?>" class="btn btn-danger btn-block">Back</a>
                    </div>
                </div>
        </div>
        </form>
    </div>

    </div>
</section>