<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/subscription-stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<body background="<?php echo base_url(); ?>assets/images/final.jpg">
    <div class="container">
        <section class="content-header center">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        </section>
        <section class="content alert-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="js-alert-message">
                        <?php if($message = $this ->session->flashdata('Message')){?>
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check-circle"></i> <?=$message ?>
                                </div>
                        <?php }?>
                        <?php if($message = $this ->session->flashdata('Error')){ ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <i class="fa fa-ban"></i>  <?= $message ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <form  method="post" enctype="multipart/form-data" name="subscription-plan-form" id="js-subscription-plan-form">
                            <div class="box-body">
                                <div class="demo">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                                if( true == isArrVal( $arrmixSubscriptionPlanList ) ) { 
                                                    foreach( $arrmixSubscriptionPlanList as $arrmixSubscriptionPlanDetails ) { 
                                                        if( 1 == $arrmixSubscriptionPlanDetails['subscription_plan_id'] ) {
                                            ?>
                                                            <div class="col-md-offset-1 col-md-4">
                                                                <div class="pricingTable">
                                                                    <div class="pricing-content">
                                                                        <div class="pricingTable-header">
                                                                            <h3 class="title"><?= $arrmixSubscriptionPlanDetails['subscription_plan_name'] ?></h3>
                                                                        </div>
                                                                        <ul class="content-list">
                                                                            <?php foreach( explode( ',', $arrmixSubscriptionPlanDetails['features'] ) as $strFeatures ) { ?>
                                                                                    <li<?= 'Free Searching' != $strFeatures ? ' class="disable"' : '' ?>><?= $strFeatures; ?></li>
                                                                            <?php } ?>
<!--                                                                            <li>50 Email Accounts</li>
                                                                            <li>50GB Bandwidth</li>
                                                                            <li class="disable">Maintenance</li>
                                                                            <li class="disable">15 Subdomains</li>-->
                                                                        </ul>
                                                                        <div class="price-value">
                                                                            <span class="amount">&#8377; <?= $arrmixSubscriptionPlanDetails['price'] ?></span>
                                                                        </div>
                                                                        <div class="pricingTable-signup">
                                                                            <a href="javascript:void(0)">Free</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                            } 
                                                            if( 2 == $arrmixSubscriptionPlanDetails['subscription_plan_id'] ) {
                                                        ?>
                                                            <div class="col-md-4 col-md-offset-1">
                                                                <div class="pricingTable magenta">
                                                                    <div class="pricing-content">
                                                                        <div class="pricingTable-header">
                                                                            <h3 class="title"><h3 class="title"><?= $arrmixSubscriptionPlanDetails['subscription_plan_name'] ?></h3></h3>
                                                                        </div>
                                                                        <ul class="content-list">
                                                                            <?php foreach( explode( ',', $arrmixSubscriptionPlanDetails['features'] ) as $strFeatures ) { ?>
                                                                                    <li><?= $strFeatures; ?></li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                        <div class="price-value">
                                                                            <span class="amount">&#8377; <?= $arrmixSubscriptionPlanDetails['price'] ?></span>
                                                                        </div>
                                                                        <div class="pricingTable-signup">
                                                                            <a href="<?= base_url(); ?>purchase-subscription-plan?subscription_plan_id=<?= $arrmixSubscriptionPlanDetails['subscription_plan_id'] ?>">Get Started</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            <?php 
                                                        }  
                                                    }  
                                                } else { 
                                            ?>           
                                                        <div class="col-md-12 center">
                                                            <h5>No Subscription Plan present</h5>
                                                        </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </section>
    </div>
<script>
    $(document).ready(function () {
        $( document ).on( 'click', '.js-resend-otp' ,function() {     
            var intUserId = $( '#js-hidden-user-id' ).val();
            $.ajax({
                async: false,
                type: "POST",
                url: "<?= base_url(); ?>" + "resend-otp",
                dataType: 'json',
                data: { 'user_id' : intUserId },
                success: function( arrmixResponseData ) {
                    if( true == arrmixResponseData.success ) {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message').parent().after('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + arrmixResponseData.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    } else {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message').parent().after('<div class="alert alert-danger"><i class="fa fa-ban"></i>  ' + arrmixResponseData.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                }
            });
        });
    } );
</script>
