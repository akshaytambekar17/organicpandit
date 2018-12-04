<?php session_start(); 
$name=$_SESSION['name'];
$registerid = $_SESSION['registerid'];
$cityid = $_SESSION['cityid']; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Organicpandit- Admin</title>

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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style>
	.modal-footer{background-color:#fff;
	border-top:none;}
	input[type=radio]{
    border-radius: 50%;

}
.right {
	 margin-left:500px;
}

.big{ width: 10px; height: 10px; }
.hideshow{ display:none; }
	</style>
	
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#ctaegory').on('change',function(){
			
			var subid = $("#ctaegory").val();
			$.ajax({
				
				type:'POST',
				url:'ajaxsubvat.php',
				data:'subid='+subid,
				success:function(data){
					 $('#subcat').html(data);
				}
			});
			});	
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#show').click(function(){
				
				$("#addfarmer").toggle();
			
			});	
		});
	</script>
	</head>

	<body class="no-skin">
		<?php require_once("master/headside.php");?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php include("includes/sidebar.php");?>
		
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<a href="#">Admin</a>
							</li>
							<li class="active">Farmer</li>
						<!--	<li> <button class="right btn btn-success" id="show">Add Farmer</button></li> -->
							<li><a href="exportfarmer.php"><button class="btn btn-success">Export</button></a></li>

						</ul><!-- /.breadcrumb -->
                         
						<div class="nav-search" id="nav-search">
							<!--<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>								</span>
							</form>-->
						</div><!-- /.nav-search -->
					</div>
					
					<!-- ******************* Start page-content *******************-->
					
					<?php require_once("partials/farmerlist.php");?>
					<!-- ******************* /.page-content *******************-->
				
				</div>
			</div><!-- /.main-content -->
			

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>	
			</div><!-- /.main-container -->

		

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<!-- page specific plugin scripts -->
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		
		<script src="assets/js/grid.locale-en.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
	</body>
</html>
