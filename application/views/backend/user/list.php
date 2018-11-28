<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
                            <table class="table table-striped table-bordered table-hover datatable-list" id="delete_list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Certification</th>
                                        <?php if($user_data['username'] == 'adminmaster'){ ?>
                                            <th>Action</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (!empty($user_list)) {
                                        foreach ($user_list as $key => $value) {
                                            
                                ?>
                                            <tr class="gradeX" id="order-<?= $value['id'] ?>">
                                                <td class="hidden"><?= $value['id']; ?></td>
                                                <td><?= $value['fullname'];?></td>
                                                <td><?= $value['username'];?></td>
                                                <td><?= $value['certification'];?></td>
                                                <?php if($user_data['username'] == 'adminmaster'){ ?>
                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete-user" data-id="<?= $value['id'] ?>" name="delete-user" onclick="userDelete(this)">Delete</a><br>
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
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/user/delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  User has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }else{
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                    setTimeout(function(){ 
                        location.reload();
                    }, 3000);
                }
            });
        });
    });
    function userDelete(ths){
        var id = $(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>