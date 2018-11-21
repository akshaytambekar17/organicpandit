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
            <div class="row">
                <div class="col-md-12 mt-20">
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
                                                <h4>Total Number of Bids : 0 </h4>
                                            </div>
                                            <div class="col-md-6 bid-padding-block">
                                                <a href="javascript:void(0)" class="btn btn-danger" data-id="<?= $value['id']?>">Apply for Bid</a>
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
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="text-center popup-content">  
                        <h5> By clicking on <span>"YES"</span>, Product will be deleted permanently. Do you wish to proceed?</h5><br><br>
                        <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                        <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                        <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
    </script>
    
