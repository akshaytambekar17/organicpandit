<div class="row">    
    <div class="col-md-12 ">
        <div class="row">
            <div class="form-group col-md-12">
                <label>User Type</label>
                <h4><?= $user_details['user_type_name']?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Full Name</label>
                <h4><?= $user_details['fullname']?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>CEO Name</label>
                <h4><?= !empty($user_details['ceo_name'])?$user_details['ceo_name']:'NA' ?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Organization Name</label>
                <h4><?= !empty($user_details['organization_name'])?$user_details['organization_name']:'NA' ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Username</label>
                <h4><?= $user_details['username']?></h4>
            </div>
            <?php if( true == isArrVal( $arrOrganicSettingUserDetails ) && ENABLED == $arrOrganicSettingUserDetails['value'] ) {  ?>
                <div class="form-group col-md-4">
                    <label>Email Id</label>
                    <h4><?= $user_details['email_id']?></h4>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Mobile Number</label>
                <h4><?= $user_details['mobile_no']?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Landline Number</label>
                <h4><?= $user_details['landline_no']?></h4>
            </div>
        </div>
        <?php if( true == isArrVal( $arrOrganicSettingUserDetails ) && ENABLED == $arrOrganicSettingUserDetails['value'] ) {  ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Address</label>
                    <h4><?= $user_details['address']?></h4>
                </div>
                <div class="form-group col-md-4">
                    <label>State</label>
                    <h4><?php
                            $state_details = $this->State->getStateById($user_details['state_id']);
                            echo $state_details['name'];
                        ?>
                    </h4>
                </div>
                <div class="form-group col-md-4">
                    <label>City</label>
                    <h4><?php
                            $city_details = $this->City->getCityById($user_details['city_id']);
                            echo $city_details['name'];
                        ?>
                    </h4>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="form-group col-md-4">
                <label>GST Number</label>
                <h4><?= !empty($user_details['gst_number'])?$user_details['gst_number']:"NA"?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Aadhar Number</label>
                <h4><?= !empty($user_details['aadhar_number'])?$user_details['aadhar_number']:"NA"?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Pancard Number</label>
                <h4><?= !empty($user_details['pancard_number'])?$user_details['pancard_number']:"NA"?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Story</label>
                <h4><?= $user_details['story']?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label>Certification Agency</label>
                <h4><?php
                        $agency_details = $this->CertificationAgency->getCertificationAgencyById( $user_details['agency_id'] );
                        if(!empty($agency_details)){
                            echo $agency_details['name'];
                        }else{
                            echo 'NA';
                        }
                    ?>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Profile Image</label>
                <h4>
                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['profile_image']?>" width="70px" height="70px">
                </h4>
            </div>
            <div class="form-group col-md-4">
                <label>Company Image</label>
                <h4>
                    <?php if(!empty($user_details['company_image'])){ ?>
                        <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['company_image']?>" width="70px" height="70px">
                    <?php }else{ ?>
                            NA
                    <?php } ?>    

                </h4>
            </div>
            <div class="form-group col-md-4">
                <label>Certification Image</label>
                <h4>
                    <?php if(!empty($user_details['certification_image'])){ ?>
                        <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['certification_image']?>" width="70px" height="70px">
                    <?php }else{ ?>
                            NA
                    <?php } ?>    

                </h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Product Catalogue File</label>
                <h4>
                    <?php if(!empty($user_details['product_catalogue'])){ ?>
                    <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['product_catalogue']?>" download><h5>Download <?= $user_details['product_catalogue']?></h5></a>
                    <?php }else{ ?>
                            NA
                    <?php } ?>    

                </h4>
            </div>
            <div class="form-group col-md-4">
                <label>Resume File</label>
                <h4>
                    <?php if(!empty($user_details['resume'])){ ?>
                    <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['resume']?>" download><h5>Download <?= $user_details['resume']?></h5></a>
                    <?php }else{ ?>
                            NA
                    <?php } ?>    

                </h4>
            </div>
            <div class="form-group col-md-4">
                <label>Video File</label>
                <h4>
                    <?php if(!empty($user_details['video'])){ ?>
                    <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['video']?>" download><h5>Download <?= $user_details['video']?></h5></a>
                    <?php }else{ ?>
                            NA
                    <?php } ?>    

                </h4>
            </div>
        </div>
        <?php 
            $user_product_details = $this->UserProduct->getUserProductsByUserId($user_details['user_id']);
            if(!empty($user_product_details)){ 
        ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <h3>Product Details</h3>
                    </div>
                </div>

            <?php foreach($user_product_details as $value){ ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Product Name</label>
                        <h4><?= !empty($value['name'])?$value['name']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Description</label>
                        <h4><?= !empty($value['description'])?$value['description']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>From Date</label>
                        <h4><?= !empty($value['from_date'])?$value['from_date']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>To Date</label>
                        <h4><?= !empty($value['to_date'])?$value['to_date']:"NA"?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Quantity</label>
                        <h4><?php
                                $quantities_details = getQuantities();    
                                echo $quantities_details[$value['quantity_id']];
                            ?>
                        </h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Quality</label>
                        <h4><?= !empty($value['quality'])?$value['quality']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Price</label>
                        <h4><?= !empty($value['price'])?$value['price']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Product Image</label>
                        <h4>
                            <?php if(!empty($value['images'])){ ?>
                                    <img src="<?= base_url()?>assets/images/product_images/<?= $value['images']?>" width="70px" height="70px">
                            <?php }else{ ?>
                                    NA
                            <?php } ?> 
                        </h4>
                    </div>
                </div>
    <?php       } 
            }
        ?>
        <div class="row">
            <div class="form-group col-md-3">
                <h4>Bank Details</h4>
            </div>
        </div>
        <?php 
            $user_bank_details = $this->UserBank->getUserBankByUserId($user_details['user_id']);
        ?>
        <div class="row">
            <div class="form-group col-md-3">
                <label>Bank Name</label>
                <h4><?= !empty($user_bank_details['bank_name'])?$user_bank_details['bank_name']:"NA"?></h4>
            </div>
            <div class="form-group col-md-3">
                <label>Acount Holder Name</label>
                <h4><?= !empty($user_bank_details['account_holder_name'])?$user_bank_details['account_holder_name']:"NA"?></h4>
            </div>
            <div class="form-group col-md-3">
                <label>Account Number</label>
                <h4><?= !empty($user_bank_details['account_no'])?$user_bank_details['account_no']:"NA"?></h4>
            </div>
            <div class="form-group col-md-3">
                <label>IFSC Code</label>
                <h4><?= !empty($user_bank_details['ifsc_code'])?$user_bank_details['ifsc_code']:"NA"?></h4>
            </div>
        </div>
        <?php 
            $user_crop_details = $this->UserCrop->getUserCropsByUserId($user_details['user_id']);
            if(!empty($user_crop_details)){ 
        ?>
            <div class="row">
                <div class="form-group col-md-8">
                    <h3>Crop Inspection Details</h3>
                </div>
            </div>

            <?php foreach($user_crop_details as $value_crop){ ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Crop Name</label>
                        <h4><?= !empty($value_crop['crop_name'])?$value_crop['crop_name']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Area (in acre's)</label>
                        <h4><?= !empty($value_crop['area'])?$value_crop['area']:"NA"?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Date of Sown</label>
                        <h4><?= !empty($value_crop['date_sown'])?$value_crop['date_sown']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Date of Harvest</label>
                        <h4><?= !empty($value_crop['date_harvest'])?$value_crop['date_harvest']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Date of Harvest</label>
                        <h4><?= !empty($value_crop['date_harvest'])?$value_crop['date_harvest']:"NA"?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Crop Condition</label>
                        <h4><?= !empty($value_crop['crop_condition'])?$value_crop['crop_condition']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Other Details</label>
                        <h4><?= !empty($value_crop['other_details'])?$value_crop['other_details']:"NA"?></h4>
                    </div>
                </div>
            <?php }?>
        <?php }?>
        <?php
            $user_soil_details = $this->UserSoil->getUserSoilByUserId($user_details['user_id']);
            if(!empty($user_soil_details)){ 
        ?>
            <div class="row">
                <div class="form-group col-md-8">
                    <h3>Soil Details</h3>
                </div>
            </div>

            <?php foreach($user_soil_details as $value_soil){ ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Element</label>
                        <h4><?php
                                $element_details = getSoilElement();    
                                echo $element_details[$value_soil['element']];
                            ?>
                        </h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Percentage</label>
                        <h4><?php
                                $percentage_details = getSoilPercentage();    
                                echo $percentage_details[$value_soil['percentage']];
                            ?>
                        </h4>
                    </div>

                </div>
            <?php }?>
        <?php }?>
        <?php 
            $user_micro_details = $this->UserMicroNutrient->getUserMicroNutrientByUserId($user_details['user_id']);
            if(!empty($user_micro_details)){ 
        ?>
            <div class="row">
                <div class="form-group col-md-8">
                    <h3>Micro Nutrients Details</h3>
                </div>
            </div>

            <?php foreach($user_micro_details as $value_micro){ ?>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Element</label>
                        <h4><?php
                                $element_details = getMicroElement();    
                                echo $element_details[$value_micro['element']];
                            ?>
                        </h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Percentage</label>
                        <h4><?php
                                $percentage_details = getMicroPercentage();    
                                echo $percentage_details[$value_micro['percentage']];
                            ?>
                        </h4>
                    </div>

                </div>
            <?php }?>
        <?php }?>
        <?php
            $user_input_details = $this->UserInputOrganic->getUserInputOrganicByUserId($user_details['user_id']);
            if( !empty($user_input_details ) ) { 
        ?>
            <div class="row">
                <div class="form-group col-md-8">
                    <h3>Input Organic Details</h3>
                </div>
            </div>
            <?php  foreach( $user_input_details as $valInputOrganic) { ?>
                <div class="row">[
                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <h4><?= !empty($valInputOrganic['input_date'])?$valInputOrganic['input_date']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Input Name</label>
                        <h4><?= !empty($valInputOrganic['input_name'])?$valInputOrganic['input_name']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Total Area (in acre's)</label>
                        <h4><?= !empty($valInputOrganic['total_area'])?$valInputOrganic['total_area']:"NA"?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Supplier Name</label>
                        <h4><?= !empty($valInputOrganic['supplier_name'])?$valInputOrganic['supplier_name']:"NA"?></h4>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Other Details</label>
                        <h4><?= !empty($valInputOrganic['other_details'])?$valInputOrganic['other_details']:"NA"?></h4>
                    </div>
                </div>

        <?php } } ?>
    </div>
    <input type="hidden" name="user_id" value="<?= $user_details['user_id']?>">
    <input type="hidden" name="fullname" value="<?= $user_details['fullname']?>">
    <input type="hidden" name="user_type_id" value="<?= $user_details['user_type_id']?>">
    <div class="clearfix"> </div>
</div>
    