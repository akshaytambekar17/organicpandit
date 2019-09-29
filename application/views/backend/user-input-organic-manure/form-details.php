<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-input-organic-manures">User Input Organic Manures List</a></li>
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserInputOrganicManureDetails ) ) ? base_url() . 'admin/user/user-input-organic-manures/update?id=' . $arrUserInputOrganicManureDetails['id'] : base_url() . 'admin/user/user-input-organic-manures/add' ?>" name="user-crop-form">
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
                                                    if( true == isset( $arrUserInputOrganicManureDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserInputOrganicManureDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
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
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="input_date">Input Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="input_date" class="form-control picker-date pull-right" id="js-input-date" placeholder="Input Date" value="<?= ( true == isset( $arrUserInputOrganicManureDetails['input_date'] ) ) ? date( 'd/m/Y', strtotime( $arrUserInputOrganicManureDetails['input_date'] ) ) : set_value('input_date') ?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('input_date'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="input_name">Input Name</label>
                                    <input type="text" name="input_name" class="form-control" id="js-input-name" placeholder="Input Name" value="<?= ( true == isset( $arrUserInputOrganicManureDetails['input_name'] ) ) ? $arrUserInputOrganicManureDetails['input_name'] : set_value('input_name') ?>">
                                    <span class="has-error"><?php echo form_error('input_name'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="supplier_name">Supplier Name</label>
                                    <input type="text" name="supplier_name" class="form-control" id="js-crop-condition" placeholder="Supplier Name" value="<?= ( true == isset( $arrUserInputOrganicManureDetails['supplier_name'] ) ) ? $arrUserInputOrganicManureDetails['supplier_name'] : set_value('supplier_name') ?>">
                                    <span class="has-error"><?php echo form_error('supplier_name'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="description">Total Area (in acre's)</label>
                                    <select class="form-control select2" name="total_area" style="width:100%">
                                        <option disabled="disabled" selected="selected" >Select Acre's</option>
                                        <?php foreach( getAreaInNumber() as $intArea ) { 
                                                $strSelected = '';
                                                if( true == isset( $arrUserInputOrganicManureDetails['total_area'] )  ) {
                                                    $strSelected = ( $arrUserInputOrganicManureDetails['total_area'] == $intArea ) ? 'selected="selected"' : '';
                                                }
                                        ?>
                                                <option value="<?= $intArea ?>" <?= set_select('total_area', $intArea ); ?> <?= $strSelected; ?> ><?= $intArea ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('total_area'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="other_details">Other Details</label>
                                    <input type="text" name="other_details" class="form-control" id="js-other-details" placeholder="Other Details" value="<?= ( true == isset( $arrUserInputOrganicManureDetails['other_details'] ) ) ? $arrUserInputOrganicManureDetails['other_details'] : set_value('other_details') ?>">
                                    <span class="has-error"><?php echo form_error('other_details'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserInputOrganicManureDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $arrUserInputOrganicManureDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-input-organic-manures" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
