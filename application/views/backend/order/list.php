<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Order</a></li>
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
                    </div>
                  <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover datatable-list" >
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <?php if( $arrUserData['username'] == ADMINUSERNAME ) {  ?>
                                            <th>User Type</th>
                                        <?php } ?>
                                        <th>Order number</th>
                                        <th>Fullname</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
	                                    <th>Payment Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( isset( $arrmixOrderList ) ) {
                                        foreach( $arrmixOrderList as $key => $arrOrderDetails ) {

                                ?>
                                            <tr class="gradeX" id="order-<?= $arrOrderDetails['order_id'] ?>">
                                                <td class="hidden"><?= $arrOrderDetails['order_id']; ?></td>
                                                <?php if( $arrUserData['username'] == ADMINUSERNAME ) {  ?>
                                                    <td><?= $arrOrderDetails['user_type_name'] ?></td>
                                                <?php } ?>
                                                <td><?= $arrOrderDetails['order_no'];?></td>
                                                <td><?= $arrOrderDetails['fullname'];?></td>
                                                <td><?= $arrOrderDetails['mobile_no']; ?></td>
                                                <td><?= $arrOrderDetails['address'] ?></td>
                                                <td><?= $arrOrderDetails['total_amount']; ?></td>
                                                <td><?= ( PAYMENT_METHOD_ONLINE == $arrOrderDetails['payment_method'] ) ? 'Online Payment' : 'COD' ?></td>
	                                            <td><?php
		                                                if( ORDER_PAYMENT_STATUS_COMPLETED == $arrOrderDetails['order_payment_status'] ){
		                                                	echo 'Completed';
		                                                } else if( ORDER_PAYMENT_STATUS_USER_CANCELLED == $arrOrderDetails['order_payment_status'] ) {
			                                                echo 'User Cancelled';
		                                                } else {
		                                                	echo 'Pending';
		                                                }
	                                                ?>
	                                            </td>
                                                <td><?= $arrOrderDetails['created_at']; ?></td>
                                                <td>
                                                    <a href="<?= base_url()?>order/view?order_id=<?= $arrOrderDetails['order_id'] ?>" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
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

<script>
    $(document).ready(function () {

    });

</script>
