<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
    .redirect-p {
        color: red;
    }
</style>
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
                                    <?=$message ?>
                                </div>
                        <?php }?>
                        <?php if($message = $this ->session->flashdata('Error')){ ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= $message ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="jumbotron text-center">
                        <?php if( 'success' == $status ) { ?>
                                <h1 class="display-3">Thank You!</h1>
                                <p class="lead"><strong><i class="fa fa-check-circle"></i> You have successfully subscribed our services.</strong> If you want to check transaction details please visit your email/dashboard.</p>
                        <?php } else if( 'failure' == $status ) { ?>    
                                <h1 class="display-3 redirect-p">Transaction Failed!</h1>
                                <p class="lead"><strong><i class="fa fa-ban"></i> Your transaction has been failed for amount <?= $arrmixPaymentGatewayRequestData['amount'] ?>.</strong> If you want to more details please visit your dashboard.</p>
                        <?php } else { ?>    
                                <h1 class="display-3 redirect-p">Transaction Canceled!</h1>
                                <p class="lead"><strong><i class="fa fa-ban"></i> Your have canceled the transaction for amount <?= $arrmixPaymentGatewayRequestData['amount'] ?>.</strong> You not able to execute our more services. Please subscribe our plan.</p>
                        <?php } ?>    
                        <hr>
                        <p>Having any query? <a href="<?= base_url() ?>contact">Contact us</a></p>
                        <p class="redirect-p">
                            This page will redirect to get our more services. Redirecting within....<span id="js-count-down-timer"></span>
                        </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        // Set the date we're counting down to
        var intCountDownTime = 15;
        
        // Update the count down every 1 second
        var objCountDownTime = setInterval(function() {

            $( '#js-count-down-timer' ).html( intCountDownTime );
            intCountDownTime--;
            // If the count down is over, write some text 
            if( intCountDownTime < 1 ) {
                clearInterval( objCountDownTime );
                <?php if( 'success' == $status ) { ?>
                    window.location.replace( "<?= base_url()?>logout" );    
                <?php } else { ?>    
                    window.location.replace( "<?= base_url()?>subscription-plan" );    
                <?php } ?>    
            }
        }, 1000);
    </script>