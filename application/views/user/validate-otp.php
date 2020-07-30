<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <div class="container">
        <section class="content-header center">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        </section>
        <section class="content alert-box">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3">
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
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <form  method="post" enctype="multipart/form-data" name="validate-otp-form" id="js-validate-otp-form" action="<?= base_url()?>validate-otp?user_id=<?= $arrmixUserDetails['user_id']; ?>">
                            <div class="box-body">
                               <div class="form-group">
                                    <label class="control-label" for="bank_name">
                                        <p>The OTP has been sent to XXXXXXX<?= substr( $arrmixUserDetails['mobile_no'], -3 ); ?></p>
                                        <p>Pleas enter the OTP in the field below to verify.</p> 
                                    </label>
                                    <input type="text" name="otp" class="form-control" id="js-otp" placeholder="OTP" value="<?= set_value( 'otp' ) ?>">
                                    <span class="has-error"><?php echo form_error('otp'); ?></span>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $arrmixUserDetails['user_id'] ?>" id="js-hidden-user-id">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-left" id="js-submit">Submit</button>
                                <a href="javascript:void(0)" class="js-resend-otp pull-right">Resend OTP</a>
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
                        $('.js-alert-message').parent().after('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  ' + arrmixResponseData.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                }
            });
        });
    } );
</script>
