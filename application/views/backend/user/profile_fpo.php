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
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="FPO Name" value="<?= !empty($user_details['fullname'])?$user_details['fullname']:set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="ceo_name">CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="CEO Name" value="<?= !empty($user_details['ceo_name'])?$user_details['ceo_name']:set_value('ceo_name') ?>">
                            <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($user_details['username'])?$user_details['username']:set_value('username') ?>" readonly>
                            <span class="has-error"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email_id" >Email Id</label>
                            <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= !empty($user_details['email_id'])?$user_details['email_id']:set_value('email_id') ?>">
                            <span class="has-error"><?php echo form_error('email_id'); ?></span>
                        </div>
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                            <select class="form-control select2" name="agency_id">
                                <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                                <?php foreach ($certification_agencies_list as $value) { 
                                        if(!empty($user_details['agency_id'])){
                                            $selected = $user_details['agency_id'] == $value['user_id']?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $value['user_id'] ?>" <?= set_select('agency_id', $value['user_id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="state_id">Select State</label>
                            <select class="form-control select2" name="state_id" id="state_id">
                                <option disabled="disabled" selected="selected">Select State</option>
                                <?php foreach ($state_list as $value) { 
                                        if(!empty($user_details['state_id'])){
                                            $selected = $user_details['state_id'] == $value['id']?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $value['id'] ?>" <?= set_select('state_id', $value['id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('state_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="city_id">Select City</label>
                            <select class="form-control select2" name="city_id" id="city_id">
                                <option disabled="disabled" selected="selected">Select City</option>
                            </select>
                            <input type="hidden" name="city_id_hidden" value="<?= $user_details['city_id']?>" id="city-id-hidden">
                            <span class="has-error"><?php echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($user_details['address'])?$user_details['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($user_details['gst_number'])?$user_details['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="pancard_number">Pan Card Number</label>
                            <input type="text" name="pancard_number" class="form-control" id="pancard_number" placeholder="Pan Card Number" value="<?= !empty($user_details['pancard_number'])?$user_details['pancard_number']:set_value('pancard_number') ?>">
                            <span class="has-error"><?php echo form_error('pancard_number'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($user_details['story'])?$user_details['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_visit_farm">Can we visit your farm</label>
                            <select class="form-control select2" name="is_visit_farm" id="is_visit_farm">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $user_details['is_visit_farm'] == 2 ?'selected="selected"':''  ?> >Yes</option>
                                <option value="1" <?= $user_details['is_visit_farm'] == 1 ?'selected="selected"':''; ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_visit_farm'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_test_report">Can you provide test report</label>
                            <select class="form-control select2" name="is_test_report" id="is_test_report">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $user_details['is_test_report'] == 2 ?'selected="selected"':''?> >Yes</option>
                                <option value="1" <?= $user_details['is_test_report'] == 1 ?'selected="selected"':'' ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_test_report'); ?></span>
                            <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="certification_id">Select Certification</label>
                            <select class="form-control select2" name="certification_id[]" id="certification_id">
                                <option disabled="disabled" selected="selected">Select Certification</option>
                                <?php foreach (getCertifications() as $key => $value) { 
                                        if(!empty($user_details['certification_id'])){
                                            $selected = $user_details['certification_id'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('certification_id[]', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <?php if( true == isVal( $strUserCertificationName ) ){ ?>
                                    <p><?= $strUserCertificationName; ?></p>
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('certification_id[]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Certification Number</label>
                            <input type="text" name="certification_number" class="form-control" id="certification_number" placeholder="Certification Number" value="<?= !empty($user_details['certification_number'])?$user_details['certification_number']:set_value('certification_number') ?>">
                            <span class="has-error"><?php echo form_error('certification_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="total_farmer">Number of Farmer</label>
                            <select class="form-control select2" name="total_farmer" id="total_farmer">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <?php foreach (getTotalFarmer() as $key => $value) { 
                                        if(!empty($user_details['total_farmer'])){
                                            $selected = $user_details['total_farmer'] == $key?'selected="selected"':'';                                
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
                            <?php if(!empty($user_details['profile_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['profile_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="profile_image_hidden" value="<?= $user_details['profile_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                        </div>        
                        <div class="form-group col-md-4">
                            <label class="control-label" for="certification_image">Choose Certification Pic</label>
                            <input type="file" name="certification_image" class="form-control" id="certification_image">
                            <?php if(!empty($user_details['certification_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['certification_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="certification_image_hidden" value="<?= $user_details['certification_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('certification_image'); ?></span>
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