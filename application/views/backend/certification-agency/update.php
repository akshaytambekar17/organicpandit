<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading) ? $heading : 'Heading' ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>admin/home"><i class="fa fa-home"></i> Home</a></li>
            <?php if($userSession['username'] == ADMINUSERNAME){
                    $href = base_url().'admin/certification-agency';
                    $title_middle = 'Certification Agency';
                }else{
                    $href = base_url().'admin/dashboard';
                    $title_middle = 'Dashboard';
                }
            ?> 
            <li><a href="<?= $href?>"><?= $title_middle?></a></li>
            <li class="active"><a href="javascript:void(0)"><?= $title ?></a></li>
        </ol>
    </section>
    <?php if ($message = $this->session->flashdata('Message')) { ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $message ?>
            </div>
        </div>
    <?php } ?> 
    <?php if ($message = $this->session->flashdata('Error')) { ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $message ?>
            </div>
        </div>
    <?php } ?>
    <section class="content alert-box">
        <div class="row">    
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header"></div>
                    <form  method="post" enctype="multipart/form-data" name="registration-form" id="registration-form" >
                        <div class="box-body">
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
                                                            <?php
                                                                foreach ($agencies_list as $value) {
                                                                    $disabled = '';
                                                                    foreach ($certification_agencies_list as $val) {
                                                                        if ($value['id'] == $val['agency_id']) {
                                                                            $disabled = 'disabled="disabled"';
                                                                        }
                                                                    }
                                                                    if(!empty($certification_agency_details['agency_id'])){
                                                                        $selected = $certification_agency_details['agency_id'] == $value['id']?'selected="selected"':'';                                
                                                                    }else{
                                                                        $selected = '';
                                                                    }
                                                                ?>
                                                                    <option value="<?= $value['id'] ?>" <?= set_select('agency_id', $value['id']); ?> <?= $disabled ?> <?= $selected ?>><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="username" >Username</label>
                                                        <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($certification_agency_details['username'])?$certification_agency_details['username']:set_value('username') ?>" readonly>
                                                        <span class="has-error"><?php echo form_error('username'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="contact_person">Contact Person Name</label>
                                                        <input type="text" name="contact_person"  class="form-control" id="contact_person" placeholder="Contact Person Name" value="<?= !empty($certification_agency_details['contact_person'])?$certification_agency_details['contact_person']:set_value('contact_person') ?>">
                                                        <span class="has-error"><?php echo form_error('contact_person'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="address">Address</label>
                                                        <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($certification_agency_details['address'])?$certification_agency_details['address']:set_value('address') ?>">
                                                        <span class="has-error"><?php echo form_error('address'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="mobile1">Mobile number1</label>
                                                        <input type="text" name="mobile1"  class="form-control" id="mobile1" placeholder="Mobile number1" value="<?= !empty($certification_agency_details['mobile1'])?$certification_agency_details['mobile1']:set_value('mobile1') ?>">
                                                        <span class="has-error"><?php echo form_error('mobile1'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label" for="mobile2">Mobile number2</label>
                                                        <input type="text" name="mobile2"  class="form-control" id="mobile2" placeholder="Mobile number2" value="<?= !empty($certification_agency_details['mobile2'])?$certification_agency_details['mobile2']:set_value('mobile2') ?>">
                                                        <span class="has-error"><?php echo form_error('mobile2'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label" for="landline">Landline number</label>
                                                        <input type="text" name="landline"  class="form-control" id="landline" placeholder="Landline number" value="<?= !empty($certification_agency_details['landline'])?$certification_agency_details['landline']:set_value('landline') ?>">
                                                        <span class="has-error"><?php echo form_error('landline'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="email1">Email Id1</label>
                                                        <input type="text" name="email1" class="form-control" id="email1" placeholder="Email Id1" value="<?= !empty($certification_agency_details['email1'])?$certification_agency_details['email1']:set_value('email1') ?>">
                                                        <span class="has-error"><?php echo form_error('email1'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label" for="email2">Email Id2</label>
                                                        <input type="text" name="email2" class="form-control" id="email2" placeholder="Email Id2" value="<?= !empty($certification_agency_details['email2'])?$certification_agency_details['email2']:set_value('email2') ?>">
                                                        <span class="has-error"><?php echo form_error('email2'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required">Website</label>
                                                        <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= !empty($certification_agency_details['website'])?$certification_agency_details['website']:set_value('website') ?>">
                                                        <span class="has-error"><?php echo form_error('website'); ?></span>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required">Licence Number</label>
                                                        <input type="text" name="licence_no" class="form-control" id="licence_no" placeholder="Licence number" value="<?= !empty($certification_agency_details['licence_no'])?$certification_agency_details['licence_no']:set_value('licence_no') ?>">
                                                        <span class="has-error"><?php echo form_error('licence_no'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_type_id" value="<?= $certification_agency_details['user_type_id'] ?>" >
                        <input type="hidden" name="user_id" value="<?= $certification_agency_details['user_id'] ?>" >
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                            <?php if($userSession['username'] == ADMINUSERNAME){ 
                                    $href = base_url().'admin/certification-agency';
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


