<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active"><a href="#"><?= $strHeading; ?></a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">    
            <?php if( true == isStrVal( $this ->session->flashdata( 'Message' ) ) ) { 
                    $strSuccessMessage = $this ->session->flashdata( 'Message' );
            ?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $strSuccessMessage ?>
                    </div>
                </div>
            <?php }?> 
            <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) { 
                    $strErrorMessage = $this ->session->flashdata( 'Error' );
            ?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $strErrorMessage ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 js-alert-message-box">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-right">
                            <a href="<?= base_url()?>admin/user/user-organic-input-ecommerces/add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Organic Input E-Commerce</a>
                        </div>
                    </div>
                  <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover js-datatable-list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>User Fullname</th>
                                        <th>User Type</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( true == isArrVal( $arrUserOrganicInputEcommercesList ) ) {
                                        $arrCategory = getEcommerceCategory();
                                        $arrSubCategory = getEcommerceSubCategory();
                                        foreach( $arrUserOrganicInputEcommercesList as $arrUserOrganicInputEcommerceDetails ) {
                                ?>
                                            <tr class="gradeX" id="order-<?= $arrUserOrganicInputEcommerceDetails['id'] ?>">
                                                <td class="hidden"><?= $arrUserOrganicInputEcommerceDetails['id']; ?></td>
                                                <td><?= $arrUserOrganicInputEcommerceDetails['fullname']; ?></td>
                                                <td><?= $arrUserOrganicInputEcommerceDetails['user_type_name']; ?></td>
                                                <td><?= ( true == isIdVal( $arrUserOrganicInputEcommerceDetails['category_id'] ) ) ? $arrCategory[$arrUserOrganicInputEcommerceDetails['category_id']] : '--'; ?></td>
                                                <td><?= ( true == isIdVal( $arrUserOrganicInputEcommerceDetails['sub_category_id'] ) ) ? $arrSubCategory[$arrUserOrganicInputEcommerceDetails['sub_category_id']] : '--'; ?></td>
                                                <td><?= ( true == isVal( $arrUserOrganicInputEcommerceDetails['ecommerce_brand_id'] ) ) ? $arrUserOrganicInputEcommerceDetails['ecommerce_brand_id'] : '--'; ?></td>
                                                <td><?= ( true == isVal( $arrUserOrganicInputEcommerceDetails['price'] ) ) ? $arrUserOrganicInputEcommerceDetails['price'] : '--'; ?></td>
                                                <td>
                                                    <a href="<?= base_url()?>admin/user/user-organic-input-ecommerces/update?id=<?= $arrUserOrganicInputEcommerceDetails['id']?>"  name="update-organic-input-ecommerce" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="javascript:void(0)" data-user_organic_input_ecommerce_id="<?= $arrUserOrganicInputEcommerceDetails['id'] ?>" name="delete-organic-input-ecommerce" data-toggle="tooltip" title="Delete" onclick="showDeleteModal(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </td>
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
<div class="modal fade" id="js-delete-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h5> By clicking on <span>"YES"</span>, Organic Input E-Commerce will be deleted permanently. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" id="js-modal-user-organic-input-ecommerce-id"> 
                    <button type="button" id="js-confirm-button" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function () {
        $("#js-confirm-button").on('click',function() {
            var intUserOrganicInputEcommerceId = $("#js-modal-user-organic-input-ecommerce-id").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/user/user-organic-input-ecommerces/delete",
                data: { 'id' : intUserOrganicInputEcommerceId },
                success: function(result){
                    $('#js-delete-confirmation-modal').modal('hide');
                    if( result ) {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message-box').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Organic Input E-Commerce has been deleted successfully. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                        setTimeout(function(){ 
                            location.reload();
                        }, 3000);
                    }else{
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message-box').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                    
                }
            });
        });
    });
    
    function showDeleteModal(ths){
        var intUserOrganicInputEcommerceId = $(ths).data('user_organic_input_ecommerce_id');
        $("#js-modal-user-organic-input-ecommerce-id").val(intUserOrganicInputEcommerceId);
        $('#js-delete-confirmation-modal').modal('show');
    }
</script>
