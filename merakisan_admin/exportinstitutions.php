<?php


	include ("includes/db.php");	

	$data = array();


	$sql = "SELECT `id`, `fullname`,`ceo`,`comapny_name`,`username`,`email`,`landline`,`mobile`,`state`,`city`,`address`,`gst`,
	               `aadharcard`,`story`,`website`,`acc_bank`,`acc_name`,
	               `acc_no`,`ifsc_code`,`date` FROM `tbl_institutions` ";
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['id'] = $id;
				$data[$id]['fullname'] = $row['fullname'];
				$data[$id]['ceo'] = $row['ceo'];
				$data[$id]['comapny_name'] = $row['comapny_name'];
				$data[$id]['username'] = $row['username'];
				$data[$id]['email'] = $row['email'];
				$data[$id]['landline'] = $row['landline'];
				$data[$id]['mobile'] = $row['mobile'];
				$data[$id]['state'] = $row['state'];
				$data[$id]['city'] = $row['city'];
				$data[$id]['address'] = $row['address'];
				$data[$id]['gst'] = $row['gst'];
				$data[$id]['aadharcard'] = $row['aadharcard'];
				$data[$id]['story'] = $row['story'];
				$data[$id]['website'] = $row['website'];
				$data[$id]['acc_bank'] = $row['acc_bank'];
				$data[$id]['acc_name'] = $row['acc_name'];
				$data[$id]['acc_no'] = $row['acc_no'];
				$data[$id]['ifsc_code'] = $row['ifsc_code'];
				$data[$id]['date'] = $row['date'];

				
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "Institutionslist" . date('Y-m-d') . ".xls";
	
	// headers for download
	header("Content-Disposition: attachment; filename=\"$fileName\"");
	header("Content-Type: application/vnd.ms-excel");
	
	$flag = false;
	foreach($data as $row) {
		if(!$flag) {
			// display column names as first row
			echo implode("\t", array_keys($row)) . "\n";
			$flag = true;
		}
		// filter data
		array_walk($row, 'filterData');
		echo implode("\t", array_values($row)) . "\n";
	}
	exit;
?>