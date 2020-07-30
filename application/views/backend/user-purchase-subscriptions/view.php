<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url()?>orders">Orders</a></li>
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
                                <?php if( $arrUserDetails['username'] == ADMINUSERNAME ) {  ?>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>User Type</label>
                                                <h4><?= $arrmixOrderDetails['user_type_name']?></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Full Name</label>
                                        <h4><?= $arrmixOrderDetails['fullname']?></h4>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Mobile Number</label>
                                        <h4><?= $arrmixOrderDetails['mobile_no']?></h4>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Email Id</label>
                                        <h4><?= $arrmixOrderDetails['email_id']?></h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Address</label>
                                        <h4><?= $arrmixOrderDetails['address']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <h4><?= $arrmixOrderDetails['state_name']?></h4>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <h4><?= $arrmixOrderDetails['city_name']?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Pincode</label>
                                        <h4><?= $arrmixOrderDetails['pincode']?></h4>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <h3>Product Details</h3>
                                    </div>
                                </div>
                                <?php foreach( $arrProductList as $arrProductDetails ){  ?>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Product Name</label>
                                            <h4><?= $arrProductDetails->name?></h4>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Price</label>
                                            <h4><?= $arrProductDetails->price?></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Total Amount</label>
                                        <h4><?= $arrmixOrderDetails['total_amount']?></h4>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Payment Method</label>
                                        <h4><?= ( PAYMENT_METHOD_ONLINE == $arrmixOrderDetails['payment_method'] ) ? 'Online Payment' : 'Cash on Delivery' ?></h4>
                                    </div>

	                                <div class="form-group col-md-4">
		                                <label>Online Payment Status</label>
		                                <h4>
			                                <?php
				                                if( ORDER_PAYMENT_STATUS_COMPLETED == $arrmixOrderDetails['order_payment_status'] ){
					                                echo 'Completed';
				                                } else if( ORDER_PAYMENT_STATUS_USER_CANCELLED == $arrmixOrderDetails['order_payment_status'] ) {
					                                echo 'User Cancelled';
				                                } else {
					                                echo 'Pending';
				                                }
			                                ?>
		                                </h4>
	                                </div>

                                    <div class="form-group col-md-4">
                                        <label>Order Date</label>
                                        <h4><?= $arrmixOrderDetails['created_at'] ?></h4>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $arrmixOrderDetails['user_id']?>">
                            <input type="hidden" name="user_type_id" value="<?= $arrmixOrderDetails['user_type_id']?>">
                        </div>
                        <div class="box-footer">
<!--                            <button type="submit" class="btn btn-success" id="submit">Update User</button>-->
                            <a href="<?php echo base_url(); ?>orders" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
