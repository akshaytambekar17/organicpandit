<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty( $heading ) ? $heading : 'Heading' ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>sell-product"><i class="fa fa-caret-down"></i> Sell Product List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty( $arrSellProductDetails ) ? 'Update' : 'Add' ?> Sell Product</a></li>
        </ol>
    </section>
    <?php if($message = $this ->session->flashdata('Message')){?>
        <div class="col-md-12 ">
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
    <section class="content alert-box">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <form method="post" enctype="multipart/form-data" action="<?= !empty( $arrSellProductDetails ) ? site_url('sell-product/update?sell_product_id='.$arrSellProductDetails['sell_product_id']) : site_url('sell-product/create')?>" name="sell-product-form" >
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4">
	                                <label class="control-label label-required" for="product_id">Category</label>
                                    <select class="form-control select2" name="category_id" id="js-category-id">
                                        <option disabled="disabled" selected="selected">Select Category</option>
                                        <?php foreach( $arrProductCategoryList as $intKey => $arrCategoryDetails ) {
                                        	    $strSelected = '';
												if( $arrCategoryDetails['id'] == $arrSellProductDetails['category_id'] ) {
													$strSelected = 'selected="selected"';
												}
                                        ?>
                                            <option value="<?= $arrCategoryDetails['id'] ?>" <?= set_select('category_id', $arrCategoryDetails['id']); ?> <?= $strSelected ?> ><?= $arrCategoryDetails['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('category_id'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required" for="product_id">Product</label>
                                    <select class="form-control select2" name="product_id" id="js-product-id">
                                        <option disabled="disabled" selected="selected">Select Product</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Product Description</label>
                                    <input type="text" name="product_description" class="form-control" id="js-product-description" placeholder="Product Description" value="<?= !empty( $arrSellProductDetails['product_description'] ) ? $arrSellProductDetails['product_description'] : set_value('product_description')?>" >
                                    <span class="has-error"><?php echo form_error('product_description'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Price</label>
                                    <input type="text" name="price" class="form-control" id="js-price" placeholder="Price" value="<?= !empty( $arrSellProductDetails['price'] )? $arrSellProductDetails['price'] : set_value('price')?>" >
                                    <span class="has-error"><?php echo form_error('price'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required" >Variety</label>
                                    <input type="text" name="variety" class="form-control" id="js-variety" placeholder="Variety" value="<?= !empty( $arrSellProductDetails['variety'] ) ? $arrSellProductDetails['variety'] : set_value('variety')?>">
                                    <span class="has-error"><?php echo form_error('variety'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Moisture</label>
                                    <input type="text" name="moisture" class="form-control" id="js-moisture" placeholder="Moisture" value="<?= !empty( $arrSellProductDetails['moisture'] ) ? $arrSellProductDetails['moisture'] : set_value('moisture') ?>" >
                                    <span class="has-error"><?php echo form_error('moisture'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Texture</label>
                                    <input type="text" name="texture" class="form-control" id="js-texture" placeholder="Texture" value="<?= !empty( $arrSellProductDetails['texture'] ) ? $arrSellProductDetails['texture'] : set_value('texture') ?>" >
                                    <span class="has-error"><?php echo form_error('texture'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Colour</label>
                                    <input type="text" name="colour" class="form-control" id="js-colour" placeholder="Colour" value="<?= !empty( $arrSellProductDetails['colour'] ) ? $arrSellProductDetails['colour'] : set_value('colour') ?>" >
                                    <span class="has-error"><?php echo form_error('colour'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Broken Ratio</label>
                                    <input type="text" name="broken_ratio" class="form-control" id="js-broken-ration" placeholder="Broken Ration" value="<?= !empty( $arrSellProductDetails['broken_ratio'] ) ? $arrSellProductDetails['broken_ratio'] : set_value('broken_ratio') ?>" >
                                    <span class="has-error"><?php echo form_error('broken_ration'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Crop Year</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="crop_year" class="form-control picker-date pull-right" id="js-crop-year"  value="<?= !empty( $arrSellProductDetails['crop_year'] ) ? $arrSellProductDetails['crop_year'] : set_value('crop_year') ?>" readonly>
                                    </div>
                                    <span class="has-error"><?php echo form_error('crop_year'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Certification</label>
                                    <select class="form-control select2" name="certification_id">
                                        <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                                        <?php foreach( $arrCertificationAgenciesList as $arrCertificationAgencyDetails ) {
                                        	$strSelected = '';
                                        	if( $arrCertificationAgencyDetails['user_id'] == $arrSellProductDetails['certification_id']  ) {
		                                        $strSelected = 'selected="selected"';
	                                        }
                                        ?>
                                            <option value="<?= $arrCertificationAgencyDetails['user_id'] ?>" <?= set_select('certification_id', $arrCertificationAgencyDetails['user_id']); ?> <?= $strSelected; ?> ><?= $arrCertificationAgencyDetails['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('certification_id'); ?></span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Grain Length</label>
                                    <input type="text" name="grain_length" class="form-control" id="js-grain-length" placeholder="Grain Length" value="<?= !empty( $arrSellProductDetails['grain_length'] ) ? $arrSellProductDetails['grain_length'] : set_value('grain_length') ?>" >
                                    <span class="has-error"><?php echo form_error('grain_length'); ?></span>
                                </div>
                            </div>
	                        <label class="control-label label-required" for="delivery_location">Delivery Location</label>
                            <div class="row">
	                            <div class="form-group col-md-4">
		                            <label class="control-label label-required" for="delivery_location_state">Select State</label>
		                            <select class="form-control select2" name="delivery_location_state" id="js-delivery-location-state">
			                            <option disabled="disabled" selected="selected">Select State</option>
			                            <?php foreach( $arrStateList as $arrStateDetails ) {
				                            $strSelected = '';
				                            if( $arrStateDetails['id'] == $arrSellProductDetails['delivery_location_state']  ) {
					                            $strSelected = 'selected="selected"';
				                            }
				                            ?>
				                            <option value="<?= $arrStateDetails['id'] ?>" <?= set_select('delivery_location_state', $arrStateDetails['id']); ?> <?= $strSelected ?> ><?= $arrStateDetails['name'] ?></option>
			                            <?php } ?>
		                            </select>
		                            <span class="has-error"><?php echo form_error('delivery_location_state'); ?></span>
	                            </div>

                                <div class="form-group col-md-4">
	                                <label class="control-label label-required" for="delivery_location">Select City</label>
	                                <select class="form-control select2" name="delivery_location[]" id="js-delivery-location" multiple>
                                        <option disabled="disabled" selected="selected">Select City</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('delivery_location[]'); ?></span>
                                </div>
                            </div>

                            <div class="row">
	                            <div class="form-group col-md-4">
		                            <label class="control-label label-required">Supply Quantity</label>
		                            <input type="text" name="supply_quantity" class="form-control" id="js-supply-quantity" placeholder="Supply Quantity" value="<?= !empty( $arrSellProductDetails['supply_quantity'] ) ? $arrSellProductDetails['supply_quantity'] : set_value('supply_quantity') ?>" >
		                            <span class="has-error"><?php echo form_error('supply_quantity'); ?></span>
	                            </div>

	                            <div class="form-group col-md-4">
		                            <label class="control-label label-required">Packaging Type</label>
		                            <input type="text" name="packaging_type" class="form-control" id="js-packaging-type" placeholder="Packaging Type" value="<?= !empty( $arrSellProductDetails['packaging_type'] ) ? $arrSellProductDetails['packaging_type'] : set_value('packaging_type') ?>" >
		                            <span class="has-error"><?php echo form_error('packaging_type'); ?></span>
	                            </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Lead Time</label>
                                    <input type="text" name="lead_time" class="form-control" id="js-lead-time" placeholder="Lead Time" value="<?= !empty( $arrSellProductDetails['lead_time'] ) ? $arrSellProductDetails['lead_time'] : set_value('lead_time') ?>" >
                                    <span class="has-error"><?php echo form_error('lead_time'); ?></span>
                                </div>

	                        </div>

                            <div class="row">
	                            <div class="form-group col-md-4">
		                            <label class="control-label label-required">Delivery Type</label>
		                            <select class="form-control select2" name="delivery_type_id">
			                            <option disabled="disabled" selected="selected" >Select Delivery Type</option>
			                            <?php foreach(getSellProductDeliveryType() as $intKey => $strValue ) {
				                            $strSelected = '';
				                            if( $intKey == $arrSellProductDetails['delivery_type_id']  ) {
					                            $strSelected = 'selected="selected"';
				                            }
				                            ?>
				                            <option value="<?= $intKey ?>" <?= set_select('delivery_type_id', $intKey); ?> <?= $strSelected; ?> ><?= $strValue; ?></option>
			                            <?php } ?>
		                            </select>
		                            <span class="has-error"><?php echo form_error('delivery_type_id'); ?></span>
	                            </div>

	                            <div class="form-group col-md-4">
		                            <label class="control-label" for="is_logistics">Logistics Required</label>
		                            <select class="form-control select2" name="is_logistics" id="js-is-logistics">
			                            <option disabled="disabled" selected="selected">Select Options</option>
			                            <option value="2" <?= set_select('is_logistics', 2); ?> <?= isset( $arrSellProductDetails['delivery_type_id'] ) && 2 == $arrSellProductDetails['delivery_type_id'] ? 'selected="selected"' : ''; ?> >Yes</option>
			                            <option value="1" <?= set_select('is_logistics', 1); ?> <?= isset( $arrSellProductDetails['delivery_type_id'] ) && 1 == $arrSellProductDetails['delivery_type_id'] ? 'selected="selected"' : ''; ?> >No</option>
		                            </select>
		                            <span class="has-error"><?php echo form_error('is_logistics'); ?></span>
	                            </div>

	                            <div class="form-group col-md-4">
                                    <label class="control-label label-required">Other Details</label>
                                    <input type="text" name="other_details" class="form-control" id="js-other-details" placeholder="Other Details" value="<?= !empty( $arrSellProductDetails['other_details'] ) ? $arrSellProductDetails['other_details'] : set_value('other_details') ?>" >
                                    <span class="has-error"><?php echo form_error('other_details'); ?></span>
                                </div>
                            </div>
	                        <br>
	                        <label class="control-label label-required">Images</label>
	                        <div class="row">
		                        <div class="form-group col-md-4">
			                        <label class="control-label label-required">Primary Image</label>
			                        <input type="file" name="primary_image" id="js-primary-image">
			                        <?php if( true == isset( $arrSellProductDetails['primary_image'] ) ){ ?>
				                        <br>
				                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['primary_image']?>" width="70px" height="70px">
				                        <input type="hidden" name="primary_image_hidden" value="<?= $arrSellProductDetails['primary_image'] ?>">
			                        <?php } ?>
			                        <span class="has-error"><?php echo form_error('primary_image'); ?></span>
		                        </div>
							</div>

	                        <div class="row">
		                        <div class="form-group col-md-4">
			                        <label class="control-label label-required">Secondary Image1</label>
			                        <input type="file" name="other_image1" id="js-other-image1">
			                        <?php if( true == isset( $arrSellProductDetails['other_image1'] ) ){ ?>
				                        <br>
				                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image1']?>" width="70px" height="70px">
				                        <input type="hidden" name="other_image_hidden1" value="<?= $arrSellProductDetails['other_image1'] ?>">
			                        <?php } ?>
			                        <span class="has-error"><?php echo form_error('other_image1'); ?></span>
		                        </div>

		                        <div class="form-group col-md-4">
			                        <label class="control-label label-required">Secondary Image2</label>
			                        <input type="file" name="other_image2" id="js-other-image2">
			                        <?php if( true == isset( $arrSellProductDetails['other_image2'] ) ){ ?>
				                        <br>
				                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image2']?>" width="70px" height="70px">
				                        <input type="hidden" name="other_image1_hidden2" value="<?= $arrSellProductDetails['other_image2'] ?>">
			                        <?php } ?>
			                        <span class="has-error"><?php echo form_error('other_image2'); ?></span>
		                        </div>

		                        <div class="form-group col-md-4">
			                        <label class="control-label label-required">Secondary Image3</label>
			                        <input type="file" name="other_image3" id="js-other-image3">
			                        <?php if( true == isset( $arrSellProductDetails['other_image3'] ) ){ ?>
				                        <br>
				                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image3']?>" width="70px" height="70px">
				                        <input type="hidden" name="other_image_hidden3" value="<?= $arrSellProductDetails['other_image3'] ?>">
			                        <?php } ?>
			                        <span class="has-error"><?php echo form_error('other_image3'); ?></span>
		                        </div>
							</div>

	                        <div class="row">
		                        <div class="form-group col-md-4">
			                        <label class="control-label label-required">Secondary Image4</label>
			                        <input type="file" name="other_image4" id="js-other-image4">
			                        <?php if( true == isset( $arrSellProductDetails['other_image4'] ) ){ ?>
				                        <br>
				                        <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image4']?>" width="70px" height="70px">
				                        <input type="hidden" name="other_image_hidden3" value="<?= $arrSellProductDetails['other_image4'] ?>">
			                        <?php } ?>
			                        <span class="has-error"><?php echo form_error('other_image4'); ?></span>
		                        </div>
							</div>

                        </div>
                        <?php if( isset( $arrSellProductDetails['sell_product_id'] ) ) { ?>
                                <input type="hidden" name="sell_product_id" value="<?= $arrSellProductDetails['sell_product_id']?>">
                        <?php } ?>
	                    <input type="hidden" value="<?= isset( $arrSellProductDetails['product_id'] ) ? $arrSellProductDetails['product_id'] : ''; ?>" class="js-hidden-product-id">
	                    <input type="hidden" value="<?= isset( $arrSellProductDetails['delivery_location'] ) ? $arrSellProductDetails['delivery_location'] : ''; ?>" class="js-hidden-delivery-location">
	                    <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= isset( $arrSellProductDetails ) ? 'Update' : 'Add' ?> Sell Product</button>
                            <a href="<?php echo base_url(); ?>sell-products" class="btn btn-warning">Cancel</a>
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

	    $("#js-crop-year").datepicker({
		    format: "yyyy",
		    viewMode: "years",
		    minViewMode: "years"
	    });

        $("#js-category-id").on('change',function(){
            var intCategoryId = $(this).val();
            fetchProductByCategory( intCategoryId );
        });
        var intCategoryId = $("#js-category-id").val();
        if( '' != intCategoryId ){
            fetchProductByCategory( intCategoryId );
        }

	    $("#js-delivery-location-state").on('change',function(){
		    var intStateId = $(this).val();
		    getCitiesByState( intStateId );
	    });
	    var intStateId = $("#js-delivery-location-state").val();
	    if( '' != intStateId ){
		    getCitiesByState( intStateId );
	    }
    });

    function fetchProductByCategory( $intCategoryId ) {
    	var intHiddenProductId = $(".js-hidden-product-id").val();
    	$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "fetch-product-by-category-id",
            data: { 'category_id' : $intCategoryId, 'hidden_product_id' : intHiddenProductId },
            dataType: "html",
            success: function(result){
                var html = $.parseJSON(result);
                $("#js-product-id").html('<option disabled selected> Select Product</option>');
                $("#js-product-id").append(html);
            }
        });
    }

    function getCitiesByState( intStateId ){
	    var intstrHiddenCityId = $(".js-hidden-delivery-location").val();
	    $.ajax({
		    type: "POST",
		    url: "<?php echo base_url(); ?>" + "fetch-cities-by-state-id",
		    data: { 'state_id' : intStateId, 'hidden_city_id' : intstrHiddenCityId },
		    dataType: "html",
		    success: function(result){
			    var html = $.parseJSON(result);
			    $("#js-delivery-location").html('<option disabled selected> Select City</option>');
			    $("#js-delivery-location").append(html);
		    }
	    });
    }
</script>