<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
    <div class="content-wrapper">
        <section class="content-header">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url()?>"><i class="fa fa-home"></i> Home</a></li>
                <?php if($user_session['username'] == ADMINUSERNAME){
                        $href = base_url().'admin/user';
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
                                <?php echo ViewProfile($user_type_details,$user_details,$user_product_details); ?>
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
                    autoclose: true,
                    startDate: new Date()
                });
            });
        });
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
        
    </script>
