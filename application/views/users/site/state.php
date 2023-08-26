<div class="col-md-2" style="margin-bottom: 5px;">
            <select class="form-control" id="state1" name="state">
            <?php if(isset($_GET['state'])){ ?>
                        <option value="<?php echo $_GET['state']; ?>"><?php echo $_GET['state']; ?></option>
                        <?php }else{ ?>
                          <option value="">Select State</option>
                          <?php } ?>
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
            <div class="col-md-2"  style="margin-bottom: 5px;">
            <select class="form-control" id="district1" name="district" required>
              <?php if(isset($_GET['district'])){ ?>
                        <option value="<?php echo $_GET['district']; ?>"><?php echo $_GET['district']; ?></option>
                        <?php }else{ ?>
                          <option value="">Select City</option>
                          <?php } ?>
                    </select>
            </div>
            <div class="col-md-1"  style="margin-bottom: 5px;">
           <input type="submit" value="Search" class="btn btn-primary btn-sm btn-block" onclick="return searchcity()" />
            </div>