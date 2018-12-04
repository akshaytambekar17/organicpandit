<?php
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
  <!-- js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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
 
</head>
<body>
  <!-- header -->
  <?php $this->load->view('includes/header1');?>
  
  <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h2 class="text-center text-green ptb-30" style=" background-color:#7C8B2E;">Notification</h2>
          </div>
        </div><br><br>
 
<div class="table-responsive">
<table id="example"  class="table table-striped table-bordered" width="100%" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>User Type</th>
        <th>Notification</th>
        <th>Date</th>
    </tr>
   
<?php foreach($result  as $r): ?>
 <tr>
<td><?php echo $r->id; ?></td>&nbsp;&nbsp;
<td><?php echo $r->user_id; ?></td>&nbsp;&nbsp;
<td><?php echo $r->user_name; ?></td>&nbsp;&nbsp;
<td><?php echo $r->user_type; ?></td>&nbsp;&nbsp;
<td><?php echo $r->notify_type; ?></td>&nbsp;&nbsp;
<td><?php echo $r->date; ?></td>
 <!--<span><?php print_r($r->id);?></span>-->
</tr>
<?php endforeach; ?>

</table><br>
</div>
</div>
</body>
</html>