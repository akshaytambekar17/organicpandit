<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $meta_title; ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <style type="text/css">
      .pmodal_img {
      max-height: 164px;
      min-height: 164px;
      }
      .profile-modal .fa {
      color: #4e1e16e6;
      }
      .bootstrap-select .btn {
      padding: 12px 12px;
      }
      .bs-searchbox .form-control {
      width: 100%;
      }

      /*bootstrap select grid*/
      
    </style>
  </head>
  <body>
    <!-- header -->
    <?php $this->load->view('includes/header');?>
    <!-- banner -->
    <div class="container-fluid">
      <div class="row ">
        <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $banner; ?>" alt="organic world" >     </div>
      </div>
    </div>
    <div class="bg-gray">
      <div class="container">
        <div class="row">
          <h2 class="text-center text-green text-uppercase ptb-50" style="color:black;"><?php echo $title; ?></h2>
          <div class="row mb-50">
            <div class="col-md-10 col-md-offset-1">
              <form id="searchForm" method="POST">
                <div class="form-group">
                  <?php  if($slug == 'farmer' || $slug == 'fpo' || $slug == 'trader' || $slug == 'processor'){
                    ?>
                  <div class="input-group triple-input">
                    <select class="form-control input-lg searchInput" name="state" id="state" ">
                      <option value=""> select state</option>
                      <?php foreach ($states as $state):?>
                      <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                      <?php endforeach;?>
                    </select>
                    
                    <select class="form-control input-lg searchInput" name="city" id="city" ">
                        <?php foreach ($cities as $city):?>
                      <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                      <?php endforeach;?>
                      <option value=""> select city</option>
                    </select>
                    <select class="form-control input-lg selectpicker searchInput" name="certificates" id="certificates"  data-live-search="true">
                      <option value=""> select certificate</option>
                      <option value="npop">NPOP</option>
                      <option value="nop">NOP</option>
                      <option value="pgs">PGS</option>
                      <option value="acos">ACOS</option>
                      <option value="eu">EU</option>
                      <option value="both">Both NPOP &amp; NOP</option>
                    </select>
                    <select class="form-control input-lg selectpicker searchInput" name="products" id="products"  data-live-search="true">
                      <option value=""> select product</option>
                      <?php foreach ($products as $product):?>
                      <option  value='{"pr_id":"<?php echo $product->pr_id; ?>","pr_name":"<?php echo $product->pr_name; ?>"}'><?php echo $product->pr_name; ?></option>
                      <?php endforeach;?>
                    </select>
                    <span class="input-group-btn">
                    <button class="btn btn-black btn-lg" type="submit" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; " ><i class="fa fa-search"></i>  Search!</button>
                    </span>
                  </div>
                  <!-- /input-group -->
                  <?php
                    }elseif($slug == 'buyer'){ ?>
                  <div class="input-group double-input">
                    <select class="form-control input-lg searchInput" name="state" id="state" ">
                      <option value=""> select state</option>
                      <?php foreach ($states as $state):?>
                      <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                      <?php endforeach;?>
                    </select>
                    <select class="form-control input-lg searchInput" name="city" id="city" ">
                      <option value=""> select city</option>
                    </select>
                    <select class="form-control input-lg selectpicker searchInput" name="products" id="products"  data-live-search="true">
                      <option value=""> select product</option>
                      <?php foreach ($products as $product):?>
                      <option  value='{"pr_id":"<?php echo $product->pr_id; ?>","pr_name":"<?php echo $product->pr_name; ?>"}'><?php echo $product->pr_name; ?></option>
                      <?php endforeach;?>
                    </select>
                    <span class="input-group-btn">
                    <button class="btn btn-black btn-lg" type="submit" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; " ><i class="fa fa-search"></i>  Search!</button>
                    </span>
                  </div>
                  <!-- /input-group -->
                  <?php  
                    } 
                    else{ ?>
                  <div class="input-group no-input">
                    <select class="form-control input-lg searchInput" name="state" id="state">
                      <option value=""> Select State</option>
                      <?php foreach ($states as $state):?>
                      <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                      <?php endforeach;?>
                    </select>
                    <select class="form-control input-lg searchInput" name="city" id="city">
                      <option value=""> Select city</option>
                    </select>
                    <span class="input-group-btn">
                    <button class="btn btn-black btn-lg" type="submit" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; " ><i class="fa fa-search"></i>  Search!</button>
                    </span>
                  </div>
                  <!-- /input-group -->
                  <?php  
                    } ?>
                </div>
              </form>
            </div>
          </div>
          <div class="search-box" id="detail-row">
          </div>
        </div>
        <!-- footer -->
        <?php $this->load->view('includes/footer');?>
      </div>
    </div>
    <!-- modal -->
    <div id="view-profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" id="dynamic-show">
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- to display images  -->
    <div id="view-image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" id="dynamic-img">
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
    <!-- form  validation -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/framework/bootstrap.min.js"></script>
    <!-- plugin init js -->
    <script type="text/javascript">
      $(document).ready(function(){
        // show image
         $(document).on('click', '.getImageModal', function(e){
          var rimg = $(this).attr('data-val'); 
          console.log(rimg);
               
           swal({
  imageUrl: rimg,
   width: 650,
   imageWidth: 650,
  imageHeight: 450,
  imageAlt: 'A tall image'
})
         
      });
      
         //show Manufacturer
         $(document).on('click', '.getProfileModal', function(e){
         	var id = $(this).attr('data');
          	var rid = $(this).attr('data-val'); 
         	var slug_name = '<?php echo $slug; ?>';
           console.log(id + rid + slug_name);
           e.preventDefault();
           $.ajax({
           	type: 'ajax',
           	method: 'get',
           	url: "<?php echo base_url();?>get-profile/<?php echo $slug; ?>", 
           	data: {id: id, rid: rid, slug_name:slug_name},
           	success: function(data){
           		// console.log(data);      
             $('#dynamic-show').html(data); // load response 
         },
         error: function(){
         	$('#dynamic-show').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
         }
      });
      
       });
      
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
         				$('#searchForm').formValidation('revalidateField', 'city');
         			}
         		}); 
         	}else{
         		$('#city').html('<option value="">Select state first</option>'); 
         		console.log('out');
         	}
      
      
         });
      });
      
      
      $(document).ready(function() {
      	$('#searchForm').formValidation({
      		framework: 'bootstrap',
fields: {
            state: {
                // All the email address field have emailAddress class
                selector: '.searchInput',
                validators: {
                    callback: {
                        message: 'You must select at least one field',
                        callback: function(value, validator, $field) {
                            var isEmpty = true,
                                // Get the list of fields
                                $fields = validator.getFieldElements('state');
                            for (var i = 0; i < $fields.length; i++) {
                                if ($fields.eq(i).val() !== '') {
                                    isEmpty = false;
                                    break;
                                }
                            }

                            if (!isEmpty) {
                                // Update the status of callback validator for all fields
                                validator.updateStatus('state', validator.STATUS_VALID, 'callback');
                                return true;
                            }

                            return false;
                        }
                    },
                    searchInput: {
                        message: 'This field is required'
                    }
                }
            }
        }



      		// fields: {
      		// 	products: {
      		// 		validators: {
      		// 			notEmpty: {
      		// 				message: 'The products is required'
      		// 			}
      		// 		}
      		// 	},
      		// 	state: {
      		// 		validators: {
      		// 			notEmpty: {
      		// 				message: 'The state is required'
      		// 			}
      		// 		}
      		// 	},
      		// 	city: {
      		// 		validators: {
      		// 			notEmpty: {
      		// 				message: 'The city is required'
      		// 			}
      		// 		}
      		// 	},
      		// 	certificates: {
      		// 		validators: {
      		// 			notEmpty: {
      		// 				message: 'The certificate is required'
      		// 			}
      		// 		}
      		// 	}
      		// }
      	}).on('success.form.fv', function(e) {
      		e.preventDefault();
      
      		$.ajax({  
      			url: "<?php echo base_url();?>get-detail/<?php echo $slug; ?>",  
      			method:"POST",  
      			data:new FormData(this),  
      			contentType: false,  
      			cache: false,  
      			processData:false,   
      			success:function(html){
      				$('#detail-row').html(html);
      				console.log('in');
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
      
      $('.selectpicker').selectpicker({
      });
      
      
    </script>
  </body>
</html>