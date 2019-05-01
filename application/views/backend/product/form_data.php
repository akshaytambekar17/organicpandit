<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/product">Product</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($product_details)?$product_details['name']:'Add'?> Product</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($product_details)?site_url('admin/product/update?id='.$product_details['id']):site_url('admin/product/add')?>" name="products-form" id="products-form">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Select Product Category</label>
                                <select class="form-control select2" name="product_category_id">
                                    <option disabled="disabled" selected="selected">Select Category</option>
                                    <?php 
                                        foreach(getProductCategory()  as $key => $value){ 
                                            $selected='';
                                            if( !empty( $product_details ) ) { 
                                                if( $product_details['product_category_id'] == $key ){
                                                    $selected = 'selected="selected"';
                                                }else{
                                                    $selected = '';
                                                }
                                            }
                                    ?>
                                            <option value="<?= $key ?>" <?= !empty( $product_details ) ? $selected : set_select('product_category_id', $key );?>><?= $value?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('product_category_id'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Product Name</label>
                                <input type="text" name="name"  class="form-control" id="name" placeholder="Product Name" value="<?= !empty($product_details['name'])?$product_details['name']:set_value('name')?>">
                                <span class="has-error"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="<?= !empty($product_details['description'])?$product_details['description']:set_value('description')?>">
                                <span class="has-error"><?php echo form_error('description'); ?></span>
                            </div>
<!--                            <div class="form-group col-md-12">
                                <div class="form-group col-md-6">
                                    <label>From Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="from_date" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= !empty($product_details['from_date'])?$product_details['from_date']:set_value('from_date')?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('from_date'); ?></span>
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-6">
                                    <label>To Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="to_date" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= !empty($product_details['to_date'])?$product_details['to_date']:set_value('to_date')?>">
                                    </div>        
                                    <span class="has-error"><?php echo form_error('to_date'); ?></span>
                                </div>
                            </div>-->
<!--                            <div class="form-group col-md-12">
                                <label>Quantity </label>
                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity" value="<?= !empty($product_details['quantity'])?$product_details['quantity']:set_value('quantity')?>">
                                <span class="has-error"><?php echo form_error('quantity'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="<?= !empty($product_details['price'])?$product_details['price']:set_value('price')?>">
                                <span class="has-error"><?php echo form_error('price'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Quality</label>
                                <input type="text" name="quality" class="form-control" id="quality" placeholder="Quality" value="<?= !empty($product_details['quality'])?$product_details['quality']:set_value('quality')?>" >
                                <span class="has-error"><?php echo form_error('quality'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Images</label>
                                <input type="file" name="product_images" id="product_images"> <br>
                                <?php if(!empty($product_details['images'])){ ?>
                                    <img src="<?= base_url()?>assets/images/<?= $product_details['images']?>" width="70px" height="50px">
                                    <input type="hidden" value="<?= $product_details['images']?>" name="product_images_hidden">
                                <?php } ?>
                                <span class="help-block"><?php echo form_error('product_images'); ?></span>
                            </div>-->
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select class="form-control select2" name="status">
                                  <option disabled="disabled" selected="selected">Select Status</option>
                                  <option value="1" <?= !empty($product_details['status'])?($product_details['status']==1)?'selected="selected"':'':set_select('status',1);?>>Not Active</option>
                                  <option value="2" <?= !empty($product_details['status'])?($product_details['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option>
                                </select>
                                <span class="has-error"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        <?php if(!empty($product_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $product_details['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= !empty($product_details)?'Update':'Add'?> Product</button>
                            <a href="<?php echo base_url(); ?>admin/product" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
