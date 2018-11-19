


<nav class="navbar navbar-inverse nav-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right nav-anc">



        <?php 
        $user_data = $this->session->all_userdata();
       // print_r($user_data);
        if (!empty($user_data['usertype'])) 
        { 
          $usertype =  $user_data['usertype'];
          $username =  $user_data['username'];
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
            default:
            $page_name = 'farmer-register';
          }
        }else{
         $usertype =  "";
         $username =  "";
       }       

       if(!empty($usertype) && !empty($username))
         { ?>
         <li><a href="<?php echo base_url(); ?>home">Home</a></li>
          <li><a href="<?php echo base_url();?>account/<?php echo $usertype.'/'.$username;  ?>">My Account</a></li> 
          
          <?php  
          if ($user_data['usertype'] == "certification")
          {?>
           <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <i class="ace-icon fa fa-bell bell-ico"></i>
                            <span class="badge badge-success"></span>
                        </a>
                        <ul class="green dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">

                           <li class="dropdown-header">
                               <b><i class="fa fa-exclamation-circle" aria-hidden="true"></i></b> 
                                    <b>Notification</b> <br>
                            <?php $count4 = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_notify where notify_type='new user'")->result(); 
                            foreach ($count4 as $key => $value) { 
                             echo $value->count_rows;
                             }?>&nbsp;&nbsp;New Notification
                             <br>
                             <a href="<?php echo base_url(); ?>notification">
                                    See all notification
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                                <i class="ace-icon fa fa-exclamation-triangle"></i>
                                    Verification<br> 
                                    <?php $count4 = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_verify where username='$username' AND verification='0'")->result(); 
                            foreach ($count4 as $key => $value) { 
                              $value->count_rows;
                             }?>
                             <?php if($value->count_rows==0) {
                                 echo "  No New Verification";
                             }
                             else {
                                 echo $value->count_rows; 
                                 echo "New Verification";
                             }?>
                             <br>
                             <a href="<?php echo base_url(); ?>verification">
                                    See all verifications
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                                                       </li>   
                         </ul>
                </li> 
                 <? }else{ ?>
                                   <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <i class="ace-icon fa fa-bell bell-ico"></i>
                            <span class="badge badge-success"></span>
                        </a>
                        <ul class="green dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">

                           <li class="dropdown-header">
                                <b><i class="fa fa-exclamation-circle" aria-hidden="true"></i></b>
                                   <b>Notification</b> <br>
                            <?php $count4 = $this->db->query("SELECT COUNT(*) as count_rows FROM tbl_notify where notify_type='new user'")->result(); 
                            foreach ($count4 as $key => $value) { 
                             echo $value->count_rows;
                             }?>&nbsp;&nbsp;New Notification
                             <br>
                             <a href="<?php echo base_url(); ?>notification">
                                    See all notification
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                                                           </li>   
                          </ul>
                </li> 
                 <?       
            }    


            ?>
                  
            

            <? }else{
              ?>
              <li><a href="<?php echo base_url(); ?>home">Home</a></li>
              <li><a href="<?php echo base_url();?>account/<?php echo $usertype.'/'.$username;  ?>">My Account</a></li> 
            <?       
            }    


            ?>
          </ul>
        </div>
        

     </div>
    </nav>
