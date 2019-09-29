<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-crops">User Crop List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= $strHeading; ?></a></li>
        </ol>
    </section>
    <?php if( true == isStrVal( $this ->session->flashdata( 'Message' ) ) ) {
            $strSuccessMessage = $this ->session->flashdata( 'Message' );
    ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $strSuccessMessage ?>
            </div>
        </div>
    <?php }?>
    <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) {
            $strErrorMessage = $this ->session->flashdata( 'Error' );
    ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $strErrorMessage ?>
            </div>
        </div>
    <?php } ?>
    <section class="content js-alert-message-box">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserCropDetails ) ) ? base_url() . 'admin/user/user-crops/update?id=' . $arrUserCropDetails['id'] : base_url() . 'admin/user/user-crops/add' ?>" name="user-crop-form">
                        <div class="box-body">
                            <div class="row">
                                <?php if( ADMINUSERNAME == $arrUserSessionDetails['username'] ){  ?>
                                    <div class="form-group col-md-6">
                                        <label class="control-label label-required" for="user_id">Select User</label>
                                        <select class="form-control select2" name="user_id">
                                            <option disabled="disabled" selected="selected">Select User</option>
                                            <?php
                                                foreach( $arrUsersList as $arrUserDetails ) {
                                                    $strSelected = '';
                                                    if( true == isset( $arrUserCropDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserCropDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
                                                    }
                                            ?>      
                                                    <option value="<?= $arrUserDetails['user_id'] ?>" <?= set_select('user_id', $arrUserDetails['user_id']); ?> <?= $strSelected ?>><?= $arrUserDetails['fullname'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('user_id'); ?></span>
                                    </div>
                                <?php } else { ?>
                                        <div class="form-group col-md-6">
                                            <label class="control-label label-required" for="user_id">User</label>
                                            <input type="text" class="form-control" value="<?= $arrUserSessionDetails['fullname'] ?>" disabled="disabled">
                                            <input type="hidden" name="user_id" class="form-control" id="js-user-id" value="<?= $arrUserSessionDetails['user_id'] ?>">
                                        </div>
                                <?php } ?>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="crop_id">Select Crop</label>
                                    <select class="form-control select2" name="crop_id">
                                        <option disabled="disabled" selected="selected">Select Crop</option>
                                        <?php foreach( getCropCategory() as $arrCropCategoryKey => $arrCropCategoryValue ) { ?>
                                                <optgroup label="<?= $arrCropCategoryValue ?>">
                                                    <?php foreach( $arrCropsList as $arrCropDetails ) {
                                                            if( $arrCropDetails['crop_category_id'] == $arrCropCategoryKey ) {
                                                                $strSelected = '';
                                                                if( true == isset( $arrUserCropDetails['crop_id'] ) ) {
                                                                    $strSelected = ( $arrUserCropDetails['crop_id'] == $arrCropDetails['id'] ) ? 'selected="selected"' : '';                                
                                                                }
                                                    ?>      
                                                            <option value="<?= $arrCropDetails['id'] ?>" <?= set_select('crop_id', $arrCropDetails['id']); ?> <?= $strSelected ?>><?= $arrCropDetails['name'] ?></option>
                                                    <?php 
                                                            }
                                                        } 
                                                    ?>
                                                </optgroup>            
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('crop_id'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="description">Area (in acre's)</label>
                                    <select class="form-control select2" name="area" style="width:100%">
                                        <option disabled="disabled" selected="selected" >Select Acre's</option>
                                        <?php foreach( getAreaInNumber() as $intArea ) { 
                                                $strSelected = '';
                                                if( true == isset( $arrUserCropDetails['area'] )  ) {
                                                    $strSelected = ( $arrUserCropDetails['area'] == $intArea ) ? 'selected="selected"' : '';
                                                }
                                        ?>
                                                <option value="<?= $intArea ?>" <?= set_select('area', $intArea ); ?> <?= $strSelected; ?> ><?= $intArea ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('area'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="date_sown">Date of Sown</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="date_sown" class="form-control picker-date pull-right" id="js-date-sown" placeholder="From Date" value="<?= ( true == isset( $arrUserCropDetails['date_sown'] ) ) ? date( 'd/m/Y', strtotime( $arrUserCropDetails['date_sown'] ) ) : set_value('date_sown') ?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('date_sown'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="date_sown">Date of Harvest</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="date_harvest" class="form-control picker-date pull-right" id="js-from-date" placeholder="From Date" value="<?= ( true == isset( $arrUserCropDetails['date_harvest'] ) ) ? date( 'd/m/Y', strtotime( $arrUserCropDetails['date_harvest'] ) ) : set_value('date_harvest') ?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('date_harvest'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="to_date">Date of Inspection</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="date_inspection" class="form-control picker-date pull-right" id="js-to-date" placeholder="To Date" value="<?= ( true == isset( $arrUserCropDetails['date_inspection'] ) ) ? date( 'd/m/Y', strtotime( $arrUserCropDetails['date_inspection'] ) ) : set_value('date_inspection') ?>">
                                    </div>        
                                    <span class="has-error"><?php echo form_error('date_inspection'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="inspector_name">Crop Inspector</label>
                                    <input type="text" name="inspector_name" class="form-control" id="js-inspector-name" placeholder="Crop Inspector" value="<?= ( true == isset( $arrUserCropDetails['inspector_name'] ) ) ? $arrUserCropDetails['inspector_name'] : set_value('inspector_name') ?>">
                                    <span class="has-error"><?php echo form_error('inspector_name'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="crop_condition">Crop Condition</label>
                                    <input type="text" name="crop_condition" class="form-control" id="js-crop-condition" placeholder="Crop Condition" value="<?= ( true == isset( $arrUserCropDetails['crop_condition'] ) ) ? $arrUserCropDetails['crop_condition'] : set_value('crop_condition') ?>">
                                    <span class="has-error"><?php echo form_error('crop_condition'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="other_details">Other Details</label>
                                    <input type="text" name="other_details" class="form-control" id="js-other-details" placeholder="Other Details" value="<?= ( true == isset( $arrUserCropDetails['other_details'] ) ) ? $arrUserCropDetails['other_details'] : set_value('other_details') ?>">
                                    <span class="has-error"><?php echo form_error('other_details'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserCropDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $arrUserCropDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-crops" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
