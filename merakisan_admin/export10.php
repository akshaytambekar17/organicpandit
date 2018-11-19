<?php session_start();
$name=$_SESSION['name'];
$id= $_SESSION['registerid'];
$cityid= $_SESSION['cityid']; 


	include ("includes/db.php");	

	$data = array();

	//$sql = "SELECT p.name As `Name`, p.description As `Description`, p.pic_url As `Image Link`, pc.categoryname As `Category`,s.subcategory_name As `Subcategory`,p.product_id, p.cdate As `Date` ,cp.price As `Price`,cp.price_unit As `Unit`,c.city_name As `City`, cp.unit_value As `Unit Value` FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";

	
								if(empty($cityid))
								{
									$sql = "SELECT d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id` WHERE o.`order_status`=1 GROUP BY o.`order_id` DESC";
								}
								else
								{
								$sql = "SELECT d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id` WHERE o.`city_id` = '$cityid' AND o.`order_status`=1 GROUP BY o.`order_id` DESC";
								}
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['NO'] = $id;
				$data[$id]['ORDERNO'] = $row['order_id'];
				$data[$id]['NAME'] = $row['name'];
	
				$data[$id]['MOBILE'] = $row['mobile'];
				$data[$id]['PAYMENT'] = $row['payment_type'];
				$data[$id]['SHIPPINGADDRESS'] = $row['shipping_address'];
				$data[$id]['DATE'] = $row['delivari_date'];
				$data[$id]['TIME'] = $row['delivari_time'];
				
				
		}

	function filterData(&$str)
	{
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}
	
	// file name for download
	$fileName = "Orderlist" . date('Y-m-d') . ".xls";
	
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