<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <div class="container">
        <section class="content-header">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="javascript:void(0)">Post Requirement</a></li>
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
                        <div class="box-header">
    <!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" name="post-requirement-form" id="post-requirement-form" >
                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name"  class="form-control" id="name" placeholder="Company Name" value="<?= !empty($product_details['company_name'])?$product_details['company_name']:set_value('company_name')?>">
                                    <span class="has-error"><?php echo form_error('company_name'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Select Product</label>
                                    <select class="form-control select2" name="product_id">
                                        <option disabled="disabled" selected="selected" >Select Product</option>
                                        <?php foreach($farmer_product_list  as $value){ ?>
                                                <option value="<?= $value['id']?>" <?= set_select('product_id',$value['id'],false);?>><?= $value['pr_name']?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Quality Specification</label>
                                    <input type="text" name="quality_specification" class="form-control" id="quality_specification" placeholder="Quality Specification" value="<?= !empty($product_details['quality_specification'])?$product_details['quality_specification']:set_value('quality_specification')?>">
                                    <span class="has-error"><?php echo form_error('quality_specification'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-6">
                                        <label>From Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="text" name="from_date" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= !empty($product_details['from_date'])?$product_details['from_date']:set_value('from_date')?>">
                                        </div>
                                        <span class="has-error"><?php echo form_error('from_date'); ?></span>
                                    </div>
                                    <div class="form-group col-md-1"></div>
                                    <div class="form-group col-md-6">
                                        <label>To Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="text" name="to_date" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= !empty($product_details['to_date'])?$product_details['to_date']:set_value('to_date')?>">
                                        </div>        
                                        <span class="has-error"><?php echo form_error('to_date'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Expected Rate (per kg)</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="Expected Rate" value="<?= !empty($product_details['price'])?$product_details['price']:set_value('price')?>">
                                    <span class="has-error"><?php echo form_error('price'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Quantity (in kg)</label>
                                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity" value="<?= !empty($product_details['quantity'])?$product_details['quantity']:set_value('quantity')?>">
                                    <span class="has-error"><?php echo form_error('quantity'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Total Price</label>
                                    <input type="text" name="total_price" class="form-control" id="total_price" placeholder="Total Price" value="<?= !empty($product_details['total_price'])?$product_details['total_price']:set_value('total_price')?>" readonly>
                                    <span class="has-error"><?php echo form_error('total_price'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Delivery Address</label>
                                    <input type="text" name="delivery_address" class="form-control" id="delivery_address" placeholder="Delivery Address" value="<?= !empty($product_details['delivery_address'])?$product_details['delivery_address']:set_value('delivery_address')?>" >
                                    <span class="has-error"><?php echo form_error('delivery_address'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-6">
                                        <label>Select State</label>
                                        <select class="form-control select2" name="state_id" id="state_id">
                                            <option disabled="disabled" selected="selected">Select State</option>
                                            <?php foreach($state_list  as $value){ ?>
                                                    <option value="<?= $value['id']?>" <?= set_select('state_id',$value['id']);?>><?= $value['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('state_id'); ?></span>
                                    </div>
                                    <div class="form-group col-md-1"></div>
                                    <div class="form-group col-md-6">
                                        <label>Select City</label>
                                        <select class="form-control select2" name="city_id" id="city_id">
                                            <option disabled="disabled" selected="selected">Select City</option>
                                        </select>
                                        <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Pincode</label>
                                    <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Pincode" value="<?= !empty($product_details['pincode'])?$product_details['pincode']:set_value('pincode')?>" >
                                    <span class="has-error"><?php echo form_error('pincode'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Payment Terms</label>
                                    <input type="text" name="payment_terms" class="form-control" id="payment_terms" placeholder="Payment Terms" value="<?= !empty($product_details['payment_terms'])?$product_details['payment_terms']:set_value('payment_terms')?>">
                                    <span class="has-error"><?php echo form_error('payment_terms'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Logistic Required</label>
                                    <select class="form-control select2" name="is_logistic" id="is_logistic">
                                        <option disabled="disabled" selected="selected">Select Options</option>
                                        <option value="2" <?= set_select('is_logistic',2);?> >Yes</option>
                                        <option value="1" <?= set_select('is_logistic',1);?>>No</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('is_logistic'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Select Certification</label>
                                    <select class="form-control select2" name="certification_id" id="is_logistic">
                                        <option disabled="disabled" selected="selected">Select Certification</option>
                                        <option value="npop">NPOP</option>
                                        <option value="nop">NOP</option>
                                        <option value="pgs">PGS</option>
                                        <option value="acos">ACOS</option>
                                        <option value="eu">EU</option>
                                        <option value="both">Both NPOP &amp; NOP</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('certification_id'); ?></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Other Details</label>
                                    <input type="text" name="other_details" class="form-control" id="other_details" placeholder="Other Details" value="<?= !empty($product_details['other_details'])?$product_details['other_details']:set_value('other_details')?>">
                                    <span class="has-error"><?php echo form_error('other_details'); ?></span>
                                </div>
                                
                            </div>
                            <?php if(!empty($product_details['id'])){ ?>
                                    <input type="hidden" name="id" value="<?= $product_details['id']?>">
                            <?php } ?>
                            <div class="box-footer center">
                                <button type="submit" class="btn btn-success" id="submit"><?= !empty($product_details)?'Update':'Create'?> Post</button>
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
                    var total_price = parseInt(price) + parseInt(quantity);
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
        
    </script>
