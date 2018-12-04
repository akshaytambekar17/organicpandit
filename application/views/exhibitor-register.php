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
      <div class="row">
        <h2 class="text-center text-green text-uppercase ptb-50" style=" background-color:#7C8B2E;">Exhibitor Company Registration Form</h2>
         <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
      <form  method="POST" role="form" id="RegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="fullname">Full  Name:</label>
              <input type="text" class="form-control" id="fullname" placeholder="Enter Full  Name " name="fullname">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="ceo">Director Name/CEO:</label>
              <input type="text" class="form-control" id="ceo" placeholder="Enter Director Name/CEO  " name="ceo">
            </div> 
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="comapny_name">Name of the Company  :</label>
              <input type="text" class="form-control" id="comapny_name" placeholder="Enter Name of the Company    " name="comapny_name">
            </div>  
            </div>
            <div class="row">  
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="username">User  Name:</label>
              <input type="text" class="form-control" id="username" placeholder="Enter User  Name " name="username">
            </div>        
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="password">Password :</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
            </div>  
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="rpassword">Re-Enter Password :</label>
              <input type="password" class="form-control" id="rpassword" placeholder="Re-Enter Password " name="rpassword">
            </div>     
            </div>
            <div class="row">      
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="email">Email address:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email">
            </div>            
            <div class="col-md-4 form-group">
              <label class="control-label" for="landline">Landline No :</label>
              <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="mobile">Mobile No :</label>
              <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile">
            </div>     
            </div>
            <div class="row">    
            <div class="col-md-4 form-group">
            <label class="control-label requiredlbl" for="state ">State :</label>
            <select class="form-control" name="state" id="state"> 
              <option value="">Select your option</option>
              <?php foreach ($states as $state):?>

                <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>

              <?php endforeach;?>
            </select>

          </div> 
            <div class="col-md-4 form-group">
            <label class="control-label requiredlbl" for="city ">City :</label>
            <select class="form-control"   name="city" id="city">
              <option value="">Select state first</option>
            </select>
          </div>      
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="address">Address :</label>
              <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"></textarea>
            </div>      
            </div>
            <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label" for="gst">GST Number:</label>
              <input type="text" class="form-control" id="gst" placeholder="Enter GST Number" name="gst">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label" for="aadharcard">Aadhar Card Number:</label>
              <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard">
            </div>    
            <div class="col-md-4 form-group">
            <label class="control-label requiredlbl" for="profile">Choose Profile Pic:</label>
            <input type="file" class="form-control" id="profile"  name="profile">
          </div>   
          </div>
            <div class="row">
          <div class="col-md-4 form-group">
              <label class="control-label" for="website">Website:</label>
              <input type="text" class="form-control" id="website" placeholder="Enter Website Address" name="website">
            </div>     
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="story">Your Story :</label>
              <textarea class="form-control" rows="1" id="story" placeholder="Enter story" maxlength="100" name="story"></textarea>
            </div>    
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="company_images">Choose Company Image :</label>
              <input type="file" class="form-control" id="company_images"  name="company_images">
            </div>
            </div>
            <div class="row">  
            <div class="col-md-4 form-group">
              <label class="control-label" for="video">Choose Video  :</label>
              <input type="file" class="form-control" id="video"  name="video" accept="video/*">
            </div> 
            </div>
            <div class="row">
            <div class="col-md-12"><h4 class="frm-headBg"> Bank Details</h4>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" id="acc_bank"  name="acc_bank" placeholder="Enter Bank Name">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" id="acc_name"  name="acc_name" placeholder="Enter Ac Name">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" id="acc_no"  name="acc_no" placeholder="Enter Ac Number">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" id="ifsc_code"  name="ifsc_code" placeholder="Enter IFSC Code">
            </div>
          </div>  <!-- row end --> 
          <div class="row">          
            <div class="col-md-12 form-group text-center">      
              <input type="submit" name="submit_trader" class="btn btn-primary" value="Submit">
            <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > 
            </div>
          </div>
      </form>
    </div>
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

  <script>
        $(document).ready(function(){


      $('#state').on('change',function(){

        var stateID = $(this).val();
        console.log(stateID);
        if(stateID){
          $.ajax({
            type:'POST',
            url: "<?php echo base_url();?>exhibitor_register/get_city",
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

    $(document).ready(function() {
      $('#RegisterForm').formValidation({
        framework: 'bootstrap',
        fields: {
          fullname: {
            validators: {
              notEmpty: {
                message: 'The name is required'
              }
            }
          },
          ceo: {
            validators: {
              notEmpty: {
                message: 'The ceo name is required'
              }
            }
          },
          comapny_name: {
            validators: {
              notEmpty: {
                message: 'This field is required'
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
                url: '<?php echo base_url() ?>check-username-exists/exhibitors',
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
          rpassword: {
            validators: {
              notEmpty: {
                message: 'The confirm password is required'
              },
              identical: {
                field: 'password',
                message: 'The password and its confirm are not the same'
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
          mobile: {
            validators: {
              notEmpty: {
                message: 'The mobile no is required'
              }
            }
          },
          state: {
            validators: {
              notEmpty: {
                message: 'The state is required'
              }
            }
          },
          city: {
            validators: {
              notEmpty: {
                message: 'The city is required'
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
          story: {
            validators: {
              notEmpty: {
                message: 'The story is required'
              }
            }
          },
          profile: {
            validators: {
              notEmpty: {
                message: 'The profile image is required'
              }
            }
          },
          company_images: {
            validators: {
              notEmpty: {
                message: 'The company image is required'
              }
            }
          }
        }
      }).on('success.form.fv', function(e) {
       e.preventDefault();

       $.ajax({  
         url: "<?php echo base_url();?>exhibitor_register/create_exhibitor",  
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
              text: "Exhibitor company has been added successfully",
              type: "success",
              showCancelButton: false,
              timer: 2000
            });
                           // document.getElementById("RegisterForm").reset();
                         }
                       }  
                     }); 


     });
    });
  </script>
  <script type="text/javascript">
    $(function () {
     $('.datepicker').datepicker({
      format: 'dd/mm/yyyy'
    });
   });

 </script>
</body>
</html>
