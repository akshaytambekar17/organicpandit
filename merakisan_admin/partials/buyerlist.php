					<div class="page-content">
					<div class="row">
					<?php
					
						include ("includes/db.php");	
					    $msg = "";
						
						
						
						if(isset($_GET['id']))
						{	
					
							$id= $_GET['id'];
							$sql = "select * from `tbl_buyer` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$id = $row["id"];
							$fullname = $row["fullname"];
							$ceo = $row["ceo"];
							$username = $row["username"];
							$email = $row["email"];
							$landline = $row["landline"];
							$mobile = $row["mobile"];
							$state = $row["state"];
							$city = $row["city"];
							$address = $row["address"];
							$gst = $row["gst"];
							$aadharcard = $row["aadharcard"];
							$story = $row["story"];
							$profile = $row["profile"];
							$website = $row["website"];
							$types = $row["types"];
							$test_report = $row["test_report"];
							$image = $row["comp_img"];
							$video = $row["video"];
							$bank_acc = $row["acc_bank"];
							$acc_name = $row["acc_name"];
							$acc_no = $row["acc_no"];
							$Ifsc_code = $row["ifsc_code"];
							
						}
						
						if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `tbl_buyer` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
					       $fil = $_FILES['myfile']['name'];
						   $rand = rand(100000,999999);
						   $fil1 = $_FILES['myfile1']['name'];
						   $rand1 = rand(100000,999999);
						   $fil2 = $_FILES['myfile2']['name'];
						   $rand2 = rand(100000,999999);
							$fullname = $_POST["fullname"];
							$ceo = $_POST["ceo"];
							$username = $_POST["username"];
							$email = $_POST["email"];
							$landline = $_POST["landline"];
							$mobile = $_POST["mobile"];
							$state = $_POST["state"];
							$city = $_POST["city"];
							$address = $_POST["address"];
							$gst = $_POST["gst"];
							$aadharcard = $_POST["aadharcard"];
							$story = $_POST["story"];
							$profile = $rand.$fil;
							$website = $_POST["website"];
							$types = $_POST['types'];
							$test_report = $_POST['test_report'];
							$image = $rand1.$fil1;
							$video = $rand2.$fil2;
							$bank_acc = $_POST["acc_bank"];
							$acc_name = $_POST["acc_name"];
							$acc_no = $_POST["acc_no"];
							$Ifsc_code = $_POST["ifsc_code"];
							$date = date("Y-m-d");
							
							$fullname = mysqli_real_escape_string($db, $fullname);
							$ceo = mysqli_real_escape_string($db, $ceo);
							$username = mysqli_real_escape_string($db, $username);
							$email = mysqli_real_escape_string($db, $email);
							$landline = mysqli_real_escape_string($db, $landline);
							$mobile = mysqli_real_escape_string($db, $mobile);
							$state = mysqli_real_escape_string($db, $state);
							$city = mysqli_real_escape_string($db, $city);
							$address = mysqli_real_escape_string($db, $address);
							$gst = mysqli_real_escape_string($db, $gst);
							$aadharcard = mysqli_real_escape_string($db, $aadharcard);
							$story = mysqli_real_escape_string($db, $story);
							$profile = mysqli_real_escape_string($db, $profile);
							$website = mysqli_real_escape_string($db, $website);
							$image = mysqli_real_escape_string($db, $image);
							$types = mysqli_real_escape_string($db, $types);
							$test_report = mysqli_real_escape_string($db, $test_report);
							$video = mysqli_real_escape_string($db, $video);
							$bank_acc = mysqli_real_escape_string($db, $bank_acc);
							$acc_name = mysqli_real_escape_string($db, $acc_name);
							$acc_no = mysqli_real_escape_string($db, $acc_no);
							$Ifsc_code = mysqli_real_escape_string($db, $Ifsc_code);

							 if(empty($fullname) ||  empty($username) || empty($email) || empty($landline) || empty($mobile) || empty($state) || empty($city) || empty($address) || empty($gst) || 
							 empty($aadharcard) || empty($story) || empty($profile) || empty($website) ||
							  empty($types) || empty($test_report) || empty($bank_acc) || empty($acc_name) || empty($acc_no) || empty($Ifsc_code) )
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
							    if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile1/";
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
								
																	if (($_FILES['myfile1']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile2/";
								$file = $image;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile1']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile1"]["type"] == "image/jpg") || ($_FILES["myfile1"]["type"] == "image/jpeg")||($_FILES["myfile1"]["type"] == "image/JPEG")||($_FILES["myfile1"]["type"] == "image/png"))
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
								
									if (($_FILES['myfile2']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile3/";
								$file = $video;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile2']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile2"]["type"] == "image/jpg") || ($_FILES["myfile2"]["type"] == "image/jpeg")||($_FILES["myfile2"]["type"] == "image/JPEG")||($_FILES["myfile2"]["type"] == "image/png"))
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

									                                                     
				$query = mysqli_query($db, "INSERT INTO `tbl_buyer`(`fullname`, `username`,`email`,`landline`,`mobile`,`state`,`city`,`address`,`gst`,
				                                                `aadharcard`,`story`,`profile`,`website`,`comp_img`,`types`,`test_report`,`video`,`acc_bank`,`acc_name`,`acc_no`,`ifsc_code`,`ceo`) 
				                                             VALUES ('$fullname','$username','$email','$landline','$mobile','$state','$city','$address','$gst',
				                                                '$aadharcard','$story','$profile','$website','$image','$types','$test_report','$video','$bank_acc','$acc_name','$acc_no','$Ifsc_code','$ceo')");
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
							
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Buyer Add successfully.</div>"; 
								}
							}
						} 
						
						
						if(isset($_POST["update"]))
						{	
						   $fil = $_FILES['myfile']['name'];
						   $rand = rand(100000,999999);
						   $fil1 = $_FILES['myfile1']['name'];
						   $rand1 = rand(100000,999999);
						   $fil2 = $_FILES['myfile2']['name'];
						   $rand2 = rand(100000,999999);
							$fullname = $_POST["fullname"];
							$ceo = $_POST["ceo"];
							$username = $_POST["username"];
							$email = $_POST["email"];
							$landline = $_POST["landline"];
							$mobile = $_POST["mobile"];
							$state = $_POST["state"];
							$city = $_POST["city"];
							$address = $_POST["address"];
							$gst = $_POST["gst"];
							$aadharcard = $_POST["aadharcard"];
							$story = $_POST["story"];
							$profile = $rand.$fil;
							$website = $_POST["website"];
							$types = $_POST['types'];
							$test_report = $_POST['test_report'];
							$image = $rand1.$fil1;
							$video = $rand2.$fil2;
							$bank_acc = $_POST["acc_bank"];
							$acc_name = $_POST["acc_name"];
							$acc_no = $_POST["acc_no"];
							$Ifsc_code = $_POST["ifsc_code"];
							$date = date("Y-m-d");
							
					
							$profile = mysqli_real_escape_string($db, $profile);
							$image = mysqli_real_escape_string($db, $image);
							$video = mysqli_real_escape_string($db, $video);

								if (($_FILES['myfile']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile1/";
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
								
									if (($_FILES['myfile1']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile2/";
								$file = $image;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile1']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile1"]["type"] == "image/jpg") || ($_FILES["myfile1"]["type"] == "image/jpeg")||($_FILES["myfile1"]["type"] == "image/JPEG")||($_FILES["myfile1"]["type"] == "image/png"))
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
								
									if (($_FILES['myfile2']['name']!="")){
							// Where the file is going to be stored
								$target_dir = "profile3/";
								$file = $video;
								$path = pathinfo($file);
								$filename = $path['filename'];
								$ext = $path['extension'];
								$temp_name = $_FILES['myfile2']['tmp_name'];
								$path_filename_ext = $target_dir.$filename.".".$ext; 
									//check file type
									// Check if file already exists
									if (file_exists($path_filename_ext)) {
								    $filemsg="<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; plz choose another photo. </div>";
									}else        //ckeking file type and upload
									{ 
										if (($_FILES["myfile2"]["type"] == "image/jpg") || ($_FILES["myfile2"]["type"] == "image/jpeg")||($_FILES["myfile2"]["type"] == "image/JPEG")||($_FILES["myfile2"]["type"] == "image/png"))
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
								
					        $query = mysqli_query($db, "UPDATE `tbl_buyer` SET `fullname`='$fullname', `username`='$username',`email`='$email',`landline`='$landline',`mobile`='$mobile',`state`='$state',`city`='$city',`address`='$address',`gst`='$gst',
				                                                `aadharcard`='$aadharcard',`story`='$story',`profile`='$profile',`website`='$website',`types`='$types',`test_report`='$test_report',`acc_bank`='$bank_acc',`acc_name`='$acc_name',`acc_no`='$acc_no',`ifsc_code`='$Ifsc_code',`ceo`='$ceo' WHERE `id` ='$id'");
							  }  
							  if(!empty($fil1))
							  {	
								
					        $query = mysqli_query($db, "UPDATE `tbl_buyer` SET `fullname`='$fullname', `username`='$username',`email`='$email',`landline`='$landline',`mobile`='$mobile',`state`='$state',`city`='$city',`address`='$address',`gst`='$pancard',
				                                                `aadharcard`='$aadharcard',`story`='$story',`comp_img`='$image',`website`='$website',`types`='$types',`test_report`='$test_report',`acc_bank`='$bank_acc',`acc_name`='$acc_name',`acc_no`='$acc_no',`ifsc_code`='$Ifsc_code',`ceo`='$ceo' WHERE `id` ='$id'");
							  } 
							  if(!empty($fil2))
							  {	
								
					        $query = mysqli_query($db, "UPDATE `tbl_buyer` SET `fullname`='$fullname', `username`='$username',`email`='$email',`landline`='$landline',`mobile`='$mobile',`state`='$state',`city`='$city',`address`='$address',`gst`='$pancard',
				                                                `aadharcard`='$aadharcard',`story`='$story',`video`='$video',`website`='$website',`types`='$types',`test_report`='$test_report',`acc_bank`='$bank_acc',`acc_name`='$acc_name',`acc_no`='$acc_no',`ifsc_code`='$Ifsc_code',`ceo`='$ceo' WHERE `id` ='$id'");
							  }  
							else
							  {
								$query = mysqli_query($db, "UPDATE `tbl_buyer` SET `fullname`='$fullname', `username`='$username',`email`='$email',`landline`='$landline',`mobile`='$mobile',`state`='$state',`city`='$city',`address`='$address',`gst`='$pancard',
				                                                `aadharcard`='$aadharcard',`story`='$story',`website`='$website',`types`='$types',`test_report`='$test_report',`acc_bank`='$bank_acc',`acc_name`='$acc_name',`acc_no`='$acc_no',`ifsc_code`='$Ifsc_code',`ceo`='$ceo' WHERE `id` ='$id'");
							  }	                                     
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Buyer Updated successfully.</div>"; 
								}
						}
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id'])){} else {echo "hideshow"; } ?>" id="addbuyer">
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Types : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["types"]; ?>" name="types" >
											<option value="">-- Types --</option>
											<option <?php if($row["types"] == "Compony"){ echo "selected='selected'";} ?> value="Compony">Compony</option>
											<option <?php if($row["types"] == "Exporter"){ echo "selected='selected'";} ?> value="Exporter">Exporter</option>
											<option <?php if($row["types"] == "consumer"){ echo "selected='selected'";} ?> value="consumer">consumer</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Test Report : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["test_report"]; ?>" name="test_report" >
											<option value="">-- Select Test Report --</option>
											<option <?php if($row["test_report"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["test_report"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>
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
							    <div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">CEO Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="ceo" id="form-field-1-1" placeholder="Enter CEO Name " class="col-xs-8" value="<?php echo $ceo;?>" required=""/>
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
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Types : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["types"]; ?>" name="types" >
											<option value="">-- Types --</option>
											<option <?php if($row["types"] == "Compony"){ echo "selected='selected'";} ?> value="Compony">Compony</option>
											<option <?php if($row["types"] == "Exporter"){ echo "selected='selected'";} ?> value="Exporter">Exporter</option>
											<option <?php if($row["types"] == "consumer"){ echo "selected='selected'";} ?> value="consumer">consumer</option>
											</select>								
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Test Report : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										    <select class="col-xs-10 col-sm-5" value="<?php echo $row["test_report"]; ?>" name="test_report" >
											<option value="">-- Select Test Report --</option>
											<option <?php if($row["test_report"] == "Yes"){ echo "selected='selected'";} ?> value="Yes">Yes</option>
											<option <?php if($row["test_report"] == "No"){ echo "selected='selected'";} ?> value="No">No</option>
											</select>
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
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">CEO Name : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="ceo" id="form-field-1-1" placeholder="Enter CEO Name " class="col-xs-8" value="<?php echo $ceo;?>" required=""/>
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
								
									$sql = "select * from `tbl_buyer`";
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="display nowrap table  table-striped table-responsive" style="overflow-x:auto">  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>CEO</th>
										<th>Username</th>
										<th>Email</th>
										<th>Landline</th>
										<th>Mobile</th>
										<th>State</th>
										<th>City</th>
										<th>Address</th>
										<th>GST</th>
										<th>Aadharcard</th>
										<th>Story</th>
										<th>Profile</th>
										<th>Website</th>
										<th>COmpony Image</th>
										<th>Types</th>
										<th>Test Report</th>
										<th>Video</th>
										<th>Bank Account</th>
										<th>Account Name</th>
										<th>Account Number</th>
										<th>IFSC Code</th>
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
										<td><?php echo $row["fullname"]; ?></td>
										<td><?php echo $row["ceo"]; ?></td>
										<td><?php echo $row["username"];?></td>
										<td><?php echo $row["email"]; ?> </td>
										<td><?php echo $row["landline"]; ?></td>
										<td><?php echo $row["mobile"]; ?></td>
										<td><?php echo $row["state"]; ?></td>
										<td><?php echo $row["city"]; ?></td>
										<td><?php echo $row["address"]; ?></td>
										<td><?php echo $row["gst"]; ?></td>
										<td><?php echo $row["aadharcard"]; ?></td>
										<td><?php echo $row["story"]; ?></td>
										<td><img src="profile1/<?php echo $row["profile"];?>" height="40px" width="40px"></td>
										<td><?php echo $row["website"]; ?></td>
										<td><img src="profile2/<?php echo $row["comp_img"];?>" height="40px" width="40px"></td>
										<td><?php echo $row["types"]; ?></td>
										<td><?php echo $row["test_report"]; ?></td>
										<td><img src="profile3/<?php echo $row["video"];?>" height="40px" width="40px"></td>
										<td><?php echo $row["acc_bank"]; ?></td>
										<td><?php echo $row["acc_name"]; ?></td>
										<td><?php echo $row["acc_no"]; ?></td>
										<td><?php echo $row["ifsc_code"]; ?></td>
										<td><?php echo $row["date"]; ?></td>
										<td><a href="addbuyer.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="addbuyer.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
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
		