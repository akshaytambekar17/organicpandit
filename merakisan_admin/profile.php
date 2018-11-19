<?php session_start();
				$name=$_SESSION['name'];
				$id= $_SESSION['registerid'];
				$cityid= $_SESSION['cityid']; 
			
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Display Audit - Admin</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets1/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets1/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets1/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets1/css/ui.jqgrid.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets1/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets1/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets1/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style>
	input[type="radio"]{
   cursor: pointer;
   background: #FFF;
   border: 1px solid #d2d2d2;
			}

	</style>
	</head>
	
	<script type="text/javascript">
				$(document).ready(function(){
					$("#confirm").keyup(function(){
						var password = $("#pass").val().length;
						 var confirm = $("#confirm").val().length;
						
							if(password != confirm)
							{
								alert("passwort do not match");
							}
						
					});
				});
			</script>

	<body class="no-skin">
		<?php  
		require_once("master/headside.php");
		
		include ("includes/db.php");?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?php  
			     include("includes/sidebar.php");
			 ?>
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Admin</a>
							</li>
							<li class="active">Change Password</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
					<!-- Start-page-content -->	
					<?php 
					
					$msg="";
						$passmsg ="";
						if(isset($_POST['submit']))
						{
							$pass = $_POST['password'];
							$confirm = $_POST['confirmpass']; 
							
												
							if($pass == $confirm)
							{
							//echo $pass; die;
							$res12 = mysqli_query($db, "UPDATE `tbl_registration` SET `password`='$pass' WHERE `register_id`='$id'");
								
							if($res12)
							{
							$msg="<div class='alert alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-times'></i> &nbsp; your Password Updated Successfully.; </div>";
											
							}
							else	
							{
								$msg="<div class='alert alert-danger'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-times'></i> &nbsp; Sorry! your Password  Not Updated.; </div>";
							}			
							}
							else{
								$passmsg = "confirm password not match";
							}
						}			
										
					
					?>
					
					
					<div class="page-content">
						<div class="page-header">
							
						</div><!-- /.page-header -->
						<div class="panel panel-info"><!--start of panel-->					
						<div class="container-fluid"<!--start of container-->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								
							<div class="row">
								
								<form name="form" class="form-horizontal"  id="form" method="post" action="" enctype="multipart/form-data">
								<p style="color:red;"><?php echo $msg;?></p>
								<div class="form-roup">
							<center>	<p style="color:red"><?php echo $passmsg;?> </p> </center>
								<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right"><b>Password:</b></label>
								<div class="col-sm-3">
								<input type="password" name="password" class="form-control" value="" id="pass">
								</div>
								</div>
								<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right"><b>Confirm Password:</b></label>
								<div class="col-sm-3">
								<input type="password" name="confirmpass" id="confirm" class="form-control" value="">
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right"></label>
								<div class="col-sm-3">
								<input type="submit" value="submit" class="btn btn-success" name="submit">
								</div>
								</div>
								</div>
								</form>
							</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						</div>
					</div><!-- /.page-content -->
					<?php //require_once("partials/viewweek1.php");?>
					<!-- /.End-page-content -->
				</div>
			</div><!-- /.main-content -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		
	</body>
</html>
	