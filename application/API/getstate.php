<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    	mysql_select_db($dbname);
        $str = "SELECT * FROM states WHERE country_id= 101";
        $result = mysql_query($str);
        $jsonArr=array();
        while($row = mysql_fetch_assoc($result))
        {
        
        	$jsonArr[]=$row;
        }

        $data = array('status' => true,'data' => $jsonArr);
    	header('Content-type: text/javascript');
    	echo json_encode($data);

        mysql_close($conn);
}


?>