<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model {
// update farmer

	public function update_register($profile, $certify_img, $video){
		echo  "in update".$profile;
	 $id = $this->input->post('user_id');
	echo $user_type = $this->input->post('user_type');

		switch ($user_type) {
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
        default:
        $table_name = 'tbl_farmer';
      }

if($user_type=="farmer"){
	echo "in farmer";
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'pancard' => $this->input->post('pancard'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'profile' => $profile,
			'certification' => $this->input->post('certification'),
			'visitq' => $this->input->post('visitq'),
			'test_report' => $this->input->post('test_report'),
			'certify_img' => $certify_img,
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'video' => $video

		);
}

if($user_type=="fpo"){
	// echo "string";
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'certification' => $this->input->post('certification'),
			'visitq' => $this->input->post('visitq'),
			'test_report' => $this->input->post('test_report'),
			'no_farmer' => $this->input->post('no_farmer'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
 if($user_type=="trader" || $user_type=="processor"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'profile' => $profile,
			'certify_img' => $certify_img,
			'certification' => $this->input->post('certification'),
			'visitq' => $this->input->post('visitq'),
			'test_report' => $this->input->post('test_report'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'video' => $video

		);
}

 if($user_type=="buyer"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'types' => $this->input->post('types'),
			'test_report' => $this->input->post('test_report'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
	 if($user_type=="org_consultant"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}	
	 if($user_type=="org_input"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
} 
if($user_type=="packaging"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
if($user_type=="logistic"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
if($user_type=="farm_equipment"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}

if($user_type=="exhibitors"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}

if($user_type=="shops"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}


if($user_type=="labs"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}

if($user_type=="gov_agency"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}

if($user_type=="institutions"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
if($user_type=="restaurant"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'ceo' => $this->input->post('ceo'),
			'comapny_name' => $this->input->post('comapny_name'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}

if($user_type=="ngo"){
	$data = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'landline' => $this->input->post('landline'),
			'mobile' => $this->input->post('mobile'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'story' => $this->input->post('story'),
			'website' => $this->input->post('website'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code')

		);
}
		$this->db->where('id', $id);
        $this->db->update($table_name, $data);
        if($this->db->affected_rows() > 0){
			echo 'success';
		}
		else{
			echo 'fail'.$data;

		}
	}
	// insert farmer
	

	

// get acoount update data


	public function get_tdata($table_name,  $username)
	{
 $table_name . $username ;
		$this->db->select('*');    
		$this->db->from($table_name);
		$this->db->where('username', $username);

		$query=$this->db->get();
		return $query->result();
	}



// get city


	public function get_state()
	{
		$this->db->select('*')->from('states');
		$this->db->where('country_id', 101);
		$this->db->order_by('name', 'asc');
		$query=$this->db->get();
		return $query->result();
	}

	// get city


	public function get_city()
	{
		$this->db->select('*')->from('cities');
		$this->db->order_by('name', 'asc');
		$query=$this->db->get();
		return $query->result();
	}



	public function all_city(){
			$state_id = $this->input->post("state_id");

		if(!empty($state_id)){

			$this->db->select('*')->from('cities');
			$this->db->where('state_id', $state_id);
			$this->db->order_by('name', 'asc');
			$query=$this->db->get();
			$num = $query->num_rows();


			if($num > 0){
				echo '<option value="">Select city</option>';
				foreach($query->result_array() as $row){
					echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';


				}
			}else{
				echo '<option value="">City not available</option>';
			}
        // return $query->result();			

		}
	}	
}

?>