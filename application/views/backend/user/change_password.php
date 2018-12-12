<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="javascript:void(0)"><?= !empty($title)?$title:'Change Password'?></a></li>
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"  name="change-password-form" id="change-password-form">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label label-required" for="password">New Password</label>
                                        <input type="password" name="password"  class="form-control" id="password" placeholder="Password" value="<?= set_value('password') ?>">
                                        <span class="has-error"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label label-required" for="confirm-password">Confirm Password</label>
                                        <input type="password" name="confirm_password"  class="form-control" id="confirm_password" placeholder="Confirm Password" value="<?= set_value('confirm_password') ?>">
                                        <span class="has-error"><?php echo form_error('confirm_password'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {});
   
</script>