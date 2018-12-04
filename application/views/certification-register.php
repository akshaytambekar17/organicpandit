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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
  <!-- FormValidation CSS file -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

  
</head>
<body>
  <!-- header -->
  <?php $this->load->view('includes/header');?>

  <!-- banner -->
  <div class="container-fluid">
    <div class="row ">
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div> 
  </div>
  <div class="container">
      <h2 class="text-center text-green text-uppercase ptb-50" style=" background-color:#7C8B2E;">Certification Registration Form</h2>
         <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
      <form   method="POST" role="form" id="certificationRegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
       <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="agency_name">Agency Name:</label>
          <select class="form-control" name="agency_name" id="agency_name">
            <option value="">Select your option</option>
            <?php foreach ($agencies as $agency):?>
              <option value="<?php echo $agency->name; ?>"><?php echo $agency->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="contact_person">Contact Person:</label>
          <input type="text" class="form-control" id="contact_person" placeholder="Enter Name " name="contact_person" >
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="address ">Address :</label>
          <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"></textarea>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="username">User Name :</label>
          <input type="username" class="form-control" id="username" placeholder="Enter User Name" name="username" >
          </div>
          <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="password">Password :</label>
          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" >
          </div>
          <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="licence_no">Licence No.:</label>
          <input type="text" class="form-control" id="licence_no" placeholder="Enter Licence No." name="licence_no" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="email1">Email 1 :</label>
          <input type="email" class="form-control" id="email1" placeholder="Enter Email Address" name="email1" >
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label" for="email2">Email 2:</label>
          <input type="email" class="form-control" id="email2" placeholder="Enter Email address " name="email2" >
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label " for="landline">Landline No :</label>
          <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="mobile1">Mobile 1:</label>
          <input type="text" class="form-control" id="mobile1" placeholder="Enter Mobile Number" name="mobile1" >
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label " for="mobile2">Mobile 2:</label>
          <input type="text" class="form-control" id="mobile2" placeholder="Enter Mobile Number" name="mobile2" >
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="website">Website:</label>
          <input type="text" class="form-control" id="website" placeholder="Enter Website" name="website" >
        </div>
      </div>
    <div class="row">          
      <div class="col-md-12 form-group text-center">      
        <input type="submit" name="submit_certification" class="btn btn-primary" value="Submit">
        <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > 
        </div>
      </div>
    </div>
  </form>
<!-- footer -->
<?php $this->load->view('includes/footer');?>
</div>

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- form  validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/framework/bootstrap.min.js"></script>
<!-- plugin init js -->

<script type="text/javascript">
  $(document).ready(function(){


    $('#state').on('change',function(){

      var stateID = $(this).val();
      console.log(stateID);
      if(stateID){
        $.ajax({
          type:'POST',
          url: "<?php echo base_url();?>certification_register/get_city",
          data:'state_id='+stateID,
          success:function(html){
            $('#city').html(html);
            console.log('in');
          }
        }); 
      }else{
        $('#city').html('<option value="">Select state first</option>'); 
        console.log('out');
      }
    });
  }); 

  $(document).ready(function(){

    $('#certificationRegisterForm').formValidation({
      framework: 'bootstrap',
     fields: {
          agency_name: {
            validators: {
              notEmpty: {
                message: 'The Agency Name is required'
              }
            }
          },
          contact_person: {
            validators: {
              notEmpty: {
                message: 'The contact person is required'
              }
            }
          },
          username: {
            validators: {
              notEmpty: {
                message: 'The username is required'
              },
              remote: {
                message: 'The username is not available',
                url: '<?php echo base_url() ?>check-username-exists/farmer',
                type: 'POST'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'The password is required'
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
          email1: {
            validators: {
              notEmpty: {
                message: 'The email1 is required'
              }
            }
          },
          mobile1: {
            validators: {
              notEmpty: {
                message: 'The mobile no is required'
              }
            }
          },
          website: {
            validators: {
              notEmpty: {
                message: 'The website is required'
              }
            }
          },
          licence_no: {
            validators: {
              notEmpty: {
                message: 'The licence_no is required'
              }
            }
          },
        }
    })





        .on('success.form.fv', function(e) {
         e.preventDefault();

         $.ajax({  
           url: "<?php echo base_url();?>certification_register/create_certification",  
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
                text: "certification has been added successfully",
                type: "success",
                showCancelButton: false,
                timer: 2000
              });
                           // document.getElementById("buyerRegisterForm").reset();
                         }
                       }  
                     }); 


       });
      });


    </script>
    <script type="text/javascript">
      $(function () {
        $('.datepicker').datepicker({}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#certificationRegisterForm').formValidation('revalidateField', 'pr_avlFrom[]');
          });
      });
      
    </script>
   
 </body>
 </html>
