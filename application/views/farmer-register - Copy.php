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
      <!-- <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div> -->
      <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/banner.png" alt="organic world" >     </div>
    </div>
  </div>
  <div class="container">
    <h2 class="text-center text-green text-uppercase ptb-50">Farmer Registration Form <?php if(!empty($user_action)){echo $user_action;}else{echo 'hi' ;} ?></h2>
    <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
    <?php 
    $id="";  $fullname="";  $username=""; $password="";  $email="";  $landline="";  $mobile="";  $state="";  
    $city="";  $address="";  $pancard="";  $aadharcard="";  $story="";  $profile="";  $certification="";    

    if(!empty($account_detail)){ 
     $id = $account_detail->id; 
     $fullname = $account_detail->fullname; 
     $username = $account_detail->username; 
     $password = $account_detail->password; 
     $email = $account_detail->email; 
     $landline = $account_detail->landline; 
     $mobile = $account_detail->mobile; 
     $state = $account_detail->state; 
     $city = $account_detail->city; 
     $story = $account_detail->story; 
     $address = $account_detail->address; 
     $pancard = $account_detail->pancard; 
     $aadharcard = $account_detail->aadharcard; 
     $certification = $account_detail->certification; 
     $visitq = $account_detail->visitq; 
     $test_report = $account_detail->test_report; 
     

     ?>
     <form   method="POST" role="form" id="farmerRegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="row">
          <input type="text" class="form-control hidden" id="update_user"   name="update_user"  value="<? echo $id; ?>">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="fullname" >Full Name:</label>
          <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name " name="fullname"  value="<? echo $fullname; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="username-up">User Name:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter User Name " name="username-up" value="<? echo $username; ?>" disabled>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="email">Email address:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email" value="<? echo $email; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label " for="landline">Landline No :</label>
          <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline" value="<? echo $landline; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="mobile">Mobile No :</label>
          <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile" value="<? echo $mobile; ?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="state ">State :</label>
          <select class="form-control" name="state" id="state">
            <option value="">Select your option</option>            
            <?php foreach ($states as $state):?>
              <option value="<?php echo $state->id; ?>" <?php  if($account_detail->state==$state->id) { echo 'selected="selected"'; } else { echo ''; } ?>><?php echo $state->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="city ">City :</label>
          <select class="form-control"   name="city" id="city">
            <option value="">Select state first</option>
            <?php foreach ($cities as $city):?>
              <option value="<?php echo $city->id; ?>" <?php  if($account_detail->city==$city->id) { echo 'selected="selected"'; } else { echo ''; } ?>><?php echo $city->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="address ">Address :</label>
          <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"><? echo $address; ?></textarea>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="pancard">Pan Card Number:</label>
          <input type="text" class="form-control" id="pancard" placeholder="Enter Pan Card Number" name="pancard" value="<? echo $pancard; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label " for="aadharcard">Aadhar Card Number:</label>
          <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard" value="<? echo $aadharcard?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="story">Your Story :</label>
          <textarea class="form-control" rows="1" id="story" placeholder="Enter story" maxlength="100" name="story" ><? echo $story; ?></textarea>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="certification">Certification:</label>
          <select class="form-control" name="certification" id="certification">
            <option value="">Select your option</option>
              <option value="npop" <?php  if($certification=='npop') { echo 'selected="selected"'; } else { echo ''; } ?> >NPOP</option>
              <option value="nop" <?php  if($certification=='nop') { echo 'selected="selected"'; } else { echo ''; } ?> >NOP</option>
              <option value="pgs" <?php  if($certification=='pgs') { echo 'selected="selected"'; } else { echo ''; } ?> >PGS</option>
              <option value="acos" <?php  if($certification=='acos') { echo 'selected="selected"'; } else { echo ''; } ?> >ACOS</option>
              <option value="eu" <?php  if($certification=='eu') { echo 'selected="selected"'; } else { echo ''; } ?> >EU</option>
              <option value="both" <?php  if($certification=='both') { echo 'selected="selected"'; } else { echo ''; } ?> >Both NPOP &amp; NOP</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="visitq">Can we visit your farm :</label>
          <select class="form-control" name="visitq" id="visitq">
            <option value="">Select your option</option>
            <option <?php  if($visitq=='Yes') { echo 'selected="selected"'; } else { echo ''; } ?>>Yes</option>
            <option <?php  if($visitq=='No') { echo 'selected="selected"'; } else { echo ''; } ?>>No</option>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="test_report">Can you provide test report? :</label>
          <select class="form-control" name="test_report" id="test_report">
            <option value="">Select your option</option>
            <option <?php  if($test_report=='Yes') { echo 'selected="selected"'; } else { echo ''; } ?>>Yes</option>
            <option <?php  if($test_report=='No') { echo 'selected="selected"'; } else { echo ''; } ?>>No</option>
          </select>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="certify_img">Choose Certification Image :</label>
          <input type="file" class="form-control" id="certify_img"  name="certify_img">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="profile">Choose Profile Pic:</label>
          <input type="file" class="form-control" id="profile"  name="profile" value="<? echo $username?>">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label" for="video">Choose Video  :</label>
          <input type="file" class="form-control" id="video"  name="video" accept="video/*">
        </div>
      </div> -->
      <!-- row end --> 
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h4 class="frm-headBg"> Bank Details</h4>
        </div>
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
    <?php
  }else {?>
  <form   method="POST" role="form" id="farmerRegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="fullname" >Full Name:</label>
        <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name " name="fullname">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="username">User Name:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter User Name " name="username" >
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="password">Password :</label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="rpassword">Re-Enter Password :</label>
        <input type="password" class="form-control" id="rpassword" placeholder="Re-Enter Password " name="rpassword">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="email">Email address:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label " for="landline">Landline No :</label>
        <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="mobile">Mobile No :</label>
        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile">
      </div>
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
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="address ">Address :</label>
        <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"></textarea>
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="pancard">Pan Card Number:</label>
        <input type="text" class="form-control" id="pancard" placeholder="Enter Pan Card Number" name="pancard">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label " for="aadharcard">Aadhar Card Number:</label>
        <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="story">Your Story :</label>
        <textarea class="form-control" rows="1" id="story" placeholder="Enter story" maxlength="100" name="story" ></textarea>
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="profile">Choose Profile Pic:</label>
        <input type="file" class="form-control" id="profile"  name="profile">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="certification">Certification:</label>
        <select class="form-control" name="certification" id="certification">
          <option value="">Select your option</option>
          <option value="npop">NPOP</option>
          <option value="nop">NOP</option>
          <option value="pgs">PGS</option>
          <option value="acos">ACOS</option>
          <option value="eu">EU</option>
          <option value="both">Both NPOP &amp; NOP</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="certify_img">Choose Certification Image :</label>
        <input type="file" class="form-control" id="certify_img"  name="certify_img">
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="visitq">Can we visit your farm :</label>
        <select class="form-control" name="visitq" id="visitq">
          <option value="">Select your option</option>
          <option>Yes</option>
          <option>No</option>
        </select>
      </div>
      <div class="col-md-4 form-group">
        <label class="control-label requiredlbl" for="test_report">Can you provide test report? :</label>
        <select class="form-control" name="test_report" id="test_report">
          <option value="">Select your option</option>
          <option>Yes</option>
          <option>No</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 form-group">
        <label class="control-label" for="video">Choose Video  :</label>
        <input type="file" class="form-control" id="video"  name="video" accept="video/*">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h4 class="frm-headBg"> Product Details</h4>
      </div>
      <div class="form-group pr-group">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-2 btmpad requiredlblp">
              <input type="text" class="form-control " name="pr_name[]" placeholder="Product Name" />
            </div>
            <div class="col-md-4 btmpad requiredlblp">
              <textarea class="form-control " rows="1" name="pr_desc[]" placeholder="Description"></textarea>
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <div class="input-group date datepicker">
                <input type="text" class="form-control "  placeholder="Select From date"  name="pr_avlFrom[]" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <div class="input-group date datepicker">
                <input type="text" class="form-control "  placeholder="Select To date"  name="pr_avlTo[]" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-2 btmpad requiredlblp">
              <select class="form-control " name="pr_qty[]"  >
                <option value="">Select Quantity</option>
                <option> 500kg to 1 ton</option>
                <option> 1 ton to 3 ton </option>
                <option> 3 ton to 5 ton </option>
                <option> 5 ton to 10 ton </option>
                <option> 10 ton to 25 ton</option>
                <option> Above 25 ton </option>
              </select>
            </div>
            <div class="col-md-2 btmpad  requiredlblp">
              <input type="text" class="form-control " name="pr_quality[]" placeholder="Quality" />
            </div>
            <div class="col-md-2 btmpad requiredlblp">
              <input type="text" class="form-control " name="pr_price[]" placeholder="Price" />
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <input type="file" class="form-control " name="pr_image[]"  />
            </div>
            <div class="col-md-1 btmpad">
              <button type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- The option field template containing an option field and a Remove button -->
      <div class=" form-group pr-group hide" id="optionTemplate">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-2 btmpad requiredlblp">
              <input type="text" class="form-control" name="pr_name[]" placeholder="Product Name" />
            </div>
            <div class="col-md-4 btmpad requiredlblp">
              <textarea class="form-control" rows="1" name="pr_desc[]" placeholder="Description"></textarea>
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <div class="input-group date datepicker">
                <input type="text" class="form-control"  placeholder="Select From date"  name="pr_avlFrom[]" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <div class="input-group date datepicker">
                <input type="text" class="form-control "  placeholder="Select To date"  name="pr_avlTo[]" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-2 btmpad requiredlblp">
              <select class="form-control" name="pr_qty[]"  >
                <option value="">Select Quantity</option>
                <option> 500kg to 1 ton</option>
                <option> 1 ton to 3 ton </option>
                <option> 3 ton to 5 ton </option>
                <option> 5 ton to 10 ton </option>
                <option> 10 ton to 25 ton</option>
                <option> Above 25 ton </option>
              </select>
            </div>
            <div class="col-md-2 btmpad requiredlblp">
              <input type="text" class="form-control" name="pr_quality[]" placeholder="Quality" />
            </div>
            <div class="col-md-2 btmpad requiredlblp">
              <input type="text" class="form-control" name="pr_price[]" placeholder="Price" />
            </div>
            <div class="col-md-3 btmpad requiredlblp">
              <input type="file" class="form-control" name="pr_image[]"  />
            </div>
            <div class="col-md-1 btmpad">
              <button type="button" class="btn btn-danger removeButton"><i class="fa fa-minus"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- row end --> 
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h4 class="frm-headBg"> Bank Details</h4>
      </div>
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


  <?php } ?>

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
        pancard: {
          validators: {
            notEmpty: {
              message: 'The pancard is required'
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
        'pr_name[]': {
          validators: {
            notEmpty: {
              message: 'The option required and cannot be empty'
            }
          }
        },
        'pr_desc[]': {
          validators: {
            notEmpty: {
              message: 'The option required and cannot be empty'
            }
          }
        },
        'pr_qty[]': {
          validators: {
            notEmpty: {
              message: 'The option required and cannot be empty'
            }
          }
        },
        'pr_quality[]': {
          validators: {
            notEmpty: {
              message: 'The option required and cannot be empty'
            }
          }
        },
        'pr_price[]': {
          validators: {
            notEmpty: {
              message: 'The option required and cannot be empty'
            }
          }
        }
      }
    })

      // Add button click handler
      .on('click', '.addButton', function() {
        var $template = $('#optionTemplate'),
        $clone    = $template
        .clone()
        .removeClass('hide')
        .removeAttr('id')
        .insertBefore($template),
        $option   = $clone.find('[name="pr_name[]"] , [name="pr_desc[]"] , [name="pr_qty[]"] , [name="pr_quality[]"] , [name="pr_price[]"]');

                // Add new field
                $('#farmerRegisterForm').formValidation('addField', $option);
                $('.datepicker').datepicker({});

              })
      
            // Remove button click handler
            .on('click', '.removeButton', function() {
              var $row    = $(this).parents('.form-group'),
              $option = $row.find('[name="option[]"]');

                // Remove element containing the option
                $row.remove();

                // Remove field
                $('#farmerRegisterForm').formValidation('removeField', $option);
              })



            .on('success.form.fv', function(e) {
              e.preventDefault();

              $.ajax({  
                url: "<?php echo base_url();?>farmer_register/create_farmer",  
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
                      text: "Farmer has been added successfully",
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
        <script type="text/javascript">
          $(function () {
            $('.datepicker').datepicker({}).on('changeDate', function(e) {
                 // Revalidate the date field
                 $('#farmerRegisterForm').formValidation('revalidateField', 'pr_avlFrom[]');
                 $('#farmerRegisterForm').formValidation('revalidateField', 'pr_avlTo[]');
               });
          });

        </script>
      </body>
      </html>