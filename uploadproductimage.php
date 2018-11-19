<?php

/* $servername = "localhost";
 $username = "organicpandit_mobileuser";
 $password = "Organic@123";
 $dbname = "organicpandit_mobile";*/
 
  $servername = "localhost";
 $username = "db_organicpandit";
 $password = "db_organicpandit";
 $dbname = "db_organicpandit";

 $productid = $_POST['productid'];
 $role      = $_POST['role'];

$tnm = trim($role, '"');
$id = trim($productid, '"');
// Create connection
$conn = mysql_connect($servername, $username, $password);

$target_dir = "upload/product/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename= basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $data = array('status' => false ,'message'=>'Sorry, your file is too large.');
        echo json_encode($data);
    }else{
        // Allow certain file formats
        
           
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                     mysql_select_db($dbname);
                    // Check connection
                    if (!$conn) {
                    
                        //echo mysql_error();
                    	$data = array('status' => 'false');
                    	echo json_encode($data);
                    
                    } else{
                        
                        //$path = "http://organicpandit.com/API/".$target_file;
                        $qry = "UPDATE  $tnm SET pr_image = '$filename'  WHERE id = $id";
                       // echo $qry;
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