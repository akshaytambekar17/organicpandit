				<?php
					
						include ("includes/db.php");	
						$msg = "";
						if(isset($_GET['id']))
						{	
						    $id= $_GET['id'];
							$sql = "select * from `countries` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$name = $row["name"];
							$sname = $row["sortname"];
							$code = $row["phonecode"];
							
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `countries` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						
						if(isset($_POST["submit"]))
						{	
					       
							
						    $ProductName = $_POST["name"];
							$sname = $_POST["sortname"];
							$code  = $_POST["phonecode"];
							

							$ProductName = mysqli_real_escape_string($db, $ProductName);
							$sname = mysqli_real_escape_string($db, $sname);
							$code = mysqli_real_escape_string($db, $code);

							 if(empty($ProductName) || empty($sname) || empty($code))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `countries`(`name`,`sortname`,`phonecode`) VALUES ('$ProductName','$sname','$code')");
							
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
							$sname = $_POST["sortname"];
							$code  = $_POST["phonecode"];
							

							$ProductName = mysqli_real_escape_string($db, $ProductName);
							$sname = mysqli_real_escape_string($db, $sname);
							$code = mysqli_real_escape_string($db, $code);
								
					
					
					
								
						     
						  
							 $query = mysqli_query($db, "UPDATE `countries` SET `name`='$ProductName',`sortname`='$sname',`phonecode`='$code' WHERE `id` ='$id'");
							  
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Name of the country : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="name" id="form-field-1-1" placeholder="Enter Name of State" class="col-xs-8" value="<?php echo $name;?>"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">SortName : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="sortname" id="form-field-1-1" placeholder="Enter Name of State" class="col-xs-8" value="<?php echo $sname;?>"/>
										</div>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Phonecode : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="phonecode" id="form-field-1-1" placeholder="Enter Name of State" class="col-xs-8" value="<?php echo $code;?>"/>
										</div>
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
							<div class="col-xs-12 datatable_wrapper">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								
								
								$sql = "select * from `countries`";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="display nowrap table table-striped table-responsive">  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Sortname</th>
										<th>Name</th>
										<th>Phonecode</th>	
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
										<td><?php echo $row["sortname"];?></td>
										<td><?php echo $row["name"];?></td>
										<td><?php echo $row['phonecode'];?></td>
										
										<td><a href="addcountry.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addcountry.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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