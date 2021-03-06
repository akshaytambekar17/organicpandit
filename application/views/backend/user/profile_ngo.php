<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Information</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="fullname" >Fullname</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="Fullname" value="<?= !empty($user_details['fullname']) ? $user_details['fullname'] : set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($user_details['username'])?$user_details['username']:set_value('username') ?>" readonly>
                            <span class="has-error"><?php echo form_error('username'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email_id" >Email Id</label>
                            <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= !empty($user_details['email_id'])?$user_details['email_id']:set_value('email_id') ?>">
                            <span class="has-error"><?php echo form_error('email_id'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile_no">Mobile number</label>
                            <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= !empty($user_details['mobile_no'])?$user_details['mobile_no']:set_value('mobile_no') ?>">
                            <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= !empty($user_details['landline_no'])?$user_details['landline_no']:set_value('landline_no') ?>">
                            <span class="has-error"><?php echo form_error('landline_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= !empty($user_details['website'])?$user_details['website']:set_value('website') ?>">
                            <span class="has-error"><?php echo form_error('website'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($user_details['gst_number'])?$user_details['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="aadhar_number">Aadhar Card Number</label>
                            <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= !empty($user_details['aadhar_number'])?$user_details['aadhar_number']:set_value('aadhar_number') ?>">
                            <span class="has-error"><?php echo form_error('aadhar_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($user_details['story'])?$user_details['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="country_id">Select Country</label>
                            <select class="form-control select2" name="country_id" id="js-country-id">
                                <option disabled="disabled" selected="selected" >Select Country</option>
                                <?php foreach( $arrCountriesList as $arrCountryDetails ) { 
                                        $strSelected = '';
                                        if( ( true == isset( $user_details['country_id'] ) ) && $arrCountryDetails['id'] == $user_details['country_id']  ) {
                                            $strSelected = 'selected="selected"';                                
                                        }
                                ?>
                                    <option value="<?= $arrCountryDetails['id'] ?>" <?= $strSelected; ?> <?= set_select('country_id', $arrCountryDetails['id']); ?> ><?= $arrCountryDetails['name'] ?></option>
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
                            <select class="form-control select2" name="city_id" id="js-city-id" data-test="1">
                                <option disabled="disabled" selected="selected">Select City</option>
                            </select>
                            <span class="has-error"><?php echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($user_details['address'])?$user_details['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
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
                        <br><br>
                    </div>-->
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                            <input type="file" name="profile_image" class="form-control" id="profile_image">
                            <?php if(!empty($user_details['profile_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['profile_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="profile_image_hidden" value="<?= $user_details['profile_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                        </div>        
                        <div class="form-group col-md-4">
                            <label class="control-label" for="company_image">Choose Company Image</label>
                            <input type="file" name="company_image" class="form-control" id="company_image">
                            <?php if(!empty($user_details['company_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['company_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="company_image_hidden" value="<?= $user_details['company_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('company_image'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="video">Choose Video</label>
                            <input type="file" name="video" class="form-control" id="video">
                            <?php if(!empty($user_details['video'])){ ?>
                                <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['video']?>" download><h5>Download <?= $user_details['video']?></h5></a>
                                <input type="hidden" name="video_hidden" value="<?= $user_details['video']?>">
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('video'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
