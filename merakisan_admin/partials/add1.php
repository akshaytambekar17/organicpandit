				
				<?php
						include ("includes/db.php");	
					    $msg = "";
						
						
						
						if(isset($_GET['id']))
						{	
					
							$id= $_GET['id'];
							$sql = "select * from `tbl_packages` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$id = $row["id"];
							$name = $row["name"];
							$amount = $row["amount"];
							$UL_access = $row["UL_access"];
							$UL_sms = $row["UL_sms"];
							$independ_chat = $row["independ_chat"];
							$upd_profile = $row["upd_profile"];
							$daily_report = $row["daily_report"];
							$free_pro_req = $row["free_pro_req"];
							$free_biddding = $row["free_biddding"];
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `tbl_packages` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
							$name = $_POST["name"];
							$amount = $_POST["amount"];
							$UL_access = $_POST["UL_access"];
							$UL_sms = $_POST["UL_sms"];
							$independ_chat = $_POST["independ_chat"];
							$upd_profile = $_POST["upd_profile"];
							$daily_report = $_POST["daily_report"];
							$free_pro_req = $_POST["free_pro_req"];
							$free_biddding = $_POST["free_biddding"];

							$name = mysqli_real_escape_string($db, $name);
							$amount = mysqli_real_escape_string($db, $amount);
							$UL_access = mysqli_real_escape_string($db, $UL_access);
							$UL_sms = mysqli_real_escape_string($db, $UL_sms);
							$independ_chat = mysqli_real_escape_string($db, $independ_chat);
							$upd_profile = mysqli_real_escape_string($db, $upd_profile);
							$daily_report = mysqli_real_escape_string($db, $daily_report);
							$free_pro_req = mysqli_real_escape_string($db, $free_pro_req);
							$free_biddding = mysqli_real_escape_string($db, $free_biddding);

							 if(empty($name) ||  empty($UL_access) || empty($UL_sms) || empty($independ_chat) || empty($upd_profile) || empty($daily_report) || empty($free_pro_req) || empty($free_biddding) )
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
							   				$query = mysqli_query($db, "INSERT INTO `tbl_packages`(`name`,`amount`, `UL_access`,`UL_sms`,`independ_chat`,`upd_profile`,`daily_report`,`free_pro_req`,`free_biddding`) 
				                                             VALUES ('$name','$amount','$UL_access','$UL_sms','$independ_chat','$upd_profile','$daily_report','$free_pro_req','$free_biddding')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Package Add successfully.</div>"; 
								}
							}
						} 
						
						
						if(isset($_POST["update"]))
						{	
							$name = $_POST["name"];
							$amount = $_POST["amount"];
							$UL_access = $_POST["UL_access"];
							$UL_sms = $_POST["UL_sms"];
							$independ_chat = $_POST["independ_chat"];
							$upd_profile = $_POST["upd_profile"];
							$daily_report = $_POST["daily_report"];
							$free_pro_req = $_POST["free_pro_req"];
							$free_biddding = $_POST["free_biddding"];
							
					
								$query = mysqli_query($db, "UPDATE `tbl_packages` SET `name`='$name',`amount`='$amount', `UL_access`='$UL_access',`UL_sms`='$UL_sms',`independ_chat`='$independ_chat',`upd_profile`='$upd_profile',`daily_report`='$daily_report',`free_pro_req`='$free_pro_req',`free_biddding`='$free_biddding' WHERE `id` ='$id'");

								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Package Updated successfully.</div>"; 
								}
						}
						
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id'])){} else {echo "hideshow"; } ?>" id="addpackages">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
						
							<?php if(empty($id)){ ?>
                    <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
							<div class="row">
							    <div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Plan : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["name"]; ?>" name="name" >
											<option value="">-- select --</option>
											<option <?php if($row["name"] == "Monthly Plan "){ echo "selected='selected'";} ?> value="Monthly Plan ">Monthly Plan </option>
											<option <?php if($row["name"] == "Quarterly Plan"){ echo "selected='selected'";} ?> value="Quarterly Plan">Quarterly Plan</option>
											<option <?php if($row["name"] == "Six Month Plan"){ echo "selected='selected'";} ?> value="Six Month Plan">Six Month Plan</option>
											<option <?php if($row["name"] == "Yearly Plan"){ echo "selected='selected'";} ?> value="Yearly Plan">Yearly Plan</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Amount : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["amount"]; ?>" name="amount" >
											<option value="">-- select --</option>
											<option <?php if($row["amount"] == "10000 Rs"){ echo "selected='selected'";} ?> value="10000 Rs">10000 Rs</option>
											<option <?php if($row["amount"] == "25000 Rs"){ echo "selected='selected'";} ?> value="25000 Rs">25000 Rs</option>
											<option <?php if($row["amount"] == "45000 Rs"){ echo "selected='selected'";} ?> value="45000 Rs">45000 Rs</option>
											<option <?php if($row["amount"] == "85000 Rs"){ echo "selected='selected'";} ?> value="85000 Rs">85000 Rs</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Unlimited Access : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["UL_access"]; ?>" name="UL_access" >
											<option value="">-- select --</option>
											<option <?php if($row["UL_access"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["UL_access"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Unlimited SMS : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["UL_sms"]; ?>" name="UL_sms" >
											<option value="">-- select --</option>
											<option <?php if($row["UL_sms"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["UL_sms"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Independent Chat Window : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["independ_chat"]; ?>" name="independ_chat" >
											<option value="">-- select --</option>
											<option <?php if($row["independ_chat"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["independ_chat"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Update Profile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["upd_profile"]; ?>" name="upd_profile" >
											<option value="">-- select --</option>
											<option <?php if($row["upd_profile"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["upd_profile"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Daily Report : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["daily_report"]; ?>" name="daily_report" >
											<option value="">-- select --</option>
											<option <?php if($row["daily_report"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["daily_report"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Free Product Requirement : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="free_pro_req" id="form-field-1-1" placeholder="" class="col-xs-8" value="<?php echo $free_pro_req;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Free Bidding : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="free_biddding" id="form-field-1-1" placeholder="" class="col-xs-8" value="<?php echo $free_biddding;?>" required=""/>
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
							<?php }else{ ?>
                    <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
							<div class="row">
							    <div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Plan : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["name"]; ?>" name="name" >
											<option value="">-- select --</option>
											<option <?php if($row["name"] == "Monthly Plan "){ echo "selected='selected'";} ?> value="Monthly Plan ">Monthly Plan </option>
											<option <?php if($row["name"] == "Quarterly Plan"){ echo "selected='selected'";} ?> value="Quarterly Plan">Quarterly Plan</option>
											<option <?php if($row["name"] == "Six Month Plan"){ echo "selected='selected'";} ?> value="Six Month Plan">Six Month Plan</option>
											<option <?php if($row["name"] == "Yearly Plan"){ echo "selected='selected'";} ?> value="Yearly Plan">Yearly Plan</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Amount : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["amount"]; ?>" name="amount" >
											<option value="">-- select --</option>
											<option <?php if($row["amount"] == "10000 Rs"){ echo "selected='selected'";} ?> value="10000 Rs">10000 Rs</option>
											<option <?php if($row["amount"] == "25000 Rs"){ echo "selected='selected'";} ?> value="25000 Rs">25000 Rs</option>
											<option <?php if($row["amount"] == "45000 Rs"){ echo "selected='selected'";} ?> value="45000 Rs">45000 Rs</option>
											<option <?php if($row["amount"] == "85000 Rs"){ echo "selected='selected'";} ?> value="85000 Rs">85000 Rs</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Unlimited Access : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["UL_access"]; ?>" name="UL_access" >
											<option value="">-- select --</option>
											<option <?php if($row["UL_access"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["UL_access"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Unlimited SMS : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["UL_sms"]; ?>" name="UL_sms" >
											<option value="">-- select --</option>
											<option <?php if($row["UL_sms"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["UL_sms"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Independent Chat Window : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["independ_chat"]; ?>" name="independ_chat" >
											<option value="">-- select --</option>
											<option <?php if($row["independ_chat"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["independ_chat"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Update Profile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["upd_profile"]; ?>" name="upd_profile" >
											<option value="">-- select --</option>
											<option <?php if($row["upd_profile"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["upd_profile"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Daily Report : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["daily_report"]; ?>" name="daily_report" >
											<option value="">-- select --</option>
											<option <?php if($row["daily_report"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["daily_report"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Free Product Requirement : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="free_pro_req" id="form-field-1-1" placeholder="" class="col-xs-8" value="<?php echo $free_pro_req;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Free Bidding : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="free_biddding" id="form-field-1-1" placeholder="" class="col-xs-8" value="<?php echo $free_biddding;?>" required=""/>
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
								
							<?php } ?>
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 datatable_wrapper">
							
								
								<?php
								
									$sql = "select * from `tbl_packages`";
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="display nowrap table table-striped table-responsive">  
									<thead>  
									  <tr>  
									  <th>Sr No</th>
										<th>Name</th>
										<th>Amount</th>
										<th>UNlimited Access</th>
										<th>Unlimited SMS</th>
										<th>Independent Chat</th>
										<th>Update Profile</th>
										<th>Daily Report</th>
										<th>Free Product Requirements</th>
										<th>Free Bidding</th>
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
										<td><?php echo $row["name"]; ?></td>
										<td><?php echo $row["amount"]; ?></td>
										<td><?php echo $row["UL_access"];?></td>
										<td><?php echo $row["UL_sms"]; ?> </td>
										<td><?php echo $row["independ_chat"]; ?></td>
										<td><?php echo $row["upd_profile"]; ?></td>
										<td><?php echo $row["daily_report"]; ?></td>
										<td><?php echo $row["free_pro_req"]; ?></td>
										<td><?php echo $row["free_biddding"]; ?></td>
										<td><a href="addpackages.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addpackages.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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
		