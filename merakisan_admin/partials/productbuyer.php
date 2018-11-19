				
				<?php
					
						include ("includes/db.php");	
					    $msg = "";
						
						
						
						if(isset($_GET['id']))
						{	
					
						    $id= $_GET['id'];
							$sql = "select * from `tbl_pr_buyer` where id='$id'";
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$id = $row["id"];
							$name = $row["pr_name"];
							$discription = $row["pr_desc"];
							$availablefrom = $row["pr_avlFrom"];
							$availableto = $row["pr_avlTo"];
							$quantity = $row["pr_qty"];
							$quality = $row["pr_quality"];
							$price = $row["pr_price"];
							$profile = $row["pr_image"];
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `tbl_pr_buyer` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
							
						   $fil = $_FILES['myfile']['name'];
						   $rand = rand(100000,999999); 
							$name = $row["pr_name"];
							$discription = $row["pr_desc"];
							$availablefrom = $row["pr_avlFrom"];
							$availableto = $row["pr_avlTo"];
							$quantity = $row["pr_qty"];
							$quality = $row["pr_quality"];
							$price = $row["pr_price"];
							$profile = $rand.$fil;

							$name = mysqli_real_escape_string($db, $name);
							$discription = mysqli_real_escape_string($db, $discription);
							$availablefrom = mysqli_real_escape_string($db, $availablefrom);
							$availableto = mysqli_real_escape_string($db, $availableto);
							$quantity = mysqli_real_escape_string($db, $quantity);
							$quality = mysqli_real_escape_string($db, $quality);
							$price = mysqli_real_escape_string($db, $price);
							$profile = mysqli_real_escape_string($db, $profile);

							 if(empty($name) || empty($discription) || empty($availablefrom) || empty($availableto) || empty($quantity) || empty($quality) || empty($price) || empty($profile))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
								 if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "/home/merakisan/organicpandit.com/upload/product/";
								$file = $profile;
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
				$query = mysqli_query($db, "INSERT INTO `tbl_pr_buyer`(`pr_name`,`pr_desc`,`pr_avlFrom`,`pr_avlTo`,`pr_qty`,`pr_quality`,`pr_price`,`pr_image`) VALUES 
				                                                    ('$name','$discription','$availablefrom','$availableto','$quantity','$quality','$price','$profile')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Product Buyer Add successfully.</div>"; 
								}
							}
						}
						
						
						if(isset($_POST["update"]))
						{	
						   $fil = $_FILES['myfile']['name'];
						   $rand = rand(100000,999999); 
							$name = $row["pr_name"];
							$discription = $row["pr_desc"];
							$availablefrom = $row["pr_avlFrom"];
							$availableto = $row["pr_avlTo"];
							$quantity = $row["pr_qty"];
							$quality = $row["pr_quality"];
							$price = $row["pr_price"];
							$profile = $rand.$fil;
							
							
							$profile = mysqli_real_escape_string($db, $profile);
						
								
								if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "/home/merakisan/organicpandit.com/upload/product/";
								$file = $profile;
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
								
					        $query = mysqli_query($db, "UPDATE `tbl_pr_buyer` SET `pr_name`='$name',`pr_desc`='$discription',
					                                                    `pr_avlFrom`='$availablefrom',`pr_avlTo`='$availableto',`pr_qty`='$quantity',`pr_quality`='$quality',`pr_price`='$price',`pr_image`='$profile' WHERE `id` ='$id'");
							  }  
							  	else
							  {
								$query = mysqli_query($db, "UPDATE `tbl_pr_buyer` SET `pr_name`='$name',`pr_desc`='$discription',
					                                                    `pr_avlFrom`='$availablefrom',`pr_avlTo`='$availableto',`pr_qty`='$quantity',`pr_quality`='$quality',`pr_price`='$price' WHERE `id` ='$id'");
							  }	      
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Product Buyer Updated successfully.</div>"; 
								}
						}
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id'])){} else {echo "hideshow"; } ?>" id="addbuyer">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
						
							<?php if(empty($id)){ ?>
                    <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_name" id="form-field-1-1" placeholder="Enter Product Name " class="col-xs-8" value="<?php echo $name;?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Description : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<textarea name="pr_desc" id="form-field-1-1" placeholder="Enter Description " class="col-xs-8"/><?php echo $discription;?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product AvailableFrom : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_avlFrom" id="form-field-1-1" placeholder="Enter Date" class="col-xs-8" value="<?php echo $availablefrom;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product AvailableTo : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_avlTo" id="form-field-1-1" placeholder="Enter Date" class="col-xs-8" value="<?php echo $availableto;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Quantity : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_qty" id="form-field-1-1" placeholder="Enter Quantity " class="col-xs-8" value="<?php echo $quantity;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Quality : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_quality" id="form-field-1-1" placeholder="Enter Quality " class="col-xs-8" value="<?php echo $quality;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Price : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_price" id="form-field-1-1" placeholder="Enter Your City " class="col-xs-8" value="<?php echo $price;?>"/>
										</div>
									</div>
								</div>
								
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Profile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <?php if(!empty($profile)) { ?>
										    <img src="/upload/product/<?php echo $profile;?>" height="40px" width="40px"> 
										    <?php }?>
										    <input type="file" name="myfile" class ="col-xs-10" value="<?php echo $profile;?>"/> 
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
							<?php }else{ ?>
							<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_name" id="form-field-1-1" placeholder="Enter Product Name " class="col-xs-8" value="<?php echo $name;?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Description : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<textarea name="pr_desc" id="form-field-1-1" placeholder="Enter Description " class="col-xs-8"/><?php echo $discription;?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product AvailableFrom : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_avlFrom" id="form-field-1-1" placeholder="Enter Date" class="col-xs-8" value="<?php echo $availablefrom;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product AvailableTo : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_avlTo" id="form-field-1-1" placeholder="Enter Date" class="col-xs-8" value="<?php echo $availableto;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Quantity : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_qty" id="form-field-1-1" placeholder="Enter Quantity " class="col-xs-8" value="<?php echo $quantity;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Quality : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_quality" id="form-field-1-1" placeholder="Enter Quality " class="col-xs-8" value="<?php echo $quality;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Product Price : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="pr_price" id="form-field-1-1" placeholder="Enter Your City " class="col-xs-8" value="<?php echo $price;?>"/>
										</div>
									</div>
								</div>
								
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Profile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <?php if(!empty($profile)) { ?>
										    <img src="/upload/product/<?php echo $profile;?>" height="40px" width="40px"> 
										    <?php }?>
										    <input type="file" name="myfile" class ="col-xs-10" value="<?php echo $profile;?>"/> 
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
								
							<?php } ?>
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 datatable_wrapper">
							
								
								<?php
								
									$sql = "select * from `tbl_pr_buyer`";
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="display nowrap table table-striped table-responsive">  
									<thead>  
									  <tr>  
									    <th>Sr No</th>
										<th>Product Name</th>
										<th>Product Description</th>
										<th>Product Available From</th>
										<th>Product Available To</th>
										<th>Product Quantity</th>
										<th>Product Quality</th>
										<th>Product Price</th>
										<th>Product Image</th>
										<th>Product date</th>
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
									    <td><?php echo $row["pr_name"]; ?></td>
										<td><?php echo $row["pr_desc"]; ?></td>
										<td><?php echo $row["pr_avlFrom"]; ?> </td>
										<td><?php echo $row["pr_avlTo"]; ?></td>
										<td><?php echo $row["pr_qty"]; ?></td>
										<td><?php echo $row["pr_quality"]; ?></td>
										<td><?php echo $row["pr_price"]; ?></td>
										<td><img src="/upload/product/<?php echo $row["pr_image"];?>" height="40px" width="40px"></td>
										<td><?php echo $row["pr_date"]; ?></td>
										<td><a href="addprbuyer.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addprbuyer.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>	</tr> 
									<?php $no++;
									} ?>
									</tbody>  
								</table>  
								  	</div><!-- /.col -->
						</div><!-- /.row -->
								<script>
								$(document).ready(function(){
									$('#example').dataTable();
								});
								</script>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        "scrollX": true
    });
});
</script>						
		