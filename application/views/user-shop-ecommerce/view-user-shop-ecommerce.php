<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body style="background-color: #edf1f1c4">
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
                <div class="box box-success js-alert-message">
                    <div class="box-header with-border text-center">
                        <h2 class="box-title"><i class="fa fa-globe"></i> <?= $strHeading ?></h2>
                    </div>
                    <div class="box-body js-box-details">
                        <h4>User : <?= $arrUserDetails['fullname'] ?></h4><br>
                        <?php
                            if( true == isArrVal( $arrUserEcommercesList ) ) {
                                foreach( $arrUserEcommercesList as $arrUserEcommerceDetails ) {
                        ?>
                                <div class="col-md-3">
                                    <div class="box box-info shop-box js-post-panel">
                                        <div class="box-body">
                                            <?php
                                                if( IN_STOCK == $arrUserEcommerceDetails['stock'] ) {
                                                    echo '<span class="label label-success pull-right">In Stock</span>';
                                                } else {
                                                    echo '<span class="label label-danger pull-right">Out of Stock</span>';
                                                }
                                            ?>
                                            <br>
                                            <div class="ps-post__thumbnail">
                                                <a class="ps-post__overlay" href="javascript:void(0)"></a> 
                                                <?php if( true == isVal( $arrUserEcommerceDetails['primary_image'] ) ) { ?>
                                                    <img src="<?= checkFileExist( './assets/images/product_images/' . $arrUserEcommerceDetails['primary_image'] ) ?>" alt="Organic Pandit" height="90px">
                                                <?php } else { ?>
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/shops.png" height="90px">
                                                <?php } ?>
                                            </div>
                                            <br>
                                            <div class="row categories-subcategory-details">
                                                <div class="col-md-6">
                                                    <h4>Category</h4>
                                                    <b class="fullname">
                                                        <?= $arrUserEcommerceDetails['category_name'] ; ?>
                                                    </b>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4>Product Name</h4>
                                                    <b class="fullname">
                                                        <?= $arrUserEcommerceDetails['product_name']; ?>
                                                    </b>
                                                </div>
                                            </div>

                                            <h4>Price</h4>
                                            <b><?= $arrUserEcommerceDetails['price']; ?></b>

                                            <h4>Description</h4>
                                            <p class="shop-description">
                                                <b>
                                                    <?= ( true == isVal( $arrUserEcommerceDetails['description'] ) ) ? strlen( $arrUserEcommerceDetails['description'] ) > 120 ? substr( $arrUserEcommerceDetails['description'], 0, 120 ) . '....<a href="javascript:void(0)" onclick="showShopDescriptionModel(this)" data-product_name="' . $arrUserEcommerceDetails['product_name'] . '" data-category_name="' . $arrUserEcommerceDetails['category_name'] . '" data-description="' . $arrUserEcommerceDetails['description'] . '">Read More</a>' : $arrUserEcommerceDetails['description'] : 'NA'; ?>
                                                </b>
                                            </p>    
                                            <br>
                                            <?php if( IN_STOCK == $arrUserEcommerceDetails['stock'] ) { ?>
                                                <?php if( true == isArrVal( $arrmixUserSession ) ) { ?>
                                                    <a href="javascript:void(0)" class="btn btn-success btn-outline-success add-to-cart-button mt-20" data-user_id="<?= $arrUserEcommerceDetails['user_id'] ?>" data-user_ecommerce_id="<?= $arrUserEcommerceDetails['user_ecommerce_id'] ?>" data-fullname="<?= $arrUserEcommerceDetails['fullname'] ?>"  onclick="showAddToCartModal(this)" data-toggle="tooltip" title="Add to cart">Add to Cart  <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-success btn-outline-success add-to-cart-button mt-20 js-forcefully-login-button" data-toggle="tooltip" title="Add to cart" data-toggle="modal" data-target="#js-subscribe-modal">Add to Cart  <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                <?php } ?>       
                                            <?php } ?>
                                        </div>
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
    
    <div class="modal fade" id="js-shop-description-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span id="js-modal-title-shop"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="js-modal-body-content-shop"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
        
        function showShopDescriptionModel( ths ) {
            var strTitle = '<b>Category</b> : ' + $( ths ).data( 'category_name' ) + ' and <b>Product</b> : ' + $( ths ).data( 'product_name' );
            
            $( '#js-modal-title-shop' ).html( strTitle );
            $( '#js-modal-body-content-shop' ).html( $( ths ).data( 'description' ) );
            $( '#js-shop-description-modal' ).modal('show');
        }
    </script>

