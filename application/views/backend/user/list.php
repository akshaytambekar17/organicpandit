<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Users</a></li>
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
                            <table class="table table-striped table-bordered table-hover" id="js-user-registration-list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>Partner User Type</th>
                                        <th>Partner Fullname</th>
                                        <th>Fullname</th>
                                        <?php if( ADMINUSERNAME == $user_data['username'] ){ ?>
                                            <th>User Type</th>
                                        <?php } ?>
                                        <th>Email Id</th>
                                        <th>Mobile number</th>
                                        <th>Verified</th>
                                        <?php if( ADMINUSERNAME == $user_data['username'] || $user_data['user_type_id'] == 16 ){ ?>
                                                <th>Action</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (!empty($user_list)) {
                                        foreach ($user_list as $key => $value) {
                                            
                                ?>
                                            <tr class="gradeX" id="order-<?= $value['user_id'] ?>">
                                                <td class="hidden"><?= $value['user_id']; ?></td>
                                                <td>
                                                    <?php
                                                        if( ADMINUSERNAME == $user_data['username'] ) {
                                                            $partnerUserTypeDetails = $this->UserType->getUserTypeById( $value['partner_type_id'] );
                                                            echo $partnerUserTypeDetails['name'];
                                                        }else {
                                                            echo $value['user_type_name'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if( ADMINUSERNAME == $user_data['username'] ) {
                                                            $partnerUserDetails = $this->User->getUserById( $value['partner_user_id'] );
                                                            echo $partnerUserDetails['fullname'];
                                                        }else {
                                                            echo $value['fullname'];
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $value['fullname']?></td>
                                                <?php if( ADMINUSERNAME == $user_data['username'] ){ ?>
                                                    <td><?= $value['user_type_name'];?></td>
                                                <?php } ?>
                                                <td><?= $value['email_id'];?></td>
                                                <td><?= $value['mobile_no'];?></td>
                                                <td><?= ($value['is_verified'] == 2)?'Verified':'Not Verified';?></td>
                                                <?php if(!empty($user_data['user_type_id']) && $user_data['user_type_id'] == 16 ){ ?>
                                                    <td style="text-align: center">
                                                        <?php if($user_data['user_id'] == $value['agency_id']){ ?>
                                                            <a href="<?= site_url('admin/user/view?id='.$value['user_id'])?>" class="view-product" data-id="<?= $value['user_id'] ?>" name="view-product"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                        <?php } ?>        
                                                    </td>
                                                <?php }
                                                    if($user_data['username'] == ADMINUSERNAME){ 
                                                ?>
                                                        <td>
                                                            <a href="<?= site_url('admin/user/update-profile?id='.$value['user_id'].'&user_type_id='.$value['user_type_id'])?>" class="view-product" data-id="<?= $value['user_id'] ?>" name="view-product"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a href="<?= site_url('admin/user/view?id='.$value['user_id'])?>" class="view-product" data-id="<?= $value['user_id'] ?>" name="view-product"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0)" class="delete-user" data-user_id="<?= $value['user_id'] ?>" name="delete-user" onclick="userDelete(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br>
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
                    <h5> By clicking on <span>"YES"</span>, This user will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
                url: "<?php echo base_url(); ?>" + "admin/user/delete",
                data: { 'user_id' : user_id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  User has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
        $('#js-user-registration-list').dataTable( {
            aaSorting: [[0, "desc"]],
            dom: 'Bfrtip',
            buttons: [
                'csvHtml5', 'pdfHtml5'
            ]
        } );
        
    });
    function userDelete(ths){
        var id = $(ths).data('user_id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
