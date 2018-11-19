<?php session_start();
$registerid = $_SESSION['registerid'];
$cityid= $_SESSION['cityid'];

	include ("includes/db.php");	

	$data = array();

	//$sql = "SELECT p.name As `Name`, p.description As `Description`, p.pic_url As `Image Link`, pc.categoryname As `Category`,s.subcategory_name As `Subcategory`,p.product_id, p.cdate As `Date` ,cp.price As `Price`,cp.price_unit As `Unit`,c.city_name As `City`, cp.unit_value As `Unit Value` FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";

	if($registerid == 1)
									{
										
									$sql = "SELECT ct.`city_name`, f.`farmer_name`,o.`name`,c.`minimum`,c.`maximum`,c.`unit` FROM `farmer_capacity` c JOIN `farmer_register` f  ON c.`farmer_id`=f.`id` JOIN `offer_productlist` o ON c.`product_id`=o.`product_id` JOIN `city` ct ON ct.`id`=f.`city_id`";
								  }
								  else
								  {
								  		$sql = "SELECT ct.`city_name`,f.`farmer_name`,o.`name`,c.`minimum`,c.`maximum`,c.`unit` FROM `farmer_capacity` c JOIN `farmer_register` f  ON c.`farmer_id`=f.`id` JOIN `offer_productlist` o ON c.`product_id`=o.`product_id` JOIN `city` ct ON ct.`id`=f.`city_id` AND f.`city_id`='$cityid'";
								 }
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['id'] = $id;
				$data[$id]['farmername'] = $row['farmer_name'];
				$data[$id]['cityname'] = $row['city_name'];
				$data[$id]['name'] = $row['name'];
				$data[$id]['minimum'] = $row['minimum'];
				$data[$id]['maximum'] = $row['maximum'];
				$data[$id]['unit'] = $row['unit'];
				
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "Farmerproductlist" . date('Y-m-d') . ".xls";
	
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