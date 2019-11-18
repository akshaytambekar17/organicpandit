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
                            <a href="<?= base_url()?>admin/lab-reports/add" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Lab Report</a>
                        </div>
                    </div>
                  <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover js-datatable-list">
                                <thead>
                                    <tr>
                                        <th class="hidden">Id</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Lab Name</th>
                                        <th>Date of Sampling</th>
                                        <th>Quantity</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if( true == isArrVal( $arrLabReportsList ) ) {
                                        foreach( $arrLabReportsList as $arrLabReportDetails ) {
                                ?>
                                            <tr class="gradeX">
                                                <td class="hidden"><?= $arrLabReportDetails['lab_report_id']; ?></td>
                                                <td><?= $arrLabReportDetails['category_name']; ?></td>
                                                <td><?= $arrLabReportDetails['product_name']; ?></td>
                                                <td><?= $arrLabReportDetails['lab_name']; ?></td>
                                                <td><?= date( 'd/m/Y', strtotime( $arrLabReportDetails['date_of_sampling'] ) ); ?></td>
                                                <td><?= $arrLabReportDetails['quantity']; ?></td>
                                                <td>
                                                    <a href="<?= base_url()?>lab-report-details?lab_report_id=<?= $arrLabReportDetails['lab_report_id'];?>" target="_blank">
                                                        <?= base_url() . 'lab-report-details?lab_report_id=' . $arrLabReportDetails['lab_report_id']  ?>
                                                    </a>    
                                                </td>
                                                <td>
                                                    <a href="<?= base_url()?>admin/lab-reports/update?lab_report_id=<?= $arrLabReportDetails['lab_report_id']?>"  name="update-lab-report" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="javascript:void(0)" data-lab_report_id="<?= $arrLabReportDetails['lab_report_id'] ?>" name="delete-lab-report" data-toggle="tooltip" title="Delete" onclick="showDeleteModal(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                    <h4> By clicking on <span>"YES"</span>, Lab Report will be deleted permanently. Do you wish to proceed?</h4><br><br>
                    <input  type="hidden" id="js-modal-lab-report-id"> 
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
            var intLabReportId = $("#js-modal-lab-report-id").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/lab-reports/delete",
                data: { 'lab_report_id' : intLabReportId },
                success: function( boolResult ){
                    $('#js-delete-confirmation-modal').modal('hide');
                    if( boolResult ) {
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.js-alert-message-box').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> Lab report has been deleted successfully. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                        setTimeout(function(){ 
                            location.reload();
                        }, 2000);
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
        var intLabReportId = $(ths).data('lab_report_id');
        $("#js-modal-lab-report-id").val( intLabReportId );
        $('#js-delete-confirmation-modal').modal('show');
    }
</script>
