<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    $name    =$_POST['name'];
    $desc    =$_POST['description'];
    $todate     =$_POST['todate'];
    $fromdate   =$_POST['fromdate'];
    $uid        = $_POST['uid'];
    $quantity      =$_POST['quantity'];
    $quality       =$_POST['quality'];
    $price         =$_POST['price'];
    $product_image = $_POST['product_image'];
    $role = $_POST['role'];
    
    
        mysql_select_db($dbname);
        $date = date("Y-m-d H:i:s");
        $str = "INSERT into $role (pr_id,pr_name,pr_desc,pr_avlTo,pr_avlFrom,pr_qty,pr_quality,pr_price,pr_date) VALUES  ('$uid','$name','$desc', '$todate', '$fromdate','$quantity','$quality','$price','$date')";
       // echo $str;
        $result = mysql_query($str);
        $id = mysql_insert_id();
        if ($id!=-1) {
          // echo 'succes strore';
            $data = array('status' => true ,'pid' => $id,  'message'=>'Product inserted Succesfully.');
            echo json_encode($data);

        } else {
            
          $data = array('status' => false ,'message'=>'Something went wrong,Please try again later.');
          echo json_encode($data);
        }
        
      
}
    
?>