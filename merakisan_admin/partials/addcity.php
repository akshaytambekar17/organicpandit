						

					<?php
					
						include ("includes/db.php");	
						$msg = "";
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `cities` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$stateid = $row["state_id"];
							$name = $row["name"];
							
							
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `cities` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						
						if(isset($_POST["submit"]))
						{	
					       
							
						    $ProductName = $_POST["name"];
							$state = $_POST['state_id'];

							$ProductName = mysqli_real_escape_string($db, $ProductName);
							$state = mysqli_real_escape_string($db, $state);

							 if(empty($ProductName))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
				$query = mysqli_query($db, "INSERT INTO `cities`(`state_id`,`name`) VALUES ('$state','$ProductName')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! City Add successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
						   
								$ProductName = $_POST["name"];
								$state = $_POST['state_id'];
								

								$ProductName = mysqli_real_escape_string($db, $ProductName);
								$state = mysqli_real_escape_string($db, $state);
								
					$query = mysqli_query($db, "UPDATE `cities` SET `state_id` = '$state',`name`='$ProductName' WHERE `id` ='$id'");
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! City Updated successfully.</div>"; 
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">State <font style="color:red">*</font></label>
										<div class="col-sm-8">
										<?php 
											$query = "select * from `states`";
											$result = mysqli_query($db,$query);  
											
										?>
										<select name="state" class="col-xs-8">
										<option>Select State</option>
										<?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
											{ ?>
											<option value="<?php echo $row['state_id']; ?>" <?php if($row['state_id'] == $stateid){ echo "selected='selected'"; }?>><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">City : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="name" id="form-field-1-1" placeholder="Enter Name of city" class="col-xs-8" value="<?php echo $name;?>"/>
											
										</div>
									</div>
									
									</div>
									
									<div class="col-md-4">
								
				
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
								
								
								$sql = "SELECT s.name AS statename,s.id,c.* FROM `states` s, `cities` c WHERE s.`id` = c.`state_id` ";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>State</th>
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
										<td><?php echo $row["statename"];?></td>
										<td><?php echo $row["name"];?></td>
										<td><a href="addcity.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addcity.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										</tr> 
									<?php
									$no++;
									}
									?>      
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