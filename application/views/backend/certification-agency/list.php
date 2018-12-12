<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Certification Agencies</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">    
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
            <div class="col-md-12 alert-box-msg">
                <div class="box">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
<!--                        <div class="pull-right">
                            <a href="<?= base_url()?>category/add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                        </div>-->
                    </div>
                  <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover datatable-list" id="delete_list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>Agency Name</th>
                                        <th>Contact Person</th>
                                        <th>Username</th>
                                        <th>Email Id1</th>
                                        <th>Mobile number1</th>
                                        <th>Address</th>
                                        <th>Licence Number</th>
                                        <th>Verified</th>
                                        <?php if($user_data['username'] == 'adminmaster'){ ?>
                                            <th>Action</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (!empty($certification_agencies_list)) {
                                        foreach ($certification_agencies_list as $key => $value) {
                                            
                                ?>
                                            <tr class="gradeX" id="order-<?= $value['user_id'] ?>">
                                                <td class="hidden"><?= $value['user_id']; ?></td>
                                                <td><?= $value['name'];?></td>
                                                <td><?= $value['contact_person'];?></td>
                                                <td><?= $value['username'];?></td>
                                                <td><?= $value['email1'];?></td>
                                                <td><?= $value['mobile1'];?></td>
                                                <td><?= $value['address'];?></td>
                                                <td><?= $value['licence_no'];?></td>
                                                <td><?= ($value['is_verified'] == 2)?'Verified':'Not Verified';?></td>
                                                <?php if($user_data['username'] == ADMINUSERNAME){ ?>
                                                    <td>
                                                        <a href="<?= site_url('admin/certification-agency/update?id='.$value['user_id'].'&user_type_id='.$value['user_type_id'])?>" class="view-agency" data-id="<?= $value['user_id'] ?>" name="view-agency"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="<?= site_url('admin/certification-agency/view?id='.$value['user_id'])?>" class="view-product" data-id="<?= $value['user_id'] ?>" name="view-product" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0)" class="delete-user" data-id="<?= $value['user_id'] ?>" name="delete-user" onclick="agencyDelete(this)" title="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                <?php
                                        }
                                    }
                                ?>
                                </tbody>            
                            </table>
                        </div>  
                      
                      </div>
                  <!-- /.box-body -->
                  </div>
          <!-- /.box -->
            </div>
        </div>
        <div class="clearfix"> </div>
    </section>
</div>
<div class="modal fade delete-popup" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h5> By clicking on <span>"YES"</span>, This Certification Agency will be deleted permanently. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function () {
        $("#confirm_btn").on('click',function(){
            var user_id = $("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/certification-agency/delete",
                data: { 'user_id' : user_id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  The Certification Agency has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                        setTimeout(function(){ 
                            location.reload();
                        }, 3000);
                    }else{
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                    
                }
            });
        });
    });
    function agencyDelete(ths){
        var id = $(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
