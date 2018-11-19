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
            <h2 class="text-center text-green2 ptb-30" style=" background-color:#7C8B2E;">MERAKISAN ORGANIC AWARDS 2018</h2>
          </div>
        </div><br>
        <Div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Organic culture is coming in and organic agriculture & agribusiness is growing rapidly over a decade now. 
                    Consumers are getting aware of organic worldwide and with the awareness there is a booming demand and the growing interests of farmers to go organic, 
                    they are actively participating and promoting organics, there are farmers/farmer groups, organizations, companies and Govts. 
                    They are now interestingly growing organic.</p>
                    <P>It is our indeed pleasure to encourage and motivate them to continue contributing towards organic farming, 
                    promotion and business. Hence, we are introducing the “MeraKisan Organic Awards 2018” in recognition of such efforts and this is our first awards in such recognition.</P>
                    <P><B>About Jury:</B> We propose to have a jury with members comprising of respected and highly experienced professionals from the industry. </P>
                    <P><B>About Award categories:</B> These awards will be presented by eminent leaders from government, institutions of organic industry sector. 
                    It will gather a lot of media attention and will be aired in reputed electronic media channel. These awards are presented based on the work and contribution in taking forward the cause of the sector they represent, 
                    the categories are as mentioned below:</P>
                </div>
            </div>
        </Div><br>
        
        <div class="container">
            <form   method="POST" role="form" id="AwardsForm" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="control-label requiredlbl" for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name " name="name" >
                </div>
                <div class="col-md-4 form-group">
                    <label class="control-label requiredlbl" for="category ">Category :</label>
                    <select class="form-control" name="category" id="category">
                        <option value="">Select your category</option>
                        <option value="Young Organic Leader">Young Organic Leader</option>
                        <option value="Best Organic Market Innovator">Best Organic Market Innovator</option>
                        <option value="Export Market Leader">Export Market Leader</option>
                        <option value="Certified Organic Food Product of the Yea">Certified Organic Food Product of the Yea</option>
                        <option value="Certified Organic Cosmetic ">Certified Organic Cosmetic </option>
                        <option value="Farmer of the Year">Farmer of the Year</option>
                        <option value="Best Organic Online Player of the Year">Best Organic Online Player of the Year</option>
                        <option value="Best Organic Processor of the Year">Best Organic Processor of the Year</option>
                        <option value="Best Retailer of the Year">Best Retailer of the Year</option>
                        <option value="Best Company with Direct Farmer linkages">Best Company with Direct Farmer linkages</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                        <label class="control-label requiredlbl" for="about">About You :</label>
                        <textarea class="form-control" rows="1" id="about" placeholder="Enter story" maxlength="100" name="about" ></textarea>
                </div>
            </div><br>
            
            <div class="row">
                <div class="col-md-4 form-group">
                    <label class="control-label requiredlbl" for="engagement">Farmer Engagement :</label>
                    <input type="text" class="form-control" id="engagement" placeholder="Enter Farmer Engagement " name="engagement" >
                </div>
                <div class="col-md-4 form-group">
                    <label class="control-label requiredlbl" for="cert_details">Certification Details :</label>
                    <input type="text" class="form-control" id="cert_details" placeholder="Enter Certification Details " name="cert_details" >
                </div>
                <div class="col-md-4 form-group">
                    <label class="control-label requiredlbl" for="contribution">Contribution of Organic Business to the total turnover :</label>
                    <input type="text" class="form-control" id="contribution" placeholder="Enter Contribution " name="contribution" >
                </div>
            </div><br>
            
            <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="control-label requiredlbl" for="pr_details">Tell About your Products  :</label>
                        <textarea class="form-control" rows="1" id="pr_details" placeholder="Enter About your Products" maxlength="100" name="pr_details" ></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="control-label requiredlbl" for="sect_details">Contribution to the Organic Sector Details  :</label>
                        <textarea class="form-control" rows="1" id="sect_details" placeholder="Enter Contribution to the Organic Sector Details " maxlength="100" name="sect_details" ></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="control-label requiredlbl" for="other_details">Other Details  :</label>
                        <textarea class="form-control" rows="1" id="other_details" placeholder="Enter Other Details " maxlength="100" name="other_details" ></textarea>
                    </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-md-12 form-group text-center">
          <input type="submit" name="submit_farmer" class="btn btn-primary" value="Submit">
          <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > 
          </div>
        </div>
      </div>
      </form><br><br><br>
    <!-- footer -->
    <?php $this->load->view('includes/footer');?>
  </div>
</section>
<script>
 
  $(document).ready(function(){

    $('#AwardsForm').formValidation({
      framework: 'bootstrap',
      fields: {
        name: {
          validators: {
            notEmpty: {
              message: 'The name is required'
            }
          }
        },
        category: {
          validators: {
            notEmpty: {
              message: 'The category is required'
            }
          }
        },
        about: {
          validators: {
            notEmpty: {
              message: 'The about is required'
            }
          }
        },
        engagement: {
          validators: {
            notEmpty: {
              message: 'The engagement is required'
            }
          }
        },
         cert_details: {
          validators: {
            notEmpty: {
              message: 'The cert_details is required'
            }
          }
        },
         contribution: {
          validators: {
            notEmpty: {
              message: 'The contribution is required'
            }
          }
        },
         pr_details: {
          validators: {
            notEmpty: {
              message: 'The pr_details is required'
            }
          }
        },
         sect_details: {
          validators: {
            notEmpty: {
              message: 'The sect_details is required'
            }
          }
        },
        other_details: {
          validators: {
            notEmpty: {
              message: 'The other_details is required'
            }
          }
        }
        
      }
    })

    .on('success.form.fv', function(e) {
      e.preventDefault();

      $.ajax({  
        url: "<?php echo base_url();?>awards/sendMail",  
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
