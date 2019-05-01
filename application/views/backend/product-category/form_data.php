<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/product-category">Category List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($productCategoryDetails)?$productCategoryDetails['name']:'Add'?> Category</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($productCategoryDetails)?site_url('admin/product-category/update?id='.$productCategoryDetails['id']):site_url('admin/product-category/add')?>" name="products-form" id="products-form">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Category Name</label>
                                <input type="text" name="name"  class="form-control" id="name" placeholder="Product Name" value="<?= !empty($productCategoryDetails['name'])?$productCategoryDetails['name']:set_value('name')?>">
                                <span class="has-error"><?php echo form_error('name'); ?></span>
                            </div>
                           
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select class="form-control select2" name="status">
                                  <option disabled="disabled" selected="selected">Select Status</option>
                                  <option value="1" <?= !empty($productCategoryDetails['status'])?($productCategoryDetails['status']==1)?'selected="selected"':'':set_select('status',1);?>>Not Active</option>
                                  <option value="2" <?= !empty($productCategoryDetails['status'])?($productCategoryDetails['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option>
                                </select>
                                <span class="has-error"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        <?php if(!empty($productCategoryDetails['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $productCategoryDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= !empty($productCategoryDetails)?'Update':'Add'?> Category</button>
                            <a href="<?php echo base_url(); ?>admin/product-category" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
