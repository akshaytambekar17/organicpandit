<script>
/*
function getCity($id){
	alert();
	alert(id);
}
*/

</script>	
<script type="text/javascript">
  $(document).ready(function(){ 
    $("#state").change(function(){ 
      var stateid = $(this).val(); 
	$.ajax({ 
        type: "POST", 
        url: "ajaxData.php", 
        data: "stateid="+stateid, 
        success: function(result){ 
          $("#city").html(result); 
        }
      });
    });
  });
</script>	
		<?php
					
						include ("includes/db.php");	
						$msg = "";
						$name= "";  $profile="";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `tbl_registration` where `register_id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$name=$row["name"];
							$username = $row["username"];
						    $state = $row["state_id"];
							$city = $row["city_id"];
							$email = $row["emailid"];
							$address = $row["address"];
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `tbl_registration` where `register_id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
					       
							$name = $_POST["name"];
						    $username = $_POST["username"];
							$mobile = $_POST["mobile"];
							$pass = $_POST["password"];
						    $address = $_POST["address"];
							$state_id = $_POST['state_id'];
							$city = $_POST["city"];
							$email= $_POST["email"];
							$date = date("Y-m-d");
							
							$name = mysqli_real_escape_string($db, $name);
							$username = mysqli_real_escape_string($db, $username);
							$city = mysqli_real_escape_string($db, $city);
							$pass = mysqli_real_escape_string($db, $pass);
							$address = mysqli_real_escape_string($db, $address); 
							$email = mysqli_real_escape_string($db, $email);
							
							

							 if(empty($name) || empty($username)|| empty($mobile) || empty($pass) || empty($city) || empty($email))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db,"INSERT INTO `tbl_registration`(`register_id`, `username`,`mobile`, `name`, `password`, `address`, `emailid`,`state_id`, `city_id`) VALUES ('','$username','$mobile','$name','$pass','$address','$email','$state_id','$city')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Admin Registered successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						   
							$name = $_POST["name"];
						    $username = $_POST["username"];
							$mobile = $_POST["mobile"];
							//$pass = $_POST["password"];
						    $address = $_POST["address"];
							$state_id = $_POST['state_id'];
							$city = $_POST["city"];
							$email= $_POST["email"];
							$date = date("Y-m-d");
							
							$name = mysqli_real_escape_string($db, $name);
							$username = mysqli_real_escape_string($db, $username);
							$city = mysqli_real_escape_string($db, $city);
							//$pass = mysqli_real_escape_string($db, $pass);
							$address = mysqli_real_escape_string($db, $address); 
							$email = mysqli_real_escape_string($db, $email);
					
					
					
								
						  
							 $query = mysqli_query($db, "UPDATE `tbl_registration` SET `username`='$username',`mobile`='$mobile',`name`='$name',`city_id`='$city',`state_id` = '$state_id',`emailid`='$email',`address`='$address' WHERE `register_id` ='$id'");
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Admin Information Updated successfully.</div>"; 
								}
						}
						
						
						
						
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row hideshow" id="productadd">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
	
								<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Admin Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="name" id="form-field-1-1" placeholder="Enter Subdmin Name" class="col-xs-12" value="<?php echo $name;?>"/>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Email: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="email" id="form-field-1-1" placeholder="Enter email" class="col-xs-12" value="<?php echo $email;?>"/>
										</div>
									</div>
									
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Username: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="username" id="form-field-1-1" placeholder="Enter Username" class="col-xs-12" value="<?php echo $username;?>"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Mobile: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="mobile" id="form-field-1-1" placeholder="Enter Mobile No" class="col-xs-12" value="<?php echo $mobile;?>"/>
											
										</div>
									</div>
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  State: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select id="state" name="state" class="col-xs-12">
											<option>select state</option>
									<?php $sql = "select `state_id`,`state_name` from `state` order by state_name ASC";
								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{?>
											<option value="<?php echo $row['state_id'] ?>" <?php if($row['state_id'] == $state){ echo "selected='selected'"; }?>> <?php echo $row['state_name']?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  City: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select name="city" id="city" class="col-xs-12">
											<option>select city</option>
											<?php $sql = "select `id`,`city_name` from `city`";
												$rs_result = mysqli_query($db,$sql); 
												while($row=mysqli_fetch_array($rs_result))
											{	?>
											<option value="<?php echo $row['id'] ?>" <?php if($row['id'] == $city){ echo "selected='selected'"; }?>> <?php echo $row['city_name']?></option> 
											<?php } ?>
									  
									  
											</select>
										</div>
									</div>
											
								</div>
									
									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Password: <font style="color:red">*</font></label>

										<div class="col-sm-8">
										<input type="password" name="password" id="form-field-1-1" placeholder="Enter Password" class="col-xs-12" value="<?php echo $deltype;?>"/>
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Address: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="address" id="form-field-1-1" placeholder="Enter location" class="col-xs-12" value="<?php echo $address;?>"/>
											
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
								
								
								$sql = "SELECT t.`register_id`,t.`username`,t.`mobile`,t.`name`,t.`address`,t.`emailid`,c.`city_name` as `cityname` FROM `tbl_registration` t JOIN `city` c ON t.`city_id`=c.`id` WHERE t.`register_id` > 1";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Username</th>
										<th>Mobile</th>
										<th>Address</th>
										<th>Email</th>
										<th>City</th>
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
										<td><?php echo $row["mobile"];?></td>
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['emailid'];?></td>
										<td><?php echo $row['cityname'];?></td>
										<td><a href="adminregist.php?id=<?php echo $row['register_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="adminregist.php?did=<?php echo $row['register_id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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