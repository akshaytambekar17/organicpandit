					
					<?php
					$cid = $_SESSION['cityid'];
					//echo $cid; die;
						include ("includes/db.php");	
						$msg = "";
						$name= ""; $category =""; $price=""; $price_unit=""; $profile=""; $desc=""; $unit_value="";

						if(isset($_GET['new']))
						{
							$new = $_GET['new'];
						}
						
						
						
						if(isset($_GET['id']))
						{	
					
							$cityid= $_GET['id'];
							$pid = $_GET['pid'];
							
							
							$sql = "SELECT p.`product_id`,p.`name`,p.`pic_url`,p.`description`,p.`cdate`,cp.`id`,cp.`price`,cp.`price_unit`,cp.`unit_value`,cp.`city_id`,c.`city_name` FROM `offer_productlist` p, `product_subadmin` cp , `city` c WHERE p.`product_id` = cp.`product_id` AND cp.`city_id` = c.`id` AND cp.`city_id` ='$cityid' AND cp.`product_id`='$pid'";

							
								
							$rs_result = mysqli_query($db,$sql);  
							$row=mysqli_fetch_array($rs_result);
							$name = $row["name"];
							$cityid = $row['city_id'];
							$price = $row["price"];
							$price_unit = $row["price_unit"];
							$profile = $row["pic_url"];
							$unit = $row['unit_value'];
							$cityname = $row["city_name"];
						}
						
						
						if(isset($_POST["submit"]))
						{	
							


							$cityid= $_GET['id'];
							$pid = $_GET['pid'];
							
							$name = $_POST["name"];
							$image = $_POST["picture"];
							$price = $_POST["price"];
							$offerprice = $_POST["offerprice"];
							$priceunit = $_POST['unitval']." ".$_POST["priceunit"]; 
							
							
							
							
							
							
							//echo "<pre>"; print_R($_POST); die;
							//$Producturl = $_POST["Producturl"];
							$date = date("Y-m-d");
							
							$cityid = mysqli_real_escape_string($db, $cityid); 
							$pid = mysqli_real_escape_string($db, $pid); 
							$name = mysqli_real_escape_string($db, $name);
							$image = mysqli_real_escape_string($db, $image);
							$price = mysqli_real_escape_string($db, $price);
							$offerprice = mysqli_real_escape_string($db, $offerprice);
							$priceunit = mysqli_real_escape_string($db, $priceunit);

							
							//$Producturl = mysqli_real_escape_string($db, $Producturl);
							$query11 = mysqli_query($db, "SELECT * FROM `product_offer` WHERE `product_id`='$pid' AND `city_id` ='$cityid'");
							
					if(mysqli_num_rows($query11) > 0)
					{

							 $msg = "<div class='alert alert-block alert-danger'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> Product Allready Added In Offer.</div>"; 

					}
					else
					{	

							 if(empty($offerprice))
							{ 
							$msg = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; Mandatory fields mark with asterisk (*) </div>";
							}
							else if(mysqli_num_rows($query) > 0)
							{
								$msg = "<div class='alert alert-info'>
									<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
									<i class='ace-icon fa fa-times'></i> &nbsp; The Product allready added in offer </div>";
								
							}
							
							else
							{ 
								
								                                 
							 $query = mysqli_query($db, "INSERT INTO `product_offer`(`offer_id`, `product_id`, `city_id`, `product_name`, `image`, `main_price`, `offer_price`, `price_unit`, `status`) VALUES ('','$pid','$cityid','$name','$image','$price','	$offerprice','$priceunit','')");
							  $offer_id = mysqli_insert_id($db);
							 mysqli_query($db,"update product_subadmin set `offer_id` = '$offer_id',`offer_price` = '$offerprice' where `product_id`='$pid' AND `city_id`='$cityid'");
							 
							
							
							
							if (!$query) {	
								printf("Error: %s\n", mysqli_error($db));													
								exit();
								}   
							if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Product Added In Offer.</div>"; 
								}
							}


						}
							
						}
						
						
						
						
					?>

					
					
					<?php $user_check; //echo $date_ymd; //Display User Name ?> 
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($_GET['id']) || isset($new) || isset($catgory)){} else {echo "hideshow"; } ?>" id="productadd">
							<div class="col-xs-12">
	<!---------------------------PAGE CONTENT BEGINS------------------------------>
							<?php if(isset($_GET['id'])){ ?>
								<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
									<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">Product Name:<font style="color:red">*</font>
											 </label>
									<div class="col-sm-8">
									<input type="text" name="name" readonly id="form-field-1-1" placeholder="Enter min order" class="col-xs-12" value="<?php echo $name; ?>"/>
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
									<input type="hidden" name="picture" id="form-field-1-1" class="col-xs-12 " value="<?php echo $profile;?>"/>
									
									</div>
									<div class="form-group">
									<input type="hidden" name="cityid" id="form-field-1-1" class="col-xs-12 " value="<?php echo $cityid;?>"/>
									
									</div>
									
									</div>
								<div class="col-md-4">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">City:<font style="color:red">*</font>
											 </label>
									<div class="col-sm-8">
									<input type="text" name="" readonly id="form-field-1-1" placeholder="City" class="col-xs-12" value="<?php echo $cityname; ?>"/>
											</div>
										</div>
										
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Offer Price :<font style="color:red">*</font>
										</label>
										
										<div class="col-sm-8">
											<input type="text" name="offerprice" id="form-field-1-1" placeholder="Enter  offer Price" class="col-xs-12 " value="<?php ?>"/>
										</div>
											
									</div>	
									</div>
									<div class="col-md-4">	
									
											
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Unit:<font style="color:red">*</font></label>
										</label>
																			
										<div class="col-sm-8">
										<select name="priceunit" class="col-xs-10" readonly>
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
											<input type="text" name="unitval" readonly id="form-field-1-1" placeholder="Enter Unit Value" class="col-xs-10" value="<?php echo $unit;?>"/>
										</div>
									</div>
									</div>
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<?php if(isset($_GET['id'])) { ?>
											<button class="btn btn-info" type="submit" name="submit" onSubmit="return ValidateForm()">
											
												<i class="ace-icon fa fa-check bigger-110"></i>
												ADD
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
							
							</div><!-- /.col -->
						</div><!-- /.row -->
						</div>
						
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								if(!empty($cid))
								{

									//$sql = "select * from `offer_productlist`";
									$sql = "SELECT p.`product_id`,p.`name`,p.`pic_url`,p.`description`,p.`cdate`,cp.`id`,cp.`price`,cp.`unit_value`,cp.`price_unit`,cp.`city_id`,c.`city_name` FROM `offer_productlist` p, `product_subadmin` cp , `city` c WHERE p.`product_id` = cp.`product_id` AND cp.`city_id` = c.`id` AND cp.`city_id` ='$cid'";
								}
								else
								{
									$sql = "SELECT p.`product_id`,p.`name`,p.`pic_url`,p.`description`,p.`cdate`,cp.`id`,cp.`price`,cp.`unit_value`,cp.`price_unit`,cp.`city_id`,c.`city_name` FROM `offer_productlist` p, `product_subadmin` cp , `city` c WHERE p.`product_id` = cp.`product_id` AND cp.`city_id` = c.`id`";
								}
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>City</th>
										<th>Price</th>
										<th>Price Unit</th>	
										<th>Product Picture</th>	
										<th>Description</th>
										<th>Date</th>	
										<th>Farmer</th>
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
										<td><?php echo $row["city_name"];?></td>
										<td><?php echo $row["price"];?></td> 
										<td><?php echo "Per".' '.$row['unit_value'].' '.$row["price_unit"]; ?>	</td>  
										<td><img src="profile/<?php echo $row["pic_url"];?>" height="40px" width="40px"> </td> 
										
										 
										<td><?php $tem= $row["description"]; echo $desc= substr($tem, 0, 100);
										?>	</td>  
										
										<td><?php echo $row['cdate'];?></td>
										<td><a href="addofferproduct.php?id=<?php echo $row['city_id'];?>&pid=<?php echo $row['product_id']?>">Add To Offer</a> </td>
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