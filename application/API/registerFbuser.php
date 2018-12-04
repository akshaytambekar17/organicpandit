<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{
    
    require 'DB_Functions.php';
    $db = new DB_Functions();
    $fname     =$_POST['firstname'];
    $email     =$_POST['email'];
    $role      =$_POST['userrole'];

    mysql_select_db($dbname);
    if(!empty($fname) && !empty($email))
      {


               $isuser = $db->isUserExisted($email,$role);

                // check if user is already existed with the same email
                 if ($isuser) {
                  // echo 'user already existed';
                $str = "SELECT id FROM $role WHERE email = '$email'";
                //echo $str;
                $result = mysql_query($str);
                $jsonArr=array();
                $id="";
                while($row = mysql_fetch_assoc($result))
                {
                
                	$id=$row['id'];
                }
                $data = array('status' => true ,'message'=>'Registration succesfully','uid' => $id,'role' => $role);
            	echo json_encode($data);
    
        }else{
                      
                     $date = date("Y-m-d H:i:s");
                     $str = "INSERT into $role (fullname,email,username,date) VALUES  ('$fname','$email','$email','$date')";
                   // echo $str;
                    $result = mysql_query($str);
                    $id = mysql_insert_id();
                    if($id!=-1){
                        
                        $data = array('status' => true ,'message'=>'Registration succesfully','uid' => $id,'role' => $role);
                     	echo json_encode($data);
                                 	
                    }else{
                        
                        $data = array('status' => false ,'message'=>'Unknown error occurred in registration');
                         echo json_encode($data);
                    }
                    
                    
                    
                   
                    
                
        
         }
          
      }
}
?>