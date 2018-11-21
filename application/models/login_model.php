<?php
class Login_model Extends CI_Model
{
	function can_login($usertype, $username, $password)  
	{
		$md_password = md5($password);
		switch ($usertype) {
			case "farmer":
			$table_name = 'tbl_farmer';
			break;
			case "fpo":
			$table_name = 'tbl_fpo';
			break;
			case "trader":
			$table_name = 'tbl_trader';
			break;
			case "processor":
			$table_name = 'tbl_processor';
			break;
			case "buyer":
			$table_name = 'tbl_buyer';
			break;
			case "org_consultant":
			$table_name = 'tbl_org_consultant';
			break;
			case "org_input":
			$table_name = 'tbl_org_input';
			break;
			case "packaging":
			$table_name = 'tbl_packaging';
			break;
			case "logistic":
			$table_name = 'tbl_logistic';
			break;
			case "farm_equipment":
			$table_name = 'tbl_equipment';
			break;
			case "exhibitors":
			$table_name = 'tbl_exhibitors';
			break;
			case "shops":
			$table_name = 'tbl_shops';
			break;
			case "labs":
			$table_name = 'tbl_labs';
			break;
			case "gov_agency":
			$table_name = 'tbl_gov_agency';
			break;
			case "institutions":
			$table_name = 'tbl_institutions';
			break;
			case "others":
			$table_name = 'tbl_others';
			break;
			case "restaurant":
			$table_name = 'tbl_restaurant';
			break;
			case "ngo":
			$table_name = 'tbl_ngo';
			break;
			case "certification":
			$table_name = 'tbl_certification';
			break;
			default:
			$table_name = 'tbl_farmer';
		}

		$this->db->where('username', $username);  
		$this->db->where('password', $md_password);  
		$query = $this->db->get($table_name);
		$row  = $query->row_array();
		if($query->num_rows() > 0)  
		{  
			return $row;  
		}  
		else  
		{  
			return false;       
		} 
		
	}


	public function check_username_exists($usertype){

		switch ($usertype) {
			case "farmer":
			$table_name = 'tbl_farmer';
			break;
			case "fpo":
			$table_name = 'tbl_fpo';
			break;
			case "trader":
			$table_name = 'tbl_trader';
			break;
			case "processor":
			$table_name = 'tbl_processor';
			break;
			case "buyer":
			$table_name = 'tbl_buyer';
			break;
			case "org_consultant":
			$table_name = 'tbl_org_consultant';
			break;
			case "org_input":
			$table_name = 'tbl_org_input';
			break;
			case "packaging":
			$table_name = 'tbl_packaging';
			break;
			case "logistic":
			$table_name = 'tbl_logistic';
			break;
			case "farm_equipment":
			$table_name = 'tbl_equipment';
			break;
			case "exhibitors":
			$table_name = 'tbl_exhibitors';
			break;
			case "shops":
			$table_name = 'tbl_shops';
			break;
			case "labs":
			$table_name = 'tbl_labs';
			break;
			case "gov_agency":
			$table_name = 'tbl_gov_agency';
			break;
			case "institutions":
			$table_name = 'tbl_institutions';
			break;
			case "others":
			$table_name = 'tbl_others';
			break;
			case "restaurant":
			$table_name = 'tbl_restaurant';
			break;
			case "ngo":
			$table_name = 'tbl_ngo';
			break;
			case "certification":
			$table_name = 'tbl_certification';
			break;
			default:
			$table_name = 'tbl_farmer';
		}

		$isAvailable = true;

       //get the username  and password
		$username = trim($_POST['username']);

		$query = $this->db->get_where($table_name, array('username' => $username));
		if($query->num_rows() > 0){
			$isAvailable = false;

		} else {
			$isAvailable = true;
		}
		echo json_encode(array(
			'valid' => $isAvailable,
		));
	}
	

}

?>