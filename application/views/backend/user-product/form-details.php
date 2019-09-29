<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-products">Product List</a></li>
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserProductDetails ) ) ? base_url() . 'admin/user/user-products/update?id=' . $arrUserProductDetails['id'] : base_url() . 'admin/user/user-products/add' ?>" name="user-product-form">
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
                                                    if( true == isset( $arrUserProductDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserProductDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
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
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="product_id">Product Name</label>
                                    <select class="form-control select2" name="product_id">
                                        <option disabled="disabled" selected="selected">Select Product Name</option>
                                        <?php foreach( getProductCategory() as $arrProductCategoryKey => $arrProductCategoryValue ) { ?>
                                                <optgroup label="<?= $arrProductCategoryValue ?>">
                                                <?php
                                                    foreach( $arrProductList as $arrProductDetails ) {
                                                        if( $arrProductDetails['product_category_id'] == $arrProductCategoryKey ) {
                                                            $strSelected = '';
                                                            if( true == isset( $arrUserProductDetails['product_id'] ) ) {
                                                                $strSelected = ( $arrUserProductDetails['product_id'] == $arrProductDetails['id'] ) ? 'selected="selected"' : '';                                
                                                            }
                                                ?>      
                                                        <option value="<?= $arrProductDetails['id'] ?>" <?= set_select('product_id', $arrProductDetails['id']); ?> <?= $strSelected ?>><?= $arrProductDetails['name'] ?></option>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                            </optgroup>            
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label label-required" for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="js-description" placeholder="Product Description" value="<?= ( true == isset( $arrUserProductDetails['description'] ) ) ? $arrUserProductDetails['description'] : set_value('description') ?>">
                                    <span class="has-error"><?php echo form_error('description'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="from_date">From Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="from_date" class="form-control picker-date pull-right" id="js-from-date" placeholder="From Date" value="<?= ( true == isset( $arrUserProductDetails['from_date'] ) ) ? date( 'd/m/Y', strtotime( $arrUserProductDetails['from_date'] ) ) : set_value('from_date') ?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('from_date'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="to_date">To Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="to_date" class="form-control picker-date pull-right" id="js-to-date" placeholder="To Date" value="<?= ( true == isset( $arrUserProductDetails['to_date'] ) ) ? date( 'd/m/Y', strtotime( $arrUserProductDetails['to_date'] ) ) : set_value('to_date') ?>">
                                    </div>        
                                    <span class="has-error"><?php echo form_error('to_date'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                    <select class="form-control select2" name="quantity_id" >
                                        <option disabled="disabled" selected="selected">Select Quantity</option>
                                        <?php foreach( getQuantities() as $arrQuantityKey => $arrQuantityValue) { 
                                            $strSelected = '';
                                            if( true == isset( $arrUserProductDetails['quantity_id'] ) ) {
                                                $strSelected = ( $arrUserProductDetails['quantity_id'] == $arrQuantityKey ) ? 'selected="selected"': '';                                
                                            }
                                        ?>
                                            <option value="<?= $arrQuantityKey ?>" <?= set_select('quantity_id', $arrQuantityKey); ?> <?= $strSelected ?>><?= $arrQuantityValue ?> </option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('quantity_id'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="quality">Qualitity</label>
                                    <input type="text" name="quality" class="form-control" id="js-quality" placeholder="Quality" value="<?= ( true == isset( $arrUserProductDetails['quality'] ) ) ? $arrUserProductDetails['quality'] : set_value('quality') ?>">
                                    <span class="has-error"><?php echo form_error('quality'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="js-price" placeholder="Price" value="<?= ( true == isset( $arrUserProductDetails['price'] ) ) ? $arrUserProductDetails['price'] : set_value('price') ?>">
                                    <span class="has-error"><?php echo form_error('price'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="images">Product Images</label>
                                    <input type="file" name="images" class="form-control" id="js-images">
                                    <?php if( isset( $arrUserProductDetails['images'] ) ){ ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/images/product_images/<?= $arrUserProductDetails['images']?>" width="70px" height="70px">
                                            <input type="hidden" name="images_hidden" value="<?= $arrUserProductDetails['images']?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserProductDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $arrUserProductDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-products" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
