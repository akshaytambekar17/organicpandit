<?php session_start();
//$name=$_SESSION['name'];
//$id= $_SESSION['registerid'];
//$cityid= $_SESSION['cityid']; 


	include ("includes/db.php");	

	$data = array();

	//$sql = "SELECT p.name As `Name`, p.description As `Description`, p.pic_url As `Image Link`, pc.categoryname As `Category`,s.subcategory_name As `Subcategory`,p.product_id, p.cdate As `Date` ,cp.price As `Price`,cp.price_unit As `Unit`,c.city_name As `City`, cp.unit_value As `Unit Value` FROM `offer_productlist` p JOIN `product_subadmin`cp ON p.`product_id` = cp.`product_id`  JOIN  `city` c  ON  cp.city_id = c.id LEFT JOIN `product_category` pc  ON p.category_id = pc.category_id  LEFT JOIN `product_subcategory` s ON p.subcategory_id=s.id";

	 $date = new DateTime($date_ymd);
						        $dateonly=$date->format('Y-m-d');
							$todate=$dateonly;
								if(empty($cityid))
								{
									$sql = "SELECT  SUM(f.`product_qty`) AS Qty, f.`order_id`,f.`product_qty`,f.`product_name`,f.`offer_price`,f.`date`,o.`price_unit`,o.`category` FROM `offer_order`f,`offer_productlist`o WHERE o.`product_id` = f.`product_id` AND f.`date`>= '$todate' group by f.`product_id` ";
								}
								else
								{
								$sql = "SELECT  SUM(f.`product_qty`) AS Qty, f.`order_id`,f.`product_qty`,f.`product_name`,f.`offer_price`,f.`date`,o.`price_unit`,o.`category` FROM `offer_order`f,`offer_productlist`o WHERE o.`product_id` = f.`product_id` AND f.`date`>= '$todate' group by f.`product_id` ";
								}
		$rs_result = mysqli_query($db,$sql);  
		$i = 1 ;
        $subtotal = array();
        $unit = array();

		while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
		{
				$id = $i++;
				$data[$id]['NO'] = $id;
				//$data[$id]['ORDERNO'] = $row['order_id'];
				$data[$id]['PRODUCT NAME'] = $row['product_name'];
				$data[$id]['PRODUCT QUENTITY'] = $row['Qty'];
				$data[$id]['PRICE'] = $row['offer_price'];
				 $unit = $row['category'].'-'.$row['price_unit'];
				$data[$id]['UNIT'] = $unit;
				 $subtotal = $row['Qty']*$row['offer_price'];
				$data[$id]['SUBTOTAL'] =  $subtotal;
				
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