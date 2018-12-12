<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    
        <!-- Small boxes (Stat box) -->
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Deals Worth</span>
                        <span class="info-box-number"><?= $total_worth['total_price']?></span>

<!--                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>-->
<!--                        <span class="progress-description">
                            
                        </span>-->
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <?php if($user_details['username'] != ADMINUSERNAME && $user_details['is_verified'] == 1){ ?>
                    <div class="callout callout-danger">
<!--                        <h4>You are not Verified.Please stay with us</h4>-->
                        <p>You are not Verified.Please stay with us</p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= count($bid_list)?></h3>
                        <p>Bids</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <a href="<?= base_url()?>admin/bid" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= count($post_requirement_list)?></h3>
                        <p>Post Requirements</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <a href="<?= base_url()?>admin/post-requirement" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <?php if(!empty($user_details['username']) && $user_details['username'] == ADMINUSERNAME){ ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red-gradient">
                        <div class="inner">
                            <h3><?= count($product_list)?></h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <a href="<?= base_url()?>admin/product/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua-gradient">
                        <div class="inner">
                            <h3><?= count($user_type_list)?></h3>
                            <p>User Type</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?= base_url()?>admin/user-type/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red-gradient">
                        <div class="inner">
                            <h3><?= count($certification_agencies_list)?></h3>
                            <p>Register Certification Agencies</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-certificate"></i>
                        </div>
                        <a href="<?= base_url()?>admin/certification-agency/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= count($user_list)?></h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url()?>admin/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <!-- ./col -->
<!--            <div class="col-lg-3 col-xs-6">
                 small box 
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>-->
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->