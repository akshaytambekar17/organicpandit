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
	                        <?php if( false == $boolDirectCallPaymentResponse ) { ?>
	                            <div class="form-group js-alert-message">
	                                <?php if( true == $boolStatus ) { ?>
	                                    <div class="callout callout-success">
	                                        <h4><i class="icon fa fa-check"></i> Success</h4>
	                                        <p><?= $strMessage?></p>
	                                    </div>
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
	                                            <h4>Date</h4>
	                                            <p><?= $strAddedOn; ?></p>
	                                        </div>
	                                    </div>

	                                <?php } else { ?>
	                                    <div class="callout callout-danger">
	                                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
	                                        <p><?= $strMessage?></p>
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
                            <a href="<?= base_url()?>home" class="btn btn-primary" >Go to Home</a>
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

