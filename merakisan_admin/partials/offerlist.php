					
					<?php 
					if(isset($_GET['id']))
					{
						$id= $_GET['id'];
					}
					
					$msg=""; 
					if(isset($_POST['submit']))
					{
						$offerprice =$_POST['offerprice'];
						$offerprice = mysqli_real_escape_string($db, $offerprice); 
						
						
						$query = mysqli_query($db, "UPDATE `product_offer` SET `offer_price`='$offerprice' WHERE `offer_id` ='$id'");
						mysqli_query($db,"update product_subadmin set `offer_price` = '$offerprice' where `offer_id`='$id'");
					
					if($query)
								{
								 $msg = "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button>
										<i class='ace-icon fa fa-check green'></i> &nbsp; Thank You! Your Offer Updated successfully.</div>"; 
								}
					}
					
					
					if(isset($_GET['id']))
					{
						
						$sql = mysqli_query($db,"SELECT p.*,c.`city_name` FROM `product_offer` p,`city` c WHERE p.`city_id`= c.`id` AND p.`offer_id`='$id'");
						$row = mysqli_fetch_array($sql);
						$name= $row['product_name'];
						$city= $row['city_name'];
						$price= $row['main_price'];
						$offerprice= $row['offer_price'];
						
					}
					
					
					
					if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `product_offer` where `offer_id`='$did'";
							mysqli_query($db,"update product_subadmin set `offer_id`='0',`offer_price` = '0' where `offer_id`='$did'");
							$rs_result = mysqli_query($db,$sql);
							
						}
					
					?>
					
					
					
					<div class="page-content">
							<?php	//echo $filemsg ?>
						<?php echo $msg;?>
						
						<div class="row <?php if(isset($cityid) || isset($new) || isset($catgory)){} else {echo "hideshow"; } ?>" id="productadd">
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
									
									
									</div>
								<div class="col-md-4">
										<div class="form-group">
											<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1">City:<font style="color:red">*</font>
											 </label>
									<div class="col-sm-8">
									<input type="text" name="" readonly id="form-field-1-1" placeholder="City" class="col-xs-12" value="<?php echo $city; ?>"/>
											</div>
										</div>
										
										<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Offer Price :<font style="color:red">*</font>
										</label>
										
										<div class="col-sm-8">
											<input type="text" name="offerprice" id="form-field-1-1" placeholder="Enter  offer Price" class="col-xs-12 " value="<?php echo $offerprice;?>"/>
										</div>
											
									</div>	
									</div>
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<?php if(isset($_GET['id'])) { ?>
											<button class="btn btn-info" type="submit" name="submit" onSubmit="return ValidateForm()">
											
												<i class="ace-icon fa fa-check bigger-110"></i>
												Upadate
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
								if($registerid == 1)
								{ 

								$sql = "SELECT p.*,c.`city_name` FROM `product_offer` p,`city` c WHERE p.`city_id`= c.`id` order by p.`product_name` ASC ";
								}
								else
								{
									$sql = "SELECT p.*,c.`city_name` FROM `product_offer` p,`city` c WHERE p.`city_id`= c.`id` AND p.`city_id`='$cityid' order by p.`product_name` ASC ";	
								}
								
								
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>city</th>
										<th>Image</th>
										<th>price</th>
										<th>Offerprice</th>
										<th>Unit</th>
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
										<td><?php echo $row["product_name"]; ?></td>
										<td><?php echo $row["city_name"]; ?> </td>
										<td><img src="profile/<?php echo $row["image"];?>" height="40px" width="40px"> </td> 
										<td><?php echo $row["main_price"]; ?> </td>
										<td><?php echo $row["offer_price"]; ?> </td>
										<td><?php echo $row["price_unit"]; ?> </td>
										<td><a href="offerlist.php?id=<?php echo $row['offer_id'];?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#007700"></i></a> </td>
										<td><a href="offerlist.php?did=<?php echo $row['offer_id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"> <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a></td>
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