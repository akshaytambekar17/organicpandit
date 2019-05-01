<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/organic-setting">Organic Setting</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($settingDetails)?$settingDetails['title']:'Add'?> Setting</a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($settingDetails)?site_url('admin/organic-setting/update?id='.$settingDetails['id']):site_url('admin/organic-setting/add')?>" name="setting-form" id="setting-form">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input type="text" name="title"  class="form-control" id="title" placeholder="Title" value="<?= !empty($settingDetails['title'])?$settingDetails['title']:set_value('title')?>">
                                <span class="has-error"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Key</label>
                                <input type="text" name="key" class="form-control" id="key" placeholder="Key" value="<?= !empty( $settingDetails['key'] ) ? $settingDetails['key'] : set_value('key')?>" <?= !empty( $settingDetails['key'] ) ? 'readonly' : '' ?> >
                                <span class="has-error"><?php echo form_error('key'); ?></span>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Status</label>
                                <select class="form-control select2" name="value">
                                  <option disabled="disabled" selected="selected">Select Status</option>
                                  <option value="<?= DISABLED ?>" <?= !empty( $settingDetails['value'] ) ? ( $settingDetails['value'] == DISABLED ) ? 'selected="selected"' : '' : set_select('value',DISABLED);?>>Disabled</option>
                                  <option value="<?= ENABLED ?>" <?= !empty( $settingDetails['value'] ) ? ( $settingDetails['value'] == ENABLED ) ?'selected="selected"' : '' : set_select('value',ENABLED);?> >Enabled</option>
                                </select>
                                <span class="has-error"><?php echo form_error('value'); ?></span>
                            </div>
                        </div>
                        <?php if(!empty($settingDetails['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $settingDetails['id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= !empty( $settingDetails ) ? 'Update' : 'Add'?> Setting</button>
                            <a href="<?php echo base_url(); ?>admin/organic-setting" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
