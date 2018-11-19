<?php


	include ("includes/db.php");	

	$data = array();


	$sql = "SELECT `id`, `pr_id`, `pr_name`, `pr_desc`, `pr_avlFrom`, `pr_avlTo`, `pr_qty`, `pr_quality`, `pr_price`, `pr_date` FROM `tbl_pr_processor` ";
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['id'] = $id;
				$data[$id]['pr_id'] = $row['pr_id'];
				$data[$id]['pr_name'] = $row['pr_name'];
				$data[$id]['pr_desc'] = $row['pr_desc'];
				
				$data[$id]['pr_avlFrom'] = $row['pr_avlFrom'];
				$data[$id]['pr_avlTo'] = $row['pr_avlTo'];
				$data[$id]['pr_qty'] = $row['pr_qty'];
				$data[$id]['pr_quality'] = $row['pr_quality'];
				$data[$id]['pr_price'] = $row['pr_price'];
				$data[$id]['pr_date'] = $row['pr_date'];
				
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "Processorproductlist" . date('Y-m-d') . ".xls";
	
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