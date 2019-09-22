<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= !empty($heading)?$heading:'Heading'?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Send Enquiry By Buyer</a></li>
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
	                                    <?php if( ADMINUSERNAME  == $arrUserData['username'] ) {  ?>
		                                    <th>Seller Name</th>
	                                    <?php } ?>
                                        <th>Buyer name</th>
                                        <th>Category</th>
                                        <th>Product</th>
	                                    <th>Quantity (in Kg)</th>
	                                    <th>Expected Price (per Kg)</th>
	                                    <th>Total (per Kg)</th>
                                        <th>Description</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( true == isset( $arrmixSendEnquiryBuyerList ) ) {
                                        foreach( $arrmixSendEnquiryBuyerList as $key => $arrSendEnquiryBuyerDetails ) {

                                ?>
                                            <tr class="gradeX" id="send-enquiry-buyer-<?= $arrSendEnquiryBuyerDetails['id'] ?>">
                                                <td class="hidden"><?= $arrSendEnquiryBuyerDetails['id']; ?></td>
	                                            <?php if( ADMINUSERNAME  == $arrUserData['username'] ) {  ?>
		                                            <td><?= $arrSendEnquiryBuyerDetails['seller_name'] ?></td>
	                                            <?php } ?>
	                                            <td><?= $arrSendEnquiryBuyerDetails['buyer_name'];?></td>
                                                <td><?= $arrSendEnquiryBuyerDetails['category_name']; ?></td>
                                                <td><?= $arrSendEnquiryBuyerDetails['product_name'] ?></td>
	                                            <td><?= $arrSendEnquiryBuyerDetails['sell_quantity'] ?></td>
                                                <td><?= $arrSendEnquiryBuyerDetails['price']; ?></td>
                                                <td><?= $arrSendEnquiryBuyerDetails['total_price']; ?></td>
	                                            <td><?= $arrSendEnquiryBuyerDetails['description']; ?></td>
	                                            <!--<td>
                                                    <a href="<?/*= base_url()*/?>order/view?order_id=<?/*= $arrSendEnquiryBuyerDetails['order_id'] */?>" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
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

