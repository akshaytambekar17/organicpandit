<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    $bankname   =$_POST['bankname'];
    $accname    =$_POST['accname'];
    $accno      =$_POST['accnumber'];
    $ifsc       =$_POST['ifsc'];
    $uid        = $_POST['uid'];
    $role        = $_POST['role'];
    
        mysql_select_db($dbname);
          
          $str = "UPDATE  $role SET acc_bank = '$bankname' ,acc_name = '$accname',acc_no ='$accno' ,ifsc_code = '$ifsc' WHERE id = $uid";
          
         // echo $str;
     
            $result = mysql_query($str);
         
            if($result==1){
                
                $data = array('status' => true ,'message'=>'Bank updated Succesfully.');
             	echo json_encode($data);
                         	
            }else{
                
                $data = array('status' => false ,'message'=>'Something went wrong,Please try again later.');
                 echo json_encode($data);
            }
        
    }
    
?>