<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/blogs">Blogs List</a></li>
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrBlogDetails ) ) ? base_url() . 'admin/blogs/update?blog_id=' . $arrBlogDetails['blog_id'] : base_url() . 'admin/blogs/add' ?>" name="blog-form">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label label-required">Title</label>
                                    <input type="text" name="title"  class="form-control" placeholder="Title" value="<?= ( true == isset( $arrBlogDetails['title'] ) ) ? $arrBlogDetails['title'] : set_value( 'title' )?>" >
                                    <span class="has-error"><?php echo form_error('title'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label label-required" for="description">Description</label>
                                    <textarea id="js-ck-editor" name="description" rows="10" cols="80"><?= true == isset( $arrBlogDetails['description'] ) ? $arrBlogDetails['description'] : set_value('description') ?></textarea>
                                    <span class="has-error"><?php echo form_error('description'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Profile</label>
                                    <input type="file" name="blog_image" id="js-profile-image" class="form-control">
                                    <?php if( true == isset( $arrBlogDetails['blog_image'] ) && ( true == isStrVal( $arrBlogDetails['blog_image'] ) ) ) { ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/images/blogs/<?= $arrBlogDetails['blog_image']?>" width="70px" height="70px">
                                            <input type="hidden" name="blog_image_hidden" value="<?= $arrBlogDetails['blog_image'] ?>">
                                    <?php } ?>
                                    <span class="has-error"><?php echo form_error('blog_image'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label label-required" for="blog_status">Select Status</label>
                                    <select class="form-control select2" name="blog_status">
                                        <option disabled="disabled" selected="selected" >Select Status</option>
                                        <option value="<?= ENABLED ?>" <?= ( true == isset( $arrBlogDetails['blog_status'] ) ) ? ( ENABLED == $arrBlogDetails['blog_status'] ) ? 'selected="selected"' : '' : set_select( 'blog_status', ENABLED ); ?> >Enabled</option>
                                        <option value="<?= DISABLED ?>" <?= ( true == isset( $arrBlogDetails['blog_status'] ) ) ? ( DISABLED == $arrBlogDetails['blog_status'] ) ? 'selected="selected"' : '' : set_select( 'blog_status', DISABLED ); ?> >Disabled</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('blog_status'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrBlogDetails['blog_id'] ) ) { ?>
                                <input type="hidden" name="blog_id" value="<?= $arrBlogDetails['blog_id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/blogs" class="btn btn-warning">Cancel</a>
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
        CKEDITOR.replace('js-ck-editor');
    });    
</script>