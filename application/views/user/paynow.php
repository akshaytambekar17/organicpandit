<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <!-- banner -->
    <div class="">
        <div class="col-xs-12 bg-gray">
            <h2 class="page-header center">
                <i class="fa fa-globe"></i> <?= $title?>
            </h2>
        </div>
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data" name="paynow-form" id="js-paynow-form" >
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
                            <div class="box-header with-border">
                                <h3 class="box-title">Contact Details</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group js-alert-message">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Fullname</label>
                                            <input type="text" name="fullname"  class="form-control" id="js-fullname" placeholder="Fullname" value="<?= !empty( $arrUserDetails['fullname'] ) ? $arrUserDetails['fullname'] : set_value('fullname') ?>" >
                                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Email Id</label>
                                            <input type="text" name="email_id"  class="form-control" id="js-email-id" placeholder="Email Id" value="<?= !empty( $arrUserDetails['email_id'] ) ? $arrUserDetails['email_id'] : set_value('email_id') ?>" >
                                            <span class="has-error"><?php echo form_error('email_id'); ?></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile_no"  class="form-control" id="js-mobile-no" placeholder="Mobile Number" value="<?= !empty( $arrUserDetails['mobile_no'] ) ? $arrUserDetails['mobile_no'] : set_value('mobile_no') ?>" >
                                            <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                                        </div>

                                    </div>

                                    <h4>Address Details</h4>
                                    <div class="row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <label>Select City</label>
                                            <select class="form-control select2" name="city_id" id="js-city-id">
                                                <option disabled="disabled" selected="selected">Select City</option>
                                            </select>
                                            <input type="hidden" value="<?= $arrUserDetails['city_id'] ?>" class="js-city-id-hidden" >
                                            <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Pincode</label>
                                            <input type="text" name="pincode"  class="form-control" id="js-pincode" placeholder="Pincode" value="<?= !empty( $arrUserDetails['pincode'] ) ? $arrUserDetails['pincode'] : set_value('pincode') ?>" >
                                            <span class="has-error"><?php echo form_error('pincode'); ?></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Address</label>
                                            <textarea name="address"  class="form-control" id="js-address"><?= !empty( $arrUserDetails['address'] ) ? $arrUserDetails['address'] : set_value('address') ?></textarea>
                                            <span class="has-error"><?php echo form_error('address'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Product Details</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group js-alert-message">
                                    <table class="table-bordered table-responsive checkout-table">
                                        <thead>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <?php if( true == isArrVal( $arrmixCartList['cart_list'] ) ) {
                                                    foreach( $arrmixCartList['cart_list'] as $arrCartDetails ) { 
                                            ?>  
                                                    <tr>
                                                        <td><?= $arrCartDetails['name'] ?></td>
                                                        <td><?= $arrCartDetails['price'] ?></td>
                                                    </tr>        
                                                <?php } ?>
                                                <tr>
                                                    <td><b>Total Amount</b></td>
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Payment Method</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group js-alert-message">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="payment_method"  class="form-control" id="js-payment-method" value="<?= PAYMENT_METHOD_ONLINE ?>" checked>
                                                Online Payment
                                            </label>
                                            <span class="has-error"><?php echo form_error('payment_method'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" id="submit">Pay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_type_id" value="<?= $arrUserDetails['user_type_id'] ?>">
                <input type="hidden" name="user_id" value="<?= $arrUserDetails['user_id'] ?>">
                <input type="hidden" name="total_amount" value="<?= $arrmixCartList['total'] ?>">
            </form>
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
