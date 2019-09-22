<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-soils">User Soil List</a></li>
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserSoilDetails ) ) ? base_url() . 'admin/user/user-soils/update?id=' . $arrUserSoilDetails['id'] : base_url() . 'admin/user/user-soils/add' ?>" name="user-soil-form">
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
                                                    if( true == isset( $arrUserSoilDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserSoilDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
                                                    }
                                            ?>      
                                                    <option value="<?= $arrUserDetails['user_id'] ?>" <?= set_select('user_id', $arrUserDetails['user_id']); ?> <?= $strSelected ?>><?= $arrUserDetails['fullname'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('user_id'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="element">Select Element</label>
                                    <select class="form-control select2" name="element">
                                        <option disabled="disabled" selected="selected">Select Element</option>
                                        <?php foreach( getSoilElement() as $intSoilElementKey => $strSoilElementValue ) {
                                                if( true == isset( $arrUserSoilDetails['element'] ) ) {
                                                    $strSelected = ( $arrUserSoilDetails['element'] == $intSoilElementKey ) ? 'selected="selected"' : '';                                
                                                }
                                        ?>      
                                                <option value="<?= $intSoilElementKey ?>" <?= set_select('element', $intSoilElementKey ); ?> <?= $strSelected ?>><?= $strSoilElementValue ?></option>
                                        <?php } ?>    
                                                
                                    </select>
                                    <span class="has-error"><?php echo form_error('element'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="percentage">Select Percentage</label>
                                    <select class="form-control select2" name="percentage">
                                        <option disabled="disabled" selected="selected">Select Percentage</option>
                                        <?php foreach( getSoilPercentage() as $intSoilPercentageKey => $strSoilPercentageValue ) {
                                                if( true == isset( $arrUserSoilDetails['percentage'] ) ) {
                                                    $strSelected = ( $arrUserSoilDetails['percentage'] == $intSoilPercentageKey ) ? 'selected="selected"' : '';                                
                                                }
                                        ?>      
                                                <option value="<?= $intSoilPercentageKey ?>" <?= set_select('percentage', $intSoilPercentageKey ); ?> <?= $strSelected ?>><?= $strSoilPercentageValue ?></option>
                                        <?php } ?>    
                                                
                                    </select>
                                    <span class="has-error"><?php echo form_error('percentage'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserSoilDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $arrUserSoilDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-soils" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
