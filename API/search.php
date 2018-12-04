 <?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    $role      =$_POST['role'];
    $state     =$_POST['state'];
    $city      =$_POST['city'];
    $certificate =$_POST['certificate'];
    $product     =$_POST['product'];
    
    mysql_select_db($dbname);
    $str ="SELECT * from $role WHERE state = '$state' ";
    
    if(!empty($city) ){
       $str.=" AND city = '$city'"; 
        
    }
    
     if(!empty($certificate) ){
       $str.=" AND certification  = '$certificate'"; 
        
    }
    
    //echo $str;
      $jsonArr = array();
    
        $result = mysql_query($str);
        while($row = mysql_fetch_assoc($result))
        {
        
             if(!empty($product) ){

            	$uid = $row['uid'];
            	$productQuery = "SELECT * from productmaster WHERE uid = '$uid' AND name = '$product' ";
            	$resultProduct = mysql_query($productQuery);
            	$num_rows = mysql_num_rows($resultProduct);
               // echo $num_rows;
                
                if ($num_rows > 0) {
                
                    $jsonArr[]=array_map('utf8_encode', $row);;
                }
            //	echo $productQuery;
            	
             }else{
            	$jsonArr[]=array_map('utf8_encode', $row);
             }
        }

        $data = array('status' => true,'data' => $jsonArr);
    	echo json_encode($data);

}


?>