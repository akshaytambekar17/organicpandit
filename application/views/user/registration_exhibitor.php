<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Information</h3>
            </div>
<!--            <div class="box-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="fullname" >Fullname</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="Fullname" value="<?= set_value('fullname') ?>">
                            <span class="has-error"><?php //echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="ceo_name">Director/CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="Director/CEO Name" value="<?= set_value('ceo_name')?>">
                            <span class="has-error"><?php //echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="organization_name">Company Name</label>
                            <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Company Name" value="<?= set_value('organization_name')?>">
                            <span class="has-error"><?php //echo form_error('organization_name'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= set_value('username') ?>">
                            <span class="has-error"><?php //echo form_error('username'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email_id" >Email Id</label>
                            <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= set_value('email_id') ?>">
                            <span class="has-error"><?php //echo form_error('email_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="password">Password</label>
                            <input type="password" name="password"  class="form-control" id="password" placeholder="Password" value="<?= set_value('password') ?>">
                            <span class="has-error"><?php //echo form_error('password'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="confirm-password">Confirm Password</label>
                            <input type="password" name="confirm_password"  class="form-control" id="confirm_password" placeholder="Confirm Password" value="<?= set_value('confirm_password') ?>">
                            <span class="has-error"><?php //echo form_error('confirm_password'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile_no">Mobile number</label>
                            <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= set_value('mobile_no') ?>">
                            <span class="has-error"><?php //echo form_error('mobile_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= set_value('landline_no') ?>">
                            <span class="has-error"><?php //echo form_error('landline_no'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= set_value('gst_number') ?>">
                            <span class="has-error"><?php //echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="aadhar_number">Aadhar Card Number</label>
                            <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= set_value('aadhar_number') ?>">
                            <span class="has-error"><?php //echo form_error('aadhar_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= set_value('website')?>">
                            <span class="has-error"><?php //echo form_error('website'); ?></span>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                        <select class="form-control select2" name="agency_id">
                            <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                            <?php //foreach ($agencies_list as $value) { ?>
                                <option value="<?php // $value['id'] ?>" <?php // set_select('agency_id', $value['id']); ?>><?php // $value['agency_name'] ?></option>
                            <?php //} ?>
                        </select>
                        <span class="has-error"><?php //echo form_error('agency_id'); ?></span>
                        
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="country_id">Select Country</label>
                            <select class="form-control select2" name="country_id" id="js-country-id">
                                <option disabled="disabled" selected="selected" >Select Country</option>
                                <?php //foreach( $arrCountriesList as $arrCountryDetails ) { ?>
                                    <option value="<?php // $arrCountryDetails['id'] ?>" <?php // set_select('country_id', $arrCountryDetails['id']); ?> ><?php // $arrCountryDetails['name'] ?></option>
                                <?php //} ?>
                            </select>
                            <span class="has-error"><?php //echo form_error('country_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="state_id">Select State</label>
                            <select class="form-control select2" name="state_id" id="js-state-id">
                                <option disabled="disabled" selected="selected">Select State</option>
                            </select>
                            <span class="has-error"><?php //echo form_error('state_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="city_id">Select City</label>
                            <select class="form-control select2" name="city_id" id="js-city-id">
                                <option disabled="disabled" selected="selected">Select City</option>
                            </select>
                            <span class="has-error"><?php //echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?php // set_value('address') ?>">
                            <span class="has-error"><?php //echo form_error('address'); ?></span>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?php // set_value('story') ?>">
                            <span class="has-error"><?php //echo form_error('story'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                            <input type="file" name="profile_image" class="form-control" id="profile_image">
                            <span class="has-error"><?php //echo form_error('profile_image'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="company_image">Choose Company Image</label>
                            <input type="file" name="company_image" class="form-control" id="company_image">
                            <span class="has-error"><?php //echo form_error('company_image'); ?></span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="video">Choose Video</label>
                            <input type="file" name="video" class="form-control" id="video">
                            <span class="has-error"><?php //echo form_error('video'); ?></span>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="box-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="fullname" >Fullname</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="Fullname" value="<?= set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="organization_name">Organizer Name</label>
                            <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Organizer Name" value="<?= set_value('organization_name')?>">
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
                            <span class="has-error"><?php echo form_error('password'); ?></span>
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
                            <label class="control-label" for="to_date">Date of Exhibition</label>
                            <div class="input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="date_of_exhibition" class="form-control picker-date pull-right" id="to_date" placeholder="Date of Exhibition" value="<?= set_value('date_of_exhibition') ?>">
                            </div>
                            <span class="has-error"><?php echo form_error('date_of_exhibition'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="about_exhibition">About Exhibition</label>
                            <input type="text" name="about_exhibition"  class="form-control" id="about_exhibition" placeholder="About Exhibition" value="<?= set_value('about_exhibition') ?>">
                            <span class="has-error"><?php echo form_error('about_exhibition'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="participate">Who Should Participate</label>
                            <input type="text" name="participate"  class="form-control" id="participate" placeholder="Who Should Participate" value="<?= set_value('participate') ?>">
                            <span class="has-error"><?php echo form_error('participate'); ?></span>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="visitor_fees">Visitor Fees</label>
                            <input type="text" name="visitor_fees"  class="form-control" id="visitor_fees" placeholder="Visitor Fees" value="<?= set_value('visitor_fees') ?>">
                            <span class="has-error"><?php echo form_error('visitor_fees'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="exhibition_images">Upload Images</label>
                            <input type="file" name="exhibition_images[]" class="form-control" multiple="multiple">
                            <span class="has-error"><?php echo form_error('exhibition_images'); ?></span>
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
</div>
