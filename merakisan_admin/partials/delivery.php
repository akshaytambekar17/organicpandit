					<?php 
					if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `product_offer` where `offer_id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
							
						}
					
					?>
					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								if($registerid == 1)
								{ 
								$sql = "SELECT d.`city_id`,d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id`";
								}
							    else{
							    	$sql = "SELECT d.`city_id`,d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id` where d.`city_id`='$cityid'";
							    }
								$rs_result = mysqli_query($db,$sql);  
								
								?>
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Order Id</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Payment Type</th>
										<th>Delivery Address</th>
										<th>Status</th>
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
										<td><?php echo $row["order_id"]; ?></td>
										<td><?php echo $row["name"]; ?> </td>
										<td><?php echo $row["mobile"]; ?> </td>
										<td><?php echo $row["payment_type"]; ?> </td>
										<td><?php echo $row["shipping_address"]; ?> </td>
										<td>  <a href="#" id="<?php echo $row['order_id']; ?>" data-toggle="modal" data-target="#myModal"><?php if ($row['order_status']==0){ ?> <span style="color:#ff0000"><?php echo "Processing";?> </span><?php }elseif($row['order_status']==1){ ?> <span style="color:#0000ff"> <?php echo "Complete"; ?></span><?php }else{ ?> <span style="color:#007700"> <?php echo "Assigned"; ?></span> <?php  }?></a></td>
										<td><?php echo $row["delivari_date"]; ?> </td>
										
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