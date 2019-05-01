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
                <div class="col-md-6 mt-20 center">
                    <select class="form-control" name="category_id" id="js-filter-sub-category-id" onchange="filterSubCategory(this)">
                        <option selected="selected" value="0">Filter SubCategory</option>
                        <?php foreach( $arrSubCategory  as $key => $value ) { ?>
                                <option value="<?= $key?>"><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mt-20 center">
                    <div class="box">
                        <input type="text" name="search" id="js-search" class="form-control" placeholder="Search By Brand" onkeydown="search(this)">
<!--                        <select class="form-control" name="brand" id="js-filter-brand-id" onchange="filterBrand(this)">
                            <option selected="selected" value="0">Filter Brand</option>
                            <?php //foreach( $arrBrand  as $key => $value ) { ?>
                                    <option value="<?php // $key?>"><?php // $value ?></option>
                            <?php //} ?>
                        </select>-->
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12 mt-20 alert-message">
                    <div class="box box-success">
                        <div class="box-header">
                            <h4>User : <?= $userDetails['fullname']?></h4>
                        </div>
                        <div class="box-body js-box-details">
                            <?php if(!empty($organicInputEcommerceList)){
                                    foreach($organicInputEcommerceList as $value){

                            ?>
                                <div class="box js-post-panel">
                                    <div class="box-body">
                                        <div class="col-md-3">
                                            <h4>Category</h4>
                                            <b class="fullname">
                                                <?php echo $arrCategory[$value['category_id']]; ?>
                                            </b>
                                            <br>
                                            <h4 class="js-sub-category-id" data-sub_category_id="<?= $value['sub_category_id']?>" >Sub Category</h4>
                                            <b class="fullname">
                                                <?php echo $arrSubCategory[$value['sub_category_id']];?>
                                            </b>
                                            <br>
										</div>
                                        <div class="col-md-3">
                                            <h4>Image</h4>
                                            <?php if( !empty( $value['images'] ) ){  ?>
                                                <img src="<?= base_url()?>assets/images/ecommerce_images/<?= $value['images']?>" height="90px">
                                            <?php }else{ ?>
                                                <b>NA</b>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Price</h4>
                                            <b><?= $value['price']; ?></b>
                                            <h4>Brand</h4>
                                            <b class="js-brand-name">
                                                <?php echo $value['ecommerce_brand_id']; ?>
                                                <?php //echo $arrBrand[$value['ecommerce_brand_id']]; ?>
                                            </b>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Weight</h4>
                                            <b><?= $value['weight']; ?></b>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="user-padding-block">
                                                <div class="col-md-6">
                                                    <a href="javascript:void(0)" class="btn btn-warning" data-user_id="<?= $value['user_id']?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="modalEcommerceDetails(this)">View Details</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="javascript:void(0)" class="btn btn-success" data-user_id="<?= $value['user_id']?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="paymentGateway(this)" style="margin-left: 14px;" >Pay Now</a>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>

                            <?php } }else{ ?>
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="col-md-12 center">
                                                 No <?= $title?> Found
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                        <input type="hidden" id="user_id_hidden" value="<?= $userDetails['user_id']?>">    
                    </div>

                </div>
            </div>
            <div class="search-box" id="detail-row"></div>

            <!-- footer -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade user-popup" id="js-modal-ecommerce-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">User <span class="js-modal-title-user-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="js-modal-user-view"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<!--                    <button type="button" class="btn btn-success" onclick="confirmationModal(this)">Apply Bid</button>-->
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
        $(document).ready(function (){});

        function search()
        {
//            if( jQuery("#js-filter-category-id").val() > 0 ) {
//                jQuery(".js-post-panel").show();
//                jQuery("#js-filter-category-id  option[value='0']").prop("selected", true);
//            }
            var searchterm = jQuery("#js-search").val().trim().toLowerCase();
            if ( searchterm.length == 0 || searchterm.length == 1 ){
                jQuery(".js-post-panel").show();
                return  true;
            }
            jQuery(".js-post-panel").hide();
            jQuery(".js-brand-name").each(function () {
                if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0 ){
                    jQuery(this).closest(".js-post-panel").show();
                }
            });
        }

        //        function filterCategory(ths){
//            if( jQuery("#js-search").val() != '' && jQuery("#js-search").val() != undefined ){
//                jQuery("#js-search").val('');
//                jQuery(".js-post-panel").show();
//            }
//            var categoryId = $(ths).val();
//            var searchterm = categoryId;
//            if ( 0 == searchterm ){
//                jQuery(".js-post-panel").show();
//                return  true;
//            }
//            jQuery(".js-post-panel").hide();
//            jQuery(".js-sub-category-id").each(function () {
//                if ( jQuery(this).data('sub_category_id') == searchterm ){
//                    jQuery(this).closest(".js-post-panel").show();
//                }
//            });
//        }


        function modalEcommerceDetails(ths){
            var user_id = $(ths).data('user_id');
            var id = $(ths).data('id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-organic-input-ecommerce-details",
                data: { 'user_id' : user_id, 'id' : id },
                dataType: "html",
                success: function(result){
                    $(".js-modal-title-user-name").text($(ths).data('fullname'));
                    $("#js-modal-user-view").html(result);
                    $('#js-modal-ecommerce-popup').modal('show');
                }
            });
        }
        
        function confirmationModal(ths){
            var amount = $("#amount").val();
            if(amount == ''){
                $(".error-user-modal").text('Please enter the amount');
            }else{
                $(".error-user-modal").text('');
                $("#confiramtion-product-name").text($("#product_name_modal").val());
                $('#ConfirmationModal').modal('show');
            }
        }
                
        function filterSubCategory(ths){
            var user_id = $("#user_id_hidden").val();
            var sub_category_id = $(ths).val();
            var brand_id = '';
//            if( $( "#js-filter-brand-id" ).val() != 0 ) {
//                brand_id = $("#js-filter-brand-id").val();
//            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "filter-fetch-organic-input-ecommerce-details",
                data: { 'user_id' : user_id, 'sub_category_id' : sub_category_id, 'brand_id' : brand_id },
                dataType: "html",
                success: function(result){
                    $(".js-box-details").html('');
                    $(".js-box-details").html(result);
                }
            });
        }
        
        function filterBrand(ths){
            var user_id = $("#user_id_hidden").val();
            var brand_id = $(ths).val();
            var sub_category_id = '';
            if( $( "#js-filter-sub-category-id" ).val() != 0 ) {
                sub_category_id = $("#js-filter-sub-category-id").val();
            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "filter-fetch-organic-input-ecommerce-details",
                data: { 'user_id' : user_id, 'sub_category_id' : sub_category_id, 'brand_id' : brand_id },
                dataType: "html",
                success: function(result){
                    $(".js-box-details").html('');
                    $(".js-box-details").html(result);
                }
            });
        }
        function paymentGateway(ths){
            alert("In Progress");
        }
    </script>

