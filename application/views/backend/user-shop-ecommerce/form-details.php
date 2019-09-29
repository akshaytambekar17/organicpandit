<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-shop-ecommerces">E-Commerce Shop List</a></li>
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
    <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) {
            $strErrorMessage = $this ->session->flashdata( 'Error' );
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserEcommerceDetails ) ) ? base_url() . 'admin/user/user-shop-ecommerces/update?user_ecommerce_id=' . $arrUserEcommerceDetails['user_ecommerce_id'] : base_url() . 'admin/user/user-shop-ecommerces/add' ?>" name="user-shop-ecommerce-form">
                        <div class="box-body">
                            <div class="row">
                                <?php if( ADMINUSERNAME == $arrUserSessionDetails['username'] ){  ?>
                                    <div class="form-group col-md-6">
                                        <label class="control-label label-required" for="product_id">Select User</label>
                                        <select class="form-control select2" name="user_id">
                                            <option disabled="disabled" selected="selected">Select User</option>
                                            <?php
                                                foreach( $arrUsersList as $arrUserDetails ) {
                                                    $strSelected = '';
                                                    if( true == isset( $arrUserEcommerceDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserEcommerceDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
                                                    }
                                            ?>      
                                                    <option value="<?= $arrUserDetails['user_id'] ?>" <?= set_select('user_id', $arrUserDetails['user_id']); ?> <?= $strSelected ?>><?= $arrUserDetails['fullname'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('user_id'); ?></span>
                                    </div>
                                <?php } else { ?>
                                        <div class="form-group col-md-6">
                                            <label class="control-label label-required" for="user_id">User</label>
                                            <input type="text" class="form-control" value="<?= $arrUserSessionDetails['fullname'] ?>" disabled="disabled">
                                            <input type="hidden" name="user_id" class="form-control" id="js-user-id" value="<?= $arrUserSessionDetails['user_id'] ?>">
                                        </div>
                                <?php } ?>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="product_id">Select Category</label>
                                    <select class="form-control select2" name="category_id" id="js-category-id">
                                        <option disabled="disabled" selected="selected">Select Category</option>
                                        <?php foreach( $arrProductCategoryList as $arrCategoryDetails ) {
                                                $strSelected = '';
                                                if( $arrCategoryDetails['id'] == $arrUserEcommerceDetails['category_id'] ) {
                                                    $strSelected = 'selected="selected"';
                                                }
                                        ?>
                                            <option value="<?= $arrCategoryDetails['id'] ?>" <?= set_select('category_id', $arrCategoryDetails['id']); ?> <?= $strSelected ?> ><?= $arrCategoryDetails['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('category_id'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="product_id">Select Product</label>
                                    <select class="form-control select2" name="product_id" id="js-product-id">
                                        <option disabled="disabled" selected="selected">Select Product</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                </div>
                                <input type="hidden" id="js-hidden-product-id" value="<?= ( true == isset( $arrUserEcommerceDetails['product_id'] ) ) ? $arrUserEcommerceDetails['product_id'] : '' ?>">
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label label-required" for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="js-description" placeholder="Product Description" value="<?= ( true == isset( $arrUserEcommerceDetails['description'] ) ) ? $arrUserEcommerceDetails['description'] : set_value('description') ?>">
                                    <span class="has-error"><?php echo form_error('description'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="available_quantity">Available Quantity </label>
                                    <input type="text" name="available_quantity" class="form-control" id="js-available-quantity" placeholder="Available Quantity" value="<?= ( true == isset( $arrUserEcommerceDetails['available_quantity'] ) ) ? $arrUserEcommerceDetails['available_quantity'] : set_value('available_quantity') ?>">
                                    <span class="has-error"><?php echo form_error('available_quantity'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="js-price" placeholder="Price" value="<?= ( true == isset( $arrUserEcommerceDetails['price'] ) ) ? $arrUserEcommerceDetails['price'] : set_value('price') ?>">
                                    <span class="has-error"><?php echo form_error('price'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row"> 
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="user_ecommerce_status">Select Status</label>
                                    <select class="form-control select2" name="user_ecommerce_status" id="js-user-ecommerce-status">
                                            <option disabled="disabled" selected="selected">Select Options</option>
                                            <option value="2" <?= set_select('user_ecommerce_status', 2); ?> <?= isset( $arrUserEcommerceDetails['user_ecommerce_status'] ) && ENABLED == $arrUserEcommerceDetails['user_ecommerce_status'] ? 'selected="selected"' : ''; ?> >Enabled</option>
                                            <option value="1" <?= set_select('user_ecommerce_status', 1); ?> <?= isset( $arrUserEcommerceDetails['user_ecommerce_status'] ) && DISABLED == $arrUserEcommerceDetails['user_ecommerce_status'] ? 'selected="selected"' : ''; ?> >Disabled</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('user_ecommerce_status'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required">Stock</label>
                                    <br>
                                    <label>
                                        <input type="radio" name="stock"  class="form-co1ntrol" id="js-stock" value="<?= IN_STOCK ?>" <?= ( true == isset($arrUserEcommerceDetails['stock']) && ( IN_STOCK == $arrUserEcommerceDetails['stock'] ) ) ? 'checked' : set_checkbox('stock', IN_STOCK) ?> > &nbsp; In Stock
                                    </label>
                                    <label>
                                        <input type="radio" name="stock"  class="form-control" id="js-stock" value="<?= OUT_STOCK ?>" <?= ( true == isset($arrUserEcommerceDetails['stock']) && ( OUT_STOCK == $arrUserEcommerceDetails['stock'] ) ) ? 'checked' : set_checkbox('stock', OUT_STOCK) ?> > &nbsp; Out of Stock
                                    </label>
                                    <span class="has-error"><?php echo form_error('stock'); ?></span>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="primary_image">Product Images</label>
                                    <input type="file" name="primary_image" class="form-control" id="js-images">
                                    <?php if( isset( $arrUserEcommerceDetails['primary_image'] ) && true == isStrVal( $arrUserEcommerceDetails['primary_image'] ) ) { ?>
                                        <br>
                                        <img src="<?= base_url()?>assets/images/product_images/<?= $arrUserEcommerceDetails['primary_image']?>" width="70px" height="70px">
                                        <input type="hidden" name="primary_image_hidden" value="<?= $arrUserEcommerceDetails['primary_image']?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserEcommerceDetails['user_ecommerce_id'] ) ) { ?>
                                <input type="hidden" name="user_ecommerce_id" value="<?= $arrUserEcommerceDetails['user_ecommerce_id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-shop-ecommerces" class="btn btn-warning">Cancel</a>
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
        $( '#js-category-id' ).on('change',function(){
            var intCategoryId = $( this ).val();
            fetchProductsByCategory( intCategoryId );
        });
        var intCategoryId = $( '#js-category-id' ).val();
        if( '' != intCategoryId ){
            fetchProductsByCategory( intCategoryId );
        }	 
    });


</script>
