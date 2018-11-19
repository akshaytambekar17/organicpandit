<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $sid = $_POST['sid'];
    	mysql_select_db($dbname);
        $jsonArr=array();
        $str = "SELECT * FROM cities WHERE state_id = $sid";
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