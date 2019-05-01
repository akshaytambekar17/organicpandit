<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<!-- banner -->
<div class="container-fluid">
    <div class="row ">
        <div class="registration-banner">  <img src="<?php echo base_url(); ?>assets/design/img/banner-reg1.jpg" alt="organic world" >     </div>
    </div> 
    <section class="mid-icon-section main-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12 col-xs-12 text-center">
                        <div class="icon-dynamic-tabs">
                            <h1 class="main-head wow fadeInDown" data-wow-delay="0.1s">Register  your organic network</h1>
                            <div class="row no-margin network-tabs">
                                <div class="col-sm-12">
                                    <ul class="horizontal-list tab-list">
                                        <li class="active wow fadeInLeft" data-wow-delay=".10s" >
                                            <a href="#<?= $user_type_list[0]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/farmer.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInLeft" data-wow-delay=".20s" >
                                            <a href="#<?= $user_type_list[1]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/fpo.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInLeft" data-wow-delay=".30s" >
                                            <a href="#<?= $user_type_list[2]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/trader.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInLeft" data-wow-delay=".40s" >
                                            <a href="#<?= $user_type_list[3]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/processor.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInLeft" data-wow-delay=".50s" >
                                            <a href="#<?= $user_type_list[4]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/buyer.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInLeft" data-wow-delay=".60s" >
                                            <a href="#<?= $user_type_list[5]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/organic consultant.png" class="img-responsive" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-2">
                                    <div class="vertical-list">
                                        <ul class="inline-list tab-list">
                                            <li class="wow fadeInUp" data-wow-delay="1.80s">
                                                <a href="#<?= $user_type_list[6]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/organic inputs.png" class="img-responsive" />
                                                </a>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="1.70s">
                                                <a href="#<?= $user_type_list[7]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/packaging.png" class="img-responsive" />
                                                </a>
                                            </li>
                                            <li class="wow fadeInUp" data-wow-delay="1.60s">
                                                <a href="#<?= $user_type_list[8]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/logistic.png" class="img-responsive" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="tab-content organic-network-content wow zoomIn" data-wow-delay=".50s">
                                        <div id="<?= $user_type_list[0]['id'] ?>" class="tab-pane fade in active">
                                            <h3><?= $user_type_list[0]['name'] ?></h3>
                                            <p>
                                                <?= $user_type_list[0]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[0]['id'] ?>" class="btn">Register  <?= $user_type_list[0]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[1]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[1]['name'] ?></h3>
                                            <p><?= $user_type_list[1]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[1]['id'] ?>" class="btn">Register  <?= $user_type_list[1]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[2]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[2]['name'] ?></h3>
                                            <p><?= $user_type_list[2]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[2]['id'] ?>" class="btn">Register  <?= $user_type_list[2]['name'] ?></a></p>
                                        </div>
                                        <div id="<?= $user_type_list[3]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[3]['name'] ?></h3>
                                            <p>
                                                <?= $user_type_list[3]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[3]['id'] ?>" class="btn">Register  <?= $user_type_list[3]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[4]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[4]['name'] ?></h3>
                                            <p>
                                                <?= $user_type_list[4]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[4]['id'] ?>" class="btn">Register  <?= $user_type_list[4]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[5]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[5]['name'] ?></h3>
                                            <p><?= $user_type_list[5]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[5]['id'] ?>" class="btn">Register  <?= $user_type_list[5]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[6]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[6]['name'] ?></h3>
                                            <p><?= $user_type_list[6]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[6]['id'] ?>" class="btn">Register  <?= $user_type_list[6]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[7]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[7]['name'] ?></h3>
                                            <p><?= $user_type_list[7]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[7]['id'] ?>" class="btn">Register  <?= $user_type_list[7]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[8]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[8]['name'] ?></h3>
                                            <p><?= $user_type_list[8]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[8]['id'] ?>" class="btn">Register  <?= $user_type_list[8]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[9]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[9]['name'] ?></h3>
                                            <p><?= $user_type_list[9]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[9]['id'] ?>" class="btn">Register  <?= $user_type_list[9]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[10]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[10]['name'] ?></h3>
                                            <p><?= $user_type_list[10]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[10]['id'] ?>" class="btn">Register  <?= $user_type_list[10]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[11]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[11]['name'] ?></h3>
                                            <p><?= $user_type_list[11]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[11]['id'] ?>" class="btn">Register  <?= $user_type_list[11]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[12]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[12]['name'] ?></h3>
                                            <p><?= $user_type_list[12]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[12]['id'] ?>" class="btn">Register  <?= $user_type_list[12]['name'] ?></a></p>
                                        </div>
                                        <div id="<?= $user_type_list[13]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[13]['name'] ?></h3>
                                            <p><?= $user_type_list[13]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[13]['id'] ?>" class="btn">Register  <?= $user_type_list[13]['name'] ?></a></p>
                                        </div>
                                        <div id="<?= $user_type_list[14]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[14]['name'] ?></h3>
                                            <p><?= $user_type_list[14]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[14]['id'] ?>" class="btn">Register  <?= $user_type_list[14]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[15]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[15]['name'] ?></h3>
                                            <p><?= $user_type_list[15]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>search-certification-agency?id=<?= $user_type_list[15]['id'] ?>" class="btn">Register  <?= $user_type_list[15]['name'] ?></a>
                                            </p>
                                        </div>
                                        <div id="<?= $user_type_list[16]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[16]['name'] ?></h3>
                                            <p><?= $user_type_list[16]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration-certification-agency?id=<?= $user_type_list[16]['id'] ?>" class="btn">Register  <?= $user_type_list[16]['name'] ?></a></p>
                                        </div>
                                        <div id="<?= $user_type_list[17]['id'] ?>" class="tab-pane fade in">
                                            <h3><?= $user_type_list[17]['name'] ?></h3>
                                            <p><?= $user_type_list[17]['description'] ?><br><br>
                                                <a href="<?= base_url() ?>registration?id=<?= $user_type_list[17]['id'] ?>" class="btn">Register  <?= $user_type_list[17]['name'] ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="vertical-list">
                                        <ul class="inline-list tab-list">
                                            <li class="wow fadeInDown" data-wow-delay=".70s" >
                                                <a href="#<?= $user_type_list[17]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/ngo.png" class="img-responsive" />
                                                </a>
                                            </li>
                                            <li class="wow fadeInDown" data-wow-delay=".80s" >
                                                <a href="#<?= $user_type_list[16]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/restaurant.png" class="img-responsive" />
                                                </a>
                                            </li>
                                            <li class="wow fadeInDown" data-wow-delay=".90s" >
                                                <a href="#<?= $user_type_list[15]['id'] ?>" data-toggle="tab">
                                                    <img src="<?= base_url() ?>assets/design/img/icons-flat/certification agencies.png" class="img-responsive" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <ul class="horizontal-list tab-list">
                                        <li class="wow fadeInRight" data-wow-delay="1.50s">
                                            <a href="#<?= $user_type_list[9]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/farm equipment.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInRight" data-wow-delay="1.40s">
                                            <a href="#<?= $user_type_list[10]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/exhibitor.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInRight" data-wow-delay="1.30s">
                                            <a href="#<?= $user_type_list[11]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/shops.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInRight" data-wow-delay="1.20s">
                                            <a href="#<?= $user_type_list[12]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/labs.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInRight" data-wow-delay="1.10s">
                                            <a href="#<?= $user_type_list[13]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/government agencies.png" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li class="wow fadeInRight" data-wow-delay="1s" >
                                            <a href="#<?= $user_type_list[14]['id'] ?>" data-toggle="tab">
                                                <img src="<?= base_url() ?>assets/design/img/icons-flat/institution.png" class="img-responsive" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


