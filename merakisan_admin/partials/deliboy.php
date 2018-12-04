					<?php
					
						include ("includes/db.php");	
						$msg = "";
						$name= "";  $profile="";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `delivery_boy` where `id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$farmeranme=$row["name"];
							$mobile = $row["mobile"];
							$city = $row["city_id"];
							$prodtype = $row["vehicle"];
							$address = $row["address"];
							$deltype = $row["email"];
							$username = $row["username"];
							$password = $row["password"];
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `delivery_boy` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
					       
							$farmer = $_POST["farname"];
						    $mobile = $_POST["mobile"];
							$prodtype = $_POST["producttype"];
						    $address = $_POST["address"];
							$city = $_POST["city"];
							$deltype= $_POST["deltype"];
							$username = $_POST["username"];
							$password = $_POST["password"];
							$date = date("Y-m-d");
							
							$farmer = mysqli_real_escape_string($db, $farmer);
							$mobile = mysqli_real_escape_string($db, $mobile);
							$city = mysqli_real_escape_string($db, $city);
							$prodtype = mysqli_real_escape_string($db, $prodtype);
							$address = mysqli_real_escape_string($db, $address); 
							$deltype = mysqli_real_escape_string($db, $deltype);
							$username = mysqli_real_escape_string($db, $username);
							$password = mysqli_real_escape_string($db, $password);
							
							

							 if(empty($farmer) || empty($mobile) || empty($prodtype) || empty($city) || empty($username) || empty($password))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `delivery_boy`(`id`,`city_id`, `name`,`username`,`password`, `mobile`, `vehicle`, `address`, `email`, `date`) VALUES ('','$city','$farmer','$username','$password','$mobile','$prodtype','$address','$deltype','$date')");

							 		//Send SMS
											$ch = curl_init();
											$user = "merakisan";
											$pass = "merakisan";
											$receipientno = $mobile;
											$senderID ="MKISAN"; 
											$dtime;
											$msgtxt = 'Your MeraKisan Username:'.$username.' Password:'.$password;
											$string = "userid=$user&password=$pass&sender=$senderID&mobileno=$receipientno&msg=$msgtxt&msgtype=0&sendon=$dtime";
											curl_setopt($ch,CURLOPT_URL,  "http://web.sms2india.in/websms/sendsms.aspx?");
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
											
										   $buffer = curl_exec($ch);
												//  print_r($buffer);die;
											if(empty ($buffer)){ 
												echo " buffer is empty "; 
											}
											curl_close($ch);
									//End SMS code	
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Delivery Boy Registered successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						   
							$farmer = $_POST["farname"];
						    $mobile = $_POST["mobile"];
							$prodtype = $_POST["producttype"];
						    $address = $_POST["address"];
							$city = $_POST["city"];
							$deltype= $_POST["deltype"];
							$username = $_POST["username"];
							$password = $_POST["password"];
							$date = date("Y-m-d");
							
							$farmer = mysqli_real_escape_string($db, $farmer);
							$mobile = mysqli_real_escape_string($db, $mobile); 
							$city = mysqli_real_escape_string($db, $city);
							$prodtype = mysqli_real_escape_string($db, $prodtype);
							$address = mysqli_real_escape_string($db, $address); 
							$deltype = mysqli_real_escape_string($db, $deltype);
							$username = mysqli_real_escape_string($db, $username);
							$password = mysqli_real_escape_string($db, $password);
					
							 if(empty($farmer) || empty($mobile) || empty($prodtype) || empty($city) || empty($username) || empty($password))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
					
							 $query = mysqli_query($db, "UPDATE `delivery_boy` SET `name`='$farmer',`username` = '$username',`password` = '$password',`city_id`='$city',`mobile`='$mobile',`vehicle`='$prodtype',`address`='$address',`email`='$deltype',`date`='$date' WHERE `id` ='$id'");

							 	//Send SMS
											$ch = curl_init();
											$user = "merakisan";
											$pass = "merakisan";
											$receipientno = $mobile;
											$senderID ="MKISAN"; 
											$dtime;
											$msgtxt = 'Your New MeraKisan Username:'.$username.' Password:'.$password;
											$string = "userid=$user&password=$pass&sender=$senderID&mobileno=$receipientno&msg=$msgtxt&msgtype=0&sendon=$dtime";
											curl_setopt($ch,CURLOPT_URL,  "http://web.sms2india.in/websms/sendsms.aspx?");
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
											
										   $buffer = curl_exec($ch);
												//  print_r($buffer);die;
											if(empty ($buffer)){ 
												echo " buffer is empty "; 
											}
											curl_close($ch);
									//End SMS code	
							}
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Information Updated successfully.</div>"; 
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
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Delivery Boy Name : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<input type="text" name="farname" id="form-field-1-1" placeholder="Enter Delivery Boy Name" class="col-xs-12" value="<?php echo $farmeranme;?>"/>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Mobile no : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<input type="text" name="mobile" id="form-field-1-1" placeholder="Enter mobile No" class="col-xs-12" value="<?php echo $mobile;?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Username: <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<input type="text" name="username" id="form-field-1-1" placeholder="Enter Username" class="col-xs-12" value="<?php echo $username;?>"/>
										</div>
									</div>
									
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Vehicle Type: <font style="color:red"> </font></label>
										<div class="col-sm-8">
											<input type="text" name="producttype" id="form-field-1-1" placeholder="Enter Vehicle Type" class="col-xs-12" value="<?php echo $prodtype;?>"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  City For Work: <font style="color:red">*</font></label>
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

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Password: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="password" name="password" id="form-field-1-1" placeholder="Enter Password" class="col-xs-12" value="<?php echo $password;?>"/>
										</div>
									</div>
											
								</div>
									
									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Email: <font style="color:red"> </font></label>

										<div class="col-sm-8">
										<input type="text" name="deltype" id="form-field-1-1" placeholder="Enter Delivery Type" class="col-xs-12" value="<?php echo $deltype;?>"/>
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Address: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="address" id="form-field-1-1" placeholder="Enter address" class="col-xs-12" value="<?php echo $address;?>"/>
											
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

								$sql = "SELECT d.*,c.`city_name` from `delivery_boy` d,`city` c where d.`city_id`=c.`id`";
								}
								else
								{
									$sql = "SELECT d.*,c.`city_name` from `delivery_boy` d,`city` c where d.`city_id`=c.`id` And d.`city_id`='$cityid'";	
								}
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Username</th>
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
										<td><?php echo $row["name"];?></td>
										<td><?php echo $row["username"];?></td>
										<td><?php echo $row["city_name"];?></td>
										<td><?php echo $row["mobile"];?></td> 
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['date'];?></td>
										<td><a href="delivery.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="delivery.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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