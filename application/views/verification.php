<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en"><?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mera Kisan Organic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- font awesome -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js">
	</script>
	<script type="text/javascript">
	
$(document).ready(function() {
	$('#example').DataTable();
} );

	</script>
  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<body>
  <!-- header -->
  <?php $this->load->view('includes/header1');?>
  
  <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h2 class="text-center text-green ptb-30" style=" background-color:#7C8B2E;">Verification</h2>
          </div>
        </div><br><br>
 


<div class="table-responsive">
<table id="example"  class="table table-striped table-bordered" width="100%" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>User Type</th>
        <th>View</th>
        <th>Action</th>
    </tr>
   
<?php foreach($results  as $row): ?>
 <tr>
<td><?php echo $row->id; ?></td>&nbsp;&nbsp;
<td><?php echo $row->user_id; ?></td>&nbsp;&nbsp;
<td><?php echo $row->user_name; ?></td>&nbsp;&nbsp;
<td><?php echo $row->user_type; ?></td>&nbsp;&nbsp;
<td><a target="_blank" href="#" class="btn btn-warning btn-xs">view</a></td>&nbsp;&nbsp;
<td><?php if($row->verification==1){
								?>
			  <a href="#" class="btn btn-success btn-xs" disabled="disabled">Verified</a>
<?php } else if($row->verification==2){ ?>
   	                <a href="#" class="btn btn-danger btn-xs" disabled="disabled">Rejected</a>
<?php } else { ?>
	<a href="<?php echo base_url(); ?>verification/<?php echo $row->id; ?>" class="btn btn-success btn-xs" id="one" onclick="return confirm('Are you sure you want to verify this <?php echo $row->user_type; ?>?');" >Accept</a>&nbsp;&nbsp;
    <a href="<?php echo base_url(); ?>verification/<?php echo $row->id; ?>" class="btn btn-danger btn-xs" id="two" onclick="return confirm('Are you sure you want to reject this <?php echo $row->user_type; ?>?');" >Reject</a>

 <?php }  ?>
</td>&nbsp;&nbsp;
</tr>
<?php endforeach; ?>

</table>

</div>
<script type="text/javascript">        
$(document).ready(function(){

$("#one").on('click', function(e){
    e.preventDefault(); // this will prevent the defualt behavior of the button

    // find which button was clicked
    butId = $(this).attr('id');

    $.ajax({
          method: "POST",
          url: "verification/create_verification",
          data: { button: butId }
        })
      .done(function( msg ) {
        // do something
      });        
});

$("#two").on('click', function(e){
    e.preventDefault(); // this will prevent the defualt behavior of the button

    // find which button was clicked
    butId = $(this).attr('id');

    $.ajax({
          method: "POST",
          url: "verification/create_verification1",
          data: { button: butId }
        })
      .done(function( msg ) {
        // do something
      });        
});

});
</script>
</body>
</html>
