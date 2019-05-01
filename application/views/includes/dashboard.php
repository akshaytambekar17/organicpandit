


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Merakisan- Admin</title>
        
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
        <meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
	.modal-footer{background-color:#fff;
	border-top:none;}
	input[type=radio]{
    border-radius: 50%;

}
/*.right {
	 margin-left:500px;
}*/

.big{ width: 10px; height: 10px; }
/*.hideshow{ display:none; }*/
	</style>
	
	
	</head>

	<body class="no-skin">

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>


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
							<li class="active">Dashboard</li>
							<!--<li><a href="http://www.shopping.merakisan.com/merakisan_admin/addofferproduct.php?new=addnew"><button class="btn btn-success" name="new">Add new Product </button></a></li>-->
							
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
					
					 <!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		

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
				
				$("#productadd").toggle();
			
			});	
		});
	</script>

 <div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Dashboard
							<small>
								<i class="icon-double-angle-right"></i>
								overview &amp; stats
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<!--<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>

								Welcome to
								<strong class="green">
									Ace
									<small>(v1.1.2)</small>
								</strong>
								,
 the lightweight, feature-rich and easy to use admin template.
							</div>-->

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="span7 infobox-container">
									
									<a href=""><div class="infobox infobox-pink ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-leaf icon-leaf"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Farmers</div>
										</div>
                                        </div></a>
										
										<a href=""><div class="infobox infobox-blue2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-stack-exchange icon-stack-exchange"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of FPO</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-pagelines icon-pagelines"></i>
										</div>
										<div class="infobox-data">
								<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Trader</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-users icon-users"></i>
										</div>
										<div class="infobox-data">
								<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Processor</div>
										</div>
									</div></a>

                                   	<a href=""><div class="infobox infobox-black  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-cart icon-shopping-cart"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Buyer</div>
										</div>
									</div></a>


									<a href=""><div class="infobox infobox-blue  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-question icon-question"></i>
										</div>
										<div class="infobox-data">
										<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Org. Consultants</div>
										</div>
									</div></a>
								
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-keyboard-o icon-keyboard-o"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Org. Input</div>
										</div>
									</div></a>

								    <a href=""><div class="infobox infobox-purple  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-truck icon-truck"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Packaging</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-pink  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-user icon-user"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Logistics</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-anchor icon-anchor"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Farm Equipment</div>
										</div>
									</div></a>
    
                                      <a href=""><div class="infobox infobox-blue2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-eye icon-eye"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Exhibitors</div>
										</div>
									</div></a>								

                                      <a href=""><div class="infobox infobox-green2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-cart icon-shopping-cart"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Shops</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-black  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-flask icon-flask"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Labs</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-building-o icon-building-o"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Gov. Agencies</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-university icon-university"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Institutions</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-purple  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-user icon-user"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Others</div>
										</div>
									</div></a> 
									
									<a href=""><div class="infobox infobox-pink  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-cutlery icon-cutlery"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of Restaurants</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-sitemap icon-sitemap"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"></span>
											<div class="infobox-content">No of NGO</div>
										</div>
									</div></a>

									<div class="space-6"></div>

									<!--<div class="infobox infobox-green infobox-small infobox-dark">
										<div class="infobox-progress">
											<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
												<span class="percent">61</span>
												%
											</div>
										</div>

										<div class="infobox-data">
											<div class="infobox-content">Task</div>
											<div class="infobox-content">Completion</div>
										</div>
									</div>

									<div class="infobox infobox-blue infobox-small infobox-dark">
										<div class="infobox-chart">
											<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
										</div>

										<div class="infobox-data">
											<div class="infobox-content">Earnings</div>
											<div class="infobox-content">$32,000</div>
										</div>
									</div>

									<div class="infobox infobox-grey infobox-small infobox-dark">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-download icon-download-alt"></i>
										</div>

										<div class="infobox-data">
											<div class="infobox-content">Downloads</div>
											<div class="infobox-content">1,205</div>
										</div>
									</div>-->
								</div>

								<div class="vspace"></div>

								
							</div><!--/row-->
							<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/flot/jquery.flot.min.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.min.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "User Packages",  data:<?php echo (round($X));?>, color: "#68BC31"},
				{ label: "Post Requirement",  data: <?php echo (round($Y));?>, color: "#2091CF"},
				{ label: "Bid Packages",  data: <?php echo (round($Z));?>, color: "#DA5430"}
				//{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				//{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="toolti