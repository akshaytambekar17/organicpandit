<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body style="background-color: #edf1f1c4">
   
    <div class="container-fluid">
        <div class="row">
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
            <div class="col-md-12 mt-20 js-alert-message">
                <div class="box box-primary">
                    <div class="text-info box-header with-border text-center">
                        <h2 class="box-title"><i class="fa fa-globe"></i> <b><?= $title?></b></h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { 
                                            $boolIsCartOrderType1 = false;
                                            $boolIsCartOrderType2 = false;
                                            $boolIsCartOrderType3 = false;
                                            
                                            foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                                if( CART_ORDER_TYPE_1 == $arrCartDetails['options']['cart_order_type'] ) {
                                                    $boolIsCartOrderType1 = true;
                                                }

                                                if( CART_ORDER_TYPE_2 == $arrCartDetails['options']['cart_order_type'] ) {
                                                    $boolIsCartOrderType2 = true;
                                                }

                                                if( CART_ORDER_TYPE_3 == $arrCartDetails['options']['cart_order_type'] ) {
                                                    $boolIsCartOrderType3 = true;
                                                }
                                            }
                                    ?>
                                    <?php if( true == $boolIsCartOrderType1 ) { ?>
                                            <h4>Buy Product</h4>
                                            <table class="table-bordered table-responsive checkout-table">
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
                                                                    <td><a href="javascript:void(0)" class="remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                </tr>        
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                            <br>
                                    <?php } ?>       
                                    <?php if( true == $boolIsCartOrderType2 ) { ?>        
                                            <h4>Organic Input-Ecommerce</h4>
                                            <table class="table-bordered table-responsive checkout-table">
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
                                                                    <td><a href="javascript:void(0)" class="remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                </tr>        
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                            <br>
                                        <?php } ?>  
                                        <?php if( true == $boolIsCartOrderType3 ) { ?>                    
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
                                                                    <td><a href="javascript:void(0)" class="remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                                </tr>        
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>    
                                        <?php } else { ?>
                                                <table>
                                                    <tr>
                                                        <td colspan="3" class="text-align-center"><b>You cart is empty</b></td>
                                                    </tr>
                                                </table>    
                                        <?php } ?>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4>Total Amount to be paid</h4>
                                <table class="table-bordered table-responsive cart-table">
                                    <tbody>
                                        <tr>
                                            <td>Amount</td>
                                            <td><?= $arrmixCartList['total'] ?></td>
                                        </tr>    
                                        <tr>
                                            <td>Shipping</td>
                                            <td>NA</td>
                                        </tr>    
                                        <tr>
                                            <th><b>Final Amount</b></th>
                                            <th><?= $arrmixCartList['total'] ?></th>
                                        </tr>    
                                    </tbody>
                                </table>
                                <br><br>
                                <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { ?>
                                <a href="<?= base_url()?>paynow" class="btn btn-success" style="width: 100%">Go To Checkout</a>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal -->

