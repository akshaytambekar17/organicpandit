<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/blogs">Publications List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= $strHeading; ?></a></li>
        </ol>
    </section>
    <?php if( true == isStrVal( $this ->session->flashdata( 'Message' ) ) ) {
            $strSuccessMessage = $this ->session->flashdata( 'Message' );
    ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $strSuccessMessage ?>
            </div>
        </div>
    <?php }?>
    <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) || true == isset( $strErrorMessage ) ) {
            if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) {
                $strErrorMessage = $this ->session->flashdata( 'Error' );
            }
    ?>
        <div class="col-md-12 ">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?= $strErrorMessage ?>
            </div>
        </div>
    <?php } ?>
    <section class="content js-alert-message-box">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrAppSliderImageDetails ) ) ? base_url() . 'admin/app-slider-images/update?app_slider_image_id=' . $arrAppSliderImageDetails['app_slider_image_id'] : base_url() . 'admin/app-slider-images/add' ?>" name="blog-form">
                        <div class="box-body">
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Slider Image</label>
                                    <input type="file" name="slider_image" id="js-slider-image" class="form-control">
                                    <?php if( true == isset( $arrAppSliderImageDetails['slider_image'] ) && ( true == isStrVal( $arrAppSliderImageDetails['slider_image'] ) ) ) { ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/images/app-slider-images/<?= $arrAppSliderImageDetails['slider_image']?>" width="70px" height="70px">
                                            <input type="hidden" name="slider_image_hidden" value="<?= $arrAppSliderImageDetails['slider_image'] ?>">
                                    <?php } ?>
                                    <span class="has-error"><?php echo form_error('slider_image'); ?></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="slider_images_value" value="testing">
                        <?php if( true == isset( $arrAppSliderImageDetails['app_slider_image_id'] ) ) { ?>
                                <input type="hidden" name="app_slider_image_id" value="<?= $arrAppSliderImageDetails['app_slider_image_id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/app-slider-images" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
