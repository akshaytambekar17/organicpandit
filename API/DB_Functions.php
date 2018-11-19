<?php
 
class DB_Functions {
 
    private $conn;
 
    // constructor
    function __construct() {
      
        require 'DB_Connect.php';
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($fname,$email,$mobile,$password,$role) {
        
    
        $date = date("Y-m-d H:i:s");
        $str = "INSERT into $role (fullname,username,email,mobile,password,date) VALUES('$fname', '$email', '$email','$mobile','$password','$date')";
        
       // echo $str;
        // $stmt = $this->conn->prepare($str);
        //$result = $stmt->execute();
        //$stmt->close();
 
        $last_id ;
        if ($this->conn->query($str) === TRUE) {
             $last_id = $this->conn->insert_id;
         }
        
        // check for successful store
        if ($last_id!=-1) {
            //echo 'succes strore';
            //echo $last_id;
           return $last_id;
           
        } else {
            
            echo 'nonsucces strore';
            return -1;
        }
    }
    
    
     /**
     * Update isGuest user to nonGuest
     * returns user details
     */
    public function updateUser($uid,$name, $email, $password,$coupon,$mobile,$courseid,$deviceid,$isGuest) {
        
       
        $date = date("Y-m-d H:i:s");
        $str = "UPDATE User_Master SET name= '$name',emailid='$email',coupon_code='$coupon',mobile='$mobile',password= '$password',courseid='$courseid',deviceid='$deviceid',createdat='$date',isGuest='$isGuest' WHERE uid='$uid'";
       // echo $str;
        $stmt = $this->conn->prepare($str);
        $result = $stmt->execute();
        $stmt->close();
 
        
        // check for successful store
        if ($result) {
           // echo 'update strore';
            $stmt = $this->conn->prepare("SELECT * FROM User_Master WHERE emailid = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $user;
        } else {
            
            //echo 'nonsucces update';
            return false;
        }
    }
 
 
  /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($username, $passwords,$role) {
 
        $str ="SELECT id,password FROM $role WHERE email = '$username'";
       // echo $str;
        $stmt = $this->conn->prepare($str);
        
        if ($stmt->execute()) {
        
        
           $stmt->store_result();
           $stmt->bind_result($userId,$password );
           $num_of_rows = $stmt->num_rows;
    
	    if($num_of_rows>0){
	          while ($stmt->fetch()) {
	
		       if($password==$passwords){
		       
		          //  echo 'true password';
	                 return $userId;
			  }else{
			
		        	//echo 'false password';
	                return false;
		
			 }
			
			
			 break;
		
	         }
	      }else{   
	          
	       return false;
	       
	      }
	        
            $stmt->free_result();
            $stmt->close();
 
 	}
        
   }
 

 
 
     /**
     * Check user is guest or not
     */
    public function isUserGuest($email){
        
         $str = "SELECT * from User_Master WHERE emailid = '$email'";
         $stmt = $this->conn->prepare($str);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            
           
             if($user['isGuest']){
                 
                // echo 'true';
                  return true;
                 
             }else{
                 // echo 'false';
                  return false;
             }
            
        }
    }
    
    
     /**
     * Check user deviceId
     */
    public function checkDeviceId($email,$deviceid){
        
         $str = "SELECT * from User_Master WHERE emailid = '$email'";
         $stmt = $this->conn->prepare($str);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            
           
           if($user['deviceid']==""){
               
               
                $updatestr = "UPDATE User_Master SET deviceid='$deviceid' WHERE emailid='$email'";
                $stmt = $this->conn->prepare($updatestr);
                $result = $stmt->execute();
                $stmt->close();
               
                 if ($result) {
                     
                      return true;
                      
                 }else{
                     
                      return false;
                 }
              
               
               
           }else{
           
             if($user['deviceid']==$deviceid){
                 
                // echo 'true';
                  return true;
                 
             }else{
                 // echo 'false';
                  return false;
             }
           }
            
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email,$role) {
        
    
        $str = "SELECT username from $role WHERE email = '$email'";
       // echo $str;
        $stmt = $this->conn->prepare($str);
        $stmt->execute();
 
        $stmt->store_result();
        
 
        if ($stmt->num_rows > 0) {
           // echo 'user existed ';
            $stmt->close();
            return true;
        } else {
            //echo 'user not existed';
            $stmt->close();
            return false;
        }
    }
 
 
 
  
 
  /**
     * Get user by email and password
     */
    public function isValidUser($userid) {
 
        $str ="SELECT isActivate FROM usermaster WHERE userId = '$userid'";
        $stmt = $this->conn->prepare($str);
        
        if ($stmt->execute()) {
        
        
           $stmt->store_result();
           $stmt->bind_result($isActivate);
           $num_of_rows = $stmt->num_rows;
    
	    if($num_of_rows>0){
	          while ($stmt->fetch()) {
	
		       if($isActivate==1){
		       
		            //echo 'true ';
	                 return true;
			  }else{
			
		        //	 echo 'false ';
	                return false;
		
			 }
			
			
			 break;
		
	         }
	      }else{   
	          
	       return false;
	       
	      }
	        
            $stmt->free_result();
            $stmt->close();
 
 	}
        
   }
   
 
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
 
}
 
?>