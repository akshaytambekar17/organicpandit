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

  <!-- FormValidation CSS file -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">


  <style type="text/css">
  .ab-head {
    font-size: 20px;
    border-bottom: 2px solid #ce4444;
    padding: 10px;
    display: inline-block;
    color: #004b00;
  }
  .cntFrm{
    background: #e6e6e6;
    padding: 30px 0 10px;
  }
  .cntFrm label{
    color: #a82208;}
    #map {
      height: 280px;
      width: 100%;
    }
    #loading {
      position: absolute;
      top: 150px;
      left: 130px;
    }
  </style>
</head>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
  <!-- header -->
  <?php $this->load->view('includes/header');?>

  <!-- banner -->
  <div class="container-fluid">
    <div class="row ">
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div> 
  </div>
  <section>
    <div class="container">
      <div class="row ">
        <div class="col-md-12">
          <h2 class="text-center text-green pb-30">Contact Us</h2>
        </div>
      </div> 
      <div class="row">
        <form id="contact_form">
          <div class="col-md-6 col-md-offset-3 col-sm-6">
            <div class="form-group">
              <label>Enter Your Name</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <label>Enter Your Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Enter Your Address</label>
              <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
              <label>Enter Your Query</label>
              <textarea class="form-control" rows="5" name="message"></textarea>
            </div>  
            <br>
            <input type="submit" name="submit_farmer" class="btn btn-info" value="Get In Touch">
            <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > 
            </div>
          </div>
        </form>
        <!-- <div class="col-md-5 col-md-offset-1 col-sm-6 "> -->
          <!-- <h4 class="ab-head"> <strong> Office Address :</strong> </h4> -->
         <!--  <h4>90-78 / 890 , Newyork demo lane,</h4>
          <h4>United States</h4>
          <br>
          <h4><strong>Email : </strong> info@yourdomain.com</h4>
          <h4><strong>Call : </strong> +90-890-8900-00</h4> -->

          <!-- <div id="map"></div> -->
        <!-- </div> -->
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTlVj092XFODcKcwdq7iLxcnH39Rodtk&callback=initMap">
      </script>
    </div>

    <!-- footer -->
    <?php $this->load->view('includes/footer');?>
  </div>
</section>

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- form  validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/framework/bootstrap.min.js"></script>
<script>
  function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }

  $(document).ready(function(){

    $('#contact_form').formValidation({
      framework: 'bootstrap',
      fields: {
        username: {
          validators: {
            notEmpty: {
              message: 'The username is required'
            }
          }
        },
        email: {
          validators: {
            notEmpty: {
              message: 'The email is required'
            }
          }
        },
        address: {
          validators: {
            notEmpty: {
              message: 'The address is required'
            }
          }
        },
        message: {
          validators: {
            notEmpty: {
              message: 'The message is required'
            }
          }
        }
      }
    })

    .on('success.form.fv', function(e) {
      e.preventDefault();

      $.ajax({  
        url: "<?php echo base_url();?>contact/sendMail",  
        method:"POST",  
        data:new FormData(this),  
        contentType: false,  
        cache: false,  
        processData:false,  
        beforeSend: function(){
          $("#loading").show();
        },
        success:function(response)  
        {  console.log(response);
          $("#loading").hide();
          if(response = 'success' ){
            console.log(response);
            swal({
              title: "Success!",
              text: "Message has been sent successfully",
              type: "success",
              showCancelButton: false,
              timer: 2000
            });
                           // document.getElementById("farmerRegisterForm").reset();
                         }
                       }  
                     }); 


    });
  });
</script>

</body>
</html>
