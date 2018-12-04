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
  <style type="text/css">
    .ab-head {
    font-size: 25px;
    border-bottom: 2px solid #ce4444;
    padding: 10px;
    display: inline-block;
    color: #004b00;
}
.ab-row {
    padding: 10px 0 30px;
}
.ab-info{
    padding: 25px 10px;
}
.ab-iBox img {
    width: 265px;
    height: 180px;
}
  </style>
</head>
<body>
  <!-- header -->
  <?php $this->load->view('includes/header');?>

  <!-- banner -->
  <div class="container-fluid">
    <div class="row ">
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div> 
    
    <section>
      <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h2 class="text-center text-green ptb-30" style=" background-color:#7C8B2E;">About Us</h2>
          </div>
        </div> 
        <div class="row ab-row">
          <div class="col-md-12">
            <p class="text-justify">
              <strong class="text-danger">A Chinese proverb </strong> "If you are planning for a year, sow rice; if you are planning for a decade, plant trees; if you are planning for a lifetime, educate people" 
              <br>
              When people believe and drive a thinking, it leads to bring transformation in the community. We at Organic Pandit strongly believe and thus build up this global platform to unite every individual who is contributing in this Organic Food Sector.
            </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <h4 class="ab-head">Our Story</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <p class="text-justify ab-info">
              We are small  but robust group founded by Prashanth Patil, everyone with different sector but with same goal and passion driven to work in Organic Food Industry.
              <br>
              At Organic Pandit, the team had been intensely studying and working in the Organic Food sector since 3 years with different stake holders in this chain, beginning from the Organic farmers, FPOs, Agri i/ps, agri o/ps, traders, processors, consultants, retailers, brands, exporters and newcomers in this field. 
            </p>
          </div>
          <div class="col-md-4">
            <div class="ab-Box">
              <img src="<?php echo base_url(); ?>assets/images/ourstory.jpg" class="img-responsive img-thumbnail">
            </div>
          </div>
        </div>
        <br>
        <div class="row ab-row">
          <div class="col-md-3">
            <div class="ab-iBox">
              <img src="<?php echo base_url(); ?>assets/images/mission.jpg" class="img-responsive img-thumbnail">
            </div>
          </div>
          <div class="col-md-9">
            <h4 class="ab-head">Mission</h4>
            <p class="text-justify">
              Organic food accessible to everyone and easier to Trade!
            </p>
          </div>
        </div>
        <br>
        <div class="row ab-row">          
         <div class="col-md-3">
          <div class="ab-iBox">
            <img src="<?php echo base_url(); ?>assets/images/aim.jpg" class="img-responsive img-thumbnail">
          </div>
        </div>
          <div class="col-md-9">
            <h4 class="ab-head">Aim</h4>
            <p class="text-justify">
             At Organic Pandit we aim to provide you global platform exclusively for Organic Industry where every business entity would be able to  find right people for their successful business transactions ex: every organic farmer/producer/supplier should get visibility of his product to the potential business clients across the world.
           </p>
         </div>
      </div>
      <br>
      <div class="row ab-row">
        <div class="col-md-3">
          <div class="ab-iBox">
            <img src="<?php echo base_url(); ?>assets/images/challenges.jpg" class="img-responsive img-thumbnail">
          </div>
        </div>
        <div class="col-md-9">
          <h4 class="ab-head">Challenges</h4>
          <p class="text-justify">
            Considering all these players in Organic Industry and various challenges they are facing like to connect with right people with right knowledge to complete the right process in required time frame. 
            Even the cost incurred in business supporting activities is very high and thus so we aimed to utilise our strength and skills to solve this one of the biggest problem in organic food market
            One of the major challenge is Traceability and Accountability of the Organic food. This platform enables to trace certifications, test reports and right processes.
          </p>
        </div>
      </div>
      <br>
      <div class="row ab-row">
       <div class="col-md-3">
        <div class="ab-iBox">
          <img src="<?php echo base_url(); ?>assets/images/benefits.jpg" class="img-responsive img-thumbnail">
        </div>
      </div>
        <div class="col-md-9">
          <h4 class="ab-head">Benefits</h4>
          <p class="text-justify">
           The Organic Food Industry is growing at very faster pace but at the same time this growth needs to be sustainable, through this platform it will be easy to approach  to people across the world working for the same interest.
         </p>
       </div>
    </div>
    <!-- footer -->
    <?php $this->load->view('includes/footer');?>
  </div>
</section>
</body>
</html>
