					<?php
					
						include ("includes/db.php");

						$msg = "";
						$name= "";  $profile="";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `banner` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$name = $row["tittle"];
							$profile = $row["image"];
							
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `banner` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						
						if(isset($_POST["submit"]))
						{	
					       $fil = $_FILES['myfile']['name'];
							
							$rand = rand(100000,999999);
							
						    $ProductName = $_POST["ProductName"];
							$picurl = $rand.$fil;
							//$Producturl = $_POST["Producturl"];
							$date = date("Y-m-d");
							
							$ProductName = mysqli_real_escape_string($db, $ProductName); 
							$picurl = mysqli_real_escape_string($db, $picurl);
							//$Producturl = mysqli_real_escape_string($db, $Producturl);
							

							 if(empty($ProductName) || empty($fil))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
								if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile/";
								$file = $picurl;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile"]["type"] == "image/jpg") || ($_FILES["myfile"]["type"] == "image/jpeg")||($_FILES["myfile"]["type"] == "image/JPEG")||($_FILES["myfile"]["type"] == "image/png"))
										{
								
										move_uploaded_file($temp_name,$path_filename_ext);
										$filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; congratulation!your profile has been changed.; </div>";
										}
										else{$filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose valid photo.; </div>";}
										
									}
							
								}
						
							  
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `banner`(`tittle`, `image`, `date`) VALUES ('$ProductName','$picurl','$date')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your category Add successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						    $fil = $_FILES['myfile']['name'];
							
								$rand = rand(100000,999999);
								
								$ProductName = $_POST["ProductName"];
								$picurl = $rand.$fil;
								
								$date = date("Y-m-d");
								
								$ProductName = mysqli_real_escape_string($db, $ProductName);
								$picurl = mysqli_real_escape_string($db, $picurl);
					
					
					
								if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile/";
								$file = $picurl;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile"]["type"] == "image/jpg") || ($_FILES["myfile"]["type"] == "image/jpeg")||($_FILES["myfile"]["type"] == "image/JPEG")||($_FILES["myfile"]["type"] == "image/png"))
										{
								
										move_uploaded_file($temp_name,$path_filename_ext);
										$filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; congratulation!your profile has been changed.; </div>";
										}
										else{$filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose valid photo.; </div>";}
										
									}
							
								}
						      if(!empty($fil))
							  {	
						  
							 $query = mysqli_query($db, "UPDATE `banner` SET `tittle`='$ProductName',`image`='$picurl',`date`='$date' WHERE `id` ='$id'");
							 
							  }
							  else
							  {
								$query = mysqli_query($db, "UPDATE `tittle` SET `categoryname`='$ProductName',`date`='$date' WHERE `id` ='$id'");  
							  }	  
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your category Updated successfully.</div>"; 
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
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Tittle of the Banner: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="ProductName" id="form-field-1-1" placeholder="Enter banner tittle" class="col-xs-12" value="<?php echo $name;?>"/>
											
										</div>
									</div>
									
									</div>
									
									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Picture_url: <font style="color:red">*</font></label>

										<div class="col-sm-8">
										<?php if(!empty($profile)) { ?>
										<img src="profile/<?php echo $profile;?>" height="40px" width="40px"> 
										<?php }?>
										<input type="file" name="myfile" class ="col-xs-10" value="<?php echo $profile;?>"> 
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
								
								
								$sql = "select * from `banner`";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Category Picture</th>
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
										<td><?php echo $row["tittle"];?></td>
										<td><img src="profile/<?php echo $row["image"];?>" height="60" width="150px"> </td> 
										<td><?php echo $row['date'];?></td>
										
										<td><a href="addbanner.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addbanner.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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