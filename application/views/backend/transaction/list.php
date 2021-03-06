<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Transaction</a></li>
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
                                        <th>Order number</th>
                                        <th>Subscription Plan number</th>
                                        <th>Transaction Id</th>
                                        <th>Status</th>
                                        <th>Error</th>
                                        <th>Error Message</th>
                                        <th>Total Amount</th>
	                                    <th>Date</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( true == isset( $arrmixTransactionList ) ) {
                                        foreach( $arrmixTransactionList as $key => $arrTransactionDetails ) {

                                ?>
                                            <tr class="gradeX" id="order-<?= $arrTransactionDetails['transaction_id'] ?>">
                                                <td class="hidden"><?= $arrTransactionDetails['transaction_id']; ?></td>
                                                <td>
                                                    <?php if( 0 != $arrTransactionDetails['order_id'] ) { ?>
                                                        <a href="<?= base_url()?>order/view?order_id=<?= $arrTransactionDetails['order_id'] ?>" data-toggle="tooltip" title="View">
                                                            <?= $arrTransactionDetails['order_no'];?>
                                                        </a>
                                                    <?php } else { ?>
                                                        NA   
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if( 0 != $arrTransactionDetails['user_purchase_subscription_id'] ) { ?>
                                                        <a href="<?= base_url()?>admin/user-purchase-subscriptions" data-toggle="tooltip" title="View">
                                                            <?= $arrTransactionDetails['purchase_subscription_number'];?>
                                                        </a>    
                                                    <?php } else { ?>
                                                        NA   
                                                    <?php } ?>
                                                </td>
                                                <td><?= $arrTransactionDetails['txnid'];?></td>
                                                <td><?= $arrTransactionDetails['status']; ?></td>
                                                <td><?= $arrTransactionDetails['error'] ?></td>
                                                <td><?= $arrTransactionDetails['error_message'] ?></td>
                                                <td><?= $arrTransactionDetails['total_amount']; ?></td>
                                                <td><?= $arrTransactionDetails['added_on']; ?></td>
                                                <!--<td>
                                                    <a href="<?/*= base_url()*/?>order/view?order_id=<?/*= $arrTransactionDetails['order_id'] */?>" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>-->
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
