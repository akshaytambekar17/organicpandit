<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <div class="container">
        <section class="content-header">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <?=$message ?>
                </div>
            </div>
        <?php }?>
        <section class="content alert-box">
            <div class="row">    
                <div class="col-md-12 ">
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <form  method="post" enctype="multipart/form-data" name="registration-form" id="registration-form" >
                            <div class="box-body">
                                <?php echo ViewRegistration($user_type_details); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Bank Details</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="bank_name">Bank Name</label>
                                                    <input type="text" name="Bank[bank_name]" class="form-control" id="bank_name" placeholder="Bank Name" value="<?= set_value('Bank[bank_name]')?>">
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
                            <input type="hidden" name="user_type_id" value="<?= $user_type_details['id']?>" >
                            <div class="box-footer center">
                                <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                <a href="<?php echo base_url(); ?>" class="btn btn-warning">Cancel</a>
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
            if(state_id != ''){
                getCitiesByState(state_id);
            }
            $(".addButton").on('click',function() {
                var $template = $('#optionTemplate'),
                $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
                $option   = $clone.find('[name="from_date[]"] , [name="to_date[]"]');
                // Add new field
                $('.picker-date').datepicker({
                    autoclose: true,
                    startDate: new Date()
                });
            });
        });
        function getCitiesByState(state_id){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "getcities-by-state",
                data: { 'state_id' : state_id },
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
