					<?php
					
						include ("includes/db.php");	
						$msg = "";
						$name= ""; $category =""; $price=""; $price_unit=""; $profile=""; $desc=""; $minorder=""; $maxorder = "";
						$deltype= ""; 
						if(isset($_GET['new']))
						{
							$new = $_GET['new'];
						}
						
						
						
						if(isset($_GET['id']))
						{	
					
							$id= $_GET['id'];
							
							//$sql = "select * from `offer_productlist` where product_id='$id'";
							$sql = "SELECT p.name,p.pic_url,p.description,p.status As p_status,cp.* FROM `product_subadmin` cp, `offer_productlist` p WHERE cp.`product_id` = p.`product_id` AND cp.`id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$catgory = $row["category_id"];
							$subcategory = $row["subcategory_id"];
							$name = $row["name"];
							$cityid = $row['city_id'];
							$category = $row['unit_value'];
							$price = $row["price"];
							$price_unit = $row["price_unit"];
							$profile = $row["pic_url"];
							$desc = $row["description"];
							$farmer = "";
							$deltype = $row['deltype'];
							//$prodtype = $row["producttype"];
							$location = "";
							$maxorder = $row["maxorder"];
							$minorder = $row["minorder"];
							$status= $row['p_status']; 
							
						}
						
						if(isset($_GET['did']))
						{
							$id= $_GET['did'];
							$sql = "delete  from `product_subadmin` where `id`='$id'";
							$rs_result = mysqli_query($db,$sql);
							/*$query = mysqli_query($db,"select * from product_subadmin where product_id = '$id'");
							while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
								$cp_id = $row['id'];
							mysqli_query($db,"delete  from `product_subadmin` where `product_city_id`='$cp_id'");
							}*/
						}
						
						
						if(isset($_POST["submit"]))
						{	
							$fil = $_FILES['myfile']['name'];
							$rand = rand(100000,999999);
							
							$catgory = $_POST["category"];
							$subcategory = $_POST["subcategory"];
						    $ProductName = $_POST["ProductName"];
							$unitval = $_POST["unitval"];
							$price = $_POST["price"];
							$priceunit = $_POST["priceunit"]; 
							$picurl = $rand.$fil;
    						$Description = $_POST["Description"];
							$farmername = ""; 
							$delvtype = $_POST["deltype"];
							$prodtype = " ";
							$city = $_POST['city'];
							$location = ""; 
							$maxqty = $_POST["maxorder"];
    						$minqty = $_POST["minorder"];
    						$status = $_POST['status']; 
							
							//echo "<pre>"; print_R($_POST); die;
							//$Producturl = $_POST["Producturl"];
							$date = date("Y-m-d");
							
							$ProductName = mysqli_real_escape_string($db, $ProductName); 
							$unitval = mysqli_real_escape_string($db, $unitval); 
							$price = mysqli_real_escape_string($db, $price);
							$priceunit = mysqli_real_escape_string($db, $priceunit);
							$picurl = mysqli_real_escape_string($db, $picurl);
							$Description = mysqli_real_escape_string($db, $Description);
							//$city = mysqli_real_escape_string($db, $city);
							
							$farmername = mysqli_real_escape_string($db, $farmername); 
							$delvtype = mysqli_real_escape_string($db, $delvtype); 
							$prodtype = mysqli_real_escape_string($db, $prodtype);
							$location = mysqli_real_escape_string($db, $location);
							$maxqty = mysqli_real_escape_string($db, $maxqty);
							$minqty = mysqli_real_escape_string($db, $minqty);
							
							//$Producturl = mysqli_real_escape_string($db, $Producturl);
							

							 if(empty($ProductName) || empty($catgory) || empty($fil)||empty($Description))
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
						
							  
								                                 
							 $query = mysqli_query($db, "INSERT INTO `offer_productlist`(`category_id`,`subcategory_id`,`name`, `category`, `price`, `price_unit`, `pic_url`, `description`, `product_url`, `cdate`, `status`,`farmername`, `deliverytype`, `producttype`, `location`, `maxorder`, `minorder`) VALUES ('$catgory','$subcategory','$ProductName','$unitval','$price','$priceunit','$picurl','$Description','','$date','','$status','$delvtype','$prodtype','$location','$maxqty','$minqty')");
							  $last_id = mysqli_insert_id($db);
							
							 foreach($city as $val){
							
							$query = mysqli_query($db,"INSERT INTO `product_subadmin`(`product_id`, `city_id`, `category_id`, `subcategory_id`, `unit_value`, `price`, `price_unit`, `maxorder`, `minorder`, `deltype`, `stock`) VALUES ('$last_id','$val','$catgory','$subcategory','$unitval','$price','$priceunit','$maxqty','$minqty','$delvtype','')");
							 }
								
								
								/*mysqli_query($db,"insert into offer_productlist_cities(`product_offer_id`,`p_city_id`,`min`,`max`,`price`,`price_unit`,`unit_value`,`deliverytype`)values('$last_id','$val','$minqty','$maxqty','$price','$priceunit','$unitval','$delvtype')");*/

							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Product Add successfully.</div>"; 
								}
							}
						}
						
						if(isset($_POST["update"]))
						{	
							    $fil = $_FILES['myfile']['name'];
								$rand = rand(100000,999999); 

								$id= $_GET['id'];
								$pid = $_GET['pid'];
								$ProductName = $_POST["ProductName"];
								$maxqty = $_POST["maxorder"];
								$minqty = $_POST["minorder"];
								$price = $_POST["price"];
								$description =$_POST['Description'];
								$delvtype = $_POST["deltype"];
								$priceunit = $_POST["priceunit"];
								$picurl = $rand.$fil; 
								$unitval	= $_POST['unitval'];
								$date = date("Y-m-d");
								$status = $_POST['status'];
                                                                   	
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
								
								
								$query = mysqli_query($db,"UPDATE `product_subadmin` SET `unit_value`='$unitval',`price`='$price',`price_unit`='$priceunit',`maxorder`='$maxqty',`minorder`='$minqty',`deltype`='$delvtype' WHERE `id`='$id'");
                                if(!empty($fil))
							  {	
								 mysqli_query($db,"UPDATE `offer_productlist` SET `name`='$ProductName',`status` = '$status', `description`='$description',`pic_url`='$picurl' WHERE `product_id`='$pid' ");
                              }else{
                               mysqli_query($db,"UPDATE `offer_productlist` SET `name`='$ProductName',`status` = '$status', `description`='$description' WHERE `product_id`='$pid' ");
                             }  
								if($query)
								{
								
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Product updated successfully.</div>"; 
								}

                                
								
								/* 
								$query = mysqli_query($db,"update offer_productlist_cities set `max`='$maxqty', `min` ='$minqty',`price` = '$price',`deliverytype`='$delvtype',`price_unit`='$priceunit',`unit_value`='$unitval' where `product_city_id` = '$id'");
								$fil = $_FILES['myfile']['name'];
								$rand = rand(100000,999999);
								
								$catgory = $_POST["category"];
							    $subcategory = $_POST["subcategory"];
								$ProductName = $_POST["ProductName"]; 
								$category = $_POST["unitval"];
								
								
								$picurl = $rand.$fil;
								$Description = $_POST["Description"];
								//$Producturl = $_POST["Producturl"];
								
								$city = $_POST['city'];
								$farmername = ""; 
								
								$prodtype = " ";
								$location = ""; 
								
								$date = date("Y-m-d");
								
								$ProductName = mysqli_real_escape_string($db, $ProductName); 
								$category = mysqli_real_escape_string($db, $category); 
								$price = mysqli_real_escape_string($db, $price);
								$priceunit = mysqli_real_escape_string($db, $priceunit);
								$picurl = mysqli_real_escape_string($db, $picurl);
								$Description = mysqli_real_escape_string($db, $Description);
						
								$city = mysqli_real_escape_string($db, $city);
								$farmername = mysqli_real_escape_string($db, $farmername); 
								$delvtype = mysqli_real_escape_string($db, $delvtype); 
								$prodtype = mysqli_real_escape_string($db, $prodtype);
								$location = mysqli_real_escape_string($db, $location);
								$maxqty = mysqli_real_escape_string($db, $maxqty);
								$minqty = mysqli_real_escape_string($db, $minqty);
					
					
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
						  
							 $query = mysqli_query($db, "UPDATE `offer_productlist` SET `city_id`='$city',`category_id`='$catgory',`subcategory_id`='$subcategory',`name`='$ProductName',`category`='$category',`price`='$price',`price_unit`='$priceunit',`pic_url`='$picurl',`description`='$Description',`cdate`='$date',`farmername`='$farmername',`deliverytype`='$delvtype',`producttype`='$prodtype',`location`='$location',`maxorder`='$maxqty',`minorder`='$minqty' WHERE `product_id` ='$id'");
							 
							  }
							  else
							  {
								$query = mysqli_query($db, "UPDATE `offer_productlist` SET `category_id`='$catgory',`subcategory_id`='$subcategory',`name`='$ProductName',`category`='$category',`price`='$price',`price_unit`='$priceunit',`description`='$Description',`cdate`='$date',`farmername`='$farmername',`deliverytype`='$delvtype',`producttype`='$prodtype',`location`='$location',`maxorder`='$maxqty',`minorder`='$minqty' WHERE `product_id` ='$id'");  
							  }	  
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Product updated successfully.</div>"; 
								}*/
								
							
						}
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id']) || isset($new) || isset($catgory)){} else {echo "hideshow"; } ?>" id="productadd">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
						
							<?php if(empty($id)){ ?>
								<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Category : <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select name="category" id="ctaegory" class="col-xs-12">
											<option>select category</option>
											<?php $sql = "select `category_id`,`categoryname` from `product_category`";
											$rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{ ?>
											<option value="<?php echo $row['category_id'] ?>" <?php if($row['category_id'] == $catgory){ echo "selected='selected'"; }?>> <?php echo $row['categoryname']?></option> 
											
											<?php
										}
									  ?>
										</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> product Name: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<input type="text" name="ProductName" id="form-field-1-1" placeholder="Product Name" class="col-xs-12" value="<?php echo $name;?>"/>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Min qty order:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="minorder" id="form-field-1-1" placeholder="Enter min order" class="col-xs-12" value="<?php echo $minorder;?>"/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Max qty order:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
								<input type="text" name="maxorder" id="form-field-1-1" placeholder="Enter max order" class="col-xs-12" value="<?php echo $maxorder;?>" />
											
											
										</div>
									</div>
								
									<!--
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Farmer Name:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<select name="farmername" id="ctaegory" class="col-xs-12">
											<option>Select Farmer</option>
											<?php /*$sql = "select `id`,`farmer_name` from `farmer_register`";
								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{ ?>
											<option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $farmer){ echo "selected='selected'"; }?>> <?php echo $row['farmer_name'];?></option> 
											
											<?php
										}*/
									  ?>
									  
									  
											</select>
										</div>
									</div>-->
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Delivery Type:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="deltype" id="form-field-1-1" placeholder="Enter Delivery Type" class="col-xs-12" value="<?php echo $deltype;?>"/>
										</div>
									</div>
									
									</div>
									
									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Select Subcategory : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<select name="subcategory" id="subcat" class="col-xs-12">
											<option>select category first</option>
											</select>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Description : <font style="color:red">*</font></label>
										<div class="col-sm-6">
										<textarea  class="col-xs-12"  name="Description"  placeholder="Description"/><?php echo $desc;?></textarea>
									
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1-1"> Price :<font style="color:red">*</font>
										</label>
										
										<div class="col-sm-6">
											<input type="text" name="price" id="form-field-1-1" placeholder="Enter Price" class="col-xs-12 " value="<?php echo $price;?>"/>
										</div>
											
									</div>
								
									
									<!--<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1-1"> Address:<font style="color:red">*</font>
										 </label>
											<div class="col-sm-6">
										<input type="text" name="location" id="form-field-1-1" placeholder="Enter Location" class="col-xs-12" value="<?php //echo $location;?>"/>
										</div>
									</div>
									-->
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1-1"> City:<font style="color:red"></font>
										 </label>

										<div class="col-sm-6">
											<select name="city[]" id="city" class="col-xs-12 selectpicker" multiple data-selected-text-format="count">
											<option>select city</option>
											<?php $cid = $_SESSION['cityid'];
											if(empty($cid))
											{
												$sql = "select `id`,`city_name` from `city`";
											}
											else
											{
												$sql = "select `id`,`city_name` from `city` where `id`='$cid'";
											}

								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{ ?>
											<option value="<?php echo $row['id'] ?>" <?php if($row['id'] == $cid){ echo "selected='selected'"; }?>> <?php echo $row['city_name']?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
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
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Unit:<font style="color:red">*</font></label>
										</label>
																			
										<div class="col-sm-8">
										<select name="priceunit" class="col-xs-10">
											<option value=""> Select Unit </option>
											
											<option value="gm" <?php if($price_unit =='gm'){ echo "selected='selected'"; }?>>GM</option>
											<option value="liter" <?php if($price_unit =='liter'){ echo "selected='selected'"; }?>>LITER</option>
											<option value="kg" <?php if($price_unit =='kg'){ echo "selected='selected'"; }?>>KG</option>
											<option value="unit"<?php if($price_unit == 'unit'){ echo "selected='selected'"; }?>>UNIT</option>
											<option value="piece"<?php if($price_unit == 'piece'){ echo "selected='selected'"; }?>>PIECE</option>
											<option value="bunch"<?php if($price_unit == 'bunch'){ echo "selected='selected'"; }?>>BUNCH</option>
											<option value="douzen"<?php if($price_unit == 'douzen'){ echo "selected='selected'"; }?>>DOUZEN</option>
										</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Unit Value:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="unitval" id="form-field-1-1" placeholder="Enter Unit Value" class="col-xs-10" value="<?php echo $category;?>"/>
										</div>
									</div>
										<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Status:<font style="color:red">*</font>			</label>

										<div class="col-sm-8">
									<select name="status" class="col-xs-10">
									<option value="0" <?php if($status=='0'){ echo "selected='selected'"; }?>>Active</option>
									<option value="1" <?php if($status =='1'){ echo "selected='selected'"; }?>>De-active</option>
											
									</select>
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
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">Category:<font style="color:red">*</font>
											 </label>
								<?php $category_name = mysqli_fetch_array(mysqli_query($db,"select `categoryname` from `product_category` where `category_id` = '$catgory'")); ?>							
											<div class="col-sm-8">
												<input type="text" name="" readonly id="form-field-1-1" placeholder="Enter min order" class="col-xs-12" value="<?php echo $category_name['categoryname'];?>"/>
											</div>
										</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Min qty order:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="minorder" id="form-field-1-1" placeholder="Enter min order" class="col-xs-12" value="<?php echo $minorder;?>"/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Max qty order:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
										<input type="text" name="maxorder" id="form-field-1-1" placeholder="Enter max order" class="col-xs-12" value="<?php echo $maxorder;?>" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Description : <font style="color:red">*</font></label>
										<div class="col-sm-8">
										<textarea  class="col-xs-12"  name="Description"  placeholder="Description"/><?php echo $desc;?></textarea>
									
										</div>
									</div>
										</div>
								<div class="col-md-4">
								
											<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">Product Name:<font style="color:red">*</font>
											 </label>
									<div class="col-sm-8">
									<input type="text" name="ProductName" id="form-field-1-1" placeholder="Enter min order" class="col-xs-12" value="<?php echo $name; ?>"/>
											</div>
										</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Price :<font style="color:red">*</font>
										</label>
										
										<div class="col-sm-8">
											<input type="text" name="price" id="form-field-1-1" placeholder="Enter Price" class="col-xs-12 " value="<?php echo $price;?>"/>
										</div>
											
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Delivery Type:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="deltype" id="form-field-1-1" placeholder="Enter Delivery Type" class="form-control" value="<?php echo $deltype;?>"/>
										</div>
										</div>
										<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Status:<font style="color:red">*</font>			</label>
							

										<div class="col-sm-8">
									<select name="status" class="col-xs-10">
									<option value="0" <?php if($status=='0'){ echo "selected='selected'"; }?>>Active</option>
									<option value="1" <?php if($status=='1'){ echo "selected='selected'"; }?>>De-active</option>
											
									</select>
										</div>		
										</div>
										
									</div>
									<div class="col-md-4">	
								
											<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">City:<font style="color:red">*</font>
											 </label>
											 
								<?php 
										$city_name = mysqli_fetch_array(mysqli_query($db,"SELECT `city_name` FROM `city` WHERE `id`= '$cityid'"));
								?>							
									<div class="col-sm-8">
									<input type="text" name="" readonly id="form-field-1-1" placeholder="City" class="col-xs-12" value="<?php echo $city_name['city_name']; ?>"/>
											</div>
										</div>

                                       	
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Picture_url: <font style="color:red">*</font></label>

										<div class="col-sm-8">
										<?php if(!empty($profile)) { ?>
										<img src="profile/<?php echo $profile;?>" height="40px" width="40px"> 
										<?php }?>
										<input type="file" name="myfile" class ="col-xs-10" value="<?php echo $profile;?>"> 
										</div>
										
									</div>

										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Unit:<font style="color:red">*</font></label>
										</label>
																			
										<div class="col-sm-8">
										<select name="priceunit" class="col-xs-12">
											<option value=""> Select Unit </option>
											
											<option value="gm" <?php if($price_unit =='gm'){ echo "selected='selected'"; }?>>GM</option>
											<option value="liter" <?php if($price_unit =='liter'){ echo "selected='selected'"; }?>>LITER</option>
											<option value="kg" <?php if($price_unit =='kg'){ echo "selected='selected'"; }?>>KG</option>
											<option value="unit"<?php if($price_unit == 'unit'){ echo "selected='selected'"; }?>>UNIT</option>
											<option value="piece"<?php if($price_unit == 'piece'){ echo "selected='selected'"; }?>>PIECE</option>
											<option value="bunch"<?php if($price_unit == 'bunch'){ echo "selected='selected'"; }?>>BUNCH</option>
											<option value="douzen"<?php if($price_unit == 'douzen'){ echo "selected='selected'"; }?>>DOUZEN</option>
										</select>
										</div>
									</div>
								
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Unit Value:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-8">
											<input type="text" name="unitval" id="form-field-1-1" placeholder="Enter Unit Value" class="col-xs-12" value="<?php echo $category;?>"/>
										</div>
									</div>
									
				
										
									</div>
									
									</div>
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
							<div class="col-xs-12">
							
								
								<?php
								
									$sql = "SELECT pc.categoryname,s.subcategory_name,.p.product_id,p.name,p.pic_url,p.description,p.cdate,cp.price,cp.price_unit,cp.unit_value,cp.id,c.city_name,p.status FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped">  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Category</th>
										<th>Subcategory</th>
										<th>City</th>
										<th>Price</th>
										<th>Price Unit</th>	
										<th>Product Picture</th>
										<th>Date</th>
										<th>Farmer</th>
										<th>Status</th>
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
										<td><?php echo $row["categoryname"];?></td>
										<td><?php echo $row["subcategory_name"];?></td>
										<td><?php echo $row["city_name"];?></td>
										<td><?php echo $row["price"];?></td> 
										<td><?php echo "Per".' '.$row['unit_value'].' '.$row["price_unit"]; ?>	</td>  
										<td><img src="profile/<?php echo $row["pic_url"];?>" height="40px" width="40px"> </td> 
										<td><?php echo $row['cdate'];  ?></td>
										<td><a href="farmproduct.php?pid=<?php echo $row['product_id']; ?>">Farmer</a></td>
										<td><?php if($row['status']==0){ echo "Active";}else{ echo "De-active"; } ?></td>
										<td><a href="productadd.php?id=<?php echo $row['id'];?>&pid=<?php echo $row['product_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="productadd.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										</tr> 
									<?php $no++;
									} ?>
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