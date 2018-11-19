<?php

/* $servername = "localhost";
 $username = "organicpandit_mobileuser";
 $password = "Organic@123";
 $dbname = "organicpandit_mobile";*/
 
  $servername = "localhost";
 $username = "db_organicpandit";
 $password = "db_organicpandit";
 $dbname = "db_organicpandit";

 $uid     =$_POST['uid'];
 $key     =$_POST['key'];
 $role     =$_POST['role'];


$qnm = trim($key, '"');
$tnm = trim($role, '"');
$id = trim($uid, '"');

// Create connection
$conn = mysql_connect($servername, $username, $password);
$target_dir="";
if($qnm=="resume"){
   $target_dir = "upload/resume"; 
}

if($qnm=="catalouge"){
     $target_dir = "upload/doc"; 
}

if($qnm=="video"){
     $target_dir = "upload/video"; 
}
 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    $data = array('status' => false ,'message'=>'Sorry, file already exists.');
    echo json_encode($data);
}else{
    
        // Allow certain file formats
        
           
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                     mysql_select_db($dbname);
                    // Check connection
                    if (!$conn) {
                    
                        //echo mysql_error();
                    	$data = array('status' => 'false');
                    	header('Content-type: text/javascript');
                    	echo json_encode($data);
                    
                    } else{
                        
                       // $path = "http://organicpandit.com/API/".$target_file;
                        $qry = "UPDATE  $tnm SET $qnm = '$filename'  WHERE id = $id";
                      //  echo $qry;
                        $result = mysql_query($qry);
                        if($result==1){
                            
                            $data = array('status' => true ,'message'=>'your file was uploaded.');
                         	echo json_encode($data);
                                     	
                        }else{
                            
                            $data = array('status' => false ,'message'=> 'Something went wrong,Please try again later.');
                            echo json_encode($data);
                        }
                        
                    }
                    
                } else {
                     $data = array('status' => false ,'message'=>'sorry, your file was not uploaded.');
                     echo json_encode($data);
                }
            
        
    
}
?>