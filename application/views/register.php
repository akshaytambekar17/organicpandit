<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mera Kisan Organic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
  <!-- header -->
  <?php $this->load->view('includes/header');?>

  <!-- banner -->
  <div class="container-fluid">
    <div class="row ">
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div> 
    
    <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!--<h2 class="text-center text-green text-uppercase ptb-50">Click on your Organic partner To Registration</h2>-->
          <h2 class="text-center text-green  pb1-30" style="color:black;">Find your organic partner</h2>
        </div>
      </div>
      <div class="row" style="padding: 10px 70px; ">
      <center><div class="col20 col-md-2 col-sm-4">
          <a href="farmer-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/farmer.png" alt="organic world" ></div>
            <p class="partner-head">Farmer</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="fpo-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/fpo(1).png" alt="organic world" ></div>
            <p class="partner-head">FPO</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="trader-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/traders.png" alt="organic world" ></div>
            <p class="partner-head">Trader</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="processor-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/processor.png" alt="organic world" ></div>
            <p class="partner-head">Processor</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="buyer-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/buyeR.png" alt="organic world" ></div>
            <p class="partner-head">Buyer</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="org-consultant-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/organic co.png" alt="organic world" ></div>
            <p class="partner-head">Organic Consultant</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="org-input-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/organic input.png" alt="organic world" ></div>
            <p class="partner-head">Organic Input Company</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="packing-company-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/packaging.png" alt="organic world" ></div>
            <p class="partner-head">Packaging Company</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4 ">
          <a href="logistic-company-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/logistic.png" alt="organic world" ></div>
            <p class="partner-head">Logistic Company</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="farm-equip-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/farm equ.png" alt="organic world" ></div>
            <p class="partner-head">Farm Equipment Company</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="exhibitor-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/exhibitors(1).png" alt="organic world" ></div>
            <p class="partner-head">Exhibitors</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="org-shops-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/shops.png" alt="organic world" ></div>
            <p class="partner-head">Shops</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="org-labs-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/labs.png" alt="organic world" ></div>
            <p class="partner-head">Labs</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="gov-agency-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/government age.png" alt="organic world" ></div>
            <p class="partner-head">Government Agencies</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="institutions-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/institution.png" alt="organic world" ></div>
            <p class="partner-head">Institutions</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/certification.png" alt="organic world" ></div>
            <p class="partner-head">Others</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="org-restaurant-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/resturant.png" alt="organic world" ></div>
            <p class="partner-head">Restaurant</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="ngo-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/ngo(1).png" alt="organic world" ></div>
            <p class="partner-head">NGO</p>
          </a>
        </div>
        <div class="col20 col-md-2 col-sm-4">
          <a href="certification-register">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/certification.png" alt="organic world" ></div>
            <p class="partner-head">Certification</p>
          </a>
        </div>
       <!-- <div class="col20 col-md-2 col-sm-4">
          <a href="post-requirement">
            <div class="partner-box"><img src="<?php echo base_url(); ?>assets/images/certification.png" alt="organic world" ></div>
            <p class="partner-head">Post Require.</p>
          </a>
        </div>-->
        </center>  
      </div>
      <!-- footer -->
      <?php $this->load->view('includes/footer');?>
    </div>
</section>
  </body>
  </html>
