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
                            <label class="control-label label-required" for="ceo_name">Director/CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="Director/CEO Name" value="<?= !empty($user_details['ceo_name']) ? $user_details['ceo_name'] : set_value('ceo_name') ?>">
                            <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="organization_name">Company Name</label>
                            <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Company Name" value="<?= !empty($user_details['organization_name']) ? $user_details['organization_name'] : set_value('organization_name') ?>">
                            <span class="has-error"><?php echo form_error('organization_name'); ?></span>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile_no">Mobile number</label>
                            <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= !empty($user_details['mobile_no'])?$user_details['mobile_no']:set_value('mobile_no') ?>">
                            <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= !empty($user_details['landline_no'])?$user_details['landline_no']:set_value('landline_no') ?>">
                            <span class="has-error"><?php echo form_error('landline_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($user_details['gst_number'])?$user_details['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="aadhar_number">Aadhar Card Number</label>
                            <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= !empty($user_details['aadhar_number'])?$user_details['aadhar_number']:set_value('aadhar_number') ?>">
                            <span class="has-error"><?php echo form_error('aadhar_number'); ?></span>
                        </div>
                    </div>
                    <div class="row">    
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
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($user_details['address'])?$user_details['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= !empty($user_details['website'])?$user_details['website']:set_value('website') ?>">
                            <span class="has-error"><?php echo form_error('website'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($user_details['story'])?$user_details['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
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
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="product_catalogue">Upload Product Catalogue</label>
                            <input type="file" name="product_catalogue" class="form-control" id="product_catalogue">
                            <?php if(!empty($user_details['product_catalogue'])){ ?>
                                <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['product_catalogue']?>" download><h5>Download <?= $user_details['product_catalogue']?></h5></a>
                                <input type="hidden" name="product_catalogue_hidden" value="<?= $user_details['product_catalogue']?>">
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('product_catalogue'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
