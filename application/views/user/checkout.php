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
<!--    <div id="loading" style="display: block;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > </div>-->
    <div class="">
        <div class="col-xs-12 bg-gray">
            <h2 class="page-header center">
                <i class="fa fa-globe"></i> <?= $title?>
            </h2>
        </div>
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
                <div class="col-md-12 mt-20">
                    <div class="box box-primary">
                        <div class="box-header">
    <!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                        </div>
                        <div class="box-body">
                            <div class="form-group js-alert-message">
                                <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { ?>
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
                                                                <td><a href="javascript:void(0)" class="btn btn-danger remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                            </tr>        
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                        <br>
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
                                                                <td><?= $arrEcommerceCategory[$arrCartDetails['options']['sub_category_id']] ?></td>
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
                                        <br>
                                        <h4>Total Cost</h4>
                                        <table class="table-bordered table-responsive cart-table">
                                            <thead>
                                                <th><b>Total</b></th>
                                                <th><?= $arrmixCartList['total'] ?></th>
                                            </thead>
                                        </table>
                                    <?php } else { ?>
                                            <table>
                                                <tr>
                                                    <td colspan="3" class="text-align-center"><b>You cart is empty</b></td>
                                                </tr>
                                            </table>    
                                    <?php } ?>    
                            </div>
                        </div>
                        <div class="box-footer center">
                            <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) { ?>
                                <a href="<?= base_url()?>paynow" class="btn btn-success" >Buy Now</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

