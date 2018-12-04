<?php session_start();
$registerid = $_SESSION['registerid'];
$cityid= $_SESSION['cityid'];

	include ("includes/db.php");	

	$data = array();

	$sql = "SELECT * from `tbl_user` order by id DESC";
				
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['NO'] = $id;
				$data[$id]['NAME'] = $row['name'];
				$data[$id]['USERNAME'] = $row['username'];
				$data[$id]['MOBILE'] = $row['mobile'];
				$data[$id]['EMAIL'] = $row['Email'];
				$data[$id]['REGISTRATION DATE'] = $row['date'];
				
				
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "WebUserList" . date('Y-m-d') . ".xls";
	
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