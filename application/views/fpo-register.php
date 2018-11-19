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
        <h2 class="text-center text-green text-uppercase ptb-50" style=" background-color:#7C8B2E;">FPO Registration Form</h2>
         <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
        <form   method="POST" role="form" id="fpoRegisterForm" enctype="multipart/form-data" accept-charset="utf-8">
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="fullname">FPO Name:</label>
              <input type="text" class="form-control" id="fullname" placeholder="Enter FPO Name " name="fullname">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="ceo">CEO:</label>
              <input type="text" class="form-control" id="ceo" placeholder="Enter ceo Name " name="ceo">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="username">User Name:</label>
              <input type="text" class="form-control" id="username" placeholder="Enter User Name " name="username">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="password">Password :</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="rpassword">Re-Enter Password :</label>
              <input type="password" class="form-control" id="rpassword" placeholder="Re-Enter Password " name="rpassword">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="email">Email address:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label " for="landline">Landline No :</label>
              <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline">
            </div>
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
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="city ">City :</label>
              <select class="form-control"   name="city" id="city">
                <option value="">Select state first</option>
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="address ">Address :</label>
              <textarea class="form-control" rows="1" id="address" placeholder="Enter Address  " name="address"></textarea>
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label " for="gst">GST Number:</label>
              <input type="text" class="form-control" id="gst" placeholder="Enter GST Number" name="gst">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label " for="aadharcard">Aadhar Card Number:</label>
              <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="story">Your Story :</label>
              <textarea class="form-control" rows="1" id="story" placeholder="Enter story" maxlength="100" name="story"></textarea>
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="profile">Choose Profile Pic:</label>
              <input type="file" class="form-control" id="profile"  name="profile">
            </div>
          </div>
          <div class="row">
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
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label requiredlbl" for="no_farmer">No of Farmer:</label>
              <select class="form-control" name="no_farmer" id="no_farmer">
                <option value="">Select your option</option>
                <option>10 to 50</option>
                <option>50 to 100</option>
                <option>100 to 200 </option>
                <option>200 to 500</option>
                <option>500 to 1000</option>
                <option>1000 to 3000</option>
                <option>Above 3000</option>
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
            <div class="col-md-4 form-group">
              <label class="control-label" for="video">Choose Video  :</label>
              <input type="file" class="form-control" id="video"  name="video" accept="video/*">
            </div>
          </div>
          <div class="row">
             <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="agency">Agency Name:</label>
          <select class="form-control" name="agency" id="agency">
            <option value="">Select your option</option>
            <?php foreach ($agencies as $agency):?>
              <option value="<?php echo $agency->id; ?>"><?php echo $agency->name; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label " for="cert_no">Certification Number:</label>
          <input type="text" class="form-control" id="cert_no" placeholder="Enter Certification Number" name="cert_no" >
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
                    <input type="text" class="form-control" name="pr_name[]" placeholder="Product Name" />
                  </div>
                  <div class="col-md-4 btmpad requiredlblp">
                    <textarea class="form-control" rows="1" name="pr_desc[]" placeholder="Description"></textarea>
                  </div>
                  <div class="col-md-3 btmpad requiredlblp">
                    <div class='input-group date datepicker'>
                      <input type='text' class="form-control"  placeholder="Select From date"  name="pr_avlFrom[]" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 btmpad requiredlblp">
                    <div class='input-group date datepicker'>
                      <input type='text' class="form-control "  placeholder="Select To date"  name="pr_avlTo[]" />
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
                    <div class='input-group date datepicker'>
                      <input type='text' class="form-control"  placeholder="Select From date"  name="pr_avlFrom[]" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 btmpad requiredlblp">
                    <div class='input-group date datepicker'>
                      <input type='text' class="form-control "  placeholder="Select To date"  name="pr_avlTo[]" />
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
              <input type="submit" name="submit_fpo" class="btn btn-primary" value="Submit">
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
              url: "<?php echo base_url();?>fpo_register/get_city",
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
      
        $('#fpoRegisterForm').formValidation({
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
            username: {
            validators: {
              notEmpty: {
                message: 'The username is required'
              },
              remote: {
                message: 'The username is not available',
                url: '<?php echo base_url() ?>check-username-exists/fpo',
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
              $('#fpoRegisterForm').formValidation('addField', $option);
              $('.datepicker').datepicker({});
      
            })
      
          // Remove button click handler
          .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.form-group'),
            $option = $row.find('[name="option[]"]');
      
              // Remove element containing the option
              $row.remove();
      
              // Remove field
              $('#fpoRegisterForm').formValidation('removeField', $option);
            })
      
      
      
          .on('success.form.fv', function(e) {
            e.preventDefault();
      
            $.ajax({  
              url: "<?php echo base_url();?>fpo_register/create_fpo",  
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
                    text: "FPO has been added successfully",
                    type: "success",
                    showCancelButton: false,
                    timer: 2000
                  });
                             // document.getElementById("fpoRegisterForm").reset();
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
            $('#fpoRegisterForm').formValidation('revalidateField', 'pr_avlFrom[]');
            $('#fpoRegisterForm').formValidation('revalidateField', 'pr_avlTo[]');
          });
      });
      
    </script>
  </body>
</html>