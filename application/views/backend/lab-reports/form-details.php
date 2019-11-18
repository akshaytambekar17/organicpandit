<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $strHeading; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?= base_url()?>admin/lab-reports">Lab Reports List</a></li>
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
    <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) || true == isset( $strErrorMessage ) ) {
            if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) {
                $strErrorMessage = $this ->session->flashdata( 'Error' );
            }
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
<!--                        <h3 class="box-lab_name">Data Table With Full Features</h3>-->
                    </div>
                    <form method="post" enctype="multipart/form-data" action="<?= ( true == isset( $arrLabReportDetails ) ) ? base_url() . 'admin/lab-reports/update?lab_report_id=' . $arrLabReportDetails['lab_report_id'] : base_url() . 'admin/lab-reports/add' ?>" name="lab-report-form">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required" for="product_id">Select Category</label>
                                    <select class="form-control select2" name="category_id" id="js-category-id">
                                        <option disabled="disabled" selected="selected">Select Category</option>
                                        <?php foreach( $arrProductCategoryList as $arrCategoryDetails ) {
                                                $strSelected = '';
                                                if( $arrCategoryDetails['id'] == $arrLabReportDetails['category_id'] ) {
                                                    $strSelected = 'selected="selected"';
                                                }
                                        ?>
                                            <option value="<?= $arrCategoryDetails['id'] ?>" <?= set_select('category_id', $arrCategoryDetails['id']); ?> <?= $strSelected ?> ><?= $arrCategoryDetails['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('category_id'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required" for="product_id">Select Product</label>
                                    <select class="form-control select2" name="product_id" id="js-product-id">
                                        <option disabled="disabled" selected="selected">Select Product</option>
                                    </select>
                                    <span class="has-error"><?php echo form_error('product_id'); ?></span>
                                </div>
                                <input type="hidden" id="js-hidden-product-id" value="<?= ( true == isset( $arrLabReportDetails['product_id'] ) ) ? $arrLabReportDetails['product_id'] : '' ?>">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Lab Name</label>
                                    <input type="text" name="lab_name"  class="form-control" placeholder="Lab Name" value="<?= ( true == isset( $arrLabReportDetails['lab_name'] ) ) ? $arrLabReportDetails['lab_name'] : set_value( 'lab_name' )?>" >
                                    <span class="has-error"><?php echo form_error('lab_name'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required" for="date_of_sampling">Date of Sampling</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="date_of_sampling" class="form-control picker-date pull-right" id="js-date-sown" placeholder="Date of Sampling" value="<?= ( true == isset( $arrLabReportDetails['date_of_sampling'] ) ) ? date( 'd/m/Y', strtotime( $arrLabReportDetails['date_of_sampling'] ) ) : set_value('date_of_sampling') ?>">
                                    </div>
                                    <span class="has-error"><?php echo form_error('date_of_sampling'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Shipment Number</label>
                                    <input type="text" name="shipment_number"  class="form-control" placeholder="Shipment Number" value="<?= ( true == isset( $arrLabReportDetails['shipment_number'] ) ) ? $arrLabReportDetails['shipment_number'] : set_value( 'shipment_number' )?>" >
                                    <span class="has-error"><?php echo form_error('shipment_number'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Quantity</label>
                                    <input type="text" name="quantity"  class="form-control" placeholder="Quantity" value="<?= ( true == isset( $arrLabReportDetails['quantity'] ) ) ? $arrLabReportDetails['quantity'] : set_value( 'quantity' )?>" >
                                    <span class="has-error"><?php echo form_error('quantity'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Invoice Number</label>
                                    <input type="text" name="invoice_number"  class="form-control" placeholder="Invoice Number" value="<?= ( true == isset( $arrLabReportDetails['invoice_number'] ) ) ? $arrLabReportDetails['invoice_number'] : set_value( 'invoice_number' )?>" >
                                    <span class="has-error"><?php echo form_error('invoice_number'); ?></span>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Sampling Location</label>
                                    <input type="text" name="sampling_location"  class="form-control" placeholder="Sampling Location" value="<?= ( true == isset( $arrLabReportDetails['sampling_location'] ) ) ? $arrLabReportDetails['sampling_location'] : set_value( 'sampling_location' )?>" >
                                    <span class="has-error"><?php echo form_error('sampling_location'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Exporter</label>
                                    <input type="text" name="exporter"  class="form-control" placeholder="Exporter" value="<?= ( true == isset( $arrLabReportDetails['exporter'] ) ) ? $arrLabReportDetails['exporter'] : set_value( 'exporter' )?>" >
                                    <span class="has-error"><?php echo form_error('exporter'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Type of Sample</label>
                                    <input type="text" name="type_of_sample"  class="form-control" placeholder="Type of Sample" value="<?= ( true == isset( $arrLabReportDetails['type_of_sample'] ) ) ? $arrLabReportDetails['type_of_sample'] : set_value( 'type_of_sample' )?>" >
                                    <span class="has-error"><?php echo form_error('type_of_sample'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label label-required">Seal Number</label>
                                    <input type="text" name="seal_number"  class="form-control" placeholder="Seal Number" value="<?= ( true == isset( $arrLabReportDetails['seal_number'] ) ) ? $arrLabReportDetails['seal_number'] : set_value( 'seal_number' )?>" >
                                    <span class="has-error"><?php echo form_error('seal_number'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if( true == isset( $arrLabReportDetails['lab_report_id'] ) ) { ?>
                                <input type="hidden" name="lab_report_id" value="<?= $arrLabReportDetails['lab_report_id']?>">
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="submit"><?= $strSubmitValue; ?></button>
                            <a href="<?php echo base_url(); ?>admin/blogs" class="btn btn-warning">Cancel</a>
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
        $('.picker-date').datepicker({
            format : 'dd/mm/yyyy',
            autoclose: true,
        });
        $( '#js-category-id' ).on('change',function(){
            var intCategoryId = $( this ).val();
            fetchProductsByCategory( intCategoryId );
        });
        var intCategoryId = $( '#js-category-id' ).val();
        if( '' != intCategoryId ){
            fetchProductsByCategory( intCategoryId );
        }	 
    });


</script>