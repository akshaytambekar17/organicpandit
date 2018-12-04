<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    $name    =$_POST['name'];
    $email   =$_POST['email'];
    $address =$_POST['address'];
    $query   =$_POST['query'];

        mysql_select_db($dbname);

            $str = "INSERT into contactmaster (name,email,address,query) VALUES  ('$name','$email', '$address', '$query')";
            $result = mysql_query($str);
         
            if($result==1){
                
                $data = array('status' => true ,'message'=>'Query inserted succesfully.');
             	echo json_encode($data);
                         	
            }else{
                
                $data = array('status' => false ,'message'=>'Something went wrong,Please try again later.');
                 echo json_encode($data);
            }
        

}
    
?>