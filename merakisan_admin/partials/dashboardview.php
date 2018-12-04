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
	<?php
       /*     $sql2=mysqli_query($db,"select count(*) from orderdetail where payment_type='COD'");
			$row=mysqli_fetch_array($sql2,MYSQLI_ASSOC);
			$COD=$row['count(*)']; 
			$sql3=mysqli_query($db,"select count(*) from orderdetail where  payment_type='ONLINE'");
			$row=mysqli_fetch_array($sql3,MYSQLI_ASSOC);
			$ONLINE=$row['count(*)']; 
			$sql4=mysqli_query($db,"select count(*) from orderdetail where  payment_type='CANCEL'  ");
			$row1=mysqli_fetch_array($sql4,MYSQLI_ASSOC);
			$sql5=mysqli_query($db,"select count(*) from orderdetail where  payment_type='BACKPRESSEDCODE' ");
			$row2=mysqli_fetch_array($sql5,MYSQLI_ASSOC);
			$sql6=mysqli_query($db,"select count(*) from orderdetail where  payment_type='USER CANCEL' ");
			$row3=mysqli_fetch_array($sql6,MYSQLI_ASSOC);
			$CANCEL=$row1['count(*)']+$row2['count(*)']+$row3['count(*)']; 

			$X = $COD;

			$Y = $ONLINE;

			$Z = $CANCEL;*/

           
            
            $sql5=mysqli_query($db,"select count(*) from tbl_farmer where `id`>0");
			$row=mysqli_fetch_array($sql5,MYSQLI_ASSOC);
			$FARMER=$row['count(*)']; 
			$a = $FARMER;
			
		 	$sql6=mysqli_query($db,"select count(*) from tbl_fpo where `id`>0");
			$row=mysqli_fetch_array($sql6,MYSQLI_ASSOC);
			$FPO=$row['count(*)']; 
			$b = $FPO;

            $sql7=mysqli_query($db,"select count(*) from tbl_trader where `id`>0");
		    $row=mysqli_fetch_array($sql7,MYSQLI_ASSOC);
			$TRADER=$row['count(*)']; 
			$c = $TRADER;
			
			$sql8=mysqli_query($db,"select count(*) from tbl_processor where `id`>0");
			$row=mysqli_fetch_array($sql8,MYSQLI_ASSOC);
			$PROCESSOR=$row['count(*)']; 
            $d = $PROCESSOR;

			$sql9=mysqli_query($db,"select count(*) from tbl_buyer where `id`>0");
			$row=mysqli_fetch_array($sql9,MYSQLI_ASSOC);
			$BUYER=$row['count(*)']; 
			$e = $BUYER;
			
			$sql10=mysqli_query($db,"select count(*) from tbl_org_consultant where `id`>0");
			$row=mysqli_fetch_array($sql10,MYSQLI_ASSOC);
			$CONSULTANT=$row['count(*)']; 
            $f = $CONSULTANT;
			
			$sql11=mysqli_query($db,"select count(*) from tbl_org_input where `id`>0");
			$row=mysqli_fetch_array($sql11,MYSQLI_ASSOC);
			$INPUT=$row['count(*)']; 
            $g = $INPUT;
            
			$sql12=mysqli_query($db,"select count(*) from tbl_packaging where `id`>0");
			$row=mysqli_fetch_array($sql12,MYSQLI_ASSOC);
			$PACKAGING=$row['count(*)'];
			$h = $PACKAGING;

            $sql13=mysqli_query($db,"select count(*) from tbl_logistic where `id`>0");
			$row=mysqli_fetch_array($sql13,MYSQLI_ASSOC);
			$LOGISTIC=$row['count(*)'];
			$i = $LOGISTIC;
			
			$sql14=mysqli_query($db,"select count(*) from tbl_equipment where `id`>0");
			$row=mysqli_fetch_array($sql14,MYSQLI_ASSOC);
			$EQUIPMENT=$row['count(*)'];
			$j = $EQUIPMENT;
			
			$sql15=mysqli_query($db,"select count(*) from tbl_exhibitors where `id`>0");
			$row=mysqli_fetch_array($sql15,MYSQLI_ASSOC);
			$EXHIBITORS=$row['count(*)'];
			$k = $EXHIBITORS;
			
			$sql16=mysqli_query($db,"select count(*) from tbl_shops where `id`>0");
			$row=mysqli_fetch_array($sql16,MYSQLI_ASSOC);
			$SHOPS=$row['count(*)'];
			$l = $SHOPS;
			
			$sql17=mysqli_query($db,"select count(*) from tbl_labs where `id`>0");
			$row=mysqli_fetch_array($sql17,MYSQLI_ASSOC);
			$LABS=$row['count(*)'];
			$m = $LABS;
			
			$sql18=mysqli_query($db,"select count(*) from tbl_gov_agency where `id`>0");
			$row=mysqli_fetch_array($sql18,MYSQLI_ASSOC);
			$AGENCY=$row['count(*)'];
			$n = $AGENCY;
			
			$sql19=mysqli_query($db,"select count(*) from tbl_institutions where `id`>0");
			$row=mysqli_fetch_array($sql19,MYSQLI_ASSOC);
			$INSTITUTION=$row['count(*)'];
			$o = $INSTITUTION;
			
			$sql20=mysqli_query($db,"select count(*) from tbl_others where `id`>0");
			$row=mysqli_fetch_array($sql20,MYSQLI_ASSOC);
			$OTHERS=$row['count(*)'];
			$p = $OTHERS;  
			
			$sql21=mysqli_query($db,"select count(*) from tbl_restaurant where `id`>0");
			$row=mysqli_fetch_array($sql21,MYSQLI_ASSOC);
			$RESTAURANT=$row['count(*)'];
			$q = $RESTAURANT;
			
			$sql22=mysqli_query($db,"select count(*) from tbl_ngo where `id`>0");
			$row=mysqli_fetch_array($sql22,MYSQLI_ASSOC);
			$NGO=$row['count(*)'];
			$r = $NGO;
			
			$sql22=mysqli_query($db,"select count(*) from tbl_certification where `id`>0");
			$row=mysqli_fetch_array($sql22,MYSQLI_ASSOC);
			$CERTIFICATION=$row['count(*)'];
			$cr = $CERTIFICATION;
			
			

           
           
 
 ?>
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
											<span class="infobox-data-number"><?php echo $a; ?></span>
											<div class="infobox-content">No of Farmers</div>
										</div>
                                        </div></a>
										
										<a href=""><div class="infobox infobox-blue2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-stack-exchange icon-stack-exchange"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $b; ?></span>
											<div class="infobox-content">No of FPO</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-pagelines icon-pagelines"></i>
										</div>
										<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $c; ?></span>
											<div class="infobox-content">No of Trader</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-users icon-users"></i>
										</div>
										<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $d; ?></span>
											<div class="infobox-content">No of Processor</div>
										</div>
									</div></a>

                                   	<a href=""><div class="infobox infobox-black  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-cart icon-shopping-cart"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $e ; ?></span>
											<div class="infobox-content">No of Buyer</div>
										</div>
									</div></a>


									<a href=""><div class="infobox infobox-blue  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-question icon-question"></i>
										</div>
										<div class="infobox-data">
										<span class="infobox-data-number"><?php echo $f ; ?></span>
											<div class="infobox-content">No of Org. Consultants</div>
										</div>
									</div></a>
								
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-keyboard-o icon-keyboard-o"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $g ?></span>
											<div class="infobox-content">No of Org. Input</div>
										</div>
									</div></a>

								    <a href=""><div class="infobox infobox-purple  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-truck icon-truck"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $h ?></span>
											<div class="infobox-content">No of Packaging</div>
										</div>
									</div></a>

									<a href=""><div class="infobox infobox-pink  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-user icon-user"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $i ?></span>
											<div class="infobox-content">No of Logistics</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-anchor icon-anchor"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $j ?></span>
											<div class="infobox-content">No of Farm Equipment</div>
										</div>
									</div></a>
    
                                      <a href=""><div class="infobox infobox-blue2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-eye icon-eye"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $k ?></span>
											<div class="infobox-content">No of Exhibitors</div>
										</div>
									</div></a>								

                                      <a href=""><div class="infobox infobox-green2  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-shopping-cart icon-shopping-cart"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $l ?></span>
											<div class="infobox-content">No of Shops</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-black  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-flask icon-flask"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $m ?></span>
											<div class="infobox-content">No of Labs</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-building-o icon-building-o"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $n ?></span>
											<div class="infobox-content">No of Gov. Agencies</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-red  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-university icon-university"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $o ?></span>
											<div class="infobox-content">No of Institutions</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-purple  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-user icon-user"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $p ?></span>
											<div class="infobox-content">No of Others</div>
										</div>
									</div></a> 
									
									<a href=""><div class="infobox infobox-pink  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-cutlery icon-cutlery"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $q ?></span>
											<div class="infobox-content">No of Restaurants</div>
										</div>
									</div></a>
									
									<a href=""><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-sitemap icon-sitemap"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $r ?></span>
											<div class="infobox-content">No of NGO</div>
										</div>
									</div></a>
									
									<a href="add-certification.php"><div class="infobox infobox-green  ">
										<div class="infobox-icon">
											<i class="ace-icon fa fa-sitemap icon-sitemap"></i>
										</div>
										<div class="infobox-data">
											<span class="infobox-data-number"><?php echo $cr ?></span>
											<div class="infobox-content">No of Certificatin Agency</div>
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

								<div class="span5">
									<div class="widget-box">
										<div class="widget-header widget-header-flat widget-header-small">
											<h5>
												<i class="icon-signal"></i>
												Payment Stats 
											</h5>

											<!--<div class="widget-toolbar no-border">
												<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
													This Week
													<i class="icon-angle-down icon-on-right"></i>
												</button>

												<ul class="dropdown-menu dropdown-info pull-right dropdown-caret">
													<li class="active">
														<a href="#">This Week</a>
													</li>

													<li>
														<a href="#">Last Week</a>
													</li>

													<li>
														<a href="#">This Month</a>
													</li>

													<li>
														<a href="#">Last Month</a>
													</li>
												</ul>
											</div>-->
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<div id="piechart-placeholder">
													
												</div>

												<div class="hr hr8 hr-double"></div>

												<div class="clearfix">
													<div class="grid3">
														<span class="grey">
															<i class="icon-facebook-sign icon-2x blue"></i>
															&nbsp; User Packages
														</span>
														<h4 class="bigger pull-right"><?php echo $X; ?></h4>
													</div>

													<div class="grid3">
														<span class="grey">
															<i class="icon-twitter-sign icon-2x purple"></i>
															&nbsp; Post Requirement 
														</span>
														<h4 class="bigger pull-right"><?php echo $Y; ?></h4>
													</div>

													<div class="grid3">
														<span class="grey">
															<i class="icon-pinterest-sign icon-2x red"></i>
															&nbsp; Bid Packages
														</span>
														<h4 class="bigger pull-right"><?php echo $Z; ?></h4>
													</div>
												</div>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
								</div><!--/span-->
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
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>