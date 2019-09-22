<?php
    $session = UserSession();
    if ( empty( $session['success'] ) ) {
        redirect('admin', 'refresh');
    }
    $userSession = $session['userData'];
?>
<body class="hold-transition skin-purple sidebar-mini fixed">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><?= !empty($userSession)?ucfirst($userSession['username']):'Admin' ?></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?= !empty($userSession)?ucfirst($userSession['username']):'Admin' ?></b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
<!--                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                     inner menu: contains the actual data
                                    <ul class="menu">
                                        <li> start message
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url()?>assets/web/<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                         end message
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url()?>assets/web/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url()?>assets/web/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url()?>assets/web/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url()?>assets/web/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>-->
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?= count(getNotifications())?></span>
                            </a>
                            <ul class="dropdown-menu" style="width: 358px;">
                                <li class="header">You have <?= count(getNotifications())?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach(getNotifications() as $value){ ?>
                                            <li>
                                                <a href="<?= base_url()?>admin/user">
                                                        <i class="fa fa-users text-aqua"></i>
                                                        <?= $value['message']?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="<?= base_url()?>admin/bid">
                                                <i class="fa fa-th text-yellow"></i> <?= count(getBidNotifications())?> new Bid
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url()?>admin/post-requirement">
                                                <i class="fa fa-laptop text-red"></i> <?= count(getPostNotifications())?> new Post Requirement
                                            </a>
                                        </li>
<!--                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>-->
<!--                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
<!--                                <li class="footer"><a href="#">View all</a></li>-->
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
<!--                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                     inner menu: contains the actual data
                                    <ul class="menu">
                                        <li> Task item
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                         end task item
                                        <li> Task item
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                         end task item
                                        <li> Task item
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                         end task item
                                        <li> Task item
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                         end task item
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>-->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if(!empty($userSession['profile_image'])){ ?>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $userSession['profile_image']?>" class="user-image" alt="User Image">
                                <?php }else{ ?>
                                    <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <?php } ?>
                                <span class="hidden-xs"><?= !empty($userSession )?ucfirst($userSession ['username']):'Admin' ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php if(!empty($userSession['profile_image'])){ ?>
                                        <img src="<?= base_url()?>assets/images/gallery/<?= $userSession['profile_image']?>" class="img-circle" alt="User Image">
                                    <?php }else{ ?>
                                        <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <?php } ?>
<!--                                    <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                                    <p>
                                        <?= !empty($userSession )?ucfirst($userSession ['username']):'Admin' ?> - <?= $userSession ['username'] == ADMINUSERNAME?'Administrator':'User' ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
<!--                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                     /.row
                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <?php if($userSession['username'] != ADMINUSERNAME ){ ?>
                                        <div class="pull-left">
                                            <?php if($userSession['user_type_id'] == 16 ){ ?>
                                                <a href="<?= base_url()?>admin/certification-agency/update?id=<?= $userSession['user_id']?>&user_type_id=<?= $userSession['user_type_id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>  Edit Profile</a>
                                            <?php }else{ ?>
                                                <a href="<?= base_url()?>admin/user/update-profile?id=<?= $userSession['user_id']?>&user_type_id=<?= $userSession['user_type_id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>  Edit Profile</a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div class="pull-right">
                                        <a href="<?= base_url()?>admin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>  Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php if(!empty($userSession['profile_image'])){ ?>
                            <img src="<?= base_url()?>assets/images/gallery/<?= $userSession['profile_image']?>" class="img-circle" alt="User Image">
                        <?php }else{ ?>
                            <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <?php } ?>
<!--                        <img src="<?= base_url()?>assets/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                    </div>
                    <div class="pull-left info">
                        <p><?= !empty($userSession )?ucfirst($userSession ['username']):'Admin' ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url()?>">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>admin/dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>admin/bid">
                            <i class="fa fa-th"></i> <span>Bids</span>
                            <?php if($userSession['username'] == 'adminmaster'){ ?>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-blue">
                                        <?= count($this->Bid->getBidByNotView())?>
                                    </small>
                                </span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>admin/post-requirement">
                            <i class="fa fa-laptop"></i> <span>Post Requirements</span>
                            <?php if($userSession['username'] == 'adminmaster'){ ?>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-yellow">
                                        <?= count($this->PostRequirement->getPostRequirementByNotView())?></small>
                                </span>
                            <?php } ?>
                        </a>
                    </li>
                    <?php if( $userSession['username'] == 'adminmaster'){ ?>
                            <li>
                                <a href="<?= base_url()?>admin/product">
                                    <i class="fa fa-cubes"></i> <span>Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>admin/product-category">
                                    <i class="fa fa-list-alt "></i> <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>admin/user-type">
                                    <i class="fa fa-users"></i> <span>User Type</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>admin/certification-agency">
                                    <i class="fa fa-certificate"></i> <span>Certification Agencies</span>
                                    <span class="pull-right-container">
                                        <small class="label pull-right bg-red"><?= count($this->CertificationAgency->getCertificationAgencies())?></small>
                                    </span>
                                </a>
                            </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url()?>sell-product">
                            <i class="fa fa-cart-arrow-down"></i> <span>Sell Product</span>

                        </a>
                    </li>
	                <li>
                            <a href="<?= base_url() ?>orders">
                                <i class="fa fa-cart-plus"></i> <span>Orders</span>
                            </a>
	                </li>
	                <li>
		                <a href="<?= base_url()?>transactions">
			                <i class="fa fa-money" aria-hidden="true"></i> <span>Transaction</span>
		                </a>
	                </li>
	                <li>
		                <a href="<?= base_url()?>buyer-enquiry-list">
			                <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Buyer Enquires</span>
		                </a>
	                </li>
	                <li class="treeview <?= ( 'user' == $this->uri->segment(2) ) ? 'active' : '' ?> " >
                            <a href="javascript:void(0)">
                                <i class="ion ion-person-add"></i> <span>Users</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?= ( 'user-list' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/user-list">
                                        <i class="fa fa-circle-o"></i> <span>Registrations</span>
                                        <span class="pull-right-container ">
                                            <small class="label pull-right bg-green"><?= count(getUserCount()) ?></small>
                                        </span>
                                    </a>
                                </li>
                                <li class="<?= ( 'user-products' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/user-products">
                                        <i class="fa fa-circle-o"></i> <span>User Products</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'user-crops' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/user-crops">
                                        <i class="fa fa-circle-o"></i> <span>Crop Inspections</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'user-soils' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/user-soils">
                                        <i class="fa fa-circle-o"></i> <span>Soils</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'user-micro-nutrients' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/user-micro-nutrients">
                                        <i class="fa fa-circle-o"></i> <span>Micro Nutrient</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'product' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/product">
                                        <i class="fa fa-circle-o"></i> <span>Input and Organic Manure</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'product' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/product">
                                        <i class="fa fa-circle-o"></i> <span>E-Commerce Organic Input</span>
                                    </a>
                                </li>
                                <li class="<?= ( 'product' == $this->uri->segment(3) ) ? 'active' : '' ?>">
                                    <a href="<?= base_url() ?>admin/user/product">
                                        <i class="fa fa-circle-o"></i> <span>E-Commerce Shops</span>
                                    </a>
                                </li>
                            </ul>
	                </li>
                    <?php if( $userSession['username'] == ADMINUSERNAME ) { ?>
                        <li>
                            <a href="<?= base_url()?>admin/organic-setting">
                                <i class="fa fa-cog"></i> <span>Organic Setting</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($userSession['username'] != ADMINUSERNAME ){ ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Profile</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if($userSession['user_type_id'] == 16 ){ ?>
                                        <li><a href="<?= base_url()?>admin/certification-agency/update?id=<?= $userSession['user_id']?>&user_type_id=<?= $userSession['user_type_id']?>"><i class="fa fa-pencil"></i>  Edit Profile</a></li>
                                <?php }else{ ?>
                                        <li><a href="<?= base_url()?>admin/user/update-profile?id=<?= $userSession['user_id']?>&user_type_id=<?= $userSession['user_type_id']?>"><i class="fa fa-pencil"></i> Edit Profile</a></li>
                                <?php }?>
                                <li><a href="<?= base_url()?>change-password"><i class="fa fa-unlock-alt"></i> Change Password</a></li>

                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>


