<?php
	
	include ("includes/db.php");
	if(isset($_POST['subid']))
	{
	
		$id=$_POST['subid'];
		//Get all state data
		$query = mysqli_query($db,"select `id`,`subcategory_name` from `product_subcategory` WHERE `category_id`='$id'");
		
		//Count total number of rows
		$rowCount = mysqli_num_rows($query);
		
		//Display states list
		if($rowCount > 0){
			echo '<option value="">Select category</option>';
			while($row = mysqli_fetch_array($query)){ 
				echo '<option value="'.$row['id'].'">'.$row['subcategory_name'].'</option>';
			}
		}else{
			echo '<option value="">subcategory not available</option>';
		}
	}


?>