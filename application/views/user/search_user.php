<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <!-- banner -->
<!--    <div class="container-fluid">
        <div class="row ">
            <div class="banner">  <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $banner; ?>" alt="organic world" >     </div>
        </div>
    </div>-->
    <div class="">
        <div class="col-xs-12 bg-gray"> 
            <h2 class="page-header center"> 
                <i class="fa fa-globe"></i> <?= $title?> 
            </h2> 
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-20">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" name="search-user-form" id="search-user-form" >
                        <div class="box box-danger">
                            <div class="box-header">
        <!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Select State</label>
                                        <select class="form-control select2" name="state_id" id="state_id">
                                            <option disabled="disabled" selected="selected">Select State</option>
                                            <?php foreach($state_list  as $value){ ?>
                                                    <option value="<?= $value['id']?>" <?= set_select('state_id',$value['id']);?>><?= $value['name']?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="has-error"><?php echo form_error('state_id'); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select City</label>
                                        <select class="form-control select2" name="city_id" id="city_id">
                                            <option disabled="disabled" selected="selected">Select City</option>
                                        </select>
                                        <span class="has-error"><?php echo form_error('city_id'); ?></span>
                                    </div>
<!--                                    <div class="col-md-3">
                                        <label>Select Product</label>
                                        <select class="form-control select2" name="product_id">
                                            <option disabled="disabled" selected="selected" >Select Product</option>
                                            <?php foreach($product_list  as $value){ ?>
                                                    <option value="<?= $value['id']?>" <?= set_select('product_id',$value['id'],false);?>><?= $value['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>-->
                                    <div class="col-md-4">
                                        <label>Select Certification</label>
                                        <select class="form-control select2" name="certification_id" id="is_logistic">
                                            <option disabled="disabled" selected="selected">Select Certification</option>
                                            <?php foreach (getCertifications() as $key => $value) { ?>
                                                <option value="<?= $key ?>" <?= set_select('certification_id', $key); ?>><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                </div>
                                <input type="hidden" name="user_type_id" value="<?= $user_type_details['id']?>">
                            </div>
                            <div class="box-footer center">
                                <button type="submit" class="btn btn-success" id="submit">Search Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12" id="alert-messge">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?> 
            <?php if($message = $this ->session->flashdata('Error')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?>
<!--            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-20 center">
                    <div class="box">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search By " onkeypress="search(this)">
                    </div>
                </div>
            </div>-->
            <?php if(empty($userSession)){ ?>
<!--                    <p class="has-error center">Please login to apply for bid</p>-->
            <?php } ?>
            <div class="row">
                <div class="col-md-12 mt-20 alert-message">
                    <div class="box box-success">
                        <div class="box-header"></div>
                        <div class="box-body">
                            <?php if(!empty($search_user_list)){ 
                                    foreach($search_user_list as $value){
                            ?>
                                <div class="box post-panel">
                                    <div class="box-body">
                                        <div class="col-md-2">
                                            <h4>Fullname</h4>
                                            <b class="fullname"><?= $value['fullname']?></b><br>    
                                            <img src="<?= base_url()?>assets/images/gallery/<?= $value['profile_image']?>" height="90px">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="address-icon"><i class="fa fa-map-marker"></i></div>
                                            <h4 class="center">
                                                <?php 
                                                    $state_details = $this->State->getStateById($value['state_id']);
                                                    $city_details = $this->City->getCityById($value['city_id']);
                                                    echo $value['address'].",".$city_details['name'].",".$state_details['name'];
                                                ?>
                                                
                                            </h4>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Email Id</h4>
                                            <b><?= $value['email_id']; ?></b>
                                            <h4>Mobile number</h4>
                                            <b><?= $value['mobile_no']; ?></b>
                                        </div>
                                        <div class="col-md-2">
                                            <h4>Story</h4>
                                            <b><?= $value['story']; ?></b>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="user-padding-block">
                                                <?php $disabled = empty($userSession)?'disabled':'';  ?>
                                                <a href="javascript:void(0)" class="btn btn-warning" data-user_id="<?= $value['user_id']?>" data-fullname="<?= $value['fullname']?>"  onclick="userModal(this)">View Details</a>
                                            </div>
                                            <br>
                                            <?php if($value['is_verified'] ==2){ ?>
                                                <img src="<?= base_url()?>upload/profile/Screenshot_4.png" class="user-verified-image">  
                                            <?php }else{ ?>
                                                <img src="<?= base_url()?>upload/profile/not_verified.png" class="user-verified-image">  
                                            <?php } ?>
                                        </div>
                                    
                                    </div>
                                </div>
                            
                            <?php } }else{ ?>
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="col-md-12 center">
                                                 No <?= $title?> Found
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="search-box" id="detail-row"></div>
            
            <!-- footer -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade user-popup" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="modal-title-user-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div id="modal-user-view"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<!--                    <button type="button" class="btn btn-success" onclick="confirmationModal(this)">Apply Bid</button>-->
                </div>
            </div>
        </div>  
    </div>
    <div class="modal fade confirmation-popup" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="text-center popup-content">  
                        <h5> By clicking on <span>"YES"</span>, Your bid will place for product <b><span id="confiramtion-product-name"></span></b>. Do you wish to proceed?</h5><br><br>
<!--                        <input  type="hidden" name="confirmation_post_requirement_id" id="confirmation_post_requirement_id"> 
                        <input  type="hidden" name="confirmation_amount" id="confirmation_amount"> -->
                        <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                        <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#state_id").on('change',function(){
                var state_id = $(this).val();
                getCitiesByState(state_id);
            });
            var state_id = $("#state_id").val();
            if(state_id != ''){
                getCitiesByState(state_id);
            }
        });
        function getCitiesByState(state_id){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "getcities-by-state",
                data: { 'state_id' : state_id },
                dataType: "html",
                success: function(result){
                    var html = $.parseJSON(result);
                    $("#city_id").html('<option disabled selected> Select City</option>');
                    $("#city_id").append(html);
                }
            });
        }
//        function search()
//        {
//            var searchterm = jQuery("#search").val().trim().toLowerCase();
//            if (searchterm.length == 0){
//                jQuery(".post-panel").show();
//                return  true;
//            }
//            jQuery(".post-panel").hide();
//            jQuery(".product-name").each(function () {
//                if (jQuery(this).text().toLowerCase().indexOf(searchterm) >= 0 ){
//                    jQuery(this).closest(".post-panel").show();
//                }
//
//            });
//        }
        function userModal(ths){
            var user_id = $(ths).data('user_id');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "get-user-by-id",
                data: { 'user_id' : user_id },
                dataType: "html",
                success: function(result){
                    $(".modal-title-user-name").text($(ths).data('fullname'));
                    $("#modal-user-view").html(result);
                    $('#user-modal').modal('show');
                }
            });
        }
        function confirmationModal(ths){
            var amount = $("#amount").val();
            if(amount == ''){
                $(".error-user-modal").text('Please enter the amount');
            }else{
                $(".error-user-modal").text('');
                $("#confiramtion-product-name").text($("#product_name_modal").val());
                $('#ConfirmationModal').modal('show');
            }
        }
    </script>
    
