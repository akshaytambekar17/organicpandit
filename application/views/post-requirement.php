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
      <h2 class="text-center text-green text-uppercase ptb-50" style=" background-color:#7C8B2E;">Post Requirement Form</h2>
         <div class="alert alert-info">All (<span class="text-danger"><i class="fa fa-asterisk"></i></span>) marked fields are mandatory</div>
      <form   method="POST" role="form" id="postrequirementForm" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="company" >Name of the company :</label>
          <input type="text" class="form-control" id="company" placeholder="Enter Company Name " name="company">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="product">Product Required :</label>
          <select class="form-control" name="product" id="product">
            <option value="">Select your option</option>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="quality">Quality Specification  :</label>
          <input type="text" class="form-control" id="quality" placeholder="Enter Mobile No" name="quality">
        </div>
     </div>
     <div class="row">
         <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="req_val_date" >Requirement Validate Date :</label>
            <div class="input-group date datepicker">
          <input type="text" class="form-control" id="req_val_date" placeholder="Enter Company Name " name="req_val_date">
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="exp_rate">Expected Rate (Per kg) :</label>
          <select class="form-control" name="exp_rate" id="exp_rate">
            <option value="">Select your option</option>
          </select>
        </div>
        <div class="col-md-4 form-group">
         <label class="control-label requiredlbl" for="quantity">Quantity Required (in kg) :</label>
          <select class="form-control" name="quantity" id="quantity">
            <option value="">Select your option</option>
          </select>
        </div>
     </div>
     <div class="row">
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="total_val" >Total value  :</label>
          <input type="text" class="form-control" id="total_val" placeholder="Enter Company Name " name="total_val">
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="delivery_loc">Delivery location  :</label>
          <select class="form-control" name="delivery_loc" id="delivery_loc" required="">
            <option value="">Select your option</option>
          </select>
        </div>
        <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="pay_terms" >Payment Terms  :</label>
          <input type="text" class="form-control" id="pay_terms" placeholder="Enter Company Name " name="pay_terms">
        </div>
     </div>
     <div class="row">
         <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="visitq">Logistic Required  :</label>
          <select class="form-control" name="logistic_req" id="logistic_req">
            <option value="">Select your option</option>
            <option>Yes</option>
            <option>No</option>
          </select>
        </div>
         <div class="col-md-4 form-group">
          <label class="control-label requiredlbl" for="certi_req">Certification Required :</label>
          <select class="form-control" name="certi_req" id="certi_req">
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
          <label class="control-label requiredlbl" for="pay_terms" >Other Details  :</label>
          <input type="text" class="form-control" id="other_detail" placeholder="Enter Company Name " name="other_detail">
        </div>
     </div>
    <div class="row">          
      <div class="col-md-12 form-group text-center">      
        <input type="submit" name="submit_post-requirement" class="btn btn-primary" value="Submit">
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
          url: "<?php echo base_url();?>post-requirement/get_city",
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

    $('#postrequirementForm').formValidation({
      framework: 'bootstrap',
    fields: {
          company: {
            validators: {
              notEmpty: {
                message: 'The company name is required'
              }
            }
          },
          product: {
            validators: {
              notEmpty: {
                message: 'The product is required'
              }
            }
          },
          quality: {
            validators: {
              notEmpty: {
                message: 'The quality is required'
              }
            }
          },            
          req_val_date: {
            validators: {
              notEmpty: {
                message: 'The req_val_date is required'
              }
            }
          },
          exp_rate: {
            validators: {
              notEmpty: {
                message: 'The exp_rate no is required'
              }
            }
          },
          quantity: {
            validators: {
              notEmpty: {
                message: 'The quantity is required'
              }
            }
          },
          total_val: {
            validators: {
              notEmpty: {
                message: 'The total_val is required'
              }
            }
          },
          delivery_loc: {
            validators: {
              notEmpty: {
                message: 'The delivery_loc is required'
              }
            }
          },
          pay_terms: {
            validators: {
              notEmpty: {
                message: 'The pay_terms is required'
              }
            }
          },
         
          certi_req: {
            validators: {
              notEmpty: {
                message: 'The certi_req is required'
              }
            }
          },
          
         
        }
    })





        .on('success.form.fv', function(e) {
         e.preventDefault();

         $.ajax({  
           url: "<?php echo base_url();?>post_requirement/create_requirement",  
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
                text: "Post Requirement has been added successfully",
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
   
 </body>
 </html>
