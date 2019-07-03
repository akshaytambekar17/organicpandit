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
                                <table class="table-bordered table-responsive checkout-table">
                                    <thead>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) {
                                                foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                        ?>  
                                                <tr>
                                                    <td><?= $arrCartDetails['name'] ?></td>
                                                    <td><?= $arrCartDetails['price'] ?></td>
                                                    <td><a href="javascript:void(0)" class="btn btn-danger remove-cart-product" data-rowid="<?= $arrCartDetails['rowid'] ?>" data-product_name="<?= $arrCartDetails['name'] ?>"  data-toggle="tooltip" title="Remove Product" onclick="removeCartProduct(this)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                </tr>        
                                            <?php } ?>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td colspan="2"><?= $arrmixCartList['total'] ?></td>
                                            </tr>
                                        <?php } else { ?>
                                                <tr>
                                                    <td colspan="3" class="text-align-center"><b>You cart is empty</b></td>
                                                </tr>
                                        <?php } ?>    
                                    </tbody>
                                </table>
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
        
        });
        
     </script>

