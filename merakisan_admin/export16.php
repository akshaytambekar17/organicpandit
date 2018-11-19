

<?php
session_start();
$registerid = $_SESSION['registerid'];
  $cityid = $_SESSION['cityid'];

	include ("includes/db.php");	

	$data = array();

	//$sql = "SELECT p.name As `Name`, p.description As `Description`, p.pic_url As `Image Link`, pc.categoryname As `Category`,s.subcategory_name As `Subcategory`,p.product_id, p.cdate As `Date` ,cp.price As `Price`,cp.price_unit As `Unit`,c.city_name As `City`, cp.unit_value As `Unit Value` FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";

		$sql = "SELECT t.`register_id`,t.`username`,t.`mobile`,t.`name`,t.`address`,t.`emailid`,c.`city_name`  FROM `tbl_registration` t JOIN `city` c ON t.`city_id`=c.`id` WHERE t.`register_id` > 1";
								
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;
		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['Id'] = $id;
				$data[$id]['Name'] = $row['name'];
				$data[$id]['Username'] = $row['username'];
				$data[$id]['Mobile'] = $row['mobile'];
				$data[$id]['Address'] = $row['address'];
				$data[$id]['Email'] = $row['emailid'];
				$data[$id]['City'] = $row['city_name'];
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "Productlist" . date('Y-m-d') . ".xls";
	
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