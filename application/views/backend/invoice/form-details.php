<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/invoices">Invoices List</a></li>
            <li class="active"><a href="javascript:void(0)"><?= $strHeading; ?></a></li>
        </ol>
    </section>
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
    <section class="content js-alert-message-box">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-success">
                    <div class="box-header">
<!--                        <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <form method="post" action="<?= ( true == isset( $arrInvoiceDetails ) ) ? base_url() . 'admin/invoices/update?invoice_id=' . $arrInvoiceDetails['invoice_id'] : base_url() . 'admin/invoices/add' ?>" name="invoices-form">
                        <div class="box-body">
                            <div class="row">
                                <?php if( true == isset( $arrInvoiceDetails['invoice_id'] ) ) { ?>
                                    <div class="form-group col-md-4">
                                        <label class="control-label label-required" for="order_id">Invoice Number</label>
                                        <h4><?= $arrInvoiceDetails['invoice_number']?></h4>
                                    </div>
                                <?php } ?>
                                <div class="form-group col-md-4">
                                    <?php if( false == isset( $arrInvoiceDetails['order_id'] ) ) { ?>
                                        <label class="control-label label-required" for="order_id">Select Order</label>
                                        <select class="form-control select2" name="order_id" id="js-order-id">
                                            <option disabled="disabled" selected="selected">Select Order</option>
                                            <?php foreach( $arrOrdersList as $arrOrderDetails ) { 
                                                    $strDisabled= '';
                                                    if( true == isArrVal( $arrInvoicesList ) ) {
                                                        foreach( $arrInvoicesList as $arrInvoicesDetails ) {
                                                            if( $arrInvoicesDetails['order_id'] == $arrOrderDetails['order_id'] ) {
                                                                $strDisabled = 'disabled="disabled"';
                                                            }
                                                        }
                                                    }
                                            ?>      
                                                    <option value="<?= $arrOrderDetails['order_id'] ?>" <?= set_select('order_id', $arrOrderDetails['order_id']); ?> <?= $strDisabled;?>><?= $arrOrderDetails['order_no'] ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <label class="control-label label-required" for="order_id">Order Number</label>
                                        <h4><?= $arrInvoiceDetails['order_no']?></h4>
                                        <input type="hidden" value="<?= $arrInvoiceDetails['order_id']?>" name="order_id" id="js-order-id">
                                    <?php } ?>
                                    <span class="has-error"><?php echo form_error('order_id'); ?></span>
                                </div>
                            </div>
                            <div id="js-fetch-order-data"></div><br>
                            <?php if( ADMINUSERNAME == $this->arrUserSession['username'] ) { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="order_id">Send Mail</label>
                                        <br>
                                        <input type="checkbox" name="is_send_mail" class="form-control" value="2"> &nbsp; Send Mail
                                    </div>    
                                </div>    
                            <?php } ?>
                        </div>
                        <?php if( true == isset( $arrInvoiceDetails['invoice_id'] ) ) { ?>
                                <input type="hidden" name="invoice_id" value="<?= $arrInvoiceDetails['invoice_id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <?php if( ADMINUSERNAME == $this->arrUserSession['username'] ) { ?>
                                <input type="submit" class="btn btn-success" id="submit" name='submit' value="<?= $strSubmitValue; ?>">
                            <?php } ?>    
                            <a href="<?php echo base_url(); ?>admin/invoices" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        var intOrderId = $( '#js-order-id' ).val();
        if( '' != intOrderId && undefined != intOrderId && null != intOrderId ) {
            fetchOrderData( intOrderId );
        } 
        $( '#js-order-id' ).on('change',function() {
            var intOrderId = $(this).val();
            fetchOrderData( intOrderId );
        });
    });
    
    function fetchOrderData( intOrderId ) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "admin/invoices/fetch-order-data",
            data: { 'order_id' : intOrderId },
            dataType: "html",
            success: function( objResult ){
                $( '#js-fetch-order-data' ).html( objResult );
            }
        });
    }
</script>
