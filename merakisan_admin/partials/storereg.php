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
						 $cityname=""; $name= "";  $profile=""; $location=""; $address=""; $status=""; $email=""; $mob="";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `find` where `id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$cityname = $row["city_id"];
							$name=$row["name"];
							$location=$row["location"];
						        $address=$row["address"];
							$status=$row["status"];
							$email=$row["email"];
							$mob=$row["mob"];
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `find` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
					                $cityname = $_POST["city_id"];
							$name = $_POST["name"];
						    $location = $_POST["location"];
						    $address = $_POST["address"];
							$status = $_POST['status'];
							$email = $_POST["email"];
							$mob = $_POST["mob"];
							$date = date("Y-m-d");
							
							$cityname = mysqli_real_escape_string($db, $cityname );
							$name = mysqli_real_escape_string($db, $name);
							$location = mysqli_real_escape_string($db, $location);
							$address = mysqli_real_escape_string($db, $address);
							$status = mysqli_real_escape_string($db, $status);  
							$email = mysqli_real_escape_string($db, $email);
							$mob = mysqli_real_escape_string($db, $mob);
							
							

							 if (empty($cityname) || empty($name) || empty($location)|| empty($address) || empty($status) || empty($email) || empty($mob))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db,"INSERT INTO `find`(`id`,`city_id`, `name`, `location`, `address`, `status`, `email`, `mob`) VALUES ('','$cityname','$name','$location','$address','$status','$email','$mob')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Store Registered successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						        $cityname = $_POST["city_id"];
							$name = $_POST["name"];
						    $location = $_POST["location"];
						    $address = $_POST["address"];
							$status = $_POST['status'];
							$email= $_POST["email"];
							$mob = $_POST["mob"];
							$date = date("Y-m-d");
							
							$cityname = mysqli_real_escape_string($db, $cityname );
							$name = mysqli_real_escape_string($db, $name);
							$location = mysqli_real_escape_string($db, $location);
							$address = mysqli_real_escape_string($db, $address);
							$status = mysqli_real_escape_string($db, $status);  
							$email = mysqli_real_escape_string($db, $email);
							$mob = mysqli_real_escape_string($db, $mob);
					
					
					
								
						  
							 $query = mysqli_query($db, "UPDATE `find` SET `city_id`='$cityname',`name`='$name',`location`='$location',`address`='$address',`status`='$status',`email`='$email',`mob`='$mob' WHERE `id` ='$id'");
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Store Information Updated successfully.</div>"; 
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> City: <font style="color:red">*</font></label>
										<div class="col-sm-8">
									<!--<select name="city_id"  id="city_id" class="col-xs-12" >
					                              
								
					                                 </select>-->
					                                 <select name="city_id" id="city_id" class="col-xs-12">
											
												<option>select city</option>
												<?php 
											$sql = "select `id`,`city_name` from `city` order by city_name ASC";
											
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="name" id="form-field-1-1" placeholder="Enter Subdmin Name" class="col-xs-12" value="<?php echo $name;?>"/>
										</div>
										</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Location: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="location" id="form-field-1-1" placeholder="Enter location" class="col-xs-12" value="<?php echo $location; ?>"/>
										</div>
									</div>
									
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Address: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="address" id="form-field-1-1" placeholder="Enter Address" class="col-xs-12" value="<?php echo $address;?>"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Stores: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select id="status" name="status" class="col-xs-12">
											<option value= "0">--Select Store--</option>
					                        <option value= "1" >MeraKisan Organic Grocery Store</option>
					                        <option value="0">Merakisan Stores</option>
											</select>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Email: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="email" id="form-field-1-1" placeholder="Enter Email" class="col-xs-12" value="<?php echo $email;?>"/>
											
										</div>
									</div>	

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">  Mobile: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="tel" name="mob" id="form-field-1-1" placeholder="Enter Mobile No" class="col-xs-12" value="<?php echo $mob;?>"/>
											
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
								
								
								$sql = "SELECT f.*,c.`city_name` FROM `find` f,`city` c WHERE f.`city_id`= c.`id`";                     
                                                                      //"SELECT `id`, `name`, `location`, `address`, `status`, `email`, `mob` FROM `find` ";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Location</th>
										<th>Address</th>
										<th>Email</th>
										<th>Mobile</th>
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
										<td><?php echo $row["location"];?></td> 
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row["mob"];?></td>
										<td><?php echo $row["city_name"];?></td>
									
										
										<td><a href="location.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="location.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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