<?php if(!empty($organicInputEcommerceList)){
        foreach($organicInputEcommerceList as $value){
?>
        <div class="box js-post-panel">
            <div class="box-body">
                <div class="col-md-3">
                    <h4>Category</h4>
                    <b class="fullname">
                        <?php echo $arrCategory[$value['category_id']]; ?>
                    </b>
                    <br>
                    <h4 class="js-sub-category-id" data-sub_category_id="<?= $value['sub_category_id'] ?>" >Sub Category</h4>
                    <b class="fullname">
                        <?php echo $arrSubCategory[$value['sub_category_id']]; ?>
                    </b>
                    <br>
                </div>
                <div class="col-md-3">
                    <h4>Image</h4>
                    <?php if (!empty($value['images'])) { ?>
                        <img src="<?= base_url() ?>assets/images/ecommerce_images/<?= $value['images'] ?>" height="90px">
                    <?php } else { ?>
                        <b>NA</b>
                    <?php } ?>
                </div>
                <div class="col-md-2">
                    <h4>Price</h4>
                    <b><?= $value['price']; ?></b>
                    <h4>Brand</h4>
                    <b class="js-brand-name">
                        <?php echo $value['ecommerce_brand_id']; ?>
                        <?php //echo $arrBrand[$value['ecommerce_brand_id']]; ?>
                    </b>
                </div>
                <div class="col-md-2">
                    <h4>Weight</h4>
                    <b><?= $value['weight']; ?></b>
                </div>
                <div class="col-md-2">
                    <div class="user-padding-block">
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="btn btn-warning" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="modalEcommerceDetails(this)">View Details</a>
                        </div>
                        <div class="col-md-6">
                            <a href="javascript:void(0)" class="btn btn-success" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="paymentGateway(this)" style="margin-left: 14px;" >Pay Now</a>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
<?php } }else{ ?>
        <div class="box">
            <div class="box-body">
                <div class="col-md-12 center">
                     No data Found
                </div>
            </div>
        </div>
<?php } ?>