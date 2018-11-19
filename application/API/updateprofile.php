<?php
include 'Config.php';
if (!$conn) {

    //echo mysql_error();
	$data = array('status' => 'false');
	header('Content-type: text/javascript');
	echo json_encode($data);

} else{

    
    $uid       =$_POST['uid'];
    $fname     =$_POST['firstname'];
    $email     =$_POST['email'];
    $mobile    =$_POST['mobile'];
    $password  =$_POST['password'];
    $landline  =$_POST['landline'];
    $stateid   =$_POST['stateid'];
    $cityid    =$_POST['cityid'];
    $address   =$_POST['address'];
    $pan       =$_POST['pan'];
    $adhar     =$_POST['adhar'];
    $story     =$_POST['story'];
    $certification      =$_POST['certification'];
    $isvisit            =$_POST['isvisit'];
    $isreport           =$_POST['isreport'];
    $no_of_farmer       =$_POST['no_of_farmer'];
    $fponame            =$_POST['fponame'];
    $ceo                =$_POST['ceo'];
    $website            =$_POST['website'];
    $type_of_buyer      =$_POST['types'];
    $name_of_company   =$_POST['name_of_company'];
    $gst  =$_POST['gst'];
    $role  =$_POST['role'];


    
    mysql_select_db($dbname);

    $str="";
    if($role=="tbl_farmer"){
        
        $str = "UPDATE  $role SET fullname = '$fname' ,email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', pancard='$pan', aadharcard='$adhar', story='$story', certification = '$certification',
                visitq = '$isvisit', test_report = '$isreport'  WHERE id = $uid ";
          
        
        
    }

    if($role=="tbl_buyer"){
        
        $str = "UPDATE  $role SET fullname = '$fname', ceo='$ceo',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', story='$story',
                 test_report = '$isreport', types = '$type_of_buyer', website = '$website' WHERE id = $uid ";
          
        
        
    }
    
    if($role=="tbl_equipment"){
        
        $str = "UPDATE  $role SET fullname = '$fname', ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', story='$story',
                website = '$website' WHERE id = $uid ";
          
        
        
    }
    
    if($role=="tbl_exhibitors"){
        
        $str = "UPDATE  $role SET fullname = '$fname', ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', story='$story',
                website = '$website' WHERE id = $uid ";
          
        
        
    }

    if($role=="tbl_fpo"){
        
        $str = "UPDATE  $role SET fullname = '$fponame',ceo='$ceo',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', story='$story',
                certification = '$certification',  visitq = '$isvisit', test_report = '$isreport', no_farmer = '$no_of_farmer' WHERE id = $uid ";
          
        
        
    }
    
    if($role=="tbl_gov_agency"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
        
        
    }

    if($role=="tbl_institutions"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
        
        
    }

    if($role=="tbl_labs"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
    }
    
    if($role=="tbl_logistic"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
        
    }
    
    if($role=="tbl_ngo"){
        
        $str = "UPDATE  $role SET fullname = '$fname',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
        
    }

    if($role=="tbl_org_consultant"){
        
        $str = "UPDATE  $role SET fullname = '$fname',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
    }
    
    if($role=="tbl_org_input"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
    }

    if($role=="tbl_packaging"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar', website = '$website', story='$story'
                 WHERE id = $uid ";
          
    }
    
    if($role=="tbl_processor"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar',story='$story',certification = '$certification',
                visitq = '$isvisit', test_report = '$isreport' WHERE id = $uid ";
          
    }
    
    if($role=="tbl_restaurant"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company', email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar',story='$story',website = '$website'
                WHERE id = $uid ";
          
    }
    
    if($role=="tbl_shops"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo',comapny_name= '$name_of_company', email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar',story='$story',website = '$website'
                WHERE id = $uid ";
          
    }
    
    if($role=="tbl_trader"){
        
        $str = "UPDATE  $role SET fullname = '$fname',ceo='$ceo', email='$email',password ='$password',mobile='$mobile',landline='$landline',
                state='$stateid', city='$cityid', address = '$address', gst ='$gst', aadharcard='$adhar',story='$story', certification = '$certification',
                 visitq = '$isvisit', test_report = '$isreport'  WHERE id = $uid ";
            
        
    }
        //  echo $str;
            $result = mysql_query($str);
            if($result==1){
                
                $data = array('status' => true ,'message'=>'Profile updated Succesfully.');
             	echo json_encode($data);
             	
            }else{
                
                 $data = array('status' => false ,'message'=>'Something went wrong.');
                 echo json_encode($data);
            }
             	
             	
}

?>