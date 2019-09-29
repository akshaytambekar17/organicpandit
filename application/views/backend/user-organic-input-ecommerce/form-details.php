<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/user/user-organic-input-ecommerces">Organic Input E-Commerce List</a></li>
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
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails ) ) ? base_url() . 'admin/user/user-organic-input-ecommerces/update?id=' . $arrUserOrganicInputEcommerceDetails['id'] : base_url() . 'admin/user/user-organic-input-ecommerces/add' ?>" name="user-product-form">
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
                                                    if( true == isset( $arrUserOrganicInputEcommerceDetails['user_id'] ) ) {
                                                        $strSelected = $arrUserOrganicInputEcommerceDetails['user_id'] == $arrUserDetails['user_id']?'selected="selected"':'';                                
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
                                    <label class="control-label label-required" for="category_id">Select Category</label>
                                    <select class="form-control select2" name="category_id">
                                        <option disabled="disabled" selected="selected">Select Category</option>
                                        <?php foreach( getEcommerceCategory() as $arrEcommerceCategoryKey => $arrEcommerceCategoryValue ) { 
                                                $strSelected = '';
                                                if( true == isset( $arrUserOrganicInputEcommerceDetails['category_id'] ) ) {
                                                    $strSelected = ( $arrUserOrganicInputEcommerceDetails['category_id'] == $arrEcommerceCategoryKey ) ? 'selected="selected"' : '';                                
                                                }
                                        ?>      
                                                <option value="<?= $arrEcommerceCategoryKey ?>" <?= set_select( 'category_id', $arrEcommerceCategoryKey ); ?> <?= $strSelected ?>><?= $arrEcommerceCategoryValue ?></option>
                                        <?php } ?>
                                            
                                    </select>
                                    <span class="has-error"><?php echo form_error('category_id'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="sub_category_id">Select Sub Category</label>
                                    <select class="form-control select2" name="sub_category_id">
                                        <option disabled="disabled" selected="selected">Select Sub Category</option>
                                        <?php foreach( getEcommerceSubCategory() as $arrEcommerceSubCategoryKey => $arrEcommerceSubCategoryValue ) { 
                                                $strSelected = '';
                                                if( true == isset( $arrUserOrganicInputEcommerceDetails['sub_category_id'] ) ) {
                                                    $strSelected = ( $arrUserOrganicInputEcommerceDetails['sub_category_id'] == $arrEcommerceSubCategoryKey ) ? 'selected="selected"' : '';                                
                                                }
                                        ?>      
                                                <option value="<?= $arrEcommerceSubCategoryKey ?>" <?= set_select( 'sub_category_id', $arrEcommerceSubCategoryKey ); ?> <?= $strSelected ?>><?= $arrEcommerceSubCategoryValue ?></option>
                                        <?php } ?>
                                            
                                    </select>
                                    <span class="has-error"><?php echo form_error('sub_category_id'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="ecommerce_brand_id">Brand</label>
                                    <input type="text" name="ecommerce_brand_id" class="form-control" id="js-ecommerce-brand-id" placeholder="Brand" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['ecommerce_brand_id'] ) ) ? $arrUserOrganicInputEcommerceDetails['ecommerce_brand_id'] : set_value('ecommerce_brand_id') ?>">
                                    <span class="has-error"><?php echo form_error('ecommerce_brand_id'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="price">Price</label>
                                    <input type="text" name="price" class="form-control" id="js-price" placeholder="Price" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['price'] ) ) ? $arrUserOrganicInputEcommerceDetails['price'] : set_value('price') ?>">
                                    <span class="has-error"><?php echo form_error('price'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="dosage">Dosage</label>
                                    <input type="text" name="dosage" class="form-control" id="js-dosage" placeholder="Dosage" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['dosage'] ) ) ? $arrUserOrganicInputEcommerceDetails['dosage'] : set_value('dosage') ?>">
                                    <span class="has-error"><?php echo form_error('dosage'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="weight">Weight</label>
                                    <input type="text" name="weight" class="form-control" id="js-weight" placeholder="Weight" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['weight'] ) ) ? $arrUserOrganicInputEcommerceDetails['weight'] : set_value('weight') ?>">
                                    <span class="has-error"><?php echo form_error('weight'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="spectrum">Spectrum</label>
                                    <input type="text" name="spectrum" class="form-control" id="js-spectrum" placeholder="Spectrum" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['spectrum'] ) ) ? $arrUserOrganicInputEcommerceDetails['spectrum'] : set_value('spectrum') ?>">
                                    <span class="has-error"><?php echo form_error('spectrum'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="compatibility">Compatibility</label>
                                    <input type="text" name="compatibility" class="form-control" id="js-compatibility" placeholder="Compatibility" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['compatibility'] ) ) ? $arrUserOrganicInputEcommerceDetails['compatibility'] : set_value('compatibility') ?>">
                                    <span class="has-error"><?php echo form_error('compatibility'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="duration_effect">Duration of Effect</label>
                                    <input type="text" name="duration_effect" class="form-control" id="js-duration-effect" placeholder="Duration of Effect" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['duration_effect'] ) ) ? $arrUserOrganicInputEcommerceDetails['duration_effect'] : set_value('duration_effect') ?>">
                                    <span class="has-error"><?php echo form_error('duration_effect'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="frequency_application">Frequency of Application</label>
                                    <input type="text" name="frequency_application" class="form-control" id="js-frequency-application" placeholder="Frequency of Application" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['frequency_application'] ) ) ? $arrUserOrganicInputEcommerceDetails['frequency_application'] : set_value('frequency_application') ?>">
                                    <span class="has-error"><?php echo form_error('frequency_application'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="applicable_crops">Applicable Crops</label>
                                    <input type="text" name="applicable_crops" class="form-control" id="js-applicable-crops" placeholder="Applicable Crops" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['applicable_crops'] ) ) ? $arrUserOrganicInputEcommerceDetails['applicable_crops'] : set_value('applicable_crops') ?>">
                                    <span class="has-error"><?php echo form_error('applicable_crops'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="final_remarks">Final Remarks</label>
                                    <input type="text" name="final_remarks" class="form-control" id="js-final-remarks" placeholder="Final Remarks" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['final_remarks'] ) ) ? $arrUserOrganicInputEcommerceDetails['final_remarks'] : set_value('final_remarks') ?>">
                                    <span class="has-error"><?php echo form_error('final_remarks'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="control-label label-required" for="chemical">Chemical Composition</label>
                                    <input type="text" name="chemical" class="form-control" id="js-chemical" placeholder="Chemical Composition" value="<?= ( true == isset( $arrUserOrganicInputEcommerceDetails['chemical'] ) ) ? $arrUserOrganicInputEcommerceDetails['chemical'] : set_value('chemical') ?>">
                                    <span class="has-error"><?php echo form_error('chemical'); ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="images">Images</label>
                                    <input type="file" name="images" class="form-control" id="js-images">
                                    <?php if( isset( $arrUserOrganicInputEcommerceDetails['images'] ) ){ ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/images/ecommerce_images/<?= $arrUserOrganicInputEcommerceDetails['images']?>" width="70px" height="70px">
                                            <input type="hidden" name="images_hidden" value="<?= $arrUserOrganicInputEcommerceDetails['images']?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrUserOrganicInputEcommerceDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $arrUserOrganicInputEcommerceDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/user/user-organic-input-ecommerces" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
