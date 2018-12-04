					<?php 
					if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `tbl_user` where `id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
							
						}
					
					?>
					<div class="page-content">
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								
								$sql = "SELECT `id`,`name`,Email,`mobile`,`status`,`date` ,`auto_date` FROM `tbl_user` order by `id` DESC ";
								
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Registration Date</th>
										<th>Status</th>
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
										<td><?php echo $row["Email"];?></td>
										<td><?php echo $row["mobile"]; ?> </td>
										<td><?php echo $row["date"];?> </td>
										<td><?php if($row['mobile']!=''){  ?> <span <i class="fa fa-mobile fa-2x" aria-hidden="true" style="color:#770000"></i> </span> <?php } else { ?> <span<i class="fa fa-facebook fa-2x" aria-hidden="true" style="color:#0044ff"></i> </span><?php }?>  </td>
										<td><a href="userlist_web.php?did=<?php echo $row['id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"> <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a></td>
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