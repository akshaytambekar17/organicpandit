<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Sell Products</a></li>
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
                        <div class="pull-right">
                            <a href="<?= base_url()?>sell-product/create" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Sell Product</a>
                        </div>
                    </div>
                  <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover js-datatable-list" >
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <?php if( $arrUserData['username'] == 'adminmaster' ) {  ?>
                                            <th>User</th>
                                        <?php } ?>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Certification</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( isset( $arrmixSellProductList ) ) {
                                        foreach( $arrmixSellProductList as $key => $value) {

                                ?>
                                            <tr class="gradeX" id="order-<?= $value['sell_product_id'] ?>">
                                                <td class="hidden"><?= $value['sell_product_id']; ?></td>
	                                            <?php if( $arrUserData['username'] == 'adminmaster' ) {  ?>
                                                    <td><?= isVal( $value['fullname'] ) ? $value['fullname'] : 'Admin' ?></td>
		                                        <?php } ?>
                                                <td><?= $value['category_name'];?></td>
                                                <td><?= $value['product_name'];?></td>
                                                <td><?= $value['price']; ?></td>
                                                <td><?= $value['certificaton_agency_name'] ?></td>
                                                <td><?= ( IN_STOCK == $value['stock'] ) ? 'In Stock' : 'Out of Stock' ; ?></td>
                                                <td>
	                                              <a href="<?= base_url()?>sell-product/update?sell_product_id=<?= $value['sell_product_id'] ?>" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	                                              <a href="javascript:void(0)" class="js-delete-sell-product" data-id="<?= $value['sell_product_id'] ?>" data-toggle="tooltip" title="Delete" onclick="sellProductDelete(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<div class="modal fade delete-popup" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">
                    <h5> By clicking on <span>"YES"</span>, This product will be deleted permanently from sell. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" id="js-id-modal">
                    <button type="button" id="js-confirm-button" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#js-confirm-button").on('click',function(){
            var intSellProductId = $("#js-id-modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "sell-product/delete",
                data: { 'sell_product_id' : intSellProductId },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-box-msg').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Product has been removed from sell list successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function sellProductDelete(ths){
        var id = $(ths).data('id');
        $("#js-id-modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
