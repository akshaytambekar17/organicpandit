<?php
 
$db = mysqli_connect("localhost","db_organicpandit","db_organicpandit","db_organicpandit");
//$db = mysqli_connect("mysql.shopping.merakisan.com","kisandb","kisan1qazZAQ!","kisanshop");
if ($db->connect_error) {
	  trigger_error('Connection Failed: '  . $db->connect_error, E_USER_ERROR);
 }

 
 
 
/*  offer_productlist,product_category,product_subcategory
$DB_HOST = 'localhost';
$DB_USER = 'myschoolinternsh';
$DB_PASS = 'myschoolinternship';
$DB_NAME = 'myschoolinternship';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
 */

 
/* date_default_timezone_set('Asia/Kolkata');
echo date('d-m-Y H:i'); */

date_default_timezone_set('Asia/Kolkata');
$date_ymd=date('Y-m-d H:i');
 
 
?>
