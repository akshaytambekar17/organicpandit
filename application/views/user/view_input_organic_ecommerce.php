<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body style="background-color: #edf1f1c4">
    <div class="container-fluid">
        <?php if ($message = $this->session->flashdata('Message')) { ?>
            <div class="col-md-12" id="alert-messge">
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
        <div class="row">
            <div class="col-md-3 mt-20">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filter</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label>Filter Sub-category</label>
                            <select class="form-control select2" name="category_id" id="js-filter-sub-category-id" onchange="filterSubCategory(this)">
                                <option selected="selected" value="0">None</option>
                                <?php foreach ($arrSubCategory as $key => $value) { ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>    
                        </div>
                    </div>
                </div>
            </div>
            <!--	            <div class="col-md-2 mt-20">
                                        <button class="btn btn-success" onclick="searchFilter()" id="js-search-filter" disabled >Search</button>
                                </div>-->
            <!--	            <div class="col-md-3 mt-20 center">
                                <div class="box">
                                    <input type="text" name="search" id="js-search" class="form-control" placeholder="Search By Brand" onkeydown="search(this)">
                                    <select class="form-control" name="brand" id="js-filter-brand-id" onchange="filterBrand(this)">
                                        <option selected="selected" value="0">Filter Brand</option>
            <?php //foreach( $arrBrand  as $key => $value ) { ?>
                                                <option value="<?php // $key ?>"><?php // $value  ?></option>
            <?php //} ?>
                                    </select>
                                </div>
                            </div>-->
        
            <div class="col-md-9 mt-20 alert-message js-alert-message">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h2 class="box-title"><i class="fa fa-globe"></i> <?= $title ?></h2>
                    </div>
                    <div class="box-body">
                        <h4>User : <?= $userDetails['fullname'] ?></h4><br>
                        <div class="js-box-details">
                            <?php
                            if (!empty($organicInputEcommerceList)) {
                                foreach ($organicInputEcommerceList as $value) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="box js-post-panel">
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <?php if( true == isArrVal( $userSession ) && SUBSCRIBED == $userSession['is_subscription'] ) { ?>
                                                        <a href="javascript:void(0)" class="btn btn-warning btn-outline-warning pull-right" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="modalEcommerceDetails(this)" data-toggle="tooltip" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <?php } else { ?>
                                                        <a href="javascript:void(0)" class="btn btn-warning btn-outline-warning pull-right js-not-subscribe-button"  data-toggle="tooltip" title="View Details" data-toggle="modal" data-target="#js-subscribe-modal" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <?php } ?>
                                                    <br>    
                                                    <div class="ps-post__thumbnail">
                                                        <a class="ps-post__overlay" href="javascript:void(0)"></a> 
                                                        <?php if( true == isVal( $value['images'] ) ) { ?>
                                                            <img src="<?= checkFileExist( './assets/images/ecommerce_images/' . $value['images'] ) ?>" alt="Organic Pandit" height="90px">
                                                        <?php } else { ?>
                                                            <img src="<?= logoOrganicPandit() ?>" alt="Organic Pandit" height="90px">
                                                        <?php } ?>
                                                    </div>
                                                    <br>
                                                    <div class="row categories-subcategory-details">
                                                        <div class="col-md-6">
                                                            <h4>Category</h4>
                                                            <b class="fullname">
                                                                <?php echo $arrCategory[$value['category_id']]; ?>
                                                            </b>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4 class="js-sub-category-id" data-sub_category_id="<?= $value['sub_category_id'] ?>" >Sub Category</h4>
                                                            <b class="fullname">
                                                                <?php echo $arrSubCategory[$value['sub_category_id']]; ?>
                                                            </b>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>Price</h4>
                                                            <b><?= $value['price']; ?></b>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Weight</h4>
                                                            <b><?= $value['weight']; ?></b>
                                                        </div>     
                                                    </div>     
                                                    <br>
                                                    <h4>Brand</h4>
                                                    <b class="js-brand-name">
                                                        <?php echo $value['ecommerce_brand_id']; ?>
                                                    </b>

                                                    <?php if( true == isArrVal( $userSession )) { ?>
                                                        <a href="javascript:void(0)" class="btn btn-success btn-outline-success add-to-cart-button mt-20" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="showAddToCartModal(this)" data-toggle="tooltip" title="Add to cart">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                    <?php } else { ?>
                                                        <a href="javascript:void(0)" class="btn btn-success btn-outline-success add-to-cart-button mt-20 js-forcefully-login-button" data-toggle="tooltip" title="Add to cart" data-toggle="modal" data-target="#js-subscribe-modal">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                    <?php } ?>   

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="col-md-12 center">
                                            No <?= $title ?> Found
                                        </div>
                                    </div>
                                </div>
    <?php } ?>
                        </div>
                        <input type="hidden" id="user_id_hidden" value="<?= $userDetails['user_id'] ?>">
                    </div>
                </div>

            </div>
        </div>
        <div class="search-box" id="detail-row"></div>

        <!-- footer -->
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
    
    <div class="modal fade" id="js-add-cart-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add the Product to cart</h4>
                </div>
                <div class="modal-body">
                    <div id="js-modal-body-content-add-to-cart"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="organicInputEcommerceAddToCart(this)">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {});

        function search() {
//            if( jQuery("#js-filter-category-id").val() > 0 ) {
//                jQuery(".js-post-panel").show();
//                jQuery("#js-filter-category-id  option[value='0']").prop("selected", true);
//            }
            var searchterm = jQuery("#js-search").val().trim().toLowerCase();
            if (searchterm.length == 0 || searchterm.length == 1) {
                jQuery(".js-post-panel").show();
                return  true;
            }
            jQuery(".js-post-panel").hide();
            jQuery(".js-brand-name").each(function () {
                if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0) {
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


        function modalEcommerceDetails(ths) {
            var user_id = $(ths).data('user_id');
            var id = $(ths).data('id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-organic-input-ecommerce-details",
                data: {'user_id': user_id, 'id': id},
                dataType: "html",
                success: function (result) {
                    $(".js-modal-title-user-name").text($(ths).data('fullname'));
                    $("#js-modal-user-view").html(result);
                    $('#js-modal-ecommerce-popup').modal('show');
                }
            });
        }

        function confirmationModal(ths) {
            var amount = $("#amount").val();
            if (amount == '') {
                $(".error-user-modal").text('Please enter the amount');
            } else {
                $(".error-user-modal").text('');
                $("#confiramtion-product-name").text($("#product_name_modal").val());
                $('#ConfirmationModal').modal('show');
            }
        }

        function filterSubCategory(ths) {
            var intSubCategoryId = $(ths).val();
            var user_id = $("#user_id_hidden").val();
            var brand_id = '';
//            if( $( "#js-filter-brand-id" ).val() != 0 ) {
//                brand_id = $("#js-filter-brand-id").val();
//            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "filter-fetch-organic-input-ecommerce-details",
                data: {'user_id': user_id, 'sub_category_id': intSubCategoryId, 'brand_id': brand_id},
                dataType: "html",
                success: function (result) {
                    $('#js-search-filter').prop("disabled", false);
                    $(".js-box-details").html('');
                    $(".js-box-details").html(result);
                }
            });
        }

        function filterBrand(ths) {
            var user_id = $("#user_id_hidden").val();
            var brand_id = $(ths).val();
            var sub_category_id = '';
            if ($("#js-filter-sub-category-id").val() != 0) {
                sub_category_id = $("#js-filter-sub-category-id").val();
            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "filter-fetch-organic-input-ecommerce-details",
                data: {'user_id': user_id, 'sub_category_id': sub_category_id, 'brand_id': brand_id},
                dataType: "html",
                success: function (result) {
                    $(".js-box-details").html('');
                    $(".js-box-details").html(result);
                }
            });
        }

        function showAddToCartModal( ths ) {
            var intOrganicInputEcommerceId = $(ths).data('id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-organic-input-ecommerce-add-to-cart",
                data: { 'organic_input_ecommerce_id' : intOrganicInputEcommerceId },
                dataType: "html",
                success: function(result){
                    $("#js-modal-body-content-add-to-cart").html(result);
                    $('#js-add-cart-modal').modal('show');
                }
            });
        }
        
        function organicInputEcommerceAddToCart( ths ) {
            var intOrganicInputEcommerceId = $("#js-add-to-cart-organic-input-ecommerce-id").val();
            var intPrice = $("#js-add-to-cart-price").val();
            var intQuantity = $("#js-add-to-cart-quantity").val();
            var strProductName = '';
            var intCategoryId = $("#js-add-to-cart-category-id").val();
            var intSubCategoryId = $("#js-add-to-cart-sub-category-id").val();
            var strBrand= $("#js-add-to-cart-brand").val();
            var cart_order_type = '<?= CART_ORDER_TYPE_2; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "add-to-cart",
                data: { 'organic_input_ecommerce_id' : intOrganicInputEcommerceId, 
                        'price' : intPrice, 
                        'qunatity' : intQuantity, 
                        'product_name' : strProductName, 
                        'category_id' : intCategoryId, 
                        'sub_category_id' : intSubCategoryId, 
                        'brand' : strBrand, 
                        'cart_order_type': cart_order_type 
                },
                success: function( arrmixResult ) {
                    var arrmixResult = $.parseJSON( arrmixResult );
                    $('#js-add-cart-modal').modal('hide');
                    if( true == arrmixResult['success'] ) {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + arrmixResult['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(5000).fadeOut(function () {
                            $(this).remove();
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    } else {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message').parent().before('<div class="alert alert-danger"><i class="fa fa-times-circle"></i>  ' + arrmixResult['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(5000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                }
            });
        }
    </script>

