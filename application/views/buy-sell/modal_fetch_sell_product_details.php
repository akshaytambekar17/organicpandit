<div class="row">
    <div class="col-md-12 ">
        <div class="row">
            <div class="form-group col-md-12">
                <label>Username</label>
                <h4><?= ( true == isVal( $arrSellProductDetails['fullname'] ) ) ? $arrSellProductDetails['fullname'] : 'Organic Pandit' ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Category</label>
                <h4><?= $arrSellProductDetails['category_name']?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Product</label>
                <h4><?= $arrSellProductDetails['product_name']; ?></h4>
            </div>
        </div>

	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Quantity (in Kg)</label>
			    <h4><?= $arrSellProductDetails['sell_quantity']?></h4>
		    </div>
		    <div class="form-group col-md-4">
			    <label>Expected Price (per Kg)</label>
			    <h4><?= $arrSellProductDetails['price']; ?></h4>
		    </div>
		    <div class="form-group col-md-4">
			    <label>Total Price</label>
			    <h4><?= $arrSellProductDetails['total_price']?></h4>
		    </div>
	    </div>

        <div class="row">
	        <div class="form-group col-md-4">
		        <label>Certification Agency</label>
		        <h4><?= $arrSellProductDetails['certificaton_agency_name']; ?></h4>
	        </div>
	        <div class="form-group col-md-4">
                <label>Product Description</label>
                <h4><?= $arrSellProductDetails['product_description']?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Variety</label>
                <h4><?= $arrSellProductDetails['variety']?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Texture</label>
                <h4><?= $arrSellProductDetails['texture']?></h4>
            </div>
	        <div class="form-group col-md-4">
		        <label>Colour</label>
		        <h4><?= $arrSellProductDetails['colour']?></h4>
	        </div>
	        <div class="form-group col-md-4">
		        <label>Broken Ratio</label>
		        <h4><?= $arrSellProductDetails['broken_ratio']?></h4>
	        </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Crop Year</label>
                <h4><?= $arrSellProductDetails['crop_year']?></h4>
            </div>
	        <div class="form-group col-md-4">
		        <label>Moisture</label>
		        <h4><?= $arrSellProductDetails['moisture']?></h4>
	        </div>
	        <div class="form-group col-md-4">
		        <label>Grain Length</label>
		        <h4><?= $arrSellProductDetails['grain_length']?></h4>
	        </div>

        </div>
        <div class="row">
	        <div class="form-group col-md-4">
		        <label>Supply Quantity</label>
		        <h4><?= $arrSellProductDetails['supply_quantity']?></h4>
	        </div>
	        <div class="form-group col-md-4">
		        <label>Packaging Type</label>
		        <h4><?= $arrSellProductDetails['packaging_type']?></h4>
	        </div>
        </div>

	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Stock</label>
			    <h4><?= ( IN_STOCK == $arrSellProductDetails['stock'] ) ? 'In Stock' : ' Out of Stock ' ?></h4>
		    </div>
		</div>

        <br>
        <div class="row">
            <div class="form-group col-md-3">
                <h4>Delivery Details</h4>
            </div>
        </div>

	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>State</label>
			    <h4><?= $arrSellProductDetails['state_name']?></h4>
		    </div>
		    <div class="form-group col-md-4">
			    <label>Delivery Location</label>
			    <h4><?= $strDeliveryLocation ?></h4>
		    </div>
		</div>
	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Lead Time</label>
			    <h4><?= $arrSellProductDetails['lead_time']?></h4>
		    </div>

		    <div class="form-group col-md-4">
			    <label>Delivery Type</label>
			    <h4><?php
				    $arrDeliveryType = getSellProductDeliveryType();
				    echo $arrDeliveryType[$arrSellProductDetails['delivery_type_id']];
				    ?>
			    </h4>
		    </div>

		    <div class="form-group col-md-4">
			    <label>Can you provide logistics</label>
			    <h4><?= ( 1 == $arrSellProductDetails['is_logistics'] ) ? 'No' : 'Yes' ?></h4>
		    </div>

		</div>
	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Other Details</label>
			    <h4><?= $arrSellProductDetails['other_details']?></h4>
		    </div>
		</div>

	    <br>
	    <div class="row">
		    <div class="form-group col-md-3">
			    <h4>Images</h4>
		    </div>
	    </div>
	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Primary Image</label>
			    <?php if( true == isVal( $arrSellProductDetails['primary_image'] ) ){ ?>
				    <br>
				    <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['primary_image']?>" width="70px" height="70px">
			    <?php } else { ?>
				    <h4>NA</h4>
			    <?php } ?>
		    </div>
	    </div>
	    <div class="row">
		    <div class="form-group col-md-4">
			    <label>Other Image1</label>
			    <?php if( true == isVal( $arrSellProductDetails['other_image1'] ) ){ ?>
				    <br>
				    <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image1']?>" width="70px" height="70px">
			    <?php } else { ?>
				    <h4>NA</h4>
			    <?php } ?>
		    </div>

		    <div class="form-group col-md-4">
			    <label>Other Image2</label>
			    <?php if( true == isVal( $arrSellProductDetails['other_image2'] ) ){ ?>
				    <br>
				    <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image2']?>" width="70px" height="70px">
			    <?php } else { ?>
				    <h4>NA</h4>
			    <?php } ?>
		    </div>

		    <div class="form-group col-md-4">
			    <label>Other Image3</label>
			    <?php if( true == isVal( $arrSellProductDetails['other_image3'] ) ){ ?>
				    <br>
				    <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image3']?>" width="70px" height="70px">
			    <?php } else { ?>
				    <h4>NA</h4>
			    <?php } ?>
		    </div>

		    <div class="form-group col-md-4">
			    <label>Other Image4</label>
			    <?php if( true == isVal( $arrSellProductDetails['other_image4'] ) ){ ?>
				    <br>
				    <img src="<?= base_url()?>assets/images/sell_products/<?= $arrSellProductDetails['other_image4']?>" width="70px" height="70px">
			    <?php } else { ?>
				    <h4>NA</h4>
			    <?php } ?>
		    </div>
	    </div>



    </div>
    <div class="clearfix"> </div>
</div>
