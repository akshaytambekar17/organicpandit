<?php 
 $servername = "localhost";
 $username = "db_organicpandit";
 $password = "db_organicpandit";
 $dbname = "db_organicpandit";
//include 'Config.php';
 $uid     =$_POST['uid'];
 $role    =$_POST['role'];
 $key     =$_POST['key'];

$qnm = trim($key, '"');
$tnm = trim($role, '"');
$id = trim($uid, '"');
$target_dir = "home/merakisan/organicpandit.com/upload/profile/";
echo $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check if file already exists
if (file_exists($target_file)) {
    $data = array('status' => false ,'message'=>'Sorry, file already exists.');
    echo json_encode($data);
}else{
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        $data = array('status' => false ,'message'=>'Sorry, your file is too large.');
        echo json_encode($data);
    }else{ 
        // Allow certain file formats
        
           
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                   
                     mysql_select_db($dbname); echo "here";die;
                    // Check connection
                    if (!$conn) {
                    
                        //echo mysql_error();
                    	$data = array('status' => 'false');
                    	header('Content-type: text/javascript');
                    	echo json_encode($data);
                    
                    } else{
                        
                        $path = "http://organicpandit.com/API/".$target_file;
                        $qry = "UPDATE  $tnm SET $qnm = '$path'  WHERE id = $id";
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
}
?>