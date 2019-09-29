<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
    <div class="content-wrapper">
        <section class="content-header">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                <?php if($user_session['username'] == ADMINUSERNAME){
                        $href = base_url().'admin/user/user-list';
                        $title_middle = 'User';
                    }else{
                        $href = base_url().'admin/dashboard';
                        $title_middle = 'Dashboard';
                    }
                ?> 
                <li><a href="<?= $href?>"><?= $title_middle?></a></li>
                <li class="active"><a href="javascript:void(0)"><?= $title?></a></li>
            </ol>
        </section>
        <?php if($message = $this ->session->flashdata('Message')){?>
            <div class="col-md-12 ">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$message ?>
                </div>
            </div>
        <?php }?> 
        <?php if($message = $this ->session->flashdata('Error')){?>
            <div class="col-md-12 ">
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?= $message ?>
                </div>
            </div>
        <?php }?>
        <section class="content alert-box">
            <div class="row">    
                <div class="col-md-12 ">
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <form  method="post" enctype="multipart/form-data" name="profile-form" id="profile-form" >
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
                                                        <select class="form-control select2" name="partner_type_id" id="js-partner-type" >
                                                            <option selected="selected" disabled="disabled" >Select Partner Type</option>
                                                            <?php foreach( $userTypeList  as $value ) { 
                                                                    $selected = '';
                                                                    if( $user_details['partner_type_id'] == $value['id'] ) {
                                                                        $selected = 'selected="selected"';
                                                                    }
                                                            ?>
                                                                    <option value="<?= $value['id'] ?>" <?= set_select('partner_type_id', $value['id'] ); ?> <?= $selected ?>><?= $value['name'] ?></option>
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
                                                        <input type="hidden" value="<?= $user_details['partner_user_id'] ?>" id="js-partner-user-id-hidden"  >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="partner_user_id">User Type</label>
                                                        <input type="text" class="form-control" value="<?= !empty( $user_type_details['name'] ) ? $user_type_details['name'] : '' ?>" disabled>
                                                    </div>
                                                </div>
                                                <?php if( ADMINUSERNAME == $user_session['username'] ){ ?>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="password">Password</label>
                                                            <input type="password" class="form-control" name="password" >
                                                            <span class="has-error"><?php echo form_error('password'); ?></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="partner_user_id">Confirm Password</label>
                                                            <input type="password" class="form-control" name="confirm_password" >
                                                            <span class="has-error"><?php echo form_error('confirm_password'); ?></span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo ViewProfile($user_type_details,$user_details); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Bank Details</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="bank_name">Bank Name</label>
                                                    <input type="text" name="Bank[bank_name]" class="form-control" id="bank_name" placeholder="Bank Name" value="<?= !empty($user_bank_details['bank_name'])?$user_bank_details['bank_name']:set_value('Bank[bank_name]')?>">
                                                    <span class="has-error"><?php echo form_error('Bank[bank_name]'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="account_holder_name">Account Holder Name</label>
                                                    <input type="text" name="Bank[account_holder_name]" class="form-control" id="account_holder_name" placeholder="Account Holder Name" value="<?= !empty($user_bank_details['account_holder_name'])?$user_bank_details['account_holder_name']:set_value('Bank[account_holder_name]')?>">
                                                    <span class="has-error"><?php echo form_error('Bank[account_holder_name]'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="account_no">Account Number</label>
                                                    <input type="text" name="Bank[account_no]" class="form-control" id="account_no" placeholder="Account Number" value="<?= !empty($user_bank_details['account_no'])?$user_bank_details['account_no']:set_value('Bank[account_no]')?>">
                                                    <span class="has-error"><?php echo form_error('Bank[account_no]'); ?></span>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="ifsc_code">IFSC Code</label>
                                                    <input type="text" name="Bank[ifsc_code]" class="form-control" id="ifsc_code" placeholder="IFSC Code" value="<?= !empty($user_bank_details['ifsc_code'])?$user_bank_details['ifsc_code']:set_value('Bank[ifsc_code]')?>">
                                                    <span class="has-error"><?php echo form_error('Bank[ifsc_code]'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_type_id" value="<?= $user_type_details['id']?>" >
                            <input type="hidden" name="user_id" value="<?= $user_details['user_id']?>" >
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                <?php if($user_session['username'] == ADMINUSERNAME){ 
                                        $href = base_url().'admin/user';
                                    }else{
                                        $href = base_url().'admin/dashboard';
                                    }
                                ?>
                                <a href="<?= $href; ?>" class="btn btn-warning">Cancel</a>
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
            $('.picker-date').datepicker({
                    format : 'dd/mm/yyyy',
                    autoclose: true,
                    //startDate: new Date()
                    startDate: '01/01/2017',
                    setDate: todayDate
            });
            
            $("#quantity").on('focusout',function(){
                var price = $("#price").val();
                var quantity = $(this).val();
                if(price != '' &&  quantity !=''){
                    var total_price = parseInt(price) * parseInt(quantity);
                    $("#total_price").val(total_price);
                }else{
                    $("#total_price").val(0);
                }
            });
            $("#price").on('focusout',function(){
                var quantity = $("#quantity").val();
                var price = $(this).val();
                if(price != '' &&  quantity !=''){
                    var total_price = parseInt(price) + parseInt(quantity);
                    $("#total_price").val(total_price);
                }else{
                    $("#total_price").val(0);
                }
            });
            $("#state_id").on('change',function(){
                var state_id = $(this).val();
                getCitiesByState(state_id);
            });
            var state_id = $("#state_id").val();
            var city_id_hidden = $("#city-id-hidden").val();
            if(state_id != ''){
                getCitiesByState(state_id,city_id_hidden);
            }
            $(".addButton").on('click',function() {
                var count = $("#product-count").val();
                var total_count = parseInt(count) + 1; 
                var $template = $('#optionTemplate'),
                $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
                $option   = $clone.find('[name="from_date[]"] , [name="to_date[]"]');
                $option_select = $clone.find('[name="Product[product_id][]"]');
                $option_select.attr('id','select-picker-'+total_count);
                $("#product-count").val(total_count);
                $("#select-picker-"+total_count).select2();
                $('.picker-date').datepicker({
                    dateFormat : 'dd/mm/yyyy',
                    autoclose: true,
                    //startDate: new Date()
                    startDate: '01/01/2017',
                    setDate: todayDate
                });
            });
            $(".add-crop-button").on('click',function() {
                var count = $("#crop-count").val();
                var total_count = parseInt(count) + 1; 
                var $template = $('#template-crop'),
                $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
                $option_select = $clone.find('[name="Crop[crop_id][]"]');
                $option_select.attr('id','crop-select-picker-'+total_count);
                $( "#crop-select-picker-" + total_count).select2();
                $selectArea = $clone.find('[name="Crop[area][]"]');
                $selectArea.attr( 'id','js-crop-area-select-' + total_count );
                $( "#js-crop-area-select-" + total_count).select2();
                $('.picker-date').datepicker({
                    format : 'dd/mm/yyyy',
                    autoclose: true,
                    //startDate: new Date()
                    startDate: '01/01/2017',
                    setDate: todayDate
                });
                
            });
            $(".add-soil-button").on('click',function() {
                //soil-count
                var $template = $('#template-soil'),
                $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
//                $option_element = $clone.find('[name="Soil[element][]"]');
//                $option_percentage = $clone.find('[name="so[percentage][]"]');
//                $option_select.attr('id','crop-select-picker-'+total_count);
            });
            
            $(".add-micro-button").on('click',function() {
                var $template = $('#template-micro'),
                $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
            });
            
            $( ".js-add-input-organic-button" ).on('click',function() {
                var todayDate = currentDate();
                var count = $("#js-input-organic-count").val();
                var totalCount = parseInt( count ) + 1;
                var $template = $( '#js-template-input-organic' ),
                $clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
                $optionSelect = $clone.find('[name="Input[total_area][]"]');
                $optionSelect.attr('id','js-input-organic-select-picker-' + totalCount);
                $( "#js-input-organic-count" ).val( totalCount );
                $( "#js-input-organic-select-picker-" + totalCount ).select2();
                $('.picker-date').datepicker({
                    format : 'dd/mm/yyyy',
                    autoclose: true,
                    startDate: '01/01/2010',
                    setDate: todayDate
                });
            });
            
            $("#email_id").on('focusout',function(){
                var email = $(this).val();
                var result = validateEmail(email);
                if(result){
                    $(".error-email-id").text("");
                }else{
                    $(".error-email-id").text("In Valid");
                }
            });
            $( "#js-partner-type" ).on('change',function(){
                var partnerTypeId = $(this).val();
                getPartnerUserDetails(partnerTypeId);
            });
            var partnerTypeId = $( "#js-partner-type" ).val();
            var partnerUserId = $( "#js-partner-user-id-hidden" ).val();
            getPartnerUserDetails( partnerTypeId, partnerUserId );
        });
        
        function currentDate() {
            var date = new Date();
            var todayDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            return todayDate;
        }
        
        function removeInputOrganicTemplate( ths ){
            var $row  = $( ths ).parents('.js-input-organic-group');
            // Remove element containing the option
            $row.remove();
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
        
        function getCitiesByState(state_id,city_id_hidden = ''){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "getcities-by-state",
                data: { 'state_id' : state_id,'city_id_hidden' : city_id_hidden },
                dataType: "html",
                success: function(result){
                    var html = $.parseJSON(result);
                    $("#city_id").html('<option disabled selected> Select City</option>');
                    $("#city_id").append(html);
                }
            });
        }
        function removeButton(ths){
            var $row  = $(ths).parents('.product-group');
            // Remove element containing the option
            $row.remove();
        }
        function removeSoilTemplate(ths){
            var $row  = $(ths).parents('.soil-group');
            // Remove element containing the option
            $row.remove();
        }
        function removeMicroTemplate(ths){
            var $row  = $(ths).parents('.micro-group');
            // Remove element containing the option
            $row.remove();
        }
        function removeCropTemplate(ths){
            var $row  = $(ths).parents('.crop-group');
            // Remove element containing the option
            $row.remove();
        }
        function numberValidation(event){
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)  && event.which != 8) {
                event.preventDefault();
            }
        }
        
    </script>
