					<?php
					$cityid = $_SESSION['cityid'];
						include ("includes/db.php");	
						$msg = "";
						$pid="";
						$price_unit ="";
						$name= "";  $profile="";
						if(isset($_GET['pid']))
						{
							$pid= $_GET['pid'];
						}


						if(isset($_POST["submit"]))
						{	
					       
							 $farmer = $_POST["farmer"];
						     $product = $_POST["product"];
							 $minimum = $_POST["min"];
						     $maximun = $_POST["max"];
							 $unit= $_POST["priceunit"]; 
							$date = date("Y-m-d");
							
							$farmer = mysqli_real_escape_string($db, $farmer);
							$product = mysqli_real_escape_string($db, $product); 
							$minimum = mysqli_real_escape_string($db, $minimum);
							$maximun = mysqli_real_escape_string($db, $maximun); 
							$unit = mysqli_real_escape_string($db, $unit);
							
							

							 if(empty($farmer) || empty($product) || empty($minimum) || empty($maximun) || empty($unit))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `farmer_capacity`(`id`, `farmer_id`, `product_id`, `minimum`, `maximum`, `unit`) VALUES ('','$farmer','$product','$minimum','$maximun','$unit')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Added  successfully.</div>"; 
								}
							} 
						}
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
	
								<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Select Farmer : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<select name="farmer" id="ctaegory" class="col-xs-12">
											<option>Select Farmer</option>
											<?php 
											if($registerid == 1)
											{
											  	$sql = "select `id`,`farmer_name` from `farmer_register`";
										    }
										    else
										    {
										    
										    	$sql = "select `id`,`farmer_name` from `farmer_register` WHERE `city_id`='$cityid'";
										    }
								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{?>
											<option value="<?php echo $row['id']; ?>"> <?php echo $row['farmer_name'];?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
										</div>
									</div>
									
									
									
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Select product : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<select name="product" id="product" class="col-xs-12">
											<option>Select Product</option>
											<?php 
											if($registerid == 1)
											{

											$sql = "SELECT p.product_id,p.name FROM `offer_productlist` p, `product_subadmin` ps , `city` c WHERE p.`product_id` = ps.`product_id` AND ps.city_id = c.id ";
										   }
										   else
										   {
										   	$sql = "SELECT p.product_id,p.name FROM `offer_productlist` p, `product_subadmin` ps , `city` c WHERE p.`product_id` = ps.`product_id` AND ps.city_id = c.id AND ps.city_id = '$cityid'";
										   }
												$rs_result = mysqli_query($db,$sql); 
												while($row=mysqli_fetch_array($rs_result))
												{ ?>
											<option value="<?php echo $row['product_id']; ?>" <?php if($row['product_id'] == $pid) { echo "selected = selected";}?>> <?php echo $row['name'];?></option> 
											<?php } ?>
									  
									  
											</select>
										</div>
									</div>

									
				
									
									
									</div>
								<div class="col-md-4">
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Maximun: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="max" id="form-field-1-1" placeholder="Enter Maximum Order" class="col-xs-12" value="<?php //echo $mobile;?>"/>
										</div>
									</div>

									<div class="form-group">
									
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Minimum: <font style="color:red">*</font></label>

										<div class="col-sm-8">
										<input type="text" name="min" id="form-field-1-1" placeholder="Enter Minimum Order" class="col-xs-12" value="<?php //echo $deltype;?>"/>
										</div>
										
									</div>

									
									</div>
									
									<div class="col-md-4">
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Unit : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select name="priceunit">
											<option value=""> Select Unit </option>
											
											<option value="gm" <?php if($price_unit =='gm'){ echo "selected='selected'"; }?>>GM</option>
											<option value="liter" <?php if($price_unit =='liter'){ echo "selected='selected'"; }?>>LITER</option>
											<option value="kg" <?php if($price_unit =='kg'){ echo "selected='selected'"; }?>>KG</option>
											<option value="unit"<?php if($price_unit == 'unit'){ echo "selected='selected'"; }?>>UNIT</option>
											<option value="piece"<?php if($price_unit == 'piece'){ echo "selected='selected'"; }?>>PIECE</option>
											<option value="bunch"<?php if($price_unit == 'bunch'){ echo "selected='selected'"; }?>>BUNCH</option>
											<option value="douzen"<?php if($price_unit == 'douzen'){ echo "selected='selected'"; }?>>DOUZEN</option>
										</select>
											
										</div>
									</div>
									
                                    </div>

								
									</div>
<!--***************************** End of Auditee Person ******************************************-->									
										
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<?php if(isset($_GET['id'])) { ?>
											<button class="btn btn-info" type="submit" name="update" onSubmit="return ValidateForm()">
											
												<i class="ace-icon fa fa-check bigger-110"></i>
												Update
											</button>
											
											<?php } else { ?>
											<button class="btn btn-info" type="submit" name="submit" onSubmit="return ValidateForm()">
											
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
											<?php } ?>	
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset" name="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>
								
							
							</div><!-- /.col -->
						</div><!-- /.row -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php

									if($registerid == 1)
									{
										
									$sql = "SELECT ct.`city_name`, f.`farmer_name`,o.`name`,c.`minimum`,c.`maximum`,c.`unit` FROM `farmer_capacity` c JOIN `farmer_register` f  ON c.`farmer_id`=f.`id` JOIN `offer_productlist` o ON c.`product_id`=o.`product_id` JOIN `city` ct ON ct.`id`=f.`city_id`";
								  }
								  else
								  {
								  		$sql = "SELECT ct.`city_name`,f.`farmer_name`,o.`name`,c.`minimum`,c.`maximum`,c.`unit` FROM `farmer_capacity` c JOIN `farmer_register` f  ON c.`farmer_id`=f.`id` JOIN `offer_productlist` o ON c.`product_id`=o.`product_id` JOIN `city` ct ON ct.`id`=f.`city_id` AND f.`city_id`='$cityid'";
								 }
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Farmer Name</th>
										<th>City</th>
										<th>Product Name</th>
										<th>Minimum</th>
										<th>Maximum</th>	
										<th>Unit</th>	
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
										<td><?php echo $row["farmer_name"];?></td>
										<td><?php echo $row["city_name"];?></td>
										<td><?php echo $row["name"];?></td> 
										<td><?php echo $row['minimum'];?></td>
										<td><?php echo $row['maximum'];?></td>
										<td><?php echo $row['unit'];?></td>
										
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