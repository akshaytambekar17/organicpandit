<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>category">Category</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($category_details)?$category_details['name']:'Add'?> Category</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($category_details)?site_url('category/update?id='.$category_details['id']):site_url('category/add')?>" >
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Category Name</label>
                                <input type="text" name="name"  class="form-control" id="name" placeholder="Category Name" value="<?= !empty($category_details['name'])?$category_details['name']:set_value('name')?>">
                                <span class="has-error"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="<?= !empty($category_details['description'])?$category_details['description']:set_value('description')?>">
                                <span class="has-error"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="<?= !empty($category_details['meta_title'])?$category_details['meta_title']:set_value('meta_title')?>" >
                                <span class="has-error"><?php echo form_error('meta_title'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Description</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description" value="<?= !empty($category_details['meta_description'])?$category_details['meta_description']:set_value('meta_description')?>">
                                <span class="has-error"><?php echo form_error('meta_description'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta Keywords" value="<?= !empty($category_details['meta_keywords'])?$category_details['meta_keywords']:set_value('meta_keywords')?>">
                                <span class="has-error"><?php echo form_error('meta_keywords'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Select Parent Category</label>
                                <select class="form-control select2" name="parent_id">
                                    <option disabled="disabled" selected="selected">Select Category</option>
                                    <?php foreach($category_list  as $value){ 
                                            if($category_details['parent_id'] == $value['id']){
                                                $selected='selected="selected"';
                                            }else{
                                                $selected='';
                                            }
                                    ?>
                                            <option value="<?= $value['id']?>" <?= !empty($category_details['parent_id'])?$selected:set_select('parent_id',$value['id']);?>><?= $value['name']?></option>
                                    <?php } ?>
                                </select>
                                <span class="has-error"><?php echo form_error('status'); ?></span>
                            </div>
                            <div class="form-group col-md-11">
                                <label>Image</label>
                                <input type="file" name="image" id="image"> <br>
                                <?php if(!empty($category_details['image'])){ ?>
                                    <img src="<?= base_url()?>assets/images/category-images/<?= $category_details['image']?>" width="70px" height="50px">
                                    <input type="hidden" value="<?= $category_details['image']?>" name="image_hidden">
                                <?php } ?>
                                <span class="help-block"><?php echo form_error('image'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select class="form-control select2" name="status">
                                  <option disabled="disabled" selected="selected">Select Status</option>
                                  <option value="1" <?= !empty($category_details['status'])?($category_details['status']==1)?'selected="selected"':'':set_select('status',1);?>>Not Active</option>
                                  <option value="2" <?= !empty($category_details['status'])?($category_details['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option>
                                </select>
                                <span class="has-error"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        <?php if(!empty($category_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $category_details['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= !empty($category_details)?'Update':'Add'?> Category</button>
                            <a href="<?php echo base_url(); ?>category" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#submit').attr('disabled',true);
        
    });
   
</script>