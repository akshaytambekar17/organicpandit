<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/user-type">User Type</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($user_type_details)?$user_type_details['name']:'Add'?> User Type</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($user_type_details)?site_url('admin/user-type/update?id='.$user_type_details['id']):site_url('admin/user-type/add')?>" name="user-type-form" id="user-type-form">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Name</label>
                                <input type="text" name="name"  class="form-control" id="name" placeholder="Product Name" value="<?= !empty($user_type_details['name'])?$user_type_details['name']:set_value('name')?>">
                                <span class="has-error"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="<?= !empty($user_type_details['description'])?$user_type_details['description']:set_value('description')?>">
                                <span class="has-error"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Images</label>
                                <input type="file" name="user_type_images" id="user_type_images"> <br>
                                <?php if(!empty($user_type_details['images'])){ ?>
                                    <img src="<?= base_url()?>assets/images/<?= $user_type_details['images']?>" width="70px" height="50px">
                                    <input type="hidden" value="<?= $user_type_details['images']?>" name="user_type_images_hidden">
                                <?php } ?>
                                <span class="help-block"><?php echo form_error('user_type_images'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select class="form-control select2" name="status">
                                  <option disabled="disabled" selected="selected">Select Status</option>
                                  <option value="1" <?= !empty($user_type_details['status'])?($user_type_details['status']==1)?'selected="selected"':'':set_select('status',1);?>>Not Active</option>
                                  <option value="2" <?= !empty($user_type_details['status'])?($user_type_details['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option>
                                </select>
                                <span class="has-error"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        <?php if(!empty($user_type_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $user_type_details['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= !empty($user_type_details)?'Update':'Add'?> User Type</button>
                            <a href="<?php echo base_url(); ?>admin/user-type" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
