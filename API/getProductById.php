<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $uid = $_POST['uid'];
        $role = $_POST['role'];
    	mysql_select_db($dbname);
        $jsonArr=array();
        $str = "SELECT * FROM $role WHERE pr_id ='$uid' ";
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