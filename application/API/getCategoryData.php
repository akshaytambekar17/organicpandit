<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $jsonArr=array();
        $role = $_POST['role'];
    	mysql_select_db($dbname);
    	
    	
    
        $str = "SELECT * FROM $role";
        $result = mysql_query($str);
        $jsonArr =array();
        //echo $str;
        while($row = mysql_fetch_assoc($result))
        {
            $jsonArr[]=array_map('utf8_encode', $row);
            
         }
     
        $data = array('status' => true,'data' => $jsonArr);
        echo json_encode($data);
        mysql_close($conn);
}


?>