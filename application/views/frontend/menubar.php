<?php
    $session = UserSession();
    if($session['success'] == true){
        $user_data = $session['userData'];
        if($user_data['username'] == ADMINUSERNAME){
            $this->session->sess_destroy();
            redirect('login');
        }
    }else{
        $user_data = '';
    }

?>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-custom">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand wow fadeInLeft" data-wow-delay="0.10s" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/design/img/logo.png"  class="img-responsive" /></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(empty($user_data)){ ?>
                            <li class="wow fadeInRight <?= (empty($this->uri->segment(1))||$this->uri->segment(1) == 'home') ? 'active':''?>" data-wow-delay="0.10s"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'search-buy-product' ? 'active':'' ?>" data-wow-delay="0.15s" ><a href="<?php echo base_url(); ?>search-buy-product">Buy Product</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'about' ? 'active':''?>" data-wow-delay="0.20s" ><a href="<?= base_url() ?>about">About Us</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'signup' ? 'active':''?>" data-wow-delay="0.30s"><a href="<?= base_url() ?>signup">Register</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'contact' ? 'active':''?>" data-wow-delay="0.40s"><a href="<?= base_url() ?>contact">Contact us</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'login' ? 'active':''?>" data-wow-delay="0.50s"><a href="<?= base_url() ?>login">Login</a></li>
                        <?php }else{ ?>
                            <li class="wow fadeInRight <?= (empty($this->uri->segment(1))||$this->uri->segment(1) == 'home') ? 'active':''?>" data-wow-delay="0.10s"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'search-buy-product' ? 'active':'' ?>" data-wow-delay="0.15s" ><a href="<?php echo base_url(); ?>search-buy-product">Buy Product</a></li>
                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'about' ? 'active':''?>" data-wow-delay="0.20s" ><a href="<?= base_url() ?>about">About Us</a></li>
<!--                            <li class="wow fadeInRight <?= $this->uri->segment(1) == 'contact' ? 'active':''?>" data-wow-delay="0.40s"><a href="<?= base_url() ?>contact">Contact us</a></li>-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $user_data['fullname']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="accBox">
                                            <span class="accImg">
                                                <?php if(!empty($user_data['profile_image'])){ ?>
                                                    <img class="img-circle" src="<?= base_url()?>assets/images/gallery/<?= $user_data['profile_image']?>">
                                                <?php }else{ ?>
                                                    <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                <?php } ?>
                                            </span>
                                            <p><?php echo $user_data['fullname']; ?></p>
                                            <a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>admin/dashboard">My Account</a>
                                            <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>account/logout">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <?php $arrCartList = fetchCartDetails(); ?>
                            <li><a href="javascript:void(0)" class="js-cart-button"><img src="<?= base_url()?>assets/images/cd-cart.svg"><?= $arrCartList['total_items'] ?> items - &#8377; <?= $arrCartList['total'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if(empty($homeSlider)){ ?>
            <div class="hero-image">
                <div class="hero-slider owl-carousel">
                    <div class="item">
                        <img src="<?= base_url() ?>assets/design/img/main.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                            <img src="<?= base_url() ?>assets/design/img/slider-2.jpg" class="img-responsive">
                    </div>
                </div>
            </div>
        <?php } ?>
    </header>
