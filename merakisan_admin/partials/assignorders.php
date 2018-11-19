					<?php
					include ("includes/db.php");
					?>
					
					
					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								
								if(empty($cityid))
								{
									$sql = "SELECT c.`city_name`, p.`name`,f.`farmer_name`,a.`assigndate`,a.`assigntime`,a.`acceptdate` FROM `assignorder` a JOIN `offer_productlist` p ON a.`product_id` = p.`product_id` JOIN `farmer_register` f ON a.`farmername` = f.`id` JOIN `city` c ON c.`id`= a.`city_id`";
								}
								else
								{

								$sql = "SELECT c.`city_name`,p.`name`,f.`farmer_name`,a.`assigndate`,a.`assigntime`,a.`acceptdate` FROM `assignorder` a JOIN `offer_productlist` p ON a.`product_id` = p.`product_id` JOIN `farmer_register` f ON a.`farmername` = f.`id` JOIN `city` c ON c.`id`= a.`city_id` WHERE f.`city_id`='$cityid'";
								}
								
								
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>City</th>
										<th>Farmer Name</th>
										<th>Product Name</th>
										<th>Assign Date</th>
										<!--<th>Accept Date</th>-->
									  </tr>  
									</thead>  
									<tbody> 
									
									<?php
									$no= 1;
									while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
									{
									?>
										<tr>
										<td><?php echo $no; ?></td>  
										<td><?php echo $row["city_name"];?></td>
										<td><?php echo $row["farmer_name"];?></td>
										<td><?php echo $row["name"]; ?> </td> 
										<td><?php echo $row['assigndate'];?></td>
										<!--<td><?php //echo $row["assigntime"]; ?> </td> 
										<td><?php //echo $row["acceptdate"]; ?> </td> -->
										</tr> 
									<?php
									$no++;
									}
									?>      
									</tbody>  
								</table>  
								  
								<script>
								$(document).ready(function(){
									$('#myTable').dataTable();
								});
								</script>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
					</div>