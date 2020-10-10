<div class="ps-blog-grid pt-80 pb-80">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <?php if( true == isArrVal( $arrmixUserSearchList ) ) { 
                        foreach( $arrmixUserSearchList as $arrmixUserDetails ) {
                ?>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                <div class="ps-post mb-30">
                                    <div class="ps-post__thumbnail">
                                        <a class="ps-post__overlay" href="blog-detail.html"></a> 
                                        <?php if( true == isVal( $arrmixUserDetails['profile_image'] ) ) { ?>
                                            <img src="<?= checkFileExist( base_url() . 'assets/images/gallery/' . $arrmixUserDetails['profile_image'] ) ?>" alt="Organic Pandit">
                                        <?php } else { ?>    
                                            <img src="<?= logoOrganicPandit() ?>" alt="Organic Pandit">
                                        <?php } ?>    
                                    </div>
                                    <div class="ps-post__content">
                                        <a class="ps-post__title" href="blog-detail.html"><?= $arrmixUserDetails['fullname'] ?></a>
                                        <p class="ps-post__meta"><span><a class="mr-5" href="javascript:void(0)">Address</a></span> -<span class="ml-5"><?= $arrmixUserDetails['address'] ?></span></p>
                                        <p class="ps-post__meta"><span><a class="mr-5" href="javascript:void(0)">Story</a></span> - <?= $arrmixUserDetails['story'] ?></p>
<!--                                        <a class="ps-morelink" href="blog-detail.html">Read more<i class="fa fa-long-arrow-right"></i></a>-->
                                        <?php if(  VERIFIED == $arrmixUserDetails['is_verified'] ) { ?>
                                            <img src="<?= base_url()?>upload/profile/Screenshot_4.png" class="user-verified-image">
                                        <?php }else{ ?>
                                            <img src="<?= base_url()?>upload/profile/not_verified.png" class="user-verified-image">
                                        <?php } ?>
<!--                                        <div class="col-md-3">
                                            <a href="<?= base_url() ?>view-user-details?user_id=<?= $arrmixUserDetails['user_id']?>" target="_blank" class="btn btn-info" data-user_id="<?= $arrmixUserDetails['user_id']?>" data-fullname="<?= $arrmixUserDetails['fullname']?>"  data-toggle="tooltip"  title="View Details" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="javascript:void(0)" class="btn btn-warning" data-user_id="<?= $arrmixUserDetails['user_id']?>" data-fullname="<?= $arrmixUserDetails['fullname']?>"  onclick="enquiryModal(this)" data-toggle="tooltip" title="View Enquiry" ><i class="fa fa-address-card" aria-hidden="true"></i></a>
                                        </div>-->
                                    </div>
                                    
                                </div>
                            </div>
                            <br>
                <?php } } else { ?>
                    <h5> No records found for <?= $arrmixUserTypeDetails['name'] ?></h5>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                <aside class="ps-widget--sidebar ps-widget--search">
                    <form class="ps-search--widget" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="Search posts...">
                        <button><i class="ps-icon-search"></i></button>
                    </form>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Archive</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--arrow">
                            <li class="current"><a href="product-listing.html">Sky(321)</a></li>
                            <li><a href="product-listing.html">Amazin’ Glazin’</a></li>
                            <li><a href="product-listing.html">The Crusty Croissant</a></li>
                            <li><a href="product-listing.html">The Rolling Pin</a></li>
                            <li><a href="product-listing.html">Skippity Scones</a></li>
                            <li><a href="product-listing.html">Mad Batter</a></li>
                            <li><a href="product-listing.html">Confection Connection</a></li>
                        </ul>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Ads Banner</h3>
                    </div>
                    <div class="ps-widget__content"><a href="product-listing"><img src="<?= ecommerceAssetsPath() ?>images/offer/sidebar.jpg" alt=""></a></div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Recent Posts</h3>
                    </div>
                    <div class="ps-widget__content">
                        <div class="ps-post--sidebar">
                            <div class="ps-post__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/blog/sidebar/1.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="#">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                        </div>
                        <div class="ps-post--sidebar">
                            <div class="ps-post__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/blog/sidebar/2.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="#">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                        </div>
                        <div class="ps-post--sidebar">
                            <div class="ps-post__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/blog/sidebar/3.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="#">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                        </div>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Best Seller</h3>
                    </div>
                    <div class="ps-widget__content">
                        <div class="ps-shoe--sidebar">
                            <div class="ps-shoe__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/shoe/sidebar/1.jpg" alt=""></div>
                            <div class="ps-shoe__content"><a class="ps-shoe__title" href="#">Men's Sky</a>
                                <p><del> £253.00</del> £152.00</p><a class="ps-btn" href="#">PURCHASE</a>
                            </div>
                        </div>
                        <div class="ps-shoe--sidebar">
                            <div class="ps-shoe__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/shoe/sidebar/2.jpg" alt=""></div>
                            <div class="ps-shoe__content"><a class="ps-shoe__title" href="#">Nike Flight Bonafide</a>
                                <p><del> £253.00</del> £152.00</p><a class="ps-btn" href="#">PURCHASE</a>
                            </div>
                        </div>
                        <div class="ps-shoe--sidebar">
                            <div class="ps-shoe__thumbnail"><a href="#"></a><img src="<?= ecommerceAssetsPath() ?>images/shoe/sidebar/3.jpg" alt=""></div>
                            <div class="ps-shoe__content"><a class="ps-shoe__title" href="#">Nike Sock Dart QS</a>
                                <p><del> £253.00</del> £152.00</p><a class="ps-btn" href="#">PURCHASE</a>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Tags</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-tags">
                            <li><a href="product-listing.html">Men</a></li>
                            <li><a href="product-listing.html">Female</a></li>
                            <li><a href="product-listing.html">B&G</a></li>
                            <li><a href="product-listing.html">ugly fashion</a></li>
                            <li><a href="product-listing.html">Nike</a></li>
                            <li><a href="product-listing.html">Dior</a></li>
                            <li><a href="product-listing.html">Adidas</a></li>
                            <li><a href="product-listing.html">Diour</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>