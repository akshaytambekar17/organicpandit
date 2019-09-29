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
                <i class="fa fa-globe"></i> <?= $strHeading ?>
            </h2>
        </div>
        <div class="container-fluid">
            <?php if( true == isStrVal( $this ->session->flashdata( 'Message' ) ) ) { 
                    $strSuccessMessage = $this ->session->flashdata( 'Message' );
            ?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $strSuccessMessage ?>
                    </div>
                </div>
            <?php }?> 
            <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) { 
                    $strErrorMessage = $this ->session->flashdata( 'Error' );
            ?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $strErrorMessage ?>
                    </div>
                </div>
            <?php } ?>
            <br>
            <div class="row">
                <div class="col-md-12 mt-20 alert-message ">
                    <div class="box box-success">
                        <div class="box-header js-alert-message">
                            <h4>User : <?= $arrUserDetails['fullname'] ?></h4>
                        </div>
                        <div class="box-body js-box-details">
                            <?php
                                if( true == isArrVal( $arrUserEcommercesList ) ) {
                                    foreach( $arrUserEcommercesList as $arrUserEcommerceDetails ) {
                            ?>
                                    <div class="box js-post-panel">
                                        <div class="box-body">
                                            <div class="col-md-2">
                                                <h4>Image</h4>
                                                <?php if( true == isStrVal( $arrUserEcommerceDetails['primary_image'] ) ) { ?>
                                                    <img src="<?= base_url() ?>assets/images/product_images/<?= $arrUserEcommerceDetails['primary_image'] ?>" height="90px">
                                                <?php } else { ?>
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/shops.png" height="90px">
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-2">
                                                <h4>Category</h4>
                                                <b class="fullname">
                                                    <?= $arrUserEcommerceDetails['category_name'] ; ?>
                                                </b>
                                                <br>
                                                <h4>Product Name</h4>
                                                <b class="fullname">
                                                    <?php echo $arrUserEcommerceDetails['product_name']; ?>
                                                </b>
                                                <br>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <h4>Price</h4>
                                                <b><?= $arrUserEcommerceDetails['price']; ?></b>
                                            </div>
                                            <div class="col-md-2">
                                                <h4>Description</h4>
                                                <b><?= $arrUserEcommerceDetails['description']; ?></b>
                                            </div>
                                            <div class="col-md-2">
                                                <h4>Stock</h4>
                                                <?php
                                                    if( IN_STOCK == $arrUserEcommerceDetails['stock'] ) {
                                                        echo '<span class="label label-success">In Stock</span>';
                                                    } else {
                                                        echo '<span class="label label-danger">Out of Stock</span>';
                                                    }
                                                ?>
                                            </div>
                                            <?php if( IN_STOCK == $arrUserEcommerceDetails['stock'] ) { ?>
                                                <div class="col-md-2">
                                                    <div class="user-padding-block">
                                                        <div class="col-md-4">
                                                            <a href="javascript:void(0)" class="btn btn-success" data-user_id="<?= $arrUserEcommerceDetails['user_id'] ?>" data-user_ecommerce_id="<?= $arrUserEcommerceDetails['user_ecommerce_id'] ?>" data-fullname="<?= $arrUserEcommerceDetails['fullname'] ?>"  onclick="showAddToCartModal(this)" data-toggle="tooltip" title="Add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                            <?php   }
                                } else { 
                            ?>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="col-md-12 center">
                                            No <?= $title ?> Found
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <input type="hidden" id="user_id_hidden" value="<?= $arrUserDetails['user_id'] ?>">
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
                    <button type="button" class="btn btn-success" onclick="userShopEcommerceAddToCart()">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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

        function showAddToCartModal( ths ) {
            var intUserEcommerceId = $( ths ).data( 'user_ecommerce_id' );
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-shop-ecommerce-add-to-cart",
                data: { 'user_ecommerce_id' : intUserEcommerceId },
                dataType: "html",
                success: function( strResult ){
                    $( '#js-modal-body-content-add-to-cart' ).html( strResult );
                    $( '#js-add-cart-modal' ).modal('show');
                }
            });
        }
        
        function userShopEcommerceAddToCart() {
            var intUserEcommerceId = $("#js-add-to-cart-user-ecommerce-id").val();
            var intQuantity = $("#js-add-to-cart-quantity").val();
            var strProductName = $( '#js-add-to-cart-product-name' ).val();
            var intCategoryId = $("#js-add-to-cart-category-id").val();
            var intProductId = $("#js-add-to-cart-product-id").val();
            var strCartOrderType = '<?= CART_ORDER_TYPE_3; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "add-to-cart",
                data: { 'user_ecommerce_id' : intUserEcommerceId, 
                        'qunatity' : intQuantity, 
                        'product_name' : strProductName, 
                        'category_id' : intCategoryId, 
                        'product_id' : intProductId, 
                        'cart_order_type': strCartOrderType 
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

