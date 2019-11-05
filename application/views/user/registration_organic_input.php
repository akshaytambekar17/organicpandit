<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Information</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="fullname" >Fullname</label>
                        <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="Fullname" value="<?= set_value('fullname') ?>">
                        <span class="has-error"><?php echo form_error('fullname'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="ceo_name">Director/CEO Name</label>
                        <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="Director/CEO Name" value="<?= set_value('ceo_name')?>">
                        <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="organization_name">Company Name</label>
                        <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Company Name" value="<?= set_value('organization_name')?>">
                        <span class="has-error"><?php echo form_error('organization_name'); ?></span>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="username" >Username</label>
                        <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= set_value('username') ?>">
                        <span class="has-error"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="email_id" >Email Id</label>
                        <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= set_value('email_id') ?>">
                        <span class="has-error"><?php echo form_error('email_id'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="password">Password</label>
                        <input type="password" name="password"  class="form-control" id="password" placeholder="Password" value="<?= set_value('password') ?>">
                        <span class="has-error"><?php echo form_error('username'); ?></span>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm_password"  class="form-control" id="confirm_password" placeholder="Confirm Password" value="<?= set_value('confirm_password') ?>">
                        <span class="has-error"><?php echo form_error('confirm_password'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="mobile_no">Mobile number</label>
                        <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= set_value('mobile_no') ?>">
                        <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="landline_no">Landline number</label>
                        <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= set_value('landline_no') ?>">
                        <span class="has-error"><?php echo form_error('landline_no'); ?></span>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="gst_number">GST Number</label>
                        <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= set_value('gst_number') ?>">
                        <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="aadhar_number">Aadhar Card Number</label>
                        <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= set_value('aadhar_number') ?>">
                        <span class="has-error"><?php echo form_error('aadhar_number'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= set_value('website')?>">
                        <span class="has-error"><?php echo form_error('website'); ?></span>
                        
                    </div>
                </div>

<!--                <div class="form-group col-md-4">
                    <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                    <select class="form-control select2" name="agency_id">
                        <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                        <?php foreach ($agencies_list as $value) { ?>
                            <option value="<?= $value['id'] ?>" <?= set_select('agency_id', $value['id']); ?>><?= $value['agency_name'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                    
                </div>-->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="country_id">Select Country</label>
                        <select class="form-control select2" name="country_id" id="js-country-id">
                            <option disabled="disabled" selected="selected" >Select Country</option>
                            <?php foreach( $arrCountriesList as $arrCountryDetails ) { ?>
                                <option value="<?= $arrCountryDetails['id'] ?>" <?= set_select('country_id', $arrCountryDetails['id']); ?> ><?= $arrCountryDetails['name'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="has-error"><?php echo form_error('country_id'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="state_id">Select State</label>
                        <select class="form-control select2" name="state_id" id="js-state-id">
                            <option disabled="disabled" selected="selected">Select State</option>
                        </select>
                        <span class="has-error"><?php echo form_error('state_id'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="city_id">Select City</label>
                        <select class="form-control select2" name="city_id" id="js-city-id">
                            <option disabled="disabled" selected="selected">Select City</option>
                        </select>
                        <span class="has-error"><?php echo form_error('city_id'); ?></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="control-label label-required" for="address">Address</label>
                        <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= set_value('address') ?>">
                        <span class="has-error"><?php echo form_error('address'); ?></span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="story">Story</label>
                        <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= set_value('story') ?>">
                        <span class="has-error"><?php echo form_error('story'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                        <input type="file" name="profile_image" class="form-control" id="profile_image">
                        <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="company_image">Choose Company Image</label>
                        <input type="file" name="company_image" class="form-control" id="company_image">
                        <span class="has-error"><?php echo form_error('company_image'); ?></span>                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="product_catalogue">Upload Product Catalogue</label>
                        <input type="file" name="product_catalogue" class="form-control" id="product_catalogue">
                        <span class="has-error"><?php echo form_error('product_catalogue'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="video">Choose Video</label>
                        <input type="file" name="video" class="form-control" id="video">
                        <span class="has-error"><?php echo form_error('video'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">E-Commerce Details</h3>
            </div>
            <div class="box-body">
                <div class="form-group pr-group box-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="category_id">Category</label>
                            <select class="form-control select2" name="Ecommerce[category_id][]" id="category_id">
                                <option disabled="disabled" selected="selected">Select Category</option>
                                <?php foreach( getEcommerceCategory() as $key => $value ){ ?>
                                    <option value="<?= $key ?>" <?= set_select('Ecommerce[category_id][]', $key); ?>><?= $value?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="category_id">Select SubCategory</label>
                            <select class="form-control select2" name="Ecommerce[sub_category_id][]" id="sub_category_id">
                                <option disabled="disabled" selected="selected">Select SubCategory</option>
                                <?php foreach( getEcommerceSubCategory() as $key => $value ){ ?>
                                    <option value="<?= $key ?>" <?= set_select('Ecommerce[sub_category_id][]', $key); ?>><?= $value?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="brand">Brand</label>
                            <?php if( false == boolTemporaryRemove() ) { ?>
                                <select class="form-control select2" name="Ecommerce[ecommerce_brand_id][]" id="ecommerce_brand_id">
                                    <option disabled="disabled" selected="selected">Select Brand</option>
                                    <?php foreach( getEcommerceBrand() as $key => $value ){ ?>
                                        <option value="<?= $key ?>" <?= set_select('Ecommerce[ecommerce_brand_id][]', $key); ?>><?= $value?></option>
                                    <?php } ?>
                                </select>
                            <?php }?>
                            <input type="text" name="Ecommerce[ecommerbrand][]" class="form-control" id="brand" placeholder="Brand" value="<?= set_value('Ecommerce[brand][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Price</label>
                            <input type="text" name="Ecommerce[price][]" class="form-control" id="price" placeholder="Price" value="<?= set_value('Ecommerce[price][]') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="images">Images</label>
                            <input type="file" name="ecommerce_images[]" class="form-control" id="ecommerce_images">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Dosage</label>
                            <input type="text" name="Ecommerce[dosage][]" class="form-control" id="dosage" placeholder="Dosage" value="<?= set_value('Ecommerce[dosage][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Weight</label>
                            <input type="text" name="Ecommerce[weight][]" class="form-control" id="weight" placeholder="Weight" value="<?= set_value('Ecommerce[weight][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Spectrum</label>
                            <input type="text" name="Ecommerce[spectrum][]" class="form-control" id="spectrum" placeholder="Spectrum" value="<?= set_value('Ecommerce[spectrum][]') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Compatibility</label>
                            <input type="text" name="Ecommerce[compatibility][]" class="form-control" id="compatibility" placeholder="Compatibility" value="<?= set_value('Ecommerce[compatibility][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Duration of Effect</label>
                            <input type="text" name="Ecommerce[duration_effect][]" class="form-control" id="duration_effect" placeholder="Duration of Effect" value="<?= set_value('Ecommerce[duration_effect][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Frequency of Application</label>
                            <input type="text" name="Ecommerce[frequency_application][]" class="form-control" id="frequency_application" placeholder="Frequency of Application" value="<?= set_value('Ecommerce[frequency_application][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Applicable Crops</label>
                            <input type="text" name="Ecommerce[applicable_crops][]" class="form-control" id="applicable_crops" placeholder="Applicable Crops" value="<?= set_value('Ecommerce[applicable_crops][]') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Final Remarks</label>
                            <input type="text" name="Ecommerce[final_remarks][]" class="form-control" id="applicable_crops" placeholder="Final Remarks" value="<?= set_value('Ecommerce[final_remarks][]') ?>">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="quality">Chemical Composition</label>
                            <input type="text" name="Ecommerce[chemical][]" class="form-control" id="chemical" placeholder="Chemical Composition" value="<?= set_value('Ecommerce[chemical][]') ?>">
                        </div>
                        
                        <div class="form-group col-md-1">
                            <label class="control-label">Add</label>
                            <button type="button" class="btn btn-success js-add-ecommerce-fields"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <!-- The option field template containing an option field and a Remove button -->
                <div class=" form-group product-group box-body hide" id="ecommerce-template">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="category_id">Category</label>
                            <select class="form-control select-picker" name="Ecommerce[category_id][]">
                                <option disabled="disabled" selected="selected">Select Category</option>
                                <?php foreach( getEcommerceCategory() as $key => $value ){ ?>
                                    <option value="<?= $key ?>" <?= set_select('Ecommerce[category_id][]', $key); ?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="category_id">Select SubCategory</label>
                            <select class="form-control select-picker" name="Ecommerce[sub_category_id][]">
                                <option disabled="disabled" selected="selected">Select SubCategory</option>
                                <?php foreach( getEcommerceSubCategory() as $key => $value ){ ?>
                                    <option value="<?= $key ?>" <?= set_select('Ecommerce[sub_category_id][]', $key); ?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="brand">Brand</label>
                            <?php if( false == boolTemporaryRemove() ) { ?>
                                <select class="form-control" name="Ecommerce[ecommerce_brand_id][]" id="ecommerce_brand_id">
                                    <option disabled="disabled" selected="selected">Select Brand</option>
                                    <?php foreach( getEcommerceBrand() as $key => $value ){ ?>
                                        <option value="<?= $key ?>" <?= set_select('Ecommerce[ecommerce_brand_id][]', $key); ?>><?= $value?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                            <input type="text" name="Ecommerce[ecommerbrand][]" class="form-control" id="brand" placeholder="Brand" value="<?= set_value('Ecommerce[brand][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Price</label>
                            <input type="text" name="Ecommerce[price][]" class="form-control" id="price" placeholder="Price" value="<?= set_value('Ecommerce[price][]') ?>">
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="images">Images</label>
                            <input type="file" name="images[]" class="form-control" id="images">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Dosage</label>
                            <input type="text" name="Ecommerce[dosage][]" class="form-control" id="dosage" placeholder="Dosage" value="<?= set_value('Ecommerce[dosage][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Weight</label>
                            <input type="text" name="Ecommerce[weight][]" class="form-control" id="weight" placeholder="Weight" value="<?= set_value('Ecommerce[weight][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Spectrum</label>
                            <input type="text" name="Ecommerce[spectrum][]" class="form-control" id="spectrum" placeholder="Spectrum" value="<?= set_value('Ecommerce[spectrum][]') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Compatibility</label>
                            <input type="text" name="Ecommerce[compatibility][]" class="form-control" id="compatibility" placeholder="Compatibility" value="<?= set_value('Ecommerce[compatibility][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Duration of Effect</label>
                            <input type="text" name="Ecommerce[duration_effect][]" class="form-control" id="duration_effect" placeholder="Duration of Effect" value="<?= set_value('Ecommerce[duration_effect][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Frequency of Application</label>
                            <input type="text" name="Ecommerce[frequency_application][]" class="form-control" id="frequency_application" placeholder="Frequency of Application" value="<?= set_value('Ecommerce[frequency_application][]') ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Applicable Crops</label>
                            <input type="text" name="Ecommerce[applicable_crops][]" class="form-control" id="applicable_crops" placeholder="Applicable Crops" value="<?= set_value('Ecommerce[applicable_crops][]') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="price">Final Remarks</label>
                            <input type="text" name="Ecommerce[final_remarks][]" class="form-control" id="applicable_crops" placeholder="Final Remarks" value="<?= set_value('Ecommerce[final_remarks][]') ?>">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="control-label" for="quality">Chemical Composition</label>
                            <input type="text" name="Ecommerce[chemical][]" class="form-control" id="chemical" placeholder="Chemical Composition" value="<?= set_value('Ecommerce[chemical][]') ?>">
                        </div>
                        
                        <div class="form-group col-md-1">
                            <label class="control-label">Remove</label>
                            <button type="button" class="btn btn-danger" onclick="removeButton(this)"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="ecommerce_count" id="ecommerce-count" value="0">
                <div class=" form-group">
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Ecommerce[category_id][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Ecommerce[sub_category_id][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Ecommerce[brand][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Ecommerce[price][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Ecommerce[weight]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('ecommerce_images[]'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
