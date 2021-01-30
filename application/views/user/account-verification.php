<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body style="background-color: #edf1f1c4">
    <div class="container">
        <section class="content-header center">
            <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        </section>
        <section class="content alert-box">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                    <div class="js-alert-message">
                        <?php if( $strMessage = $this ->session->flashdata('Message') ) {?>
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?=$strMessage ?>
                                </div>
                        <?php }?>
                        <?php if( $this->session->flashdata('Error') || true == isset( $strSessionErrorMessage ) ) { 
                                if( true == isStrVal( $strSessionErrorMessage ) ) {
                                    $strMessage =  $strSessionErrorMessage;   
                                } else {
                                    $strMessage = $this->session->flashdata('Error');
                                }
                                
                        ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= $strMessage ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <form  method="post" enctype="multipart/form-data" name="account-verification-form" id="js-account-verification-form" action="<?= base_url()?>account-verification">
                            <div class="box-body">
                               <div class="form-group">
                                    <label class="control-label" for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="js-username" placeholder="Username" value="<?= set_value( 'username' ) ?>">
                                    <span class="has-error"><?php echo form_error('username'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="mobile_no">Mobile Number</label>
                                    <input type="text" name="mobile_no" class="form-control" id="js-mobile-no" placeholder="Mobile Number" value="<?= set_value( 'mobile_no' ) ?>">
                                    <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-left" id="js-submit">Submit</button>
                                <a href="<?= base_url()?>login" class="pull-right">Back to Login</a>
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
                        $('.js-alert-message').html('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + arrmixResponseData.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    } else {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message').html('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  ' + arrmixResponseData.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                }
            });
        });
    } );
</script>
