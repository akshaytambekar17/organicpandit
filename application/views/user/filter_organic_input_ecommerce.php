<?php if(!empty($organicInputEcommerceList)){
        foreach($organicInputEcommerceList as $value){
?>
        <div class="col-md-4">
            <div class="box js-post-panel">
                <div class="box-body">
                    <div class="col-md-12">
                        <?php if( true == isArrVal( $userSession ) && SUBSCRIBED == $userSession['is_subscription'] ) { ?>
                            <a href="javascript:void(0)" class="btn btn-warning btn-outline-warning pull-right" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="modalEcommerceDetails(this)" data-toggle="tooltip" title="View Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <?php } else { ?>
                            <a href="javascript:void(0)" class="btn btn-warning btn-outline-warning pull-right js-not-subscribe-button"  data-toggle="tooltip" title="View Details" data-toggle="modal" data-target="#js-subscribe-modal" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <?php } ?>
                        <br>    
                        <div class="ps-post__thumbnail">
                            <a class="ps-post__overlay" href="javascript:void(0)"></a> 
                            <?php if( true == isVal( $value['images'] ) ) { ?>
                                <img src="<?= checkFileExist( base_url() . 'assets/images/ecommerce_images/' . $value['images'] ) ?>" alt="Organic Pandit" height="90px">
                            <?php } else { ?>
                                <img src="<?= logoOrganicPandit() ?>" alt="Organic Pandit" height="90px">
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row categories-subcategory-details">
                            <div class="col-md-6">
                                <h4>Category</h4>
                                <b class="fullname">
                                    <?php echo $arrCategory[$value['category_id']]; ?>
                                </b>
                            </div>
                            <div class="col-md-6">
                                <h4 class="js-sub-category-id" data-sub_category_id="<?= $value['sub_category_id'] ?>" >Sub Category</h4>
                                <b class="fullname">
                                    <?php echo $arrSubCategory[$value['sub_category_id']]; ?>
                                </b>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Price</h4>
                                <b><?= $value['price']; ?></b>
                            </div>
                            <div class="col-md-6">
                                <h4>Weight</h4>
                                <b><?= $value['weight']; ?></b>
                            </div>     
                        </div>     
                        <br>
                        <h4>Brand</h4>
                        <b class="js-brand-name">
                            <?php echo $value['ecommerce_brand_id']; ?>
                        </b>

                        <?php if( true == isArrVal( $userSession ) && SUBSCRIBED == $userSession['is_subscription'] ) { ?>
                            <a href="javascript:void(0)" class="btn btn-success  btn-outline-success add-to-cart-button mt-20" data-user_id="<?= $value['user_id'] ?>" data-id="<?= $value['id'] ?>" data-fullname="<?= $value['fullname'] ?>"  onclick="showAddToCartModal(this)" data-toggle="tooltip" title="Add to cart">Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <?php } else { ?>
                            <a href="javascript:void(0)" class="btn btn-success btn-outline-success add-to-cart-button mt-20 js-not-subscribe-button" data-toggle="tooltip" title="Add to cart" data-toggle="modal" data-target="#js-subscribe-modal">Add to Cart  <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <?php } ?>   

                    </div>
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