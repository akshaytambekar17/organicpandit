<?php

require 'DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array();
 
    // receiving the post params
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['userrole'];

    if(!empty($username) && !empty($role)){
        
        // get the user by email and password
        $user = $db->getUserByEmailAndPassword($username, $password,$role);
     
        if ($user != false) {
          
               // echo 'use is found';
                $response["status"] = true;
                $response["message"] = "Login Succesfuly.";
                $response["uid"] = $user;
                $response["role"] = $role;

               
                
                echo json_encode($response);
    
        } else {
         
            //echo 'user is not found with the credentials';
            
            $data = array('status' => false ,'message'=>'Login credentials are wrong. Please try again');
     	   // header('Content-type: text/javascript');
            echo json_encode($data);
                 
        }
    
    }

?>