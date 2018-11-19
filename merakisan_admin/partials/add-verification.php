					<div class="page-content">
					<div class="row">
					<?php
					
						include ("includes/db.php");	
					    $msg = "";
						
						
						
						if(isset($_GET['id']))
						{	
					
							$id= $_GET['id'];
							$sql = "select * from `tbl_verify` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$id = $row["id"];
							$user_id = $row["user_id"];
							$user_name = $row["user_name"];
							$agency_username = $row["agency_name"];
							$verification = $row["ver_admin"];
							$date = $row["date"];
						}
						

						

					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id'])){} else {echo "hideshow"; } ?>" id="addngo">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
						
							<?php if(empty($id)){ ?>
                    <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Fullname : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="fullname" id="form-field-1-1" placeholder="Enter Your Name " class="col-xs-8" value="<?php echo $fullname;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Username : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="username" id="form-field-1-1" placeholder="Enter Username Name " class="col-xs-8" value="<?php echo $username;?>" required="" />
										</div>
									</div>
								</div>
						
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Email : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="email" name="email" id="form-field-1-1" placeholder="Enter Your Email " class="col-xs-8" value="<?php echo $email;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Landline : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="landline" id="form-field-1-1" placeholder="Enter Landline No " class="col-xs-8" value="<?php echo $landline;?>" required=""/>
										</div>
									</div>
								</div>
							
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Mobile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="mobile" id="form-field-1-1" placeholder="Enter Mobile No " class="col-xs-8" value="<?php echo $mobile;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">State : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="state" id="form-field-1-1" placeholder="Enter State " class="col-xs-8" value="<?php echo $state;?>" required=""/>
										</div>
									</div>
								</div>
							
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">City : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="city" id="form-field-1-1" placeholder="Enter Your City " class="col-xs-8" value="<?php echo $city;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Address : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="address" id="form-field-1-1" placeholder="Enter Address " class="col-xs-8" value="<?php echo $address;?>" required=""/>
										</div>
									</div>
								</div>
							
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">GST : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="gst" id="form-field-1-1" placeholder="Enter GST No " class="col-xs-8" value="<?php echo $gst;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Aadharcard : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="aadharcard" id="form-field-1-1" placeholder="Enter Aadharcard No " class="col-xs-8" value="<?php echo $aadharcard;?>" required=""/>
										</div>
									</div>
								</div>
						
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Story : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="story" id="form-field-1-1" placeholder="Enter Your Story " class="col-xs-8" value="<?php echo $story;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Profile : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <?php if(!empty($profile)) { ?>
										    <img src="profile1/<?php echo $profile;?>" height="40px" width="40px"> 
										    <?php }?>
										    <input type="file" name="myfile" class ="col-xs-10" value="<?php echo $profile;?>"> 
										</div>
									</div>
								</div>
							
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Website : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										<input type="text" name="website" id="form-field-1-1" placeholder="Enter Website " class="col-xs-8" value="<?php echo $website;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Compony Image : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <?php if(!empty($image)) { ?>
										    <img src="profile2/<?php echo $image;?>" height="40px" width="40px"> 
										    <?php }?>
										    <input type="file" name="myfile1" class ="col-xs-10" value="<?php echo $image;?>">
										</div>
									</div>
								</div>
						
						
								

								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Video : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <?php if(!empty($video)) { ?>
										    <img src="profile3/<?php echo $video;?>" height="40px" width="40px"> 
										    <?php }?>
										    <input type="file" name="myfile2" class ="col-xs-10" value="<?php echo $video;?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Bank Account : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="acc_bank" id="form-field-1-1" placeholder="Enter Bank Name " class="col-xs-8" value="<?php echo $bank_acc;?>" required=""/>
										</div>
									</div>
								</div>
							

								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Account Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="acc_name" id="form-field-1-1" placeholder="Enter Account Holder Name " class="col-xs-8" value="<?php echo $acc_name;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Account No. : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="acc_no" id="form-field-1-1" placeholder="Enter Account No. " class="col-xs-8" value="<?php echo $acc_no;?>" required=""/>
										</div>
									</div>
								</div>
						
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">IFSC Code : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="ifsc_code" id="form-field-1-1" placeholder="Enter Bank IFSC Code " class="col-xs-8" value="<?php echo $Ifsc_code;?>" required=""/>
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Agency Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="agency_name" id="form-field-1-1" placeholder="Enter Your Ageny Name " class="col-xs-8" value="<?php echo $agency_name;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> : Username<font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="username" id="form-field-1-1" placeholder="Enter User Name " class="col-xs-8" value="<?php echo $username;?>" required="" />
										</div>
									</div>
								</div>
						
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Contact Person : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="contact_person" id="form-field-1-1" placeholder="Enter Contact Person " class="col-xs-8" value="<?php echo $contact_person;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Address : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<textarea id="form-field-1-1" placeholder="Enter Your Address " class="col-xs-8"><?php echo $address; ?></textarea>
										</div>
									</div>
								</div>
							
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Email1 : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="email" name="email1" id="form-field-1-1" placeholder="Enter Your Email " class="col-xs-8" value="<?php echo $email1;?>" required=""/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Email2 : <font style="color:red"></font></label>
										<div class="col-sm-8">
											<input type="email" name="email2" id="form-field-1-1" placeholder="Enter Your Email " class="col-xs-8" value="<?php echo $email2;?>" />
										</div>
									</div>
								</div>
							
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Landline : <font style="color:red"></font></label>
										<div class="col-sm-8">
											<input type="text" name="landline" id="form-field-1-1" placeholder="Enter Your Landline Number " class="col-xs-8" value="<?php echo $landline;?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Mobile1 : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="mobile1" id="form-field-1-1" placeholder="Enter Mobile " class="col-xs-8" value="<?php echo $mobile1;?>" required=""/>
										</div>
									</div>
								</div>
							
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Mobile2 : <font style="color:red"></font></label>
										<div class="col-sm-8">
											<input type="text" name="mobile2" id="form-field-1-1" placeholder="Enter Mobile " class="col-xs-8" value="<?php echo $mobile2;?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Website : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="website" id="form-field-1-1" placeholder="Enter Website " class="col-xs-8" value="<?php echo $website;?>" required=""/>
										</div>
									</div>
								</div>
						
						
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Licence No : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="licence_no" id="form-field-1-1" placeholder="Enter Licence NO " class="col-xs-8" value="<?php echo $licence_no;?>" required=""/>
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
								
									$sql = "select * from `tbl_verify`";
								
								
								    $rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="display nowrap table  table-striped table-responsive" style="overflow-x:auto">  
									<thead>  
									  <tr>  
										<th>Id</th>
										<th>User ID</th>
										<th>Username</th>
										<th>Agency Name</th>
										<th>Date</th>
										<th>Verify</th>
									  </tr>  
									</thead>  
									<tbody> 
									
									<?php
									$no= 1;
									while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
									{

									?>
										<tr>
										<td><?php echo $row["id"]; ?></td>
										<td><?php echo $row["user_id"];?></td>
										<td><?php echo $row["user_name"]; ?> </td>
										<td><?php echo $row["agency_name"]; ?></td>
										<td><?php echo $row["date"]; ?></td>
									    <td><?php if ($row['ver_admin']==1){ ?> 
									            <a href="#" class="btn btn-success btn-xs" disabled="disabled">Verified</a>
									        <?php }elseif($row['ver_admin']==2){ ?> 
									            <a href="#" class="btn btn-danger btn-xs" disabled="disabled">Rejected</a> 
									        <?php } else { ?>
	                                            <a href="" class="btn btn-success btn-xs" id="one" onclick="return confirm('Are you sure you want to verify this <?php echo $row->user_type; ?>?');" >Accept</a>&nbsp;&nbsp;
                                                <a href="" class="btn btn-danger btn-xs" id="two" onclick="return confirm('Are you sure you want to reject this <?php echo $row->user_type; ?>?');" >Reject</a>
									        <?php  }  ?>
									    </td>
			                            </tr> 
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
								  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verification</h4>
        </div>
        <div class="modal-body data-content" style="text-align: center">
           <h5 style="display:inline;">Do you want to verify :</h5> 
           <button type="button" class="btn btn-info" id="" onclick="">Verify</button>&nbsp;&nbsp;
           <button type="button" class="btn btn-default" id="" onclick="">Reject</button>
        </div>
       </div>
      
    </div>
  </div>
