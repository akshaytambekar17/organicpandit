<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#"><?= $title?></a></li>
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
                            <table class="table table-striped table-bordered table-hover js-datatable-list" id="delete_list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>Fullname</th>
                                        <th>Post Code</th>
                                        <th>Company name</th>
                                        <th>Product name</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Total Price</th>
                                        <th>Verified</th>
                                        <th>Total Bids</th>
                                        <?php if($user_data['username'] == 'adminmaster'){ ?>
                                                <th>Action</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (!empty($post_list)) {
                                        foreach ($post_list as $key => $value) {
                                ?>
                                            <tr class="gradeX" id="order-<?= $value['post_requirement_id'] ?>">
                                                <td class="hidden"><?= $value['post_requirement_id']; ?></td>
                                                <td>
                                                    <?php
                                                        $userDetails = $this->User->getUserById($value['user_id']); 
                                                        echo $userDetails['fullname'];
                                                    ?>
                                                </td>
                                                <td><?= $value['post_code']?></td>
                                                <td><?= $value['company_name']?></td>
                                                <td><?= $value['name']?></td>
                                                <td><?= $value['from_date']?></td>
                                                <td><?= $value['to_date']?></td>
                                                <td><?= $value['total_price']; ?></td>
                                                <td><?= $value['is_verified'] == 2?'Yes':'No';?></td>
                                                <td>
                                                    <?php $bids = $this->Bid->getBidByPostRequirementId($value['post_requirement_id']); 
                                                        if(!empty($bids) && count($bids)>0){
                                                    ?>
                                                        <a href="<?= base_url()?>admin/post-requirement/bid-list?post_id=<?= $value['post_requirement_id']?>" class="view-post" data-id="<?= $value['post_requirement_id'] ?>" name="view-post" title="Show Bids"><?= count($bids)?></a>
                                                    <?php  }else{ ?>    
                                                         <a href="javascript:void(0)" class="view-post" data-id="<?= $value['post_requirement_id'] ?>" name="view-post" title="Show Bids">0</a>   
                                                    <?php  }?>    
                                                </td>
                                                <?php if($user_data['username'] == ADMINUSERNAME){ ?>
                                                    <td>
                                                        <a href="<?= base_url()?>admin/post-requirement/update?id=<?= $value['post_requirement_id']?>" class="view-post" data-id="<?= $value['post_requirement_id'] ?>" name="view-post"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <a href="javascript:void(0)" class="delete-post" data-id="<?= $value['post_requirement_id'] ?>" data-postcode="<?= $value['post_code']?>"  name="delete-post" onclick="postDelete(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br>
                                                    </td>
                                                <?php }?>
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
                    <h5> By clicking on <span>"YES"</span>, The post code <span id="post-code-span"></span> will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
                url: "<?php echo base_url(); ?>" + "admin/post-requirement/delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  The post has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function postDelete(ths){
        var id = $(ths).data('id');
        var postcode = $(ths).data('postcode');
        $("#id_modal").val(id);
        $("#post-code-span").text(postcode);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
