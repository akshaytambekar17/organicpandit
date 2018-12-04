					<?php
						include ("includes/db.php");
							
						$msg = "";
						$name= "";  $profile="";
						
						if(isset($_POST["order"]))
						{	
					       
						 $product = $_POST['product'];
						 $farmername = $_POST['farmername']; 
							 
							$date = date("Y-m-d");
							$time = date("H:s:i");
							
							$farmername = mysqli_real_escape_string($db, $farmername);
							$product = mysqli_real_escape_string($db, $product); 
							

							 if(empty($farmername) || empty($product))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `assignorder`(`id`, `city_id`, `product_id`, `farmername`, `assigndate`, `assigntime`, `status`) VALUES ('','$cityid','$product','$farmername','$date','$time','')");
							 
							$query1 = mysqli_query($db, "UPDATE `offer_order` SET `Assignstatus`='1' WHERE `product_id` ='$product'");
							
							$query1 = mysqli_query($db, "UPDATE `assignorder` SET `status`='1' WHERE `product_id` ='$product'");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Assigened  successfully.</div>"; 
								}
							} 
						}
						
						
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<!-- /.row -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								
								$date = date("Y-m-d");
								//$date = '2017-06-27';

								
								
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Product Name</th>
										<th>Total Unit</th>
										<th>Unit</th>	
										<th>Date</th>
										<th>Status</th>
										<th>Farmers</th>	
										<th>Assign</th>										
									  </tr>  
									</thead>  
									<tbody> 
									
									<?php

								if($_SESSION['registerid'] == 1)
								{

									$sql = "SELECT `product_id`,`date` From (SELECT * From `offer_order`GROUP BY `product_id`) As `x`  
ORDER BY `x`.`date`  ASC";

								}
								else
								{
								$sql = "SELECT `product_id`,`date` From (SELECT * From `offer_order`GROUP BY `product_id`) As `x`  
WHERE `x`.`city_id`='$cityid' ORDER BY `x`.`date`  ASC";
								}


								$rs_result = mysqli_query($db,$sql);  

									$no= 1;
									while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
									{
										
										$productid= $row['product_id'];
										$date = $row['date'];
										
										
						if($_SESSION['registerid'] == 1)
								{	
						$res = mysqli_query($db,"SELECT o.`Assignstatus`,o.`product_id`,o.`product_name`,sum(o.`product_qty`),p.`category`,p.`price_unit`,p.`farmername`,o.`date` FROM `offer_order` o JOIN `offer_productlist` p ON o.`product_id` = p.`product_id` WHERE o.`product_id`='$productid' AND o.`date` ='$date'");

								}
						else
						{							
				$res = mysqli_query($db,"SELECT o.`Assignstatus`,o.`product_id`,o.`product_name`,sum(o.`product_qty`),p.`category`,p.`price_unit`,p.`farmername`,o.`date` FROM `offer_order` o JOIN `offer_productlist` p ON o.`product_id` = p.`product_id` WHERE o.`product_id`='$productid' AND o.`date` ='$date' AND o.`city_id`='$cityid'");
						}
				
								$value = mysqli_fetch_array($res);
								$id= $value['product_id'];
								$prodname = $value['product_name'];
								$totalunit = $value['sum(o.`product_qty`)'] * $value['category'];
								$priceunit = $value['price_unit'];
								$farmername = $value['farmername'];
								$date = $value['date'];
									?>
										<tr>
										<td><?php echo $no; ?></td>  
										<td><?php echo $prodname;?></td>
										<td><?php echo $totalunit;?></td> 
										<td><?php echo $priceunit;?></td>
										<td><?php echo $date;?></td>
										<td><?php if($value['Assignstatus'] == 0){?><p class="<?php echo "red";?>">Not Assigned</p> <?php }  else{ ?> <p class="<?php echo "green";?>">Assigned</p><?php }?></td>
										<td><form class="form-horizontal" role="form" method="post" action="" name="form1">
										<select name="farmername" id="ctaegory" class="col-xs-12">
											<option>Select Farmer</option>
											<?php
												
										if($_SESSION['registerid'] == 1)
								{	
			$query = mysqli_query($db,"SELECT f.`farmer_id`,r.`farmer_name`,f.`minimum`,f.`maximum`,f.`unit` FROM `farmer_capacity` f JOIN `farmer_register` r ON f.`farmer_id` = r.`id` WHERE f.`product_id` = '$id'");
								}
								else
								{
			$query = mysqli_query($db,"SELECT f.`farmer_id`,r.`farmer_name`,f.`minimum`,f.`maximum`,f.`unit` FROM `farmer_capacity` f JOIN `farmer_register` r ON f.`farmer_id` = r.`id` WHERE f.`product_id` = '$id' AND r.`city_id`='$cityid'");	
								}
										
								    
										while($row=mysqli_fetch_array($query))
										{?>
											<option value="<?php echo $row['farmer_id'] ?>"> <?php echo $row['farmer_name']?>(<?php echo $row['minimum']."-".$row['maximum']." ".$row['unit']?>)</option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
										</td>
										<td>
										<!--<input type="hidden" name="farmername" value="<?php //echo $row['farmer_id'];?>">-->
										<input type="hidden" name="product" value="<?php echo $id;?>">
										<button name="order" class="btn btn-success">Assign</button>
										</form></td>
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