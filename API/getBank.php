<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $jsonArr=array();
        $uid = $_POST['uid'];
        $role = $_POST['role'];
    	mysql_select_db($dbname);
    	
        $str = "SELECT * FROM $role WHERE  id =$uid";
        $result = mysql_query($str);

        while($row = mysql_fetch_assoc($result))
        {
        
        	$jsonArr[]=$row;
        }

        $data = array('status' => true,'data' => $jsonArr);
    	echo json_encode($data);
        mysql_close($conn);
}


?>