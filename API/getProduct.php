<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

        $role = $_GET['role'];
    	mysql_select_db($dbname);
    	$jsonArr=array();
        $str = "SELECT pr_name FROM $role GROUP BY pr_name";
       // echo $str;
        //$str = "SELECT id,name FROM $role";

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