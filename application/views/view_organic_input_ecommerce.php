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
<!--            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-20 center">
                    <div class="box">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search By " onkeypress="search(this)">
                    </div>
                </div>
            </div>-->
            <?php if(empty($userSession)){ ?>
<!--                    <p class="has-error center">Please login to apply for bid</p>-->
            <?php } ?>
            <div class="row">
                <div class="col-md-12 mt-20 alert-message">
                    <div class="box box-success">
                        <div class="box-header">
                            <h4>User : <?= $userDetails['fullname']?></h4>
                        </div>
                        <div class="box-body">
                            <?php if(!empty($organicInputEcommerceList)){ 
                                    foreach($organicInputEcommerceList as $value){
                            ?>
                                <div class="box post-panel">
                                    <div class="box-body">
                                        <div class="col-md-2">
                                            <h4>Category</h4>
                                            <b class="fullname">
                                                <?php 
                                                       $categoryList = getEcommerceCategory();
                                                       echo $categoryList[$value['category_id']];
                                                ?>
                                            </b>
                                            <br>    
                                            <h4>Sub Category</h4>
                                            <b class="fullname">
                                                <?php 
                                                       $subCategoryList = getEcommerceSubCategory();
                                                       echo $subCategoryList[$value['sub_category_id']];
                                                ?>
                                            </b>
                                            <br>    
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Image</h4>
                                            <?php if( !empty( $value['images'] ) )  ?>
                                                <img src="<?= base_url()?>assets/images/ecommerce_images/<?= $value['images']?>" height="90px">
                                            <?php}else{ ?>
                                                <b>NA</b>
                                            <?php} ?>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Price</h4>
                                            <b><?= $value['price']; ?></b>
                                            <h4>Brand</h4>
                                            <b><?= $value['brand']; ?></b>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Weight</h4>
                                            <b><?= $value['weight']; ?></b>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="user-padding-block">
                                                <?php $disabled = empty($userSession)?'disabled':'';  ?>
                                                <a href="javascript:void(0)" class="btn btn-warning" data-user_id="<?= $value['user_id']?>" data-fullname="<?= $value['fullname']?>" >View Details</a>
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
                    </div>
                    
                </div>
            </div>
            <div class="search-box" id="detail-row"></div>
            
            <!-- footer -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade user-popup" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="modal-title-user-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="modal-user-view"></div>
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
//        function search()
//        {
//            var searchterm = jQuery("#search").val().trim().toLowerCase();
//            if (searchterm.length == 0){
//                jQuery(".post-panel").show();
//                return  true;
//            }
//            jQuery(".post-panel").hide();
//            jQuery(".product-name").each(function () {
//                if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0 ){
//                    jQuery(this).closest(".post-panel").show();
//                }
//
//            });
//        }
        function userModal(ths){
            var user_id = $(ths).data('user_id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "get-user-by-id",
                data: { 'user_id' : user_id },
                dataType: "html",
                success: function(result){
                    $(".modal-title-user-name").text($(ths).data('fullname'));
                    $("#modal-user-view").html(result);
                    $('#user-modal').modal('show');
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
    </script>
    
