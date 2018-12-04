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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/css/formValidation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>
<body>
  <!-- header -->
  <?php $this->load->view('includes/header');?>
  <!-- banner -->
  <div class="container-fluid">
    <div class="row ">
      <!-- <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div> -->
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div>
  </div>
  <div class="container">
    <h2 class="text-center text-green text-uppercase ptb-50">Update  Registration </h2>
    <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
<?    //print_r($tdata); 

  foreach ($tdata as $key => $row){
 ?>
    <form   method="POST" role="form" id="farmerRegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="text" class="form-control hidden" id="user_id" placeholder="type " name="user_id" value="<? echo $row->id; ?>">
          <input type="text" class="form-control hidden" id="user_type" placeholder="type " name="user_type" value="<? echo $user_type; ?>">
          <label class="control-label requiredlbl" for="fullname" >Full Name:</label>
          <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name " name="fullname" value="<? echo $row->fullname; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="username">User Name:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter User Name " name="username" value="<? echo $row->username; ?>" disabled>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="email">Email address:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email" value="<? echo $row->email; ?>">
        </div>        
        <? if(!empty($row->ceo)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="ceo">CEO:</label>
          <input type="text" class="form-control" id="ceo" placeholder="Enter CEO " name="ceo" value="<? echo $row->ceo; ?>">
        </div>
        <?php } ?>
         <? if(!empty($row->comapny_name)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="comapny_name">Name of the company :</label>
          <input type="text" class="form-control" id="comapny_name" placeholder="Enter Name of the company :" name="comapny_name" value="<? echo $row->comapny_name; ?>">
        </div>
        <?php } ?>
        <div class="col-md-4 form-group">
          <label class="control-label " for="landline">Landline No :</label>
          <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline" value="<? echo $row->landline; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="mobile">Mobile No :</label>
          <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile" value="<? echo $row->mobile; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="state ">State :</label>
          <select class="form-control" name="state" id="state">
            <option value="">Select your option</option>
            <?php foreach ($states as $state):?>
              <option value="<?php echo $state->id; ?>" <?php  if($row->state==$state->id) { echo 'selected="selected"'; } else { echo ''; } ?>><?php echo $state->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="city ">City :</label>
          <select class="form-control"   name="city" id="city">
            <option value="">Select state first</option>
            <?php foreach ($cities as $city):?>
              <option value="<?php echo $city->id; ?>" <?php  if($row->city==$city->id) { echo 'selected="selected"'; } else { echo ''; } ?>><?php echo $city->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="address ">Address :</label>
          <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"><? echo $row->address; ?></textarea>
        </div>
        <? if(!empty($row->pancard)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="pancard">Pan Card Number:</label>
          <input type="text" class="form-control" id="pancard" placeholder="Enter Pan Card Number" name="pancard" value="<? echo $row->pancard; ?>">
        </div>
        <?php } ?>
        <? if(!empty($row->gst)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="gst">GST Number:</label>
          <input type="text" class="form-control" id="gst" placeholder="Enter Pan Card Number" name="gst" value="<? echo $row->gst; ?>">
        </div>
        <?php } ?>
        <div class="col-md-4 form-group">
          <label class="control-label " for="aadharcard">Aadhar Card Number:</label>
          <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard" value="<? echo $row->aadharcard; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="story">Your Story :</label>
          <input type="text" class="form-control" id="story" placeholder="Enter Your Story  " name="story" value="<? echo $row->story; ?>">
        </div>
        <? if(!empty($row->certification)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="certification">Certification:</label>
          <select class="form-control" name="certification" id="certification">
            <option value="">Select your option</option>
              <option value="npop" <?php  if($row->certification=='npop') { echo 'selected="selected"'; } else { echo ''; } ?> >NPOP</option>
              <option value="nop" <?php  if($row->certification=='nop') { echo 'selected="selected"'; } else { echo ''; } ?> >NOP</option>
              <option value="pgs" <?php  if($row->certification=='pgs') { echo 'selected="selected"'; } else { echo ''; } ?> >PGS</option>
              <option value="acos" <?php  if($row->certification=='acos') { echo 'selected="selected"'; } else { echo ''; } ?> >ACOS</option>
              <option value="eu" <?php  if($row->certification=='eu') { echo 'selected="selected"'; } else { echo ''; } ?> >EU</option>
              <option value="both" <?php  if($row->certification=='both') { echo 'selected="selected"'; } else { echo ''; } ?> >Both NPOP &amp; NOP</option>
          </select>
        </div>
        <?php } ?>
        <? if(!empty($row->visitq)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="visitq">Can we visit your farm :</label>
          <select class="form-control" name="visitq" id="visitq">
            <option value="">Select your option</option>
            <option <?php  if($row->visitq=='Yes') { echo 'selected="selected"'; } else { echo ''; } ?>>Yes</option>
            <option <?php  if($row->visitq=='No') { echo 'selected="selected"'; } else { echo ''; } ?>>No</option> 
          </select>
        </div>
        <?php } ?>
        <? if(!empty($row->test_report)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="test_report">Can you provide test report? :</label>
          <select class="form-control" name="test_report" id="test_report">
            <option value="">Select your option</option>
            <option <?php  if($row->test_report=='Yes') { echo 'selected="selected"'; } else { echo ''; } ?>>Yes</option>
            <option <?php  if($row->test_report=='No') { echo 'selected="selected"'; } else { echo ''; } ?>>No</option>
          </select>
        </div>
        <?php } ?>
        <? if(!empty($row->no_farmer)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="no_farmer">No of Farmer:</label>
          <select class="form-control" name="no_farmer" id="no_farmer">
                <option value="">Select your option</option>
    <option <?php  if($row->no_farmer=='10 to 50') { echo 'selected="selected"'; } else { echo ''; } ?> >10 to 50</option>
    <option <?php  if($row->no_farmer=='50 to 100') { echo 'selected="selected"'; } else { echo ''; } ?> >50 to 100</option>
    <option <?php  if($row->no_farmer=='100 to 200') { echo 'selected="selected"'; } else { echo ''; } ?> >100 to 200 </option>
    <option <?php  if($row->no_farmer=='200 to 500') { echo 'selected="selected"'; } else { echo ''; } ?> >200 to 500</option>
    <option <?php  if($row->no_farmer=='500 to 1000') { echo 'selected="selected"'; } else { echo ''; } ?> >500 to 1000</option>
    <option <?php  if($row->no_farmer=='1000 to 3000') { echo 'selected="selected"'; } else { echo ''; } ?> >1000 to 3000</option>
    <option <?php  if($row->no_farmer=='Above 3000') { echo 'selected="selected"'; } else { echo ''; } ?> >Above 3000</option>
              </select>
        </div>
        <?php } ?>

        <? if(!empty($row->website)){?>
        <div class="col-md-4 form-group">
          <label class="control-label " for="website">Website:</label>
          <input type="text" class="form-control" id="website" placeholder="Enter Pan Card Number" name="website" value="<? echo $row->website; ?>">
        </div>
        <?php } ?> 
        <? if(!empty($row->types)){?>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="types">Type of Buyer:</label>
          <select class="form-control" name="types" id="types">
                <option value="">Select your option</option>
    <option <?php  if($row->types=='Company') { echo 'selected="selected"'; } else { echo ''; } ?> >Company</option>
   <option <?php  if($row->types=='Exporter') { echo 'selected="selected"'; } else { echo ''; } ?> >Exporter</option>
    <option <?php  if($row->types=='Consumer') { echo 'selected="selected"'; } else { echo ''; } ?> >Consumer </option>
              </select>
        </div>
        <?php } ?>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h4 class="frm-headBg"> Bank Details</h4>
        </div>
        <div class="col-md-3 form-group">
          <input type="text" class="form-control" id="acc_bank"  name="acc_bank" placeholder="Enter Bank Name" value="<? echo $row->acc_bank; ?>" >
        </div>
        <div class="col-md-3 form-group">
          <input type="text" class="form-control" id="acc_name"  name="acc_name" placeholder="Enter Ac Name" value="<? echo $row->acc_name; ?>" >
        </div>
        <div class="col-md-3 form-group">
          <input type="text" class="form-control" id="acc_no"  name="acc_no" placeholder="Enter Ac Number" value="<? echo $row->acc_no; ?>" >
        </div>
        <div class="col-md-3 form-group">
          <input type="text" class="form-control" id="ifsc_code"  name="ifsc_code" placeholder="Enter IFSC Code" value="<? echo $row->ifsc_code; ?>" >
        </div>
      </div>
      <!-- row end --> 
      <div class="row">
        <div class="col-md-12 form-group text-center">
          <input type="submit" name="submit_farmer" class="btn btn-primary" value="Submit">
          <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > 
          </div>
        </div>
      </div>
    </form>
    <? } ?>
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/js/formValidation.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/js/framework/bootstrap.min.js"></script>
  <!-- plugin init js -->
  <script type="text/javascript">
    $(document).ready(function(){


      $('#state').on('change',function(){

        var stateID = $(this).val();
        console.log(stateID);
        if(stateID){
          $.ajax({
            type:'POST',
            url: "<?php echo base_url();?>farmer_register/get_city",
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

      $('#farmerRegisterForm').formValidation({
        framework: 'bootstrap',
        fields: {
          fullname: {
            validators: {
              notEmpty: {
                message: 'The name is required'
              }
            }
          },
          username: {
            validators: {
              notEmpty: {
                message: 'The username is required'
              }
            }
          },
          ceo: {
            validators: {
              notEmpty: {
                message: 'The ceo is required'
              }
            }
          },   
          comapny_name: {
            validators: {
              notEmpty: {
                message: 'The comapny name is required'
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
          pancard: {
            validators: {
              notEmpty: {
                message: 'The pancard is required'
              }
            }
          },
          gst: {
            validators: {
              notEmpty: {
                message: 'The gst is required'
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
          certification: {
            validators: {
              notEmpty: {
                message: 'The certificate is required'
              }
            }
          },
          certify_img: {
            validators: {
              notEmpty: {
                message: 'The certification image is required'
              }
            }
          },
          test_report: {
            validators: {
              notEmpty: {
                message: 'The test report is required'
              }
            }
          },
          visitq: {
            validators: {
              notEmpty: {
                message: 'The field is required'
              }
            }
          },
          no_farmer: {
            validators: {
              notEmpty: {
                message: 'The field is required'
              }
            }
          },
          types: {
            validators: {
              notEmpty: {
                message: 'The field is required'
              }
            }
          }
        }
      })
      
    .on('success.form.fv', function(e) {
              e.preventDefault();

              $.ajax({  
                url: "<?php echo base_url();?>account/update_register",  
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
                      text: "Data has been updated successfully",
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