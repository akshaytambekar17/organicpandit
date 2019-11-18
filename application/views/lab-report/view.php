<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body background="<?php echo base_url(); ?>assets/images/final.jpg";>
    <!-- banner -->
    <div class="">
        <div class="col-xs-12 bg-gray">
            <h2 class="page-header center">
                <?= $strHeading ?>
            </h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-20">
                    <div class="box box-success">
                        <div class="box-header with-border center">
                            <h3><?= $strTitle; ?></h3>
                        </div>
                        <div class="box-body">
                            <?php if( true == isArrVal( $arrLabReportDetails ) ) { ?>
                                
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Lab Name</label>
                                            <h4><?= $arrLabReportDetails['lab_name']?></h4>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Category</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['category_id'] ) ) ? $arrLabReportDetails['category_name'] : 'NA' ?></h4>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Product</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['product_id'] ) ) ? $arrLabReportDetails['product_name'] : 'NA' ?></h4>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Date of Sampling</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['date_of_sampling'] ) ) ? date( 'd/m/Y', strtotime( $arrLabReportDetails['date_of_sampling'] ) ) : 'NA' ?></h4>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Shipment Number</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['shipment_number'] ) ) ? $arrLabReportDetails['shipment_number'] : 'NA' ?></h4>
                                        </div>    
                                        <div class="form-group col-md-4">
                                            <label>Quantity</label>
                                            <h4><?= ( true == isVal( $arrLabReportDetails['quantity'] ) ) ? $arrLabReportDetails['quantity'] : 'NA' ?></h4>
                                        </div>    
                                    </div>
                            
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Exporter</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['exporter'] ) ) ? $arrLabReportDetails['exporter'] : 'NA' ?></h4>
                                        </div>    
                                        <div class="form-group col-md-4">
                                            <label>Invoice Number</label>
                                            <h4><?= ( true == isVal( $arrLabReportDetails['invoice_number'] ) ) ? $arrLabReportDetails['invoice_number'] : 'NA' ?></h4>
                                        </div>    
                                        <div class="form-group col-md-4">
                                            <label>Sampling Location</label>
                                            <h4><?= ( true == isVal( $arrLabReportDetails['sampling_location'] ) ) ? $arrLabReportDetails['sampling_location'] : 'NA' ?></h4>
                                        </div>    
                                    </div>
                            
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Type of Sample</label>
                                            <h4><?= ( true == isStrVal( $arrLabReportDetails['type_of_sample'] ) ) ? $arrLabReportDetails['type_of_sample'] : 'NA' ?></h4>
                                        </div>    
                                        <div class="form-group col-md-4">
                                            <label>Seal Number</label>
                                            <h4><?= ( true == isVal( $arrLabReportDetails['seal_number'] ) ) ? $arrLabReportDetails['seal_number'] : 'NA' ?></h4>
                                        </div>    
                                    </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-md-12 center">
                                        <h3>Ooops...! No Data found</h3>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->  

