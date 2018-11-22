<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>product">Product</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($product_details)?site_url('product/update?id='.$product_details['id']):site_url('product/add')?>" >
                        <div class="box-body">
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
                            <div class="form-group col-md-12">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity" value="<?= !empty($product_details['quantity'])?$product_details['quantity']:set_value('quantity')?>">
                                <span class="has-error"><?php echo form_error('quantity'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="<?= !empty($product_details['price'])?$product_details['price']:set_value('price')?>">
                                <span class="has-error"><?php echo form_error('price'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="<?= !empty($product_details['meta_title'])?$product_details['meta_title']:set_value('meta_title')?>" >
                                <span class="has-error"><?php echo form_error('meta_title'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Description</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description" value="<?= !empty($product_details['meta_description'])?$product_details['meta_description']:set_value('meta_description')?>">
                                <span class="has-error"><?php echo form_error('meta_description'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta Keywords" value="<?= !empty($product_details['meta_keywords'])?$product_details['meta_keywords']:set_value('meta_keywords')?>">
                                <span class="has-error"><?php echo form_error('meta_keywords'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control" id="stock" placeholder="Stock" value="<?= !empty($product_details['stock'])?$product_details['stock']:set_value('stock')?>">
                                <span class="has-error"><?php echo form_error('stock'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Category</label>
                                <select class="form-control select2" name="category[]" multiple="multiple">
                                    <option disabled="disabled">Select Category</option>
                                    <?php foreach($category_list  as $value){ 
                                            $selected='';
                                            if(!empty($product_has_category_details)){
                                                foreach($product_has_category_details as $value_has_category){
                                                    if($value_has_category['category_id'] == $value['id']){
                                                        $selected='selected="selected"';
                                                    }
                                                }
                                            }
                                    ?>
                                            <option value="<?= $value['id']?>" <?= !empty($product_has_category_details)>0?$selected:set_select('category[]',$value['id']);?>><?= $value['name']?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('category[]'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Image</label>
                                <input type="file" name="image" id="image"> <br>
                                <?php if(!empty($product_details['image'])){ ?>
                                    <img src="<?= base_url()?>assets/images/product-images/<?= $product_details['image']?>" width="70px" height="50px">
                                    <input type="hidden" value="<?= $product_details['image']?>" name="image_hidden">
                                <?php } ?>
                                <span class="help-block"><?php echo form_error('image'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Brand</label>
                                <select class="form-control select2" name="brand[]" multiple="multiple">
                                    <option disabled="disabled">Select Brand</option>
                                    <?php foreach($brand_list  as $value){ 
                                            $selected='';
                                            if(!empty($product_has_brand_details)){
                                                foreach($product_has_brand_details as $value_has_brand){
                                                    if($value_has_brand['brand_id'] == $value['id']){
                                                        $selected='selected="selected"';
                                                    }
                                                }
                                            }
                                    ?>
                                            <option value="<?= $value['id']?>" <?= !empty($product_has_brand_details)?$selected:set_select('brand[]',$value['id']);?>><?= $value['name']?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('brand[]'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Color</label>
                                <select class="form-control select2" name="color[]" multiple="multiple">
                                    <option disabled="disabled">Select Color</option>
                                    <?php foreach($color_list  as $value){ 
                                            $selected='';
                                            if(!empty($product_has_color_details)){
                                                foreach($product_has_color_details as $value_has_color){
                                                    if($value_has_color['color_id'] == $value['id']){
                                                        $selected='selected="selected"';
                                                    }
                                                }
                                            }
                                    ?>
                                            <option value="<?= $value['id']?>" <?= !empty($product_has_color_details)?$selected:set_select('color[]',$value['id']);?>><?= $value['name']?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('color[]'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Size</label>
                                <select class="form-control select2" name="size[]" multiple="multiple">
                                    <option disabled="disabled">Select Size</option>
                                    <?php foreach($size_list  as $value){ 
                                            $selected='';
                                            if(!empty($product_has_size_details)){
                                                foreach($product_has_size_details as $value_has_size){
                                                    if($value_has_size['size_id'] == $value['id']){
                                                        $selected='selected="selected"';
                                                    }
                                                }
                                            }
                                    ?>
                                            <option value="<?= $value['id']?>" <?= !empty($product_has_size_details)?$selected:set_select('size[]',$value['id']);?>><?= $value['size']?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('size[]'); ?></span>
                            </div>
                            
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
                            <a href="<?php echo base_url(); ?>product" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
