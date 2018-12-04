<script type="text/javascript">
$(document).ready(function(){
	
$('#myModal').on('show.bs.modal', function(e) {
	var $modal = $(this),
      id = e.relatedTarget.id;
	  var strarray = id.split('&');
	  //alert(strarray[1]);
	  
		$.ajax({
            cache: false,
            type: 'POST',
            url: 'ajaxData.php',
            data: 'order_id=' + strarray[0] + '&city_id=' + strarray[1],
            success: function(data) {
				$modal.find('.data-content').html(data);
			}
		});
	});
});
 $(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
    });
    </script>
</script>

		<?php 
		//print_r($_SESSION);

			if(isset($_POST['deliveryboy']))
			{
				$boyid = $_POST['deliveryboy'];
				$order_id  = $_POST['order_id'];
				$date =date("y-m-d");

				mysqli_query($db,"update orderdetail set `delivery_boy` = '$boyid' where order_id ='$order_id'");
				$squery = mysqli_query($db,"INSERT INTO `assign_boy`(`order_id`, `boyid`, `date`) VALUES ('$order_id','$boyid','$date')");	
			
			}
		
			if(isset($_POST['orderStatus'])){
			
				$status = $_POST['status'];
				$order_id  = $_POST['order_id'];
				mysqli_query($db,"update orderdetail set `order_status` = '$status' where order_id ='$order_id'");
			}
					if(isset($_GET['did']))
						{
							$did= $_GET['did'];
							$sql = "delete  from `orderdetail` where `order_id`='$did'";
								
							$rs_result = mysqli_query($db,$sql);
							
							$sql1 = "delete  from `offer_order` where `order_id`='$did'";
								
							$rs_result1 = mysqli_query($db,$sql1);
						}
         
						if(isset($_POST['submit']))
						{
						 $fromdate=$_POST['fromdate'];
						 $todate=$_POST['todate'];
						 $category=$_POST['category']; 
						   $fromdate2= date('Y-m-d', strtotime($fromdate));
						   $todate2= date('Y-m-d', strtotime($todate));
						 $_SESSION['fromdate']=$fromdate;
						 $_SESSION['todate']=$todate;
						 $_SESSION['category']=$category;
						 
						$srno=0;
						}

					?>
				
					<div class="page-content">
					<form class="form-horizontal" role="form" method="post" action="">
						<div class="col-xs-4">
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> From Delivery Date <font style="color:red">*</font> </label>
										<div class="col-sm-8">
					                     <input type="text" id="datepicker" data-date="12-02-2012" data-date-format="dd-mm-yyyy"  class="form-control" value="<?php if($_SESSION['fromdate']!=''){echo $_SESSION['fromdate'];}else{echo date('d-m-Y');}?>" name="fromdate"  />										
										</div>
									</div>
								</div>
								
								<div class="col-xs-4">								
									<div class="form-group">
										<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> To Delivery Date <font style="color:red">*</font> </label>
										<div class="col-sm-8">
										<input type="text" id="datepicker1" data-date="12-02-2012" data-date-format="dd-mm-yyyy"  class="form-control" value="<?php if($_SESSION['todate']!=''){echo $_SESSION['todate'];}else{echo date('d-m-Y');}?>" name="todate"  />
										</div>
										
										</div>
								</div>

								<div class="col-xm-2">
								<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Category : <font style="color:red">*</font></label>
										
											<select name="category" id="ctaegory" class="col-xs-2">
											<option>All</option>
											<?php $sql = "select `category_id`,`categoryname` from `product_category`";
											$rs_result = mysqli_query($db,$sql); 
										while($row=mysqli_fetch_array($rs_result))
										{ ?>
											<option value="<?php echo $row['category_id'] ?>" <?php if($row['category_id'] == $row['categoryname']){ echo "selected='selected'"; }?>> <?php echo $row['categoryname']?></option> 
											
											<?php
										}
									  ?>
										</select>
								</div>
								
								<div class="col-xm-2">
																
								<button type="submit" class="btn btn-sm btn-primary" name="submit" style="height:35px">
									<i class="ace-icon fa fa-search align-top bigger-100"></i>
							    Search									
								</button>

								</div>
								</form>
							
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php
								if(empty($cityid) && empty($fromdate2) && empty($todate2 ))
								{ 
									$sql = "SELECT c.`city_name` , f.`date` , o.`city_id` , o.`order_id` , o.`shipping_address` , o.`mobileno` , o.`payment_type` , o.`delivari_date` , o.`delivari_time` , o.`order_status` , o.`custname` , o.`count`
FROM `orderdetail` o
INNER JOIN `city` c ON o.`city_id` = c.`id`
INNER JOIN offer_order f ON f.`order_id` = o.`order_id`
GROUP BY o.`order_id` DESC";
								}else if(empty($cityid)&& ($fromdate2!='') && ($todate2!='' )){ 
								$sql = "SELECT c.`city_name` , f.`date` , o.`city_id` , o.`order_id` , o.`shipping_address` , o.`mobileno` , o.`payment_type` , o.`delivari_date` , o.`delivari_time` , o.`order_status` , o.`custname` , o.`count`
FROM `orderdetail` o
INNER JOIN `city` c ON o.`city_id` = c.`id`
INNER JOIN offer_order f ON f.`order_id` = o.`order_id` 
 WHERE o.`delivari_date` BETWEEN '$fromdate2' AND '$todate2' GROUP BY o.`order_id` DESC ";	
								}
								else if($cityid!='' && empty($fromdate2) && empty($todate2 ))
								{ 
								$sql = "SELECT c.`city_name` , f.`date` , o.`city_id` , o.`order_id` , o.`shipping_address` , o.`mobileno` , o.`payment_type` , o.`delivari_date` , o.`delivari_time` , o.`order_status` , o.`custname` , o.`count`
FROM `orderdetail` o
INNER JOIN `city` c ON o.`city_id` = c.`id`
INNER JOIN offer_order f ON f.`order_id` = o.`order_id` 
 WHERE  o.`city_id`='$cityid'  GROUP BY o.`order_id` DESC";
								}
								else{ 
									$sql = "SELECT c.`city_name` , f.`date` , o.`city_id` , o.`order_id` , o.`shipping_address` , o.`mobileno` , o.`payment_type` , o.`delivari_date` , o.`delivari_time` , o.`order_status` , o.`custname` , o.`count`
FROM `orderdetail` o
INNER JOIN `city` c ON o.`city_id` = c.`id`
INNER JOIN offer_order f ON f.`order_id` = o.`order_id` 
 WHERE o.`delivari_date` BETWEEN '$fromdate2' AND '$todate2' AND o.`city_id`='$cityid'  GROUP BY o.`order_id` DESC ";
								}
								$rs_result = mysqli_query($db,$sql);  
								
								?>
                               
		
							   
								<table id="myTable" class="table table-striped" >  
									<thead>  
									  <tr>  
										<th>Sr No</th>
										<th>Order No</th>
										<th>City</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Type</th>
										<th>Address</th>
                                        <th>Order Date</th>										
										<th>Delivery Date</th>
										<th>Time</th>
										<th>Status</th>
										<th>Count</th>
										<th>Print</th>
										<th>Delete</th>
									  </tr>  
									</thead>  
									<tbody> 
									
									<?php
									$no= 1;
									while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
									{  $row["date"];
								       $newDate = date("d-m-Y", strtotime($row["date"])); 
									   /*
									   $row["delivari_date"];
									   $pieces = explode("-", $row["delivari_date"]);
									   $day=$pieces[0];
									   $month=$pieces[1];
									   $year=$pieces[2];
									 $out=$year."-".$month."-".$day;
									 $row["order_id"];
									 mysqli_query($db,"update orderdetail set `delivari_date` = '$out' where order_id ='".$row['order_id']."'");
									 */
									?>  
										<tr>
										<td><?php echo $no; ?></td>
										<td>#<?php echo $row["order_id"]; ?></td>
										<td><?php echo $row["city_name"]; ?></td>		
										<td><?php echo $row["custname"];?></td>
										<td><?php echo $row["mobileno"]; ?> </td> 
										<td><p class="<?php if($row["payment_type"]=='COD' || $row["payment_type"]=='ONLINE'){echo "green";}else{echo "red";}?>"><?php echo $row["payment_type"]; ?> </p></td>
										<td><?php echo $row['shipping_address'];?></td>
										<td><?php echo $newDate; ?> </td>
										<td><?php echo $row["delivari_date"]=date('d-m-Y', strtotime($row["delivari_date"])); ?> </td> 
										<td><?php echo $row["delivari_time"]; ?> </td> 
										<td>  <a href="#" id="<?php echo $row['order_id']; ?>&<?php echo $row['city_id'];?>" data-toggle="modal" data-target="#myModal"><?php if ($row['order_status']==0){ ?> <span style="color:#ff0000"><?php echo "Processing";?> </span><?php }elseif($row['order_status']==1){ ?> <span style="color:#0000ff"> <?php echo "Complete"; ?></span><?php } elseif($row['order_status']==3){ ?> <span style="color:#0000ff"> <?php echo "Cancel"; ?></span><?php } else{ ?> <span style="color:#007700"> <?php echo "Assigned"; ?></span> <?php  }  ?> </a></td>
										<td><a href="orderdetail.php?id=<?php echo $row['order_id'];?>" style="color:#007700">C-<i class="badge"></i><?php echo $row['count'];?></a></td>
										<td><a href="invoice.php?orderid=<?php echo $row['order_id'];?>" target="_blank"><i class="fa fa-print fa-2x" aria-hidden="true" style="color:#007700"></i></a></td>
										<td><a href="orderdetail.php?did=<?php echo $row['order_id'];?>" onclick="return confirm('<?php echo "Do you want to delete?";?>')"> <i class="fa fa-trash-o fa-2x" aria-hidden="true" style="color:#007700"></i></a></td>
										
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
					
									  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Order Status</h4>
        </div>
        <div class="modal-body data-content">
          
        </div>
       
      </div>
      
    </div>
  </div>
