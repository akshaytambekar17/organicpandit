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
        <h2 class="text-center text-green text-uppercase ptb-50" style=" background-color:#7C8B2E;">Organic Input Company  Registration Form</h2>

        <form class="" action="">
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label" for="full_name">Full  Name:</label>
              <input type="text" class="form-control" id="full_name" placeholder="Enter Full  Name " name="full_name">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label" for="ceo_name">Director Name/CEO:</label>
              <input type="text" class="form-control" id="ceo_name" placeholder="Enter Director Name/CEO  " name="ceo_name">
            </div> 
            <div class="col-md-4 form-group">
              <label class="control-label" for="comp_name">Name of the company:</label>
              <input type="text" class="form-control" id="comp_name" placeholder="Enter Name of the company  " name="comp_name">
            </div>    
            <div class="col-md-4 form-group">
              <label class="control-label" for="user_name">User  Name:</label>
              <input type="text" class="form-control" id="user_name" placeholder="Enter User  Name " name="user_name">
            </div>        
            <div class="col-md-4 form-group">
              <label class="control-label" for="password">Password :</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
            </div>  
            <div class="col-md-4 form-group">
              <label class="control-label" for="rpassword">Re-Enter Password :</label>
              <input type="password" class="form-control" id="rpassword" placeholder="Re-Enter Password " name="rpassword">
            </div>           
            <div class="col-md-4 form-group">
              <label class="control-label" for="email">Email address:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email address " name="email">
            </div>            
            <div class="col-md-4 form-group">
              <label class="control-label" for="landline">Landline No :</label>
              <input type="text" class="form-control" id="landline" placeholder="Enter Landline No" name="landline">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label" for="mobile">Mobile No :</label>
              <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile">
            </div>         
            <div class="col-md-4 form-group">
              <label class="control-label" for="state ">State :</label>
              <input type="text" class="form-control" id="state " placeholder="Enter State " name="state ">
            </div>  
            <div class="col-md-4 form-group">
              <label class="control-label" for="city ">City :</label>
              <input type="text" class="form-control" id="city " placeholder="Enter City " name="city ">
            </div>     
            <div class="col-md-4 form-group">
              <label class="control-label" for="address ">Address :</label>
              <textarea class="form-control" rows="1" id="address " placeholder="Enter Address  " name="address "></textarea>
            </div>      
            <div class="col-md-4 form-group">
              <label class="control-label" for="gst_no">GST Number:</label>
              <input type="text" class="form-control" id="gst_no" placeholder="Enter GST Number" name="gst_no">
            </div>   
            <div class="col-md-4 form-group">
              <label class="control-label" for="aadharcard">Aadhar Card Number:</label>
              <input type="text" class="form-control" id="aadharcard" placeholder="Enter Aadhar Card Number" name="aadharcard">
            </div>    
            <div class="col-md-4 form-group">
            <label class="control-label" for="profile">Choose Profile Pic:</label>
            <input type="file" class="form-control" id="profile"  name="profile">
          </div>   
          <div class="col-md-4 form-group">
              <label class="control-label" for="website">Website:</label>
              <input type="text" class="form-control" id="website" placeholder="Enter Website Address" name="website">
            </div>    
            <div class="col-md-4 form-group">
              <label class="control-label" for="add_products">Add Products:</label>
              <input type="text" class="form-control" id="add_products" placeholder="Enter Products" name="add_products">
            </div>  
            <div class="col-md-4 form-group">
              <label class="control-label" for="story">Your Story :</label>
              <textarea class="form-control" rows="1" id="story" placeholder="Enter story" maxlength="100" name="story"></textarea>
            </div>    
            <div class="col-md-4 form-group">
              <label class="control-label" for="company_img">Choose Company Image :</label>
              <input type="file" class="form-control" id="company_img"  name="company_img">
            </div>
            <div class="col-md-4 form-group">
              <label class="control-label" for="pro_catalouge">Upload Product Catalogue  :</label>
              <input type="file" class="form-control" id="pro_catalouge"  name="pro_catalouge">
            </div>    
            <div class="col-md-4 form-group">
              <label class="control-label" for="video">Choose Video  :</label>
              <input type="file" class="form-control" id="video"  name="Video" accept="video/*">
            </div> 
            <div class="col-md-12"><h4 class="frm-headBg"> Bank Details</h4>
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
          </div>  <!-- row end --> 
          <div class="row">          
            <div class="col-md-12 form-group text-center">      
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>



      </form>
    </div>
    <!-- footer -->
    <?php $this->load->view('includes/footer');?>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Product</h4>
        </div>
        <div class="modal-body">
          <form class="" action="">
            <div class="row">
              <div class="col-md-4 form-group">
                <label class="control-label" for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name " name="product_name">
              </div>    
              <div class="col-md-4 form-group">
                <label class="control-label" for="product_desc">Product Description:</label>
                <textarea class="form-control" id="product_desc" placeholder="Enter Product Description " name="product_desc"></textarea>
              </div>      
              <div class="col-md-4 form-group">
                <label class="control-label" for="p_price">Price/Kg:</label>
                <input type="text" class="form-control" id="p_price" placeholder="Enter Product Price " name="p_price">
              </div> 
            </div>
            <div class="row">  
              <div class="col-md-4 form-group">
                <label class="control-label" for="avlFrom_date">Product Availability From :</label>
                <div class='input-group date datepicker'>
                  <input type='text' class="form-control"  placeholder="Select From date"  name="avlFrom_date" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div> 
              <div class="col-md-4 form-group">
                <label class="control-label" for="avlTo_date">Product Availability To :</label>
                <div class='input-group date datepicker'>
                  <input type='text' class="form-control "  placeholder="Select To date"  name="avlTo_date" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>  
              <div class="col-md-4 form-group">
              <label class="control-label" for="qty_avl">Quantity Available :</label>
              <select class="form-control" name="qty_avl" id="qty_avl"> 
                <option> 500kg to 1 ton</option>
                <option> 1 ton to 3 ton </option>
                <option> 3 ton to 5 ton </option>
                <option> 5 ton to 10 ton </option>
                <option> 10 ton to 25 ton</option>
                <option> Above 25 ton </option>
 
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label class="control-label" for="qty_standard">Quality Standards :</label>
              <input type="text" class="form-control" id="qty_standard" placeholder="Quality Standards " name="qty_standard">
            </div>  
              <div class="col-md-4 form-group">
                <label class="control-label" for="product_img">Choose Product Image :</label>
                <input type="file" class="form-control" id="product_img"  name="product_img">
              </div>  
            </div>  <!-- row end --> 
            <div class="row">          
              <div class="col-md-12 form-group text-center">      
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
  <!-- plugin init js -->
  <script type="text/javascript">
    $(function () {
     $('.datepicker').datepicker({
      format: 'dd/mm/yyyy'
    });
   });

 </script>
</body>
</html>
