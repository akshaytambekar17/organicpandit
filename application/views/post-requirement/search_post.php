<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <!-- banner -->
<!--    <div class="container-fluid">
        <div class="row ">
            <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $banner; ?>" alt="organic world" >     </div>
        </div>
    </div>-->
    <div class="">
        <div class="col-xs-12 bg-gray"> 
            <h2 class="page-header center"> 
                <i class="fa fa-globe"></i> <?= $title?> 
            </h2> 
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-20">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" name="search-post-requirement-form" id="search-post-requirement-form" >
                        <div class="box box-danger">
                            <div class="box-header">
        <!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>Select State</label>
                                        <select class="form-control select2" name="state_id" id="state_id">
                                            <option disabled="disabled" selected="selected">Select State</option>
                                            <?php foreach($state_list  as $value){ ?>
                                                    <option value="<?= $value['id']?>" <?= set_select('state_id',$value['id']);?>><?= $value['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('state_id'); ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Select City</label>
                                        <select class="form-control select2" name="city_id" id="city_id">
                                            <option disabled="disabled" selected="selected">Select City</option>
                                        </select>
                                        <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Select Product</label>
                                        <select class="form-control select2" name="product_id">
                                            <option disabled="disabled" selected="selected" >Select Product</option>
                                            <?php foreach($farmer_product_list  as $value){ ?>
                                                    <option value="<?= $value['id']?>" <?= set_select('product_id',$value['id'],false);?>><?= $value['pr_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer center">
                                <button type="submit" class="btn btn-success" id="submit">Search Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12" id="alert-messge">
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
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-20 center">
                    <div class="box">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search post by Product name" onkeypress="search(this)">
                    </div>
                </div>
            </div>
            <?php if(!$this->session->userdata('username')){ ?>
                    <p class="has-error center">Please login to apply for bid</p>
            <?php } ?>
            <div class="row">
                <div class="col-md-12 mt-20 alert-message">
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <div class="box-body">
                            <?php if(!empty($search_post_list)){ 
                                    foreach($search_post_list as $value){
                            ?>
                                <div class="box post-panel">
                                    <div class="box-body">
                                        <div class="col-md-3">
                                            <h4>Product Name</h4>
                                            <b class="product-name">
                                            <?php 
                                                $farmer_product_details = $this->Product->getFarmerProductById($value['product_id']);
                                                echo !empty($farmer_product_details)?$farmer_product_details['pr_name']:''; 
                                            ?>
                                            </b>    
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Quality Specification</h4>
                                            <b><?= $value['quality_specification']; ?></b>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>Expected Rate : <b><?= $value['price']; ?></b> per kg</h4>
                                            <h4>Quantity : <b><?= $value['quantity']; ?></b> kg</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-6">
                                                <h4>Total Number of Bids : 
                                                    <span id="no-of-bid-<?= $value['id']?>">
                                                    <?php 
                                                        $bids_data = $this->Bid->getBidByPostRequirementId($value['id']);
                                                        echo (!empty($bids_data) && count($bids_data)>0)? count($bids_data):0;
                                                    ?> 
                                                    </span>
                                                </h4>
                                            </div>
                                            <div class="col-md-6 bid-padding-block">
                                                <?php $disabled = empty($this->session->userdata('username'))?'disabled':'';  ?>
                                                <a href="javascript:void(0)" class="btn btn-danger <?= $disabled?>" data-id="<?= $value['id']?>" onclick="bidModal(this)">Apply for Bid</a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            
                            <?php } }else{ ?>
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="col-md-12 center">
                                                 No Post Found
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="search-box" id="detail-row"></div>
            
            <!-- footer -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade bid-popup" id="bid-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Applying Bid for Product <span class="modal-title-product-name"></span></h4>
                </div>
                <div class="modal-body">
                    <h5>Product Name : <span class="modal-title-product-name"></span></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Valid From : <span id="modal-valid-from"></span></h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Valid To : <span id="modal-valid-to"></span></h5>
                        </div>
                    </div>
                    <h5>Total price : <span id="modal-total-price"></span></h5>
                    <br>
                    <h4>Bid Details</h4>
                    <div class="form-group ">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" >
                        <span class="has-error error-bid-modal"></span>
                    </div>
                    <input type="hidden" name="post_requirement_id" id="post_requirement_id">
                    <input type="hidden" name="product_name_modal" id="product_name_modal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="confirmationModal(this)">Apply Bid</button>
                </div>
            </div>
        </div>  
    </div>
    <div class="modal fade confirmation-popup" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="text-center popup-content">  
                        <h5> By clicking on <span>"YES"</span>, Your bid will place for product <b><span id="confiramtion-product-name"></span></b>. Do you wish to proceed?</h5><br><br>
<!--                        <input  type="hidden" name="confirmation_post_requirement_id" id="confirmation_post_requirement_id"> 
                        <input  type="hidden" name="confirmation_amount" id="confirmation_amount"> -->
                        <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                        <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#state_id").on('change',function(){
                var state_id = $(this).val();
                getCitiesByState(state_id);
            });
            var state_id = $("#state_id").val();
            if(state_id != ''){
                getCitiesByState(state_id);
            }
            $("#confirm_btn").on('click',function(){
                var post_id = $("#post_requirement_id").val();
                var amount = $("#amount").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "bid/create",
                    data: { 'post_requirement_id' : post_id,'amount' : amount },
                    dataType: "json",
                    success: function(result){
                        $('#ConfirmationModal').modal('hide');
                        $('#bid-modal').modal('hide');
                        if(result['success'] == true){
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            $('.alert-message').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Your bid has been successfully placed...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                            $('.alert').fadeIn().delay(3000).fadeOut(function () {
                                $(this).remove();
                            });
                            $("#no-of-bid-"+post_id).text(result['data']);
                        }else{
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            $('.alert-message').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                            $('.alert').fadeIn().delay(3000).fadeOut(function () {
                                $(this).remove();
                            });
                        }
                        
                    }
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
        function search()
        {
            var searchterm = jQuery("#search").val().trim().toLowerCase();
            if (searchterm.length == 0){
                jQuery(".post-panel").show();
                return  true;
            }
            jQuery(".post-panel").hide();
            jQuery(".product-name").each(function () {
                if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0 ){
                    jQuery(this).closest(".post-panel").show();
                }

            });
        }
        function bidModal(ths){
            var post_id = $(ths).data('id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "getpost-by-id",
                data: { 'post_id' : post_id },
                dataType: "json",
                success: function(result){
                    console.log(result);
                    $(".modal-title-product-name").text(result['product_details']['pr_name']);
                    $("#modal-valid-from").text(result['from_date']);
                    $("#modal-valid-to").text(result['to_date']);
                    $("#modal-total-price").text(result['total_price']);
                    $("#product_name_modal").val(result['product_details']['pr_name']);
                    $("#post_requirement_id").val(result['id']);
                    $('#bid-modal').modal('show');
                }
            });
        }
        function confirmationModal(ths){
            var amount = $("#amount").val();
            if(amount == ''){
                $(".error-bid-modal").text('Please enter the amount');
            }else{
                $(".error-bid-modal").text('');
                $("#confiramtion-product-name").text($("#product_name_modal").val());
                $('#ConfirmationModal').modal('show');
            }
        }
    </script>
    
