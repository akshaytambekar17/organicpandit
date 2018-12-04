<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $uid = $_POST['uid'];
        $role = $_POST['userrole'];
    	mysql_select_db($dbname);
        $str = "SELECT * FROM $role WHERE id = $uid";
        $result = mysql_query($str);
        $jsonArr=array();

        while($row = mysql_fetch_assoc($result))
        {
        
        	$jsonArr[]=$row;
        }

        $data = array('status' => true,'data' => $jsonArr);
    	echo json_encode($data);
        mysql_close($conn);
}


?>