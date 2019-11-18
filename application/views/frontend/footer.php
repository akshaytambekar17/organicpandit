        <link href="<?= base_url()?>assets/design/css/style.css" rel="stylesheet">
        <footer id="myFooter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h2 class="logo"><a href="#"><img src="<?= base_url() ?>assets/design/img/logo.png"  class="img-responsive" /></a></h2>
                    </div>
                    <div class="col-sm-2">
                        <h5>GET STARTED</h5>
                        <ul>
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li><a href="<?= base_url()?>blogs">Publications</a></li>
                            <li><a href="<?= base_url()?>signup">Sign up</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>ABOUT US</h5>
                        <ul>
                            <li><a href="<?= base_url()?>about">Company Information</a></li>
                            <li><a href="<?= base_url()?>contact">Contact us</a></li>
                            <li><a href="#">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>SUPPORT</h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Help desk</a></li>
                            <li><a href="#">Forums</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <div class="social-networks">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <a href="<?= base_url()?>contact" class="btn btn-default">Contact us</a></li>
<!--                        <button type="button" class="btn btn-default">Contact us</button>-->
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <p>&copy; 2018 Organic Pandit </p>
            </div>
        </footer>
        <div class="modal fade add-to-cart-modal" id="js-cart-modal" role="dialog">
	        <div class="modal-dialog">
		        <!-- Modal content-->
		        <div class="modal-content">
			        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title modal-cart">Cart</h4>
			        </div>
			        <div class="modal-body modal-cart">
                                    <div class="js-alert-message">
                                        <?php $arrmixCartList = fetchCartDetails();
                                            //printDie( $arrmixCartList );
                                            if( true == isArrVal( $arrmixCartList['cart_list'] ) ) {
                                        ?>
                                                <h4>Buy Product</h4>
                                                <table class="table-bordered table-responsive cart-table">
                                                    <thead>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                                                if( CART_ORDER_TYPE_1 == $arrCartDetails['options']['cart_order_type'] ) {
                                                        ?>  
                                                                    <tr>
                                                                        <td><?= $arrCartDetails['name'] ?></td>
                                                                        <td><?= $arrCartDetails['price'] ?></td>
                                                                        <td><?= $arrCartDetails['qty'] ?></td>
                                                                        <td><a href="javascript:void(0)" class="btn btn-danger remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                    </tr>        
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h4>Organic Input-Ecommerce</h4>
                                                <table class="table-bordered table-responsive cart-table">
                                                    <thead>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Brand</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $arrEcommerceCategory = getEcommerceCategory();
                                                            $arrEcommerceSubCategory = getEcommerceSubCategory();
                                                            foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                                                if( CART_ORDER_TYPE_2 == $arrCartDetails['options']['cart_order_type'] ) {
                                                        ?>  
                                                                    <tr>
                                                                        <td><?= $arrEcommerceCategory[$arrCartDetails['options']['category_id']] ?></td>
                                                                        <td><?= $arrEcommerceSubCategory[$arrCartDetails['options']['sub_category_id']] ?></td>
                                                                        <td><?= $arrCartDetails['options']['brand'] ?></td>
                                                                        <td><?= $arrCartDetails['price'] ?></td>
                                                                        <td><?= $arrCartDetails['qty'] ?></td>
                                                                        <td><a href="javascript:void(0)" class="btn btn-danger remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                    </tr>        
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h4>Shop Products</h4>
                                                <table class="table-bordered table-responsive cart-table">
                                                    <thead>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                                                if( CART_ORDER_TYPE_3 == $arrCartDetails['options']['cart_order_type'] ) {
                                                        ?>  
                                                                    <tr>
                                                                        <td><?= $arrCartDetails['name'] ?></td>
                                                                        <td><?= $arrCartDetails['price'] ?></td>
                                                                        <td><?= $arrCartDetails['qty'] ?></td>
                                                                        <td><a href="javascript:void(0)" class="btn btn-danger remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                    </tr>        
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                         
                                        <?php } else { ?>
                                                <p> Your cart is empty</p>
                                        <?php } ?>
                                    </div>
			        </div>
			        <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { ?>
                                                <div class="pull-left">
                                                    <span>Total Cost : </span> <?= $arrmixCartList['total'] ?>
                                                </div>    
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { ?>
                                                <a href="<?= base_url()?>checkout-cart" class="btn btn-primary js-checkout-modal-button">Checkout</a>
                                            <?php } ?>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
			        </div>
		        </div>

	        </div>
        </div>
        <script type="text/javascript">
                $(document).ready(function () {
                    $(".js-cart-button").on('click',function(){
                        $('#js-cart-modal').modal('show');
                    });
                });

            function validateEmail( email ) {
                var email_format = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(email_format.test( email )){
                    return true;
                }else{
                    return false;
                }
            }

            function validateMobileNumber( mobileno ) {
                var number_format = /^\d{10}$/;
                if(number_format.test(mobileno)){
                    return true;
                }else{
                    return false;
                }

            }
            
            function removeCartProduct( ths ) {
                var intRowId = $(ths).data('rowid');
                var strProductName = $(ths).data('product_name');
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "remove-from-cart",
                    data: { 'rowid' : intRowId, 'product_name' : strProductName },
                    success: function( arrmixResult ) {
                        var arrmixResult = $.parseJSON( arrmixResult );
                        
                        if( true == arrmixResult['success'] ) {
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            $('.js-alert-message').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + arrmixResult['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                            $('.alert').fadeIn().delay(5000).fadeOut(function () {
                                $(this).remove();
                            });
                        } else {
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            $('.js-alert-message').parent().before('<div class="alert alert-danger"><i class="fa fa-times-circle"></i>  ' + arrmixResult['message'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                            $('.alert').fadeIn().delay(5000).fadeOut(function () {
                                $(this).remove();
                            });
                        }
                        setTimeout(function(){ 
                            $('#js-cart-modal').modal('hide');
                            location.reload();
                        }, 2000);

                    }
                });
            }
            
        </script>
    </body>
</html>