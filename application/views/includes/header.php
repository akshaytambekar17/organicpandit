

<nav class="navbar navbar-inverse nav-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="logo-img"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right nav-anc">

                <?php
                $user_data = $this->session->all_userdata();
                $user_data = !empty($user_data['user_data'])?$user_data['user_data']:'';
                if (!empty($user_data['usertype'])) {
                    $usertype = $user_data['usertype'];
                    $username = $user_data['username'];
                    switch ($usertype) {
                        case "farmer":
                            $page_name = 'farmer-register';
                            break;
                        case "fpo":
                            $page_name = 'fpo-register';
                            break;
                        case "trader":
                            $page_name = 'trader-register';
                            break;
                        case "processor":
                            $page_name = 'processor-register';
                            break;
                        case "buyer":
                            $page_name = 'buyer-register';
                            break;
                        case "org_consultant":
                            $page_name = 'org-consultant-register';
                            break;
                        case "org_input":
                            $page_name = 'org-input-register';
                            break;
                        case "packaging":
                            $page_name = 'packaging-register';
                            break;
                        case "logistic":
                            $page_name = 'logistic-register';
                            break;
                        case "farm_equipment":
                            $page_name = 'farm-equipment-register';
                            break;
                        case "exhibitors":
                            $page_name = 'exhibitors-register';
                            break;
                        case "shops":
                            $page_name = 'shops-register';
                            break;
                        case "labs":
                            $page_name = 'labs-register';
                            break;
                        case "gov_agency":
                            $page_name = 'gov-agency-register';
                            break;
                        case "institutions":
                            $page_name = 'institutions-register';
                            break;
                        case "others":
                            $page_name = 'others-register';
                            break;
                        case "restaurant":
                            $page_name = 'restaurant-register';
                            break;
                        case "ngo":
                            $page_name = 'ngo-register';
                            break;
                        case "certification":
                            $page_name = 'certification-register';
                            break;
                        default:
                            $page_name = 'farmer-register';
                    }
                } else {
                    $usertype = "";
                    $username = "";
                }

                if (!empty($usertype) && !empty($username)) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>home">Home</a></li> 
                    <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>contact"> Contact Us</a></li>

                    <!--    <li class="green dropdown-modal">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="">
                                         <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                                         <span class="badge badge-success"></span>
                                     </a>
                                     <ul class="green dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
             
                                        <li class="dropdown-header">
                                             <i class="ace-icon fa fa-exclamation-triangle"></i>
                                                 Notifications
                                         </li>  
                                         <li class="dropdown-footer">
                                             <a href="<?php echo base_url(); ?>notification">
                                                 See all notifications
                                                 <i class="ace-icon fa fa-arrow-right"></i>
                                             </a>
                                         </li>
                                      </ul>
                             </li> -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo $username; ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="accBox">
                                    <span class="accImg"><?php echo $username[0]; ?></span> 
                                    <p><?php echo $username; ?></p>
                                 <!--   <a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>account/<?php echo $usertype . '/' . $username; ?>">My Account</a> -->
                                    <a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>admin/dashboard">My Account</a>
                                    <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>account/logout">Logout</a> 
                                </div>
                            </li>
                        </ul>
                    </li>
                
                <?php } else { ?>
                    <li><a href="<?php echo base_url(); ?>home">Home</a></li>        
                    <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>register">Register</a></li>
                    <li><a href="<?php echo base_url(); ?>contact"> Contact US</a></li>
                    <li><a href="<?php echo base_url(); ?>login"> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>  