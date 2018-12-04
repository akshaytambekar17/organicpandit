<?php session_start();
$name=$_SESSION['name'];
$id= $_SESSION['registerid'];
$cityid= $_SESSION['cityid']; 


	include ("includes/db.php");	

	$data = array();

	//$sql = "SELECT p.name As `Name`, p.description As `Description`, p.pic_url As `Image Link`, pc.categoryname As `Category`,s.subcategory_name As `Subcategory`,p.product_id, p.cdate As `Date` ,cp.price As `Price`,cp.price_unit As `Unit`,c.city_name As `City`, cp.unit_value As `Unit Value` FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";

	
								if(empty($cityid))
								{
									$sql = "SELECT 
  DISTINCT(o.`order_id`) ,SUM(f.`offer_price`) AS cash ,c.`city_name`,o.`city_id`,o.`shipping_address`,o.`mobileno`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status`,o.`custname`,o.`count`FROM`orderdetail`o JOIN `city` c ON o.`city_id` = c.`id` JOIN `offer_order` f ON o.`order_id` = f.`order_id` WHERE o.`order_status`=0  GROUP BY o.`order_id` DESC";
								}
								else
								{
								$sql = "SELECT 
  DISTINCT(o.`order_id`) ,SUM(f.`offer_price`) AS cash ,c.`city_name`,o.`city_id`,o.`shipping_address`,o.`mobileno`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status`,o.`custname`,o.`count`FROM`orderdetail`o JOIN `city` c ON o.`city_id` = c.`id` JOIN `offer_order` f ON o.`order_id` = f.`order_id` WHERE o.`city_id` = '$cityid' AND o.`order_status`=0 GROUP BY o.`order_id` DESC";
								}
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;


		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['id'] = $id;
				$data[$id]['order_id'] = $row['order_id'];
				$data[$id]['cityname'] = $row['city_name'];
				$data[$id]['custname'] = $row['custname'];
				$data[$id]['mobileno'] = $row['mobileno'];
				$data[$id]['paymenttype'] = $row['payment_type'];
				$data[$id]['shippingaddress'] = $row['shipping_address'];
				$data[$id]['delivaridate'] = $row['delivari_date'];
				$data[$id]['delivaritime'] = $row['delivari_time'];
				//$data[$id]['orderstatus'] = $row['order_status'];
				$data[$id]['count'] = $row['count'];
			    $data[$id]['Total'] = $row['cash']; 
				
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