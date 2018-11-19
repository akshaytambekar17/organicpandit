<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

                 
        mysql_select_db($dbname);
       $arrayRole = array("tbl_farmer","tbl_fpo","tbl_trader","tbl_processor","tbl_buyer","tbl_org_consultant","tbl_org_input","tbl_packaging","tbl_logistic",
                            "tbl_equipment","tbl_exhibitors","tbl_shops","tbl_labs","tbl_gov_agency","tbl_institutions","tbl_restaurant","tbl_ngo");
    	
    	$jsonArr = array();
    	for( $i = 0; $i<17; $i++ ) {
            
             $str = "SELECT count(id) from $arrayRole[$i] ";
            // echo $str;
             $result = mysql_query($str);
           
             while($row = mysql_fetch_assoc($result)){
                 $jsonArr[$i]['count']= $row['count(id)'];
            }

        
         }
         
        $data = array('status' => true,'data' => $jsonArr);
    	echo json_encode($data);
        mysql_close($conn);
}


?>