<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Spare Part</h2>
            <ol>
                <li><a href="<?php echo site_url(); ?>sparePart" class="btn btn-danger btn-sm">Back</a></li>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li>Spare Part</li>
            </ol>
        </div>

    </div>
</section>
<section id="team" class="team ">
    <div class="container">
        <form method="post" id="addNewShopForm" enctype="multipart/form-data">
        <div class="alert alert-danger" id="error_message_register" style="display:none;"></div>
                <div class="alert alert-success" id="success_message_register" style="display:none;"></div>
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Name (दुकान फर्म ,या अपका नाम )<b style="color:red;"> *</b></label>
                    <input type="text" id="full_name" name="full_name" placeholder="eg. xyz" class="form-control">
                </div>
                <div class="form-group col-md-6 ">
                    <label>Mobile number (दुकान फर्म ,या अपका नंबर  )<b style="color:red;"> *</b></label>
                    <input type="text" id="mobile_no" name="mobile_no" placeholder="eg: 9999999999" class="form-control">
                </div>
            </div>
            <div class="row">
        
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
                    <label>About your shop (तुमच्या दुकानाबद्दल)</label>
                    <textarea type="text" id="about_your_shop" name="about_your_shop" placeholder="eg: xyz" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Shop address (शॉप पत्ता)<b style="color:red;"> *</b></label>
                    <input type="text" id="shop_address" name="shop_address" placeholder="eg. xyz" class="form-control">
                </div> 
            </div>

            <div class="row">
            <div class="form-group col-md-6">
                    <label>Upload shop image (दुकान प्रतिमा)<b style="color:red;"> *</b></label>
                    <input type="file" id="images_shop" accept="image/*" onchange="imageExtensionValidate(this)" name="images_shop"  class="form-control">
                </div>
            <div class="form-group col-md-6">
                    <label>Shope Image 2 (दुकान प्रतिमा 2)</label>
                    <input type="file" id="prod_image2" accept="image/*" onchange="imageExtensionValidate(this)" name="prod_image2"  class="form-control">
                </div>   
            </div>
            
            <input type="hidden" value="<?php if(isset($_GET['referral_code'])){ echo $_GET['referral_code']; } ?>" id="referral_code" name="referral_code" />
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-5">
                <p><input type="checkbox" name="submitcheckbox" id="submitcheckbox" /><label> By submit form, you agree to our <a href="<?php echo site_url(); ?>termsAndCondition" style="color:blue" target="_blank"> Terms and Condition</a></label><br></p>
                 <input type="submit" class="btn btn-primary btn-block" id="submit_product" value="Submit Spare">   
                 <a href="<?php echo site_url(); ?>sparePart" class="btn btn-danger btn-block">Back</a>
                </div>
            </div>
        </form>

    </div>
</section>