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
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= set_value('username') ?>">
                            <span class="has-error"><?php echo form_error('username'); ?></span>
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
                            <label class="control-label label-required" for="contact_person">Contact Person Name</label>
                            <input type="text" name="contact_person"  class="form-control" id="contact_person" placeholder="Contact Person Name" value="<?= set_value('contact_person') ?>">
                            <span class="has-error"><?php echo form_error('contact_person'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile1">Mobile number1</label>
                            <input type="text" name="mobile1"  class="form-control" id="mobile1" placeholder="Mobile number1" value="<?= set_value('mobile1') ?>">
                            <span class="has-error"><?php echo form_error('mobile1'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="mobile2">Mobile number2</label>
                            <input type="text" name="mobile2"  class="form-control" id="mobile2" placeholder="Mobile number2" value="<?= set_value('mobile2') ?>">
                            <span class="has-error"><?php echo form_error('mobile2'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="landline">Landline number</label>
                            <input type="text" name="landline"  class="form-control" id="landline" placeholder="Landline number" value="<?= set_value('landline') ?>">
                            <span class="has-error"><?php echo form_error('landline'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email1">Email Id1</label>
                            <input type="text" name="email1" class="form-control" id="email1" placeholder="Email Id1" value="<?= set_value('email1') ?>">
                            <span class="has-error"><?php echo form_error('email1'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="email2">Email Id2</label>
                            <input type="text" name="email2" class="form-control" id="email2" placeholder="Email Id2" value="<?= set_value('email2') ?>">
                            <span class="has-error"><?php echo form_error('email2'); ?></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label label-required">Website</label>
                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= set_value('website') ?>">
                            <span class="has-error"><?php echo form_error('website'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required">Licence Number</label>
                            <input type="text" name="licence_no" class="form-control" id="licence_no" placeholder="Licence number" value="<?= set_value('licence_no') ?>">
                            <span class="has-error"><?php echo form_error('licence_no'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>