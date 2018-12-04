					<?php
					
						include ("includes/db.php");	
						$msg = "";
						$name= "";  $profile=""; 
						$farmeranme =""; $mobile =""; $prodtype =""; $city=""; $deltype=""; $address="";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `farmer_register` where `id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$farmeranme=$row["farmer_name"];
							$mobile = $row["mobile"];
							$city = $row["city_id"];
							$prodtype = $row["producttype"];
							$address = $row["address"];
							$deltype = $row["deltype"];
							
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `farmer_register` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
					       
							$farmer = $_POST["farname"];
						    $mobile = $_POST["mobile"];
							$prodtype = "";
						    $address = $_POST["address"];
							$city = $_POST["city"];
							$deltype= $_POST["deltype"];
							$date = date("Y-m-d");
							
							$farmer = mysqli_real_escape_string($db, $farmer);
							$mobile = mysqli_real_escape_string($db, $mobile);
							$city = mysqli_real_escape_string($db, $city);
							$prodtype = mysqli_real_escape_string($db, $prodtype);
							$address = mysqli_real_escape_string($db, $address); 
							$deltype = mysqli_real_escape_string($db, $deltype);
							
							

							 if(empty($farmer) || empty($mobile) || empty($address) || empty($city))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `farmer_register`(`id`,`city_id`, `farmer_name`, `mobile`, `producttype`, `address`, `deltype`, `date`, `status`) VALUES ('','$city','$farmer','$mobile','$prodtype','$address','$deltype','$date','')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Farmer Registered successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						   
							$farmer = $_POST["farname"];
						    $mobile = $_POST["mobile"];
							$prodtype = "";
						    $address = $_POST["address"];
							$city = $_POST["city"];
							$deltype= $_POST["deltype"];
							$date = date("Y-m-d");
							
							$farmer = mysqli_real_escape_string($db, $farmer);
							$mobile = mysqli_real_escape_string($db, $mobile); 
							$city = mysqli_real_escape_string($db, $city);
							$prodtype = mysqli_real_escape_string($db, $prodtype);
							$address = mysqli_real_escape_string($db, $address); 
							$deltype = mysqli_real_escape_string($db, $deltype);
					
					
					
								
						  
							 $query = mysqli_query($db, "UPDATE `farmer_register` SET `farmer_name`='$farmer',`city_id`='$city',`mobile`='$mobile',`producttype`='$prodtype',`address`='$address',`deltype`='$deltype',`date`='$date' WHERE `id` ='$id'");
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Farmer Information Updated successfully.</div>"; 
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
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Farmer Name : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<input type="text" name="farname" id="form-field-1-1" placeholder="Enter Farmer Name" class="col-xs-12" value="<?php echo $farmeranme;?>"/>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Mobile no : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<input type="text" name="mobile" id="form-field-1-1" placeholder="Enter mobile No" class="col-xs-12" value="<?php echo $mobile;?>"/>
										</div>
									</div>
									
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Address: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="address" id="form-field-1-1" placeholder="Enter address" class="col-xs-12" value="<?php echo $address;?>"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  City: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select name="city" id="city" class="col-xs-12">
											<?php 
											if($registerid == 1)
											{
												?>
												<option>select city</option>
												<?php 
											$sql = "select `id`,`city_name` from `city` order by city_name ASC";
											}
											else
											{

											$sql ="select `id`,`city_name` from `city` where `id`= '$cityid'";
										    }
								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{?>
											<option value="<?php echo $row['id'] ?>" <?php if($row['id'] == $city){ echo "selected='selected'"; }?>> <?php echo $row['city_name']?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
										</div>
									</div>
											
								</div>
									
									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Delivery Type: <font style="color:red"> </font></label>

										<div class="col-sm-8">
										<input type="text" name="deltype" id="form-field-1-1" placeholder="Enter Delivery Type" class="col-xs-12" value="<?php echo $deltype;?>"/>
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
												Save
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

								$sql = "SELECT d.*,c.`city_name` from `farmer_register` d,`city` c where d.`city_id`=c.`id`";
								}
								else
								{
									$sql = "SELECT d.*,c.`city_name` from `farmer_register` d,`city` c where d.`city_id`=c.`id` And d.`city_id`='$cityid'";	
								}
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>City</th>
										<th>Mobile</th>
										<th>Address</th>
										<th>Date</th>	
										<th>Edit</th>	
										<th>Delete</th>	
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
										<td><?php echo $row["mobile"];?></td> 
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['date'];?></td>
										<td><a href="farmerregist.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="farmerregist.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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