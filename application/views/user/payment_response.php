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
            <div class="col-md-offset-3 col-md-6 mt-20">
                <div class="box box-info">
                    <div class="text-info box-header with-border text-center">
                        <h2 class="box-title"><i class="fa fa-globe"></i> <b><?= $title ?></b></h2>
                    </div>
                    <div class="box-body">
                            <?php if( false == $boolDirectCallPaymentResponse ) { ?>
                                <div class="form-group js-alert-message">
                                    <?php if( true == $boolStatus ) { ?>
                                        <div class="callout callout-success">
                                            <h4><i class="icon fa fa-check"></i> <?= $strMessage?></h4>
                                            <p>Your order has been placed.</p>
                                        </div>
                                        <h4><b>Transaction Details</b></h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>Transaction Id</h4>
                                                <p><?= $intTranscationId; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Order number</h4>
                                                <p><?= $strOrderNo; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Total Amount</h4>
                                                <p><?= $intTotalAmount; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>Order Placed at</h4>
                                                <p><?= $strAddedOn; ?></p>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><b>Location</b></h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Address</h4>
                                                <p><?= $arrOrderDetails['address']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>State</h4>
                                                <p><?= $arrOrderDetails['state_name']; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>City</h4>
                                                <p><?= $arrOrderDetails['city_name']; ?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Pin Code</h4>
                                                <p><?= $arrOrderDetails['pincode']; ?></p>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="callout callout-danger">
                                            <h4><i class="icon fa fa-ban"></i> Error! <?= $strMessage?></h4>
                                            <p>Not able to place your order....!</p>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="callout callout-danger">
                                    <h4><i class="icon fa fa-ban"></i> Error!  Invalid Page.</h4>
                                </div>
                            <?php }  ?>
                    </div>
                    <div class="box-footer center">
                        <a href="<?= base_url()?>home" class="btn btn-info" >Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

