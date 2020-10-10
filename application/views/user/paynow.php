<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body style="background-color: #edf1f1c4">
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" name="paynow-form" id="js-paynow-form" >
            <div class="row">
                <div class="col-md-12 ">
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

                    <div class="box box-danger mt-20">
                        <div class="text-info box-header with-border text-center">
                            <h2 class="box-title"><i class="fa fa-globe"></i> <b><?= $title?></b></h2>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Contact Details</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group js-alert-message">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Fullname</label>
                                                        <input type="text" name="fullname"  class="form-control" id="js-fullname" placeholder="Fullname" value="<?= !empty( $arrUserDetails['fullname'] ) ? $arrUserDetails['fullname'] : set_value('fullname') ?>" >
                                                        <span class="has-error"><?php echo form_error('fullname'); ?></span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Email Id</label>
                                                        <input type="text" name="email_id"  class="form-control" id="js-email-id" placeholder="Email Id" value="<?= !empty( $arrUserDetails['email_id'] ) ? $arrUserDetails['email_id'] : set_value('email_id') ?>" >
                                                        <span class="has-error"><?php echo form_error('email_id'); ?></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="mobile_no"  class="form-control" id="js-mobile-no" placeholder="Mobile Number" value="<?= !empty( $arrUserDetails['mobile_no'] ) ? $arrUserDetails['mobile_no'] : set_value('mobile_no') ?>" >
                                                        <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <h4>Address Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Select State</label>
                                                        <select class="form-control select2" name="state_id" id="js-state-id">
                                                            <option disabled="disabled" selected="selected">Select State</option>
                                                            <?php foreach( $arrStateList  as $arrStateDetails){ 
                                                                    $selected = '';
                                                                    if( $arrUserDetails['state_id'] == $arrStateDetails['id'] ) {
                                                                        $selected = 'selected="selected"';
                                                                    }
                                                            ?>
                                                                    <option value="<?= $arrStateDetails['id']?>" <?= set_select('state_id',$arrStateDetails['id']);?> <?= $selected?> ><?= $arrStateDetails['name']?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="has-error"><?php echo form_error('state_id'); ?></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Select City</label>
                                                        <select class="form-control select2" name="city_id" id="js-city-id">
                                                            <option disabled="disabled" selected="selected">Select City</option>
                                                        </select>
                                                        <input type="hidden" value="<?= $arrUserDetails['city_id'] ?>" class="js-city-id-hidden" >
                                                        <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                                    </div>
                                                    
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Pincode</label>
                                                        <input type="text" name="pincode"  class="form-control" id="js-pincode" placeholder="Pincode" value="<?= !empty( $arrUserDetails['pincode'] ) ? $arrUserDetails['pincode'] : set_value('pincode') ?>" >
                                                        <span class="has-error"><?php echo form_error('pincode'); ?></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Address</label>
                                                        <textarea name="address"  class="form-control" id="js-address"><?= !empty( $arrUserDetails['address'] ) ? $arrUserDetails['address'] : set_value('address') ?></textarea>
                                                        <span class="has-error"><?php echo form_error('address'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-success" id="submit" style="width: 100%">Place Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"> Your Product Details</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group js-alert-message">
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
                                            <div class="paynow-cart-product-list">
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
                                                        <br>
                                                <?php } ?>          
                                            </div>        
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
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </div>    
            </div>

            <input type="hidden" name="payment_method"  value="<?= PAYMENT_METHOD_ONLINE ?>">
            <input type="hidden" name="user_type_id" value="<?= $arrUserDetails['user_type_id'] ?>">
            <input type="hidden" name="user_id" value="<?= $arrUserDetails['user_id'] ?>">
            <input type="hidden" name="total_amount" value="<?= $arrmixCartList['total'] ?>">
        </form>
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
            $("#js-state-id").on('change',function(){
                var intStateId = $(this).val();
                getCitiesByState( intStateId );
            });
            var intStateId = $("#js-state-id").val();
            if( '' != intStateId ){
                getCitiesByState( intStateId );
            }
        });

        function getCitiesByState( intStateId ){
            var intCityIdHidden = $(".js-city-id-hidden").val();
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "getcities-by-state",
                data: { 'state_id' : intStateId, 'city_id_hidden' : intCityIdHidden },
                dataType: "html",
                success: function(result){
                    var html = $.parseJSON(result);
                    $("#js-city-id").html('<option disabled selected> Select City</option>');
                    $("#js-city-id").append(html);
                }
            });
        }
    </script>

