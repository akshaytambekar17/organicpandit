<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
            $response["status"] = false;
            $response["message"] = "Connection failed";
            echo json_encode($response);

} else{
    
    require 'DB_Functions.php';
    $db = new DB_Functions();
   $email=$_POST['email'];
   $role=$_POST['role'];

   mysql_select_db($dbname);



         if(!empty($email)){
         
              $isuser = $db->isUserExisted($email,$role);
              
               // check if user is existed with the same email
            if ($isuser) {
              
                  $str = "SELECT * from $role where email = '$email'";
                  $result = mysql_query($str);
        
                while($row = mysql_fetch_assoc($result))
                {
                    
                	if($row['email'] == $email){
                	    
                       $msg = " Dear ".$row['fullname']." , \nWe've received a request to reset your password \nYour Password is :- " .$row['password'];
                         //echo $msg;
                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        
                        
                         // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers = "From: help@organicpandit.com";

                        // send email $email
                         mail($email,$row['first_name']." , your password is successfully reset.",$msg);
                        
                        $response["status"] = true;
                        $response["message"] = "password will be sent to registered email address,Please check mail.";
                        echo json_encode($response);
                    
                	}
                }
    
              
                
            }else{
                
                // user not  existed
                $response["status"] = false;
                $response["message"] = "User not  existed with " . $email;
                echo json_encode($response);
            }
         
        }

    
}

?>