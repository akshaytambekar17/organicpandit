<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">User Subscription</a></li>
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
                            <table class="table table-striped table-bordered table-hover js-datatable-list" >
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>User Type</th>
                                        <th>Fullname</th>
                                        <th>Purchase Subscription number</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Subscribe At</th>
                                        <th>Subscription Expired At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( true == isArrVal( $arrmixUserPurchaseSubscriptionList ) ) {
                                        foreach( $arrmixUserPurchaseSubscriptionList as $arrmixUserPurchaseSubscriptionDetails ) {

                                ?>
                                            <tr class="gradeX" id="order-<?= $arrmixUserPurchaseSubscriptionDetails['user_purchase_subscription_id'] ?>">
                                                <td class="hidden"><?= $arrmixUserPurchaseSubscriptionDetails['user_purchase_subscription_id']; ?></td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['user_type_name'] ?></td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['fullname'];?></td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['purchase_subscription_number'];?></td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['price']; ?></td>
                                                <td>
                                                    <?php
                                                        if( ORDER_PAYMENT_STATUS_COMPLETED == $arrmixUserPurchaseSubscriptionDetails['payment_status'] ){
                                                            echo 'Completed';
                                                        } else if( ORDER_PAYMENT_STATUS_USER_CANCELLED == $arrmixUserPurchaseSubscriptionDetails['payment_status'] ) {
                                                            echo 'User Cancelled';
                                                        } else if( ORDER_PAYMENT_STATUS_FAILED == $arrmixUserPurchaseSubscriptionDetails['payment_status'] ) {
                                                            echo 'Failed';
                                                        } else {
                                                            echo 'Pending';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['created_at']; ?></td>
                                                <td><?= $arrmixUserPurchaseSubscriptionDetails['expired_at']; ?></td>
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

