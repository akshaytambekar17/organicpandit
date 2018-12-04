<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mera Kisan Organic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="7RMVcgenSODax5gKQlBA_R1Li-3ZjgafLDqStpL7_yc" />
  <!-- font awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<body>

  <!-- header -->
  <?php $this->load->view('includes/header'); 
  ?>
  
  <div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner banner-slider ">

        <div class="item active">
          <img src="<?php echo base_url(); ?>assets/images/slider1.jpg" alt="organic world" >
        </div>

        <div class="item">
          <img src="<?php echo base_url(); ?>assets/images/slider2.jpg" alt="organic world" >
        </div>

        <!-- <div class="item">
          <img src="<?php echo base_url(); ?>assets/images/slider.jpg" alt="organic world" >
        </div> -->

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- slider end -->

  <div class="container">
    <section>
          
      <div class="row"><div class="col-md-12">
          <div class="col-md-2 col-sm-2">
         </div>  
        <div class="col-md-4 col-sm-4"><div class="adv-box">
          <img src="<?php echo base_url(); ?>assets/images/search deals.png" alt="organic world">
          <div class="rel-adv">
            <div class="adv-head">Search Deals</div>
           <!-- <a class="btn  btn-black" href="<?php echo base_url(); ?>register">Click Here</a>-->
          </div>
        </div></div>
        
        <div class="col-md-4 col-sm-4"><div class="adv-box">
          <img src="<?php echo base_url(); ?>assets/images/post deals.png" alt="organic world">
          <div class="rel-adv">
            <div class="adv-head">Post Deals</div>
            <!--<a class="btn  btn-black" href="#">Start Now</a>-->
          </div>
        </div></div>
        <div class="col-md-2 col-sm-2">
         </div> 
      </div></div>
    </section>
    <section>
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center text-green text-uppercase pb-30">Find your organic partner</h2>
        </div>
      </div>
      <div class="row" style="padding: 0 70px; ">

        <div class="col20 col-md-2 col-sm-4">           
          <a href="<?php echo site_url('/search-detail/farmer'); ?>" title="Farmer">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/farmer.png" alt="organic world" ></div>
            <p class="partner-head">Farmer <span class="badge"><?php echo $cnt_farmer; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">          
          <a href="<?php echo site_url('/search-detail/fpo'); ?>"  title="FPO">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/fpo.png" alt="organic world" ></div>
            <p class="partner-head">FPO <span class="badge"><?php echo $cnt_fpo; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/trader'); ?>" title="Trader">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/traders.png" alt="organic world" ></div>
            <p class="partner-head">Trader <span class="badge"><?php echo $cnt_trader; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/processor'); ?>" title="Processor">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/processor.png" alt="organic world" ></div>
            <p class="partner-head">Processor <span class="badge"><?php echo $cnt_processor; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/buyer'); ?>" title="Buyer">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/buyeR.png" alt="organic world" ></div>
            <p class="partner-head">Buyer <span class="badge"><?php echo $cnt_buyer; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/org_consultant'); ?>" title="Organic Consultant">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/organic co.png" alt="organic world" ></div>
            <p class="partner-head">Org Cons.. <span class="badge"><?php echo $cnt_org_consultant; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/org_input'); ?>"  title="Organic Input">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/organic input.png" alt="organic world" ></div>
            <p class="partner-head">Org Input  <span class="badge"><?php echo $cnt_org_input; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/packaging'); ?>" title="Packaging Company">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/packaging.png" alt="organic world" ></div>
            <p class="partner-head">Packaging <span class="badge"><?php echo $cnt_packaging; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/logistic'); ?>" title="Logistic Company">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/logistic.png" alt="organic world" ></div>
            <p class="partner-head">Logistic <span class="badge"><?php echo $cnt_logistic; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/farm_equipment'); ?>" title="Farm Equipment">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/farm equ.png" alt="organic world" ></div>
            <p class="partner-head">Farm Equip..  <span class="badge"><?php echo $cnt_equipment; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/exhibitors'); ?>" title="Exhibitors">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/exhibitors.png" alt="organic world" ></div>
            <p class="partner-head">Exhibitors <span class="badge"><?php echo $cnt_exhibitors; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/shops'); ?>" title="Shops">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/shops.png" alt="organic world" ></div>
            <p class="partner-head">Shops <span class="badge"><?php echo $cnt_shops; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/labs'); ?>" title="Labs">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/labs.png" alt="organic world" ></div>
            <p class="partner-head">Labs <span class="badge"><?php echo $cnt_labs; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/gov_agency'); ?>" title="Government Agencies">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/government age.png" alt="organic world" ></div>
            <p class="partner-head">Gov. Agency <span class="badge"><?php echo $cnt_gov_agency; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/institutions'); ?>" title="Institutions">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/institution.png" alt="organic world" ></div>
            <p class="partner-head">Institutions <span class="badge"><?php echo $cnt_institutions; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/others'); ?>" title="Others">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/others.png" alt="organic world" ></div>
            <p class="partner-head">Others <span class="badge">NA</span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/restaurant'); ?>" title="Restaurant">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/resturant.png" alt="organic world" ></div>
            <p class="partner-head">Restaurant <span class="badge"><?php echo $cnt_restaurant; ?></span></p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="<?php echo site_url('/search-detail/ngo'); ?>" title="NGO">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/ngo.png" alt="organic world" ></div>
            <p class="partner-head">NGO <span class="badge"><?php echo $cnt_ngo; ?></span></p>
          </a>
        </div>
      </div>
    </section>
 </div>
    <section>
      <div class="row" style="background-color:white";>
          <center><p style="font-color:#4C6A06; font-size:20px;">Start Making New Deals Today</p></center>
          <center><p style="font-size:20px;">Display unlimited number of your products, contact new business<br>clients directly and get better prices for your products.</p></center>
        <div class="col-md-1 col-sm-1">
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="service-box"><img src="<?php echo base_url(); ?>assets/images/1.png" alt="organic world" ></div>
          <center><p style="font-color:#4C6A06; font-size:20px;">1</p></center>
          <center><p style="font-color:#4C6A06; font-size:20px;">Create Profile</p></center>
          <center><p style="font-color:#ffffff; font-size:15px;">Its important to build trust among your audience<br>and to be a part of this block chain by creating<br>a profile with detailed information and presence<br>on this platform.</p></center>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="service-box"><img src="<?php echo base_url(); ?>assets/images/2.png" alt="organic world" ></div>
          <center><p style="font-color:#4C6A06; font-size:20px;">2</p></center>
          <center><p style="font-color:#4C6A06; font-size:20px;">Connect & Find Deals</p></center>
          <center><p style="font-color:#ffffff; font-size:15px;">Buyers can post their every detailed requirements to<br>which intrested farmers,FPO,Traders, & Processors can<br>apply. To build trust, its important to provide your<br>organic product trace-ability details while you apply.</p></center>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="service-box"><img src="<?php echo base_url(); ?>assets/images/3.png" alt="organic world" ></div>
          <center><p style="font-color:#4C6A06; font-size:20px;">3</p></center>
          <center><p style="font-color:#4C6A06; font-size:20px;">Finalize Deals</p></center>
          <center><p style="font-color:#ffffff; font-size:15px;">At the end, all players that applied to deals will be<br>notified via various communucations like auto linked<br>messages, emails by our team. To be make the supply<br>chain easier, you can even utilize other players<br>engadged in this platform.</p></center>
        </div>
        <div class="col-md-1 col-sm-1">
        </div>
      </div>
    </section>
    <!-- footer -->
    <?php $this->load->view('includes/footer');?>
 
</body>
</html>
