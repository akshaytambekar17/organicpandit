<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-warning">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Information</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="fullname" ><?= $name?></label>
                                                    <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="<?= $name?>" value="<?= set_value('fullname')?>">
                                                    <span class="has-error"><?php echo form_error('fullname'); ?></span>
                                                </div>
                                                <?php if($user_type_details['id'] == 2 || $user_type_details['id'] == 3 || $user_type_details['id'] == 4 || $user_type_details['id'] == 5){ ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="ceo_name">CEO Name</label>
                                                        <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="CEO Name" value="<?= set_value('ceo_name')?>">
                                                        <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="username" >Username</label>
                                                    <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= set_value('username')?>">
                                                    <span class="has-error"><?php echo form_error('username'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="email_id" >Email Id</label>
                                                    <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= set_value('email_id')?>">
                                                    <span class="has-error"><?php echo form_error('email_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="password">Password</label>
                                                    <input type="password" name="password"  class="form-control" id="password" placeholder="Password" value="<?= set_value('password')?>">
                                                    <span class="has-error"><?php echo form_error('username'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="confirm-password">Confirm Password</label>
                                                    <input type="password" name="confirm_password"  class="form-control" id="confirm_password" placeholder="Confirm Password" value="<?= set_value('confirm_password')?>">
                                                    <span class="has-error"><?php echo form_error('confirm_password'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="mobile_no">Mobile number</label>
                                                    <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= set_value('mobile_no')?>">
                                                    <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="landline_no">Landline number</label>
                                                    <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= set_value('landline_no')?>">
                                                    <span class="has-error"><?php echo form_error('landline_no'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                                                    <select class="form-control select2" name="agency_id">
                                                        <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                                                        <?php foreach($agencies_list  as $value){ ?>
                                                                <option value="<?= $value['id']?>" <?= set_select('agency_id',$value['id']);?>><?= $value['agency_name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                                                    <input type="file" name="profile_image" class="form-control" id="profile_image">
                                                    <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="state_id">Select State</label>
                                                    <select class="form-control select2" name="state_id" id="state_id">
                                                        <option disabled="disabled" selected="selected">Select State</option>
                                                        <?php foreach($state_list  as $value){ ?>
                                                                <option value="<?= $value['id']?>" <?= set_select('state_id',$value['id']);?>><?= $value['name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('state_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="city_id">Select City</label>
                                                    <select class="form-control select2" name="city_id" id="city_id">
                                                        <option disabled="disabled" selected="selected">Select City</option>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="address">Address</label>
                                                    <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= set_value('address')?>">
                                                    <span class="has-error"><?php echo form_error('address'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="is_visit_farm">Can we visit your farm</label>
                                                    <select class="form-control select2" name="is_visit_farm" id="is_visit_farm">
                                                        <option disabled="disabled" selected="selected">Select Options</option>
                                                        <option value="1" <?= set_select('is_visit_farm',1);?> >Yes</option>
                                                        <option value="0" <?= set_select('is_visit_farm',0);?>>No</option>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('is_visit_farm'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="is_test_report">Can you provide test report</label>
                                                    <select class="form-control select2" name="is_test_report" id="is_test_report">
                                                        <option disabled="disabled" selected="selected">Select Options</option>
                                                        <option value="1" <?= set_select('is_test_report',1);?> >Yes</option>
                                                        <option value="0" <?= set_select('is_test_report',0);?>>No</option>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('is_test_report'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="story">Story</label>
                                                    <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= set_value('story')?>">
                                                    <span class="has-error"><?php echo form_error('story'); ?></span>
                                                </div>
                                                <?php if($user_type_details['id'] == 2 || $user_type_details['id'] == 3 || $user_type_details['id'] == 4 || $user_type_details['id'] == 5){ ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="gst_number">GST Number</label>
                                                        <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= set_value('gst_number')?>">
                                                        <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                                                    </div>
                                                <?php }?>
                                                <?php if($user_type_details['id'] == 1){ ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="pancard_number">Pan Card Number</label>
                                                        <input type="text" name="pancard_number" class="form-control" id="pancard_number" placeholder="Pan Card Number" value="<?= set_value('pancard_number')?>">
                                                        <span class="has-error"><?php echo form_error('pancard_number'); ?></span>
                                                    </div>
                                                <?php }?>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="aadhar_number">Aadhar Card Number</label>
                                                    <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= set_value('aadhar_number')?>">
                                                    <span class="has-error"><?php echo form_error('aadhar_number'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="video">Choose Video</label>
                                                    <input type="file" name="video" class="form-control" id="video">
                                                    <span class="has-error"><?php echo form_error('video'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label label-required" for="certification_id">Select Certification</label>
                                                    <select class="form-control select2" name="certification_id" id="certification_id">
                                                        <option disabled="disabled" selected="selected">Select Certification</option>
                                                        <?php foreach(getCertifications() as $key=>$value){ ?>
                                                            <option value="<?= $key?>" <?= set_select('certification_id',$key);?>><?= $value?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="has-error"><?php echo form_error('certification_id'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Certification Number</label>
                                                    <input type="text" name="certification_number" class="form-control" id="certification_number" placeholder="Certification Number" value="<?= set_value('certification_number')?>">
                                                    <span class="has-error"><?php echo form_error('certification_number'); ?></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="certification_image">Choose Certification Pic</label>
                                                    <input type="file" name="certification_image" class="form-control" id="certification_image">
                                                    <span class="has-error"><?php echo form_error('certification_image'); ?></span>
                                                </div>
                                                <?php if($user_type_details['id'] == 5){ ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label" for="company_image">Choose Company Image</label>
                                                        <input type="file" name="company_image" class="form-control" id="company_image">
                                                        <span class="has-error"><?php echo form_error('company_image'); ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($user_type_details['id'] == 2){ ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label label-required" for="total_farmer">Number of Farmer</label>
                                                        <select class="form-control select2" name="total_farmer" id="total_farmer">
                                                            <option disabled="disabled" selected="selected">Select Options</option>
                                                            <?php foreach(getTotalFarmer() as $key=>$value){ ?>
                                                                <option value="<?= $key?>" <?= set_select('total_farmer',$key);?>><?= $value?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="has-error"><?php echo form_error('certification_id'); ?></span>
                                                    </div>
                                                <?php } ?>
                                                <?php if($user_type_details['id'] == 5){ ?>
                                                        <div class="form-group col-md-4">
                                                            <label>Website</label>
                                                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= set_value('website')?>">
                                                            <span class="has-error"><?php echo form_error('website'); ?></span>
                                                        </div>
                                                <?php } ?>
                                                <?php if($user_type_details['id'] == 5){ ?>
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label label-required" for="type_of_buyer">Type of Buyer</label>
                                                            <select class="form-control select2" name="type_of_buyer" id="type_of_buyer">
                                                                <option disabled="disabled" selected="selected">Select Options</option>
                                                                <option value="Company" <?= set_select('type_of_buyer','Company');?> >Company</option>
                                                                <option value="Exporter" <?= set_select('type_of_buyer','Exporter');?>>Exporter</option>
                                                                <option value="Consumer" <?= set_select('type_of_buyer','Consumer');?>>Consumer</option>
                                                            </select>
                                                            <span class="has-error"><?php echo form_error('type_of_buyer'); ?></span>
                                                        </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($user_type_details['id'] == 1 || $user_type_details['id'] == 2 || $user_type_details['id'] == 3 || $user_type_details['id'] == 4 ||$user_type_details['id'] == 5 ){ ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Product Details</h3>
    <!--                                                <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                    </div>-->
                                                    <!-- /.box-tools -->
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group pr-group box-body">
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="name">Product Name</label>
                                                            <input type="text" name="name[]" class="form-control" id="name" placeholder="Product Name" value="<?= set_value('name[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="description">Description</label>
                                                            <input type="text" name="description[]" class="form-control" id="description" placeholder="Product Description" value="<?= set_value('description[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="from_date">From Date</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" name="from_date[]" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= set_value('from_date[]')?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="to_date">To Date</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" name="to_date[]" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= set_value('to_date')?>">
                                                            </div>        
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                                            <select class="form-control" name="quantity_id[]" >
                                                                <option disabled="disabled" selected="selected">Select Quantity</option>
                                                                <?php foreach(getQuantities() as $key=>$value){ ?>
                                                                    <option value="<?= $key?>" <?= set_select('quantity_id[]',$key);?>><?= $value?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="quality">Qualitity</label>
                                                            <input type="text" name="quality[]" class="form-control" id="quality" placeholder="Quality" value="<?= set_value('quality[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="control-label label-required" for="price">Price</label>
                                                            <input type="text" name="price[]" class="form-control" id="price" placeholder="Price" value="<?= set_value('price[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="images">Product Images</label>
                                                            <input type="file" name="images" class="form-control" id="images">
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label class="control-label">Add</label>
                                                            <button type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- The option field template containing an option field and a Remove button -->
                                                    <div class=" form-group product-group box-body hide" id="optionTemplate">
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="name">Product Name</label>
                                                            <input type="text" name="name[]" class="form-control" id="name" placeholder="Product Name" value="<?= set_value('name[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="description">Description</label>
                                                            <input type="text" name="description[]" class="form-control" id="description" placeholder="Product Description" value="<?= set_value('description[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="from_date">From Date</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" name="from_date[]" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= set_value('from_date[]')?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="to_date">To Date</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" name="to_date[]" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= set_value('to_date')?>">
                                                            </div>        
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                                            <select class="form-control" name="quantity_id[]" >
                                                                <option disabled="disabled" selected="selected">Select Quantity</option>
                                                                <?php foreach(getQuantities() as $key=>$value){ ?>
                                                                    <option value="<?= $key?>" <?= set_select('quantity_id[]',$key);?>><?= $value?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="quality">Qualitity</label>
                                                            <input type="text" name="quality[]" class="form-control" id="quality" placeholder="Quality" value="<?= set_value('quality[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="control-label label-required" for="price">Price</label>
                                                            <input type="text" name="price[]" class="form-control" id="price" placeholder="Price" value="<?= set_value('price[]')?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label label-required" for="images">Product Images</label>
                                                            <input type="file" name="images" class="form-control" id="images">
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label class="control-label">Remove</label>
                                                            <button type="button" class="btn btn-danger" onclick="removeButton(this)"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Bank Details</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label label-required" for="bank_name">Bank Name</label>
                                                    <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Bank Name" value="<?= set_value('bank_name')?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label label-required" for="account_holder_name">Account Holder Name</label>
                                                    <input type="text" name="account_holder_name" class="form-control" id="account_holder_name" placeholder="Account Holder Name" value="<?= set_value('account_holder_name')?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label label-required" for="account_no">Account Number</label>
                                                    <input type="text" name="account_no" class="form-control" id="account_no" placeholder="Account Number" value="<?= set_value('account_no')?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label label-required" for="ifsc_code">IFSC Code</label>
                                                    <input type="text" name="ifsc_code" class="form-control" id="ifsc_code" placeholder="IFSC Code" value="<?= set_value('ifsc_code')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
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
