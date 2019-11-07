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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" name="search-buy-product-form" id="search-buy-product-form" >
                        <div class="box box-danger">
                            <div class="box-header">
        <!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                            </div>
                            <div class="box-body">
                                <div class="form-group">
	                                <div class="col-md-3">
		                                <label>Select State</label>
		                                <select class="form-control select2" name="delivery_location_state" id="js-delivery-location-state">
			                                <option disabled="disabled" selected="selected">Select State</option>
			                                <?php foreach( $arrStateList  as $arrStateDetails ) { ?>
				                                <option value="<?= $arrStateDetails['id']?>" <?= set_select('delivery_location_state',$arrStateDetails['id']);?>><?= $arrStateDetails['name']?></option>
			                                <?php } ?>
		                                </select>
		                                <span class="has-error"><?php echo form_error('delivery_location_state'); ?></span>
	                                </div>

	                                <div class="col-md-3">
		                                <label>Select City</label>
		                                <select class="form-control select2" name="delivery_location[]" id="js-delivery-location" multiple>
			                                <option disabled="disabled" selected="selected">Select City</option>
		                                </select>
		                                <input type="hidden" value="<?= isset( $intHiddenCityid ) ? $intHiddenCityid  : '' ?>" class="js-hidden-delivery-location" >
		                                <span class="has-error"><?php echo form_error('delivery_location'); ?></span>
	                                </div>

                                    <div class="col-md-3">
                                        <label>Select Category</label>
                                        <select class="form-control select2" name="category_id" id="js-category-id">
                                            <option disabled="disabled" selected="selected" >Select Category</option>
                                            <?php foreach( $arrProductCategoryList  as $arrProductCategoryDetails ) { ?>
                                                    <option value="<?= $arrProductCategoryDetails['id'] ?>" <?= set_select( 'category_id', $arrProductCategoryDetails['id'], false ); ?> > <?= $arrProductCategoryDetails['name'] ?> </option>
                                            <?php } ?>
                                        </select>
	                                    <span class="has-error"><?php echo form_error('category_id'); ?></span>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Select Product</label>
	                                    <select class="form-control select2" name="product_id" id="js-product-id">
		                                    <option disabled="disabled" selected="selected">Select Product</option>
	                                    </select>
	                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer center">
                                <button type="submit" class="btn btn-success" id="submit">Search Seller Product</button>
	                            <a href="<?= base_url()?>search-buy-product" class="btn btn-danger">Reset Filter</a>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="js-hidden-product-id" value="<?= ( true == isset( $intProductId ) ) ? $intProductId : '' ?>">
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
                <div class="col-md-12 mt-20 js-alert-message">
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <div class="box-body">
                            <?php if( true == isset( $arrSellProductList ) && true == isArrVal( $arrSellProductList ) ) {
                                    foreach( $arrSellProductList as $arrSellProductDetails ) {
                            ?>
                                <div class="box post-panel">
                                    <div class="box-body">
	                                    <div class="col-md-2">
		                                    <?php if( true == isset( $arrSellProductDetails['primary_image'] ) ){ ?>
		                                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['primary_image'] ?>" class="mt-30" width="40%" height="40%">
		                                    <?php } else { ?>
			                                    <img src="<?= base_url()?>assets/images/logo.png" class="mt-40" width="70%" height="90px">
		                                    <?php } ?>
	                                    </div>
                                        <div class="col-md-2">
                                            <h4>Category</h4>
                                            <span class="product-name"> <?= $arrSellProductDetails['category_name'] ?> </span>
                                            <br>
                                            <h4>Product</h4>
                                            <span class="product-name"> <?= $arrSellProductDetails['product_name'] ?> </span>
                                        </div>
	                                    <div class="col-md-2">
                                            <h4>Quantity (in Kg)</h4>
                                            <span><?= $arrSellProductDetails['sell_quantity']; ?></span>
                                            <br>
                                            <h4>Expected Price (per Kg)</h4>
                                            <span><?= $arrSellProductDetails['price']; ?></span>
		                                </div>
	                                    <div class="col-md-2">
		                                    <h4>Total Price : </h4>
		                                    <span><?= $arrSellProductDetails['total_price']; ?></span>
		                                    <h4>Product Description : </h4>
		                                    <span><?= $arrSellProductDetails['product_description']; ?></span>
										</div>
                                        <div class="col-md-1">
											<h4>Stock : </h4>
	                                        <span><b><?= ( IN_STOCK == $arrSellProductDetails['stock'] ) ? 'In Stock' : ' Out of Stock ' ?></b></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="javascript:void(0)" class="btn btn-info" id="js-sell-product-view-details-button"  data-fullname="<?= ( true == isVal( $arrSellProductDetails['fullname'] ) ) ? $arrSellProductDetails['fullname'] : 'Organic Pandit' ?>" data-sell_product_id="<?= $arrSellProductDetails['sell_product_id']?>" data-toggle="tooltip"  title="View Details" onclick="sellProductViewDetailsModal( this )"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
	                                            <?php if( IN_STOCK == $arrSellProductDetails['stock'] ) { ?>
	                                                <div class="col-md-3">
	                                                    <a href="javascript:void(0)" class="btn btn-success" data-sell_product_id="<?= $arrSellProductDetails['sell_product_id']?>" data-product_id="<?= $arrSellProductDetails['product_id']?>" data-fullname="<?= ( true == isVal( $arrSellProductDetails['fullname'] ) ) ? $arrSellProductDetails['fullname'] : 'Organic Pandit' ?>" data-category="<?= $arrSellProductDetails['category_name'] ?>" data-product="<?= $arrSellProductDetails['product_name'] ?>" data-price="<?= $arrSellProductDetails['total_price'] ?>" data-toggle="tooltip" title="Add to Cart" onclick="addToCartModal( this )" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
	                                                </div>
	                                            <?php } ?>
	                                            <div class="col-md-3">
		                                            <a href="javascript:void(0)" class="btn btn-warning" id="js-sell-product-send-enquiry-button" data-sell_product_id="<?= $arrSellProductDetails['sell_product_id']?>" data-toggle="tooltip"  title="Send Enquiry" onclick="sendEnquiryModal(this)"><i class="fa fa-address-card" aria-hidden="true"></i></a>
	                                            </div>
											</div>
                                        </div>

                                    </div>
                                </div>
							<?php } }else{ ?>
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="col-md-12 center">
                                                 No Details Found
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
	                        <input type="hidden" id="js-user-id" value="<?= $intUserId ?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="search-box" id="detail-row"></div>

            <!-- footer -->
        </div>
    </div>
    <!-- modal -->

    <div class="modal fade js-sell-product-view-details-modal" id="js-sell-product-view-details-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="js-sell-product-username-modal"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="js-sell-product-view-details-modal-body"></div>
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
	                <div id="js-sell-product-add-to-cart"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="addToCart(this)">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade js-sell-product-send-enquiry-modal" id="js-sell-product-send-enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span></button>
				    <h4 class="modal-title">Send Enquiry</h4>
			    </div>
			    <div class="modal-body">
				    <div id="js-sell-product-send-enquiry-modal-body"></div>
				    <div class="row js-description-row">
					    <div class="form-group col-md-12">
						    <label>Description</label>
						    <br>
						    <textarea id="js-send-enquiry-description" class="form-control"></textarea>
					    </div>
				    </div>
			    </div>
			    <div class="modal-footer">
				    <button type="button" class="btn btn-success js-send-enquiry-button" onclick="sendEnquiry(this)">Send</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    </div>
		    </div>
	    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#js-category-id").on('change',function(){
                    var intCategoryId = $(this).val();
                    fetchProductByCategory( intCategoryId );
            });
            var intCategoryId = $("#js-category-id").val();
            if( '' != intCategoryId ){
                    fetchProductByCategory( intCategoryId );
            }

            $("#js-delivery-location-state").on('change',function(){
                var intStateId = $(this).val();
                getBuyProductCitiesByState( intStateId );
            });
            var intStateId = $("#js-delivery-location-state").val();
            if( '' != intStateId ){
                getBuyProductCitiesByState( intStateId );
            }
        });

        function fetchProductByCategory( $intCategoryId ) {
            var intHiddenProductId = $("#js-hidden-product-id").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "buy-sell/fetch-product-by-category-id",
                data: { 'category_id' : $intCategoryId, 'hidden_product_id' : intHiddenProductId },
                dataType: "html",
                success: function(arrmixresponseData){
                    var arrResponseHtml = $.parseJSON(arrmixresponseData);
                    $("#js-product-id").html('<option disabled selected> Select Product</option>');
                    $("#js-product-id").append(arrResponseHtml);
                }
            });
        }

        function getBuyProductCitiesByState( intStateId ){
                var intCityIdHidden = $(".js-hidden-delivery-location").val();
				$.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "getcities-by-state",
                        data: { 'state_id' : intStateId, 'city_id_hidden' : intCityIdHidden },
                        dataType: "html",
                        success: function(result){
                                var html = $.parseJSON(result);
                                $("#js-delivery-location").html('<option disabled selected> Select City</option>');
                                $("#js-delivery-location").append(html);
                        }
                });
        }

        function sellProductViewDetailsModal( ths ) {
            var intSellProductId = $(ths).data('sell_product_id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "fetch-sell-product-by-id",
                data: { 'sell_product_id' : intSellProductId },
                dataType: "html",
                success: function(result){
                        $(".js-sell-product-username-modal").text($(ths).data('fullname'));
                        $("#js-sell-product-view-details-modal-body").html(result);
                        $('#js-sell-product-view-details-modal').modal('show');
                }
            });
        }

        function addToCartModal( ths ) {
        	var intSellProductId = $(ths).data('sell_product_id');
        	var boolAddToCartModal = true;
	        $.ajax({
		        type: "POST",
		        url: "<?php echo base_url(); ?>" + "fetch-sell-product-by-id",
		        data: { 'sell_product_id' : intSellProductId, 'bool_add_to_cart_modal' : boolAddToCartModal },
		        dataType: "html",
		        success: function(result){
			        $("#js-sell-product-add-to-cart").html(result);
			        $('#js-add-cart-modal').modal('show');
		        }
	        });
        }

        function sendEnquiryModal( ths ) {
        	$(ths).addClass('disabled');
	        var intUserId = $("#js-user-id").val();
	        if( '' == intUserId ) {
		        $( "#js-sell-product-send-enquiry-modal-body" ).html( '<h2 class="has-error"> Please login to send the enquiry </h2>' );
		        $(".js-send-enquiry-button").hide();
		        $(".js-description-row").hide();
		        $(ths).removeClass('disabled');
		        $( '#js-sell-product-send-enquiry-modal' ).modal( 'show' );
	        } else {
		        $( "#js-sell-product-send-enquiry-modal-body" ).html('');
		        $(".js-send-enquiry-button").show();
		        $(".js-description-row").show();
		        var intSellProductId = $( ths ).data( 'sell_product_id' );
		        var boolSendEnquiryModal = true;
		        $( "#js-send-enquiry-description" ).val( '' );
		        $.ajax( {
			        type: "POST",
			        url: "<?php echo base_url(); ?>" + "fetch-sell-product-by-id",
			        data: { 'sell_product_id': intSellProductId, 'bool_send_enquiry_modal': boolSendEnquiryModal },
			        dataType: "html",
			        success: function( result ) {
				        $( ths ).removeClass( 'disabled' );
				        $( "#js-sell-product-send-enquiry-modal-body" ).html( result );
				        $( '#js-sell-product-send-enquiry-modal' ).modal( 'show' );
			        }
		        } );
	        }
        }

        function addToCart( ths ) {
            var intProductId = $("#js-add-to-cart-product").data('product_id');
            var intPrice = $("#js-add-to-cart-price").data('total_price');
            var intSellProductId = $("#js-add-to-cart-sell-product-id").val();
            var strProductName = $("#js-add-to-cart-product").val();
            var cart_order_type = '<?= CART_ORDER_TYPE_1; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "add-to-cart",
                data: { 'product_id' : intProductId, 'price' : intPrice, 'product_name' : strProductName, 'sell_product_id' : intSellProductId, 'cart_order_type': cart_order_type },
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

        function sendEnquiry( ths ) {
        	var intSellProductId = $("#js-send-enquiry-sell-product-id").val();
	        var strDescription = $("#js-send-enquiry-description").val();
	        $.ajax({
		        type: "POST",
		        url: "<?php echo base_url(); ?>" + "send-enquiry-sell-product",
		        data: { 'sell_product_id' : intSellProductId, 'description' : strDescription },
		        success: function( arrmixResult ) {
			        var arrmixResult = $.parseJSON( arrmixResult );
			        $('#js-sell-product-send-enquiry-modal').modal('hide');
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

