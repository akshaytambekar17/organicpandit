<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-list">Users List</a></li>
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
    <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) || ( true == isset( $strValidationErrorMessage ) && true == isStrVal( $strValidationErrorMessage ) ) ) {
            if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) {
                $strErrorMessage = $this ->session->flashdata( 'Error' );
            } else {
                if( true == isset( $strValidationErrorMessage ) && true == isStrVal( $strValidationErrorMessage ) ) {
                    $strErrorMessage = $strValidationErrorMessage;
                }
            }
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
                    <div class="box-header"></div>
                    <form  method="post" enctype="multipart/form-data" name="user-registration-form" id="js-user-registration-form" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Partner With Us</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="partner_type_id">Partner Type</label>
                                                    <select class="form-control select2" name="partner_type_id" id="js-partner-type-id" >
                                                        <option selected="selected" disabled="disabled" >Select Partner Type</option>
                                                        <?php foreach( $arrUserTypeList as $arrPartnerUserTypeDetails ) { ?>
                                                                <option value="<?= $arrPartnerUserTypeDetails['id'] ?>" <?= set_select('partner_type_id', $arrPartnerUserTypeDetails['id'] ); ?>> <?= $arrPartnerUserTypeDetails['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('partner_type_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="partner_user_id">Partner Name</label>
                                                    <select class="form-control select2" name="partner_user_id" id="js-partner-user-id">
                                                        <option selected="selected" disabled="disabled" >Select Partner Name</option>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('partner_user_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label label-required" >User Type</label>
                                                    <input type="text" class="form-control"  value="<?= $arrUserTypeDetails['name']?>" disabled="disabled">
                                                    <span class="has-error"><?php echo form_error('user_type_id'); ?></span>
                                                    <input type="hidden" value="<?= $arrUserTypeDetails['id']?>" name="user_type_id" id="js-user-type-id">
                                                </div>
                                            </div>
                                            <?php if( ADMINUSERNAME == $arrUserSession['username'] ){ ?>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label label-required" for="password">Password</label>
                                                        <input type="password" class="form-control" name="password" value="<?= set_value( 'password' )?>" >
                                                        <span class="has-error"><?php echo form_error('password'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label label-required" for="partner_user_id">Confirm Password</label>
                                                        <input type="password" class="form-control" name="confirm_password" value="<?= set_value( 'confirm_password' )?>" >
                                                        <span class="has-error"><?php echo form_error('confirm_password'); ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo ViewUserRegistration( $arrUserTypeDetails, $arrData );  ?>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Bank Details</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group col-md-3">
                                                <label class="control-label" for="bank_name">Bank Name</label>
                                                <input type="text" name="Bank[bank_name]" class="form-control" id="bank_name" placeholder="Bank Name" value="<?= set_value('Bank[bank_name]') ?>">
                                                <span class="has-error"><?php echo form_error('Bank[bank_name]'); ?></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label" for="account_holder_name">Account Holder Name</label>
                                                <input type="text" name="Bank[account_holder_name]" class="form-control" id="account_holder_name" placeholder="Account Holder Name" value="<?= set_value('Bank[account_holder_name]')?>">
                                                <span class="has-error"><?php echo form_error('Bank[account_holder_name]'); ?></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label" for="account_no">Account Number</label>
                                                <input type="text" name="Bank[account_no]" class="form-control" id="account_no" placeholder="Account Number" value="<?= set_value('Bank[account_no]')?>">
                                                <span class="has-error"><?php echo form_error('Bank[account_no]'); ?></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label" for="ifsc_code">IFSC Code</label>
                                                <input type="text" name="Bank[ifsc_code]" class="form-control" id="ifsc_code" placeholder="IFSC Code" value="<?= set_value('Bank[ifsc_code]')?>">
                                                <span class="has-error"><?php echo form_error('Bank[ifsc_code]'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="js-submit">Submit</button>
                            <a href="<?= base_url() ?>admin/user/user-list" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
    <script>
        $(document).ready(function () {
            var todayDate = currentDate();
            $('.js-picker-date').datepicker({
                    format : 'dd/mm/yyyy',
                    autoclose: true,
                    //startDate: new Date()
                    startDate: '01/01/2017',
                    setDate: todayDate
            });
            
            $( "#js-email-id" ).on('focusout',function(){
                var strEmail = $( this ).val();
                var result = validateEmail( strEmail );
                if( result ){
                    $( "#js-error-email-id" ).text("");
                }else{
                    $( "#js-error-email-id" ).text("In Valid");
                }
            });
            $( "#js-partner-type-id" ).on('change',function(){
                var intPartnerTypeId = $(this).val();
                getPartnerUserDetails( intPartnerTypeId );
            });
            
            var intCountryId = $( '#js-country-id' ).val();
            if( null != intCountryId && 'null' != intCountryId && '' != intCountryId ) {
                getStatesByCountry( intCountryId );
            }
            $(document).on('change', '#js-country-id', function() {
                var intCountryId = $( this ).val();
                getStatesByCountry( intCountryId );
            });
            
            var intStateId = $( '#js-state-id' ).val();
            if( null != intStateId && 'null' != intStateId && '' != intStateId ) { 
                getCitiesByState( intStateId );
            }
            
            $(document).on( 'change', '#js-state-id', function(){
                var intStateId = $( this ).val();
                getCitiesByState( intStateId );
            });
        });
        
        function currentDate() {
            var date = new Date();
            var todayDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            return todayDate;
        }
        
        function getPartnerUserDetails(partnerTypeId, partnerUserId = '') {
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "get-partner-user-details",
                data: { 'partner_type_id' : partnerTypeId, 'partner_user_id_hidden': partnerUserId  },
                dataType: "html",
                success: function(result){
                    var html = $.parseJSON(result);
                    $("#js-partner-user-id").html('<option disabled selected> Select Partner Name</option>');
                    $("#js-partner-user-id").append(html);
                }
            });
        }
        
        function getUserTypeDetails( intUserTypeId ) {
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-registration-user-type-details",
                data: { 'user_type_id' : intUserTypeId },
                dataType: "html",
                success: function( strResponse ) {
                    $( "#js-user-type-details" ).html( strResponse );
                    $( '.select2' ).select2();
                }
            });
        }
    </script>
