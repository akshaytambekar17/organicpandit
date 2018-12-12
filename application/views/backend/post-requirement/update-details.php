<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/post-requirement">Post List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= $title?></a></li>
        </ol>
    </section>
    <?php if($message = $this ->session->flashdata('Message')){?>
        <div class="col-md-12 ">
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
    <section class="content alert-box">
        <div class="row">    
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Post Code</label>
                                <h4><?= $post_details['post_code']?></h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Name</label>
                                <h4><?= $post_details['product_name']?></h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Company Name</label>
                                <h4><?= $post_details['company_name']?></h4>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Quality Specification</label>
                                <h4><?= $post_details['quality_specification']?></h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label>From date</label>
                                <h4><?= $post_details['from_date']?></h4>
                            </div>
                            <div class="form-group col-md-6">
                                <label>To date</label>
                                <h4><?= $post_details['to_date']?></h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Expected Rate (per kg)</label>
                                <h4><?= $post_details['price']?></h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Quantity (in kg)</label>
                                <h4><?= $post_details['quantity']?></h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Total Price</label>
                                <h4><?= $post_details['total_price']?></h4>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Delivery Address</label>
                                <h4><?= $post_details['delivery_address']?></h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>State</label>
                                <h4><?php
                                        $state_details = $this->State->getStateById($post_details['state_id']);
                                        echo $state_details['name'];
                                    ?>
                                </h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>City</label>
                                <h4><?php
                                        $city_details = $this->City->getCityById($post_details['city_id']);
                                        echo $city_details['name'];
                                    ?>
                                </h4>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pincode</label>
                                <h4><?= $post_details['pincode']?></h4>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Other Details</label>
                                <h4><?= $post_details['other_details']?></h4>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Verified</label>
                                <select class="form-control select2" name="is_verified">
                                  <option disabled="disabled" selected="selected">Select Option</option>
                                  <option value="2" <?= !empty($post_details['is_verified'])?($post_details['is_verified'] == 2)?'selected="selected"':'':set_select('is_verified',2);?>>Yes</option>
                                  <option value="1" <?= !empty($post_details['is_verified'])?($post_details['is_verified'] == 1)?'selected="selected"':'':set_select('is_verified',1);?> >No</option>
                                </select>
                                <span class="has-error"><?php echo form_error('is_verified'); ?></span>
                            </div>
                        </div>
                        <input type="hidden" name="post_code" value="<?= $post_details['post_code']?>">
                        <?php if(!empty($post_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $post_details['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit">Update Post</button>
                            <a href="<?php echo base_url(); ?>admin/post-requirement" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
