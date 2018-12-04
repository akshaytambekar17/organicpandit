					<?php
					?>
					
					
					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								$id = $_GET['id'];
								if(empty($cityid))
								{
								
								$sql = "SELECT `order_id`,`product_name`,`product_qty`,`offer_price`,`date` FROM `offer_order` WHERE `order_id`='$id'";
								}
								else
								{
									$sql = "SELECT `order_id`,`product_name`,`product_qty`,`offer_price`,`date` FROM `offer_order` WHERE `order_id`='$id' AND `city_id` = '$cityid'";
									
								}
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Product Name</th>
										<th>Product qty</th>
										<th>Price</th>
										<th>Date</th>
										
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
										<td><?php echo $row["product_name"];?></td>
										<td><?php echo $row['product_qty'];?></td>
										<td><?php echo $row["offer_price"]; ?> </td> 
										<td><?php echo $row["date"]; ?> </td> 
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