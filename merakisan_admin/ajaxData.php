<?php 
session_start();
//$cityid=$_SESSION['cityid'];


include('includes/db.php');
if(isset($_POST['stateid'])){
	$stateid = $_POST['stateid'];
	
		$sql = "select * from `city` where state_id ='$stateid'";
				$rs_result = mysqli_query($db,$sql); 
				echo '<option>select city</option>';
				while($row=mysqli_fetch_array($rs_result))
			{
				echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
			}
									  
}

if(isset($_POST['order_id'])){
	
	$cityid = $_POST['city_id'];
	
	$sql = "SELECT `id`,`name`,`vehicle` FROM `delivery_boy` WHERE `city_id`='$cityid' order by `name` ASC";
	$res = mysqli_query($db,$sql);
	
	$order_id = $_POST['order_id'];
	
	$sql = mysqli_fetch_array(mysqli_query($db,"select order_status from `orderdetail` where order_id ='$order_id'"));
	$status	= $sql['order_status'];
	echo '
          	<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Change Order Status: <font style="color:red">*</font></label>
					<div class="col-sm-8">';
					if($status == 0){
					echo '<input type="radio" name="status" value="0" checked>Processing &nbsp;';
					}else{
					echo '<input type="radio" name="status" value="0">Processing &nbsp;';
					}
					if($status == 1){
					echo '<input type="radio" name="status" value="1" checked>Complete &nbsp;';
					}else{
					echo '<input type="radio" name="status" value="1">Complete &nbsp;';
					}
					if($status == 2){
					echo '<input type="radio" name="status" value="2" checked>Assign &nbsp;';
					}else{
					echo '<input type="radio" name="status" id="assign" value="2">Assign &nbsp;';
					}
					if($status == 3){
					echo '<input type="radio" name="status" value="3" checked>Cancel &nbsp;';
					}else{
					echo '<input type="radio" name="status" id="assign" value="3">Cancel &nbsp;';
					}
					
				echo '</div>
				</div>
				<input type="hidden" name="order_id" value="'.$order_id.'">
				
				<div class="form-group" id="assign">
					<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Select Delivery Boy: <font style="color:red">*</font></label>
					<div class="col-sm-6">
						<select name="deliveryboy" id="delboy" class="col-xs-12">
						<option>select category</option>';
					while($row=mysqli_fetch_array($res))
					{
						
					echo'<option value="'.$row['id'].'"> '.$row['name'].'('.$row['vehicle'].')</option>'; 
						
						
					}
				
				  
				  
					echo '</select>
					</div>
				</div>
				<div class="form-group">
				
				<input class="btn btn-info" style="float:right" value="submit" type="submit" name="orderStatus">&nbsp;&nbsp;
				 </div>
				
				</div>
			</div>
		</form>
      ';
}
?>