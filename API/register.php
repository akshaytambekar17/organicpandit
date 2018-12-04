<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	echo json_encode($data);

} else{

    require 'DB_Functions.php';
    $db = new DB_Functions();
    
    $fname     =$_POST['fullname'];
    $email     =$_POST['email'];
    $mobile    =$_POST['mobile'];
    $password  =$_POST['password'];
    $role      =$_POST['role'];

    mysql_select_db($dbname);
    if(!empty($fname)  && !empty($email)  && !empty($mobile) &&!empty($password))
      {


        $isuser = $db->isUserExisted($email,$role);

        // check if user is already existed with the same email
        if ($isuser) {
          // echo 'user already existed';
            
            $response["status"] = false;
            $response["message"] = "User already existed with " . $email;
            echo json_encode($response);
            
        }else{
              
            $user = $db->storeUser($fname,$email,$mobile, $password,$role);
           // echo $user;
                if ($user!=-1) {
                    //echo 'user stored successfully';
                    
                     $data = array('status' => true ,'message'=>'Registration succesfully','uid' => $user,'role' => $role);
     	            //header('Content-type: text/javascript');
                 	echo json_encode($data);
                    
                } else {
                    //echo 'user failed to store';
                  
                   $data = array('status' => false ,'message'=>'Unknown error occurred in registration');
     	          //  header('Content-type: text/javascript');
                 	echo json_encode($data);
                 
                }
            
        }
        
      }

        
    
 
}
?>