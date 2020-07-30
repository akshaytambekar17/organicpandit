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
                            <label class="control-label label-required" for="organization_name">Organizer Name</label>
                            <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Organizer Name" value="<?= !empty($user_details['organization_name']) ? $user_details['organization_name'] : set_value('organization_name') ?>">
                            <span class="has-error"><?php echo form_error('organization_name'); ?></span>
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
    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="to_date">Date of Exhibition</label>
                            <div class="input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="date_of_exhibition" class="form-control picker-date pull-right" id="to_date" placeholder="Date of Exhibition" value="<?= ( true == isVal( $arrUserExhibitionDetails['date_of_exhibition'] ) ) ? date( 'd/m/Y', strtotime( $arrUserExhibitionDetails['date_of_exhibition'] ) ) : set_value('date_of_exhibition') ?>">
                            </div>
                            <span class="has-error"><?php echo form_error('date_of_exhibition'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="about_exhibition">About Exhibition</label>
                            <input type="text" name="about_exhibition"  class="form-control" id="about_exhibition" placeholder="About Exhibition" value="<?= ( true == isVal( $arrUserExhibitionDetails['about_exhibition'] ) ) ? $arrUserExhibitionDetails['about_exhibition'] : set_value('about_exhibition') ?>">
                            <span class="has-error"><?php echo form_error('about_exhibition'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="participate">Who Should Participate</label>
                            <input type="text" name="participate"  class="form-control" id="participate" placeholder="Who Should Participate" value="<?= ( true == isVal( $arrUserExhibitionDetails['participate'] ) ) ? $arrUserExhibitionDetails['participate'] : set_value('participate') ?>">
                            <span class="has-error"><?php echo form_error('participate'); ?></span>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="visitor_fees">Visitor Fees</label>
                            <input type="text" name="visitor_fees"  class="form-control" id="visitor_fees" placeholder="Visitor Fees" value="<?= ( true == isVal( $arrUserExhibitionDetails['visitor_fees'] ) ) ? $arrUserExhibitionDetails['visitor_fees'] : set_value('visitor_fees') ?>">
                            <span class="has-error"><?php echo form_error('visitor_fees'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="exhibition_images">Upload Images</label>
                            <input type="file" name="exhibition_images[]" class="form-control" multiple="multiple">
                             <?php if( true == isset( $arrstrExhibitionImages ) && true == isArrVal( $arrstrExhibitionImages ) ) { ?>
                                    <br>
                                    <?php foreach( $arrstrExhibitionImages as $strExhibitionImage ) { ?>
                                    <img src="<?= base_url()?>assets/images/exhibition_images/<?= $strExhibitionImage; ?>" width="70px" height="70px" style="margin: 0px 10px">    
                                    <?php } ?>
                                    <input type="hidden" name="exhibition_images_hidden" value="<?= implode( ',', $arrstrExhibitionImages )?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('exhibition_images'); ?></span>
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
                    <input type="hidden" name="user_exhibition_id" value="<?= ( true == isVal( $arrUserExhibitionDetails['user_exhibition_id'] ) ) ? $arrUserExhibitionDetails['user_exhibition_id'] : 0 ?>">
                </div>
            </div>
        </div>
    </div>
</div>
