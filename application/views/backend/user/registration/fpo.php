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
                            <label class="control-label label-required" for="fullname" >FPO Name</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="FPO Name" value="<?= !empty( $arrUserDetails['fullname']) ? $arrUserDetails['fullname'] : set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="ceo_name">CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="CEO Name" value="<?= !empty($arrUserDetails['ceo_name'])?$arrUserDetails['ceo_name']:set_value('ceo_name') ?>">
                            <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($arrUserDetails['username'])?$arrUserDetails['username']:set_value('username') ?>">
                            <span class="has-error"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email_id" >Email Id</label>
                            <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= !empty($arrUserDetails['email_id'])?$arrUserDetails['email_id']:set_value('email_id') ?>">
                            <span class="has-error"><?php echo form_error('email_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile_no">Mobile number</label>
                            <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= !empty($arrUserDetails['mobile_no'])?$arrUserDetails['mobile_no']:set_value('mobile_no') ?>">
                            <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= !empty($arrUserDetails['landline_no'])?$arrUserDetails['landline_no']:set_value('landline_no') ?>">
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
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($arrUserDetails['address'])?$arrUserDetails['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                            <select class="form-control select2" name="agency_id">
                                <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                                <?php foreach( $arrCertitificationAgenicesList as $arrCertitificationAgenicyDetails ) { ?>
                                    <option value="<?= $arrCertitificationAgenicyDetails['user_id'] ?>" <?= set_select('agency_id', $arrCertitificationAgenicyDetails['user_id']); ?> ><?= $arrCertitificationAgenicyDetails['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($arrUserDetails['gst_number'])?$arrUserDetails['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="pancard_number">Pan Card Number</label>
                            <input type="text" name="pancard_number" class="form-control" id="pancard_number" placeholder="Pan Card Number" value="<?= !empty($arrUserDetails['pancard_number'])?$arrUserDetails['pancard_number']:set_value('pancard_number') ?>">
                            <span class="has-error"><?php echo form_error('pancard_number'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($arrUserDetails['story'])?$arrUserDetails['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_visit_farm">Can we visit your farm</label>
                            <select class="form-control select2" name="is_visit_farm" id="is_visit_farm">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $arrUserDetails['is_visit_farm'] == 2 ?'selected="selected"':''  ?> >Yes</option>
                                <option value="1" <?= $arrUserDetails['is_visit_farm'] == 1 ?'selected="selected"':''; ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_visit_farm'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_test_report">Can you provide test report</label>
                            <select class="form-control select2" name="is_test_report" id="is_test_report">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $arrUserDetails['is_test_report'] == 2 ?'selected="selected"':''?> >Yes</option>
                                <option value="1" <?= $arrUserDetails['is_test_report'] == 1 ?'selected="selected"':'' ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_test_report'); ?></span>
                            <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="certification_id">Select Certification</label>
                            <select class="form-control select2" name="certification_id[]" id="certification_id" multiple="multiple" >
                                <option disabled="disabled" selected="selected">Select Certification</option>
                                <?php foreach( getCertifications() as $key => $value ) { ?>
                                    <option value="<?= $key ?>" <?= set_select('certification_id[]', $key); ?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('certification_id[]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Certification Number</label>
                            <input type="text" name="certification_number" class="form-control" id="certification_number" placeholder="Certification Number" value="<?= !empty($arrUserDetails['certification_number'])?$arrUserDetails['certification_number']:set_value('certification_number') ?>">
                            <span class="has-error"><?php echo form_error('certification_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="total_farmer">Number of Farmer</label>
                            <select class="form-control select2" name="total_farmer" id="total_farmer">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <?php foreach (getTotalFarmer() as $key => $value) { 
                                        if(!empty($arrUserDetails['total_farmer'])){
                                            $selected = $arrUserDetails['total_farmer'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('total_farmer', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('total_farmer'); ?></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                            <input type="file" name="profile_image" class="form-control" id="profile_image">
                            <?php if(!empty($arrUserDetails['profile_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $arrUserDetails['profile_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="profile_image_hidden" value="<?= $arrUserDetails['profile_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                        </div>        
                        <div class="form-group col-md-4">
                            <label class="control-label" for="certification_image">Choose Certification Pic</label>
                            <input type="file" name="certification_image" class="form-control" id="certification_image">
                            <?php if(!empty($arrUserDetails['certification_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $arrUserDetails['certification_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="certification_image_hidden" value="<?= $arrUserDetails['certification_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('certification_image'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="video">Choose Video</label>
                            <input type="file" name="video" class="form-control" id="video">
                            <?php if(!empty($arrUserDetails['video'])){ ?>
                                <a href="<?= base_url()?>assets/images/gallery/<?= $arrUserDetails['video']?>" download><h5>Download <?= $arrUserDetails['video']?></h5></a>
                                <input type="hidden" name="video_hidden" value="<?= $arrUserDetails['video']?>">
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('video'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>