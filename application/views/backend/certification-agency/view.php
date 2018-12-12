<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url()?>admin/user">Certification Agencies</a></li>
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
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Agency Name</label>
                                        <h4><?= $certification_agency_details['name']?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Contact Person</label>
                                        <h4><?= $certification_agency_details['contact_person']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Username</label>
                                        <h4><?= !empty($certification_agency_details['username'])?$certification_agency_details['username']:'NA' ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Email Id1</label>
                                        <h4><?= $certification_agency_details['email1']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mobile Number1</label>
                                        <h4><?= $certification_agency_details['mobile1']?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Email Id2</label>
                                        <h4><?= !empty($certification_agency_details['email2'])?$certification_agency_details['email2']:'NA'?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mobile Number2</label>
                                        <h4><?= !empty($certification_agency_details['mobile2'])?$certification_agency_details['mobile2']:'NA'?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Address</label>
                                        <h4><?= $certification_agency_details['address']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Landline Number</label>
                                        <h4><?= $certification_agency_details['landline']?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Website</label>
                                        <h4><?= $certification_agency_details['website']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Licence Number</label>
                                        <h4><?= $certification_agency_details['licence_no']?></h4>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Certification Verification </label>
                                        <select class="form-control select2" name="is_verified">
                                          <option disabled="disabled" selected="selected">Select Option</option>
                                          <option value="2" <?= !empty($certification_agency_details['is_verified'])?($certification_agency_details['is_verified'] == 2)?'selected="selected"':'':set_select('is_verified',2);?>>Yes</option>
                                          <option value="1" <?= !empty($certification_agency_details['is_verified'])?($certification_agency_details['is_verified'] == 1)?'selected="selected"':'':set_select('is_verified',1);?> >No</option>
                                        </select>
                                        <span class="has-error"><?php echo form_error('is_verified'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Status </label>
                                        <select class="form-control select2" name="status">
                                          <option disabled="disabled" selected="selected">Select Status</option>
                                          <option value="2" <?= !empty($certification_agency_details['status'])?($certification_agency_details['status'] == 2)?'selected="selected"':'':set_select('status',2);?>>Enabled</option>
                                          <option value="1" <?= !empty($certification_agency_details['status'])?($certification_agency_details['status'] == 1)?'selected="selected"':'':set_select('status',1);?> >Disabled</option>
                                        </select>
                                        <span class="has-error"><?php echo form_error('status'); ?></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?= $certification_agency_details['user_id']?>">
                        <input type="hidden" name="fullname" value="<?= $certification_agency_details['fullname']?>">
                        <input type="hidden" name="user_type_id" value="<?= $certification_agency_details['user_type_id']?>">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit">Update</button>
                            <a href="<?php echo base_url(); ?>admin/certification-agency" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
