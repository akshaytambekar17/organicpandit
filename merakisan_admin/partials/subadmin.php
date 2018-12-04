					<?php
					
						include ("includes/db.php");	
						$msg = "";
						$name= ""; $category =""; $price=""; $price_unit=""; $profile=""; $desc=""; $catgory=""; 
						$productid =""; $minorder=""; $maxorder=""; $unitvalue=""; $deltype="";
						if(isset($_GET['new']))
						{
							$new = $_GET['new'];
						}

						
						
						if(isset($_GET['id']))
						{	$id= $_GET['id'];
							$sql = "select * from `product_subadmin` where id='$id'";
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$catgory = $row["category_id"];
							$subcategory = $row["subcategory_id"];
							$productid = $row["product_id"];
							$cityid = $row['city_id'];
							$price = $row["price"];
							$price_unit = $row["price_unit"];
							$unitvalue = $row["unit_value"];
							$maxorder = $row["maxorder"];
							$minorder = $row["minorder"];
							$deltype =  $row["deltype"];
							
						}
						
						if(isset($_GET['did']))
						{
							$id= $_GET['did'];
							$sql = "delete  from `product_subadmin` where `id`='$id'";
								
							$rs_result = mysqli_query($db,$sql);
						}
						
						
						if(isset($_POST["submit"]))
						{	
							
							$catgory = $_POST["category"];
							$subcategory = $_POST["subcategory"];
						    $ProductName = $_POST["ProductName"]; 
							$unitvalue = $_POST["unitval"];
							$price = $_POST["price"];
							$priceunit = $_POST["priceunit"];
							$delvtype = $_POST["deltype"];
							$city = $_POST['city'];
							$maxqty = $_POST["maxorder"];
    						$minqty = $_POST["minorder"];
							
							
							//$Producturl = $_POST["Producturl"];
							$date = date("Y-m-d");
							
							$catgory = mysqli_real_escape_string($db, $catgory);
							$ProductName = mysqli_real_escape_string($db, $ProductName); 
							$unitvalue = mysqli_real_escape_string($db, $unitvalue); 
							$price = mysqli_real_escape_string($db, $price);
							$priceunit = mysqli_real_escape_string($db, $priceunit);
							$subcategory = mysqli_real_escape_string($db, $subcategory);
							$city = mysqli_real_escape_string($db, $city);
							
							$delvtype = mysqli_real_escape_string($db, $delvtype);
							$maxqty = mysqli_real_escape_string($db, $maxqty);
							$minqty = mysqli_real_escape_string($db, $minqty);
							
							//$Producturl = mysqli_real_escape_string($db, $Producturl);
							

							 if(empty($ProductName) || empty($catgory) || empty($price) ||empty($priceunit)||empty($unitvalue) || empty($delvtype) || empty($maxqty) || empty($minqty) || empty($city))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else
							{ 
								
									                                                     
							 $query = mysqli_query($db, "INSERT INTO `product_subadmin`(`id`, `product_id`, `city_id`, `category_id`, `subcategory_id`, `unit_value`, `price`, `price_unit`, `maxorder`, `minorder`, `deltype`,`stock`, `status`) VALUES ('','$ProductName','$city','$catgory','$subcategory','$unitvalue','$price','$priceunit','$maxqty','$minqty','$delvtype','','0')");
							
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
						    $catgory = $_POST["category"];
							$subcategory = $_POST["subcategory"];
						    $ProductName = $_POST["ProductName"]; 
							$unitvalue = $_POST["unitval"];
							$price = $_POST["price"];
							$priceunit = $_POST["priceunit"];
							$delvtype = $_POST["deltype"];
							$city = $_POST['city'];
							$maxqty = $_POST["maxorder"];
    						$minqty = $_POST["minorder"];
							
							
							//$Producturl = $_POST["Producturl"];
							$date = date("Y-m-d");
							
							$catgory = mysqli_real_escape_string($db, $catgory);
							$ProductName = mysqli_real_escape_string($db, $ProductName); 
							$unitvalue = mysqli_real_escape_string($db, $unitvalue); 
							$price = mysqli_real_escape_string($db, $price);
							$priceunit = mysqli_real_escape_string($db, $priceunit);
							$subcategory = mysqli_real_escape_string($db, $subcategory);
							$city = mysqli_real_escape_string($db, $city);
							
							$delvtype = mysqli_real_escape_string($db, $delvtype);
							$maxqty = mysqli_real_escape_string($db, $maxqty);
							$minqty = mysqli_real_escape_string($db, $minqty);
					
					                 $query = mysqli_query($db,"UPDATE `product_subadmin` SET `unit_value`='$unitvalue',`price`='$price',`price_unit`='$priceunit',`maxorder`='$maxqty',`minorder`='$minqty',`deltype`='$delvtype' WHERE `id`='$id'");
								
						  
							/* $query = mysqli_query($db, "UPDATE `offer_productlist` SET `city_id`='$city',`category_id`='$catgory',`subcategory_id`='$subcategory',`name`='$ProductName',`category`='$category',`price`='$price',`price_unit`='$priceunit',`pic_url`='$picurl',`description`='$Description',`cdate`='$date',`farmername`='$farmername',`deliverytype`='$delvtype',`producttype`='$prodtype',`location`='$location',`maxorder`='$maxqty',`minorder`='$minqty' WHERE `product_id` ='$id'");*/
							 
							  
							 
							  
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							
								if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Product updated successfully.</div>"; 
								}
						}
						
						
						
					?>
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($id) || isset($new) || isset($catgory)){} else {echo "hideshow"; } ?>" id="productadd">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
	
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
										{?>
											<option value="<?php echo $row['category_id'] ?>" <?php if($row['category_id'] == $catgory){ echo "selected='selected'"; }?>> <?php echo $row['categoryname']?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
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
											<input type="text" name="maxorder" id="form-field-1-1" placeholder="Enter max order" class="col-xs-12" value="<?php echo $maxorder;?>"/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> City:<font style="color:red"></font>
										 </label>

										<div class="col-sm-8">
											<select name="city" id="city" class="col-xs-12">
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
										{?>
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
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1">Select Subcategory : <font style="color:red">*</font></label>
										<div class="col-sm-6">
											<select name="subcategory" id="subcat" class="col-xs-12">
											<option>select category first</option>
											</select>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1-1"> Price :<font style="color:red">*</font>
										</label>
										
										<div class="col-sm-6">
											<input type="text" name="price" id="form-field-1-1" placeholder="Enter Price" class="col-xs-12" value="<?php echo $price;?>"/>
										</div>
											
									</div>
									<div class="form-group">
										<label class="col-sm-6 control-label no-padding-right" for="form-field-1-1"> Delivery Type:<font style="color:red">*</font>
										 </label>

										<div class="col-sm-6">
											<input type="text" name="deltype" id="form-field-1-1" placeholder="Enter Delivery Type" class="col-xs-12" value="<?php echo $deltype;?>"/>
										</div>
									</div>
									
									
                                    </div>


									<div class="col-md-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Select Product: <font style="color:red">*</font></label>
										<div class="col-sm-8">
											<select name="ProductName" id="ctaegory" class="col-xs-12">
											<option>Select product</option>
											<?php $sql = "select `product_id`,`name` from `offer_productlist` order by `name` ASC";
								      $rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{?>
											<option value="<?php echo $row['product_id']; ?>" <?php if($row['product_id'] == $productid){ echo "selected='selected'"; }?>> <?php echo $row['name'];?></option> 
											
											<?php
										}
									  ?>
									  
									  
											</select>
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
											<input type="text" name="unitval" id="form-field-1-1" placeholder="Enter Unit Value" class="col-xs-10" value="<?php echo $unitvalue;?>"/>
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

								$sql ="SELECT pc.categoryname,s.subcategory_name,.p.product_id,p.name,p.pic_url,p.description,p.cdate,cp.price,cp.price_unit,cp.unit_value,cp.id,c.city_name FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id WHERE cp.`city_id` ='$cid'";
								
								//$sql = "SELECT o.`product_id`,o.`name`,o.`pic_url`,o.`cdate`,p.`id`,p.`product_id`,p.`unit_value`,p.`price`,p.`price_unit` FROM `offer_productlist` o  JOIN `product_subadmin` p ON o.`product_id` = p.`product_id` WHERE p.`city_id` ='$cid'";
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Product Name</th>
										<th>Category</th>
										<th>Subcategory</th>
										<th>Product Picture</th>
										<th>Price</th>
										<th>Price Unit</th>	
										<th>Date</th>
										<th>Farmer</th>	
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
										<td><img src="profile/<?php echo $row["pic_url"];?>" height="40px" width="40px"> </td>
										
										<td><?php echo $row["price"];?></td> 
										<td><?php echo "Per".' '.$row['unit_value'].' '.$row["price_unit"];?></td> 
										<td><?php echo $row['cdate'];?></td>
										<td><a href="farmproduct.php?pid=<?php echo $row['product_id']; ?>">Farmer</a></td>
										<td><a href="?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"><i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										</tr> 
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