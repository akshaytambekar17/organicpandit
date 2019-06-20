<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SHOW_SEARCH_VIEW_DETAILS_KEY', 'show_search_view_details');
define('SHOW_SEARCH_VIEW_ENQUIRY_KEY', 'show_search_view_enquiry');

define('CURRENT_DATETIME',date('Y-m-d H:i:s'));

define('ADMINUSERNAME', 'adminmaster');
define('ADMINEMAILID', 'akshaytambekar17@gmail.com');
define('REGISTRATION', 1);
define('POST', 2);
define('BID', 3);
define('VERIFY_REGISTRATION', 4);
define('VERIFY_POST', 5);
define('NOTIFY_SMS', 1);
define('NOTIFY_EMAIL', 2);
define('NOTIFY_PUSH', 3);
define('NOTIFY_WEB', 4);

define('ENABLED',2);
define('DISABLED',1);

define('FARMER',1);
define('FPO',2);
define('TRADER',3);
define('PROCESSOR',4);
define('BUYER',5);
define('ORGANIC_CONSULTANT',6);
define('ORGANIC_INPUT',7);
define('PACKAGING',8);
define('LOGISTICS',9);
define('FARM_EQUIPMENT',10);
define('EXHIBITOR',11);
define('SHOPS',12);
define('LABS',13);
define('GOVERNMENT_AGENICES',14);
define('INSTITUTION',15);
define('CERTIFICATION_AGENICES',16);
define('RESTAURANTS',17);
define('NGO',18);



/* End of file constants.php */
/* Location: ./application/config/constants.php */