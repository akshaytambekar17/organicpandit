<div class="row">
    <div class="col-md-12 ">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Category</label>
                <h4><?= $ecommerceDetails['category_name'] ?></h4>
            </div>
            <div class="form-group col-md-4">
                    <label>Category</label>
                    <h4><?= $ecommerceDetails['sub_category_name'] ?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Brand</label>
                <h4><?= !empty( $ecommerceDetails['brand'] ) ? $ecommerceDetails['brand'] : 'NA' ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Price</label>
                <h4><?= $ecommerceDetails['price']?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Weight</label>
                <h4><?= $ecommerceDetails['weight']?></h4>
            </div>
                <div class="form-group col-md-4">
                        <label>Chemical Composition</label>
                        <h4><?= !empty($ecommerceDetails['chemical'])?$ecommerceDetails['chemical']:"NA"?></h4>
                </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Dosage</label>
                <h4><?= !empty( $ecommerceDetails['dosage'] ) ? $ecommerceDetails['dosage'] : 'NA' ?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Spectrum</label>
                    <h4><?= !empty( $ecommerceDetails['spectrum'] ) ? $ecommerceDetails['spectrum'] : 'NA' ?></h4>
            </div>
                <div class="form-group col-md-4">
                        <label>Applicable Crops</label>
                        <h4><?= !empty($ecommerceDetails['applicable_crops'])?$ecommerceDetails['applicable_crops']:"NA"?></h4>
                </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Compatibility</label>
                    <h4><?= !empty( $ecommerceDetails['compatibility'] ) ? $ecommerceDetails['compatibility'] : 'NA' ?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Duration of Effect</label>
                    <h4><?= !empty( $ecommerceDetails['duration_effect'] ) ? $ecommerceDetails['compatibility'] : 'NA' ?></h4>
            </div>
            <div class="form-group col-md-4">
                <label>Frequency of Application</label>
                    <h4><?= !empty( $ecommerceDetails['frequency_application'] ) ? $ecommerceDetails['frequency_application'] : 'NA' ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Final Remarks</label>
                <h4><?= !empty($ecommerceDetails['final_remarks'])?$ecommerceDetails['final_remarks']:"NA"?></h4>
            </div>
                <div class="form-group col-md-4">
                        <label>Image</label>
                        <h4>
                                <?php if(!empty($ecommerceDetails['images'])){ ?>
                                        <img src="<?= base_url()?>assets/images/ecommerce_images/<?= $ecommerceDetails['images']?>" width="70px" height="70px">
                                <?php }else{ ?>
                                        NA
                                <?php } ?>

                        </h4>
                </div>
                </div>

        <div class="clearfix"> </div>
    </div>
</div>
