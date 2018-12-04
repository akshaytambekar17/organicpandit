<?php
	
	if(isset($_POST['agency_username']))
	{
	
		$username=$_POST['agency_username'];
		//Get all state data
		$query = mysqli_query("select `username` from `tbl_certification` WHERE `username`='$username'");
		
		//Count total number of rows
		$rowCount = mysqli_num_rows($query);
		
		//Display states list
		if($rowCount > 0){
			echo '<option value="">Select Subcategory</option>';
			while($row = mysqli_fetch_array($query)){ 
				echo '<option value="'.$row['id'].'">'.$row['subcategory_name'].'</option>';
			}
		}else{
			echo '<option value="">subcategory not available</option>';
		}
	}


?>