<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Farmer_model extends CI_Model {
// update farmer

	public function update_farmer(){
		// echo  "in update";
		$id = $this->input->post('update_user');
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
			'certification' => $this->input->post('certification'),
			'visitq' => $this->input->post('visitq'),
			'test_report' => $this->input->post('test_report'),
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'agency' => $this->input->post('agency'),
			'no' => $this->input->post('no')

		);

		$this->db->where('id', $id);
        $this->db->update('tbl_farmer', $data);

        if($this->db->affected_rows() > 0){
			echo 'success';
		}
		else{
			echo 'fail';
		}
	}
	// insert farmer
	public function insert_farmer($profile, $certify_img, $video){
// User data array
		print "in";
		$randomNum=substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
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
			'video' => $video,
			'agency' => $this->input->post('agency'),
            'cert_no' => $this->input->post('cert_no'),
            'no' => $randomNum
		);
// Insert user
		$this->db->insert('tbl_farmer', $data);
		$insert_id = $this->db->insert_id();
		
					$data2 = array(
			'user_id' => $insert_id,
			'user_name' => $this->input->post('username'),
			'full_name' => $this->input->post('fullname'),
			'user_type' => "farmer"
		);
		
		$this->db->insert('tbl_notification', $data2);
		if($this->db->affected_rows() > 0){
			$this->db->set('web_notify', 1 ); //value that used to update column  
            $this->db->update('tbl_notification');  //table name
		}
		
					$data3 = array(
			'user_id' => $insert_id,
			'user_type' => "farmer",
			'user_name' => $this->input->post('username'),
			'notify_type' => "new user"
		);
		
		$this->db->insert('tbl_notify', $data3);
		
					$data4 = array(
			'user_id' => $insert_id,
			'user_type' => "farmer",
			'user_name' => $this->input->post('username'),
			'agency_name' => $this->input->post('agency'),
			'username' => $this->input->post('agency_username')
		);
		
		$this->db->insert('tbl_verification', $data4);
		
					$data5 = array(
			'user_id' => $insert_id,
			'user_type' => "farmer",
			'user_name' => $this->input->post('username'),
			'agency_name' => $this->input->post('agency'),
			'username' => $this->input->post('agency_username')
		);
			$this->db->insert('tbl_verify', $data4);


		
				if($insert_id)
			{
				$row=$this->db->query("select * from `tbl_farmer` where `id`='$insert_id'")->row_array();
				$to = $row['email'];
				$from = "info@merakisan.com";
				$headers ="From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
				$subject ="Congratulation!";
				$msg = '<body style="margin:0px;">
						<table style="padding:0;width:100%!important;background:#f1f1f1;margin:0; padding:30px 0px;" cellspacing="0" cellpadding="8" border="0">
						  <tbody>
							<tr>
							  <td valign="top"><table style="border-radius:4px;border:1px #FFE1CC solid; background:#fff" cellspacing="0" cellpadding="0" border="0" align="center">
								  <tbody>
									<tr>
									  <td colspan="3" height="6"></td>
									</tr>
									
									<tr>
									  <td><table style="line-height:25px" cellspacing="0" cellpadding="0" border="0" align="center">
										  <tbody>
											<tr>
											  <td colspan="3" height="30"></td>
											</tr>
											<tr>
											  <td width="36"></td>
											  <td style="color:#444444;border-collapse:collapse;font-size:11pt;font-family:proxima_nova,Open Sans,Lucida Grande,Segoe UI,Arial,Verdana,Lucida Sans Unicode,Tahoma,Sans Serif;max-width:454px" width="454" valign="top" align="left">Dear, '.$row['name'].'<br>
												<br>
												<p>Congratulations for signing up! You can login with your registered mail id & password</p>
												<br>
												
												<p>Thank You</p>
												<p>merakisan.com</p>
											  <td width="36"></td>
											</tr>
											<tr>
											  <td colspan="3" height="36"></td>
											</tr>
										  </tbody>
										</table></td>
									</tr>
								  </tbody>
								</table>
								<table cellspacing="0" cellpadding="0" border="0" align="center">
								  <tbody>
									<tr>
									  <td height="10"></td>
									</tr>
									<tr>
									  <td style="padding:0;border-collapse:collapse"><table cellspacing="0" cellpadding="0" border="0" align="center">
										  <tbody>
											<tr style="color:#a8b9c6;font-size:11px;font-family:proxima_nova,Open Sans,Lucida Grande,Segoe UI,Arial,Verdana,Lucida Sans Unicode,Tahoma,Sans Serif">
											  <td width="400" align="left"></td>
											  <td width="128" align="right">&copy; 2017 merakisan</td>
											</tr>
										  </tbody>
										</table></td>
									</tr>
								  </tbody>
								</table></td>
							</tr>
						  </tbody>
						</table>
						</body>';
			mail($to,$subject,$msg,$headers);
		/*	//Send SMS
			   $ch = curl_init();
			   $user = "merakisan";
			   $pass = "merakisan";
			   $receipientno = $row['mobile'];
			   $senderID ="MKISAN"; 
			   $dtime='';
			  $msgtxt = 'Hello '.$row['fullname'].', Thank you for signing up.You can now login with your registered mail id & password.For More Information  Call Us On 91-7218320204'; 
			   $string = "userid=$user&password=$pass&sender=$senderID&mobileno=$receipientno&msg=$msgtxt&msgtype=0&sendon=$dtime";
			   curl_setopt($ch,CURLOPT_URL,  "http://web.sms2india.in/websms/sendsms.aspx?");
			   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			   curl_setopt($ch, CURLOPT_POST, 1);
			   curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
			   
				 $buffer = curl_exec($ch);
				//  print_r($buffer);die;
			   if(empty ($buffer)){ 
				echo " buffer is empty "; 
			   }
			   curl_close($ch);
			   //End SMS code*/
			}
		    return $insert_id;

		print $insert_id;
		
		$pr_id = $insert_id;

// file upload in product  folder
		$files = $_FILES;
		$count = count($_FILES['pr_image']['name']);
		for($i=0; $i<$count; $i++)
		{
			$_FILES['pr_image']['name']= $files['pr_image']['name'][$i];
			$_FILES['pr_image']['type']= $files['pr_image']['type'][$i];
			$_FILES['pr_image']['tmp_name']= $files['pr_image']['tmp_name'][$i];
			$_FILES['pr_image']['error']= $files['pr_image']['error'][$i];
			$_FILES['pr_image']['size']= $files['pr_image']['size'][$i];
			$config4['upload_path'] = './upload/product/';
			$config4['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config4);
			$this->upload->initialize($config4);
			// $this->upload->do_upload('pr_image');
			if(!$this->upload->do_upload('pr_image'))  
			{  
				echo $this->upload->display_errors();  
				$fileName = '';
			}  
			else  
			{  
				$data = $this->upload->data(); 

				$fileName = $data["file_name"];    

			}  
			// $fileName = $_FILES['pr_image']['name'];
			'array'.    $images[] = $fileName;
		}
// file upload in product  folder end   
		$pr_name = $this->input->post("pr_name");
		$pr_desc = $this->input->post("pr_desc");
		$pr_avlFrom = $this->input->post("pr_avlFrom");
		$pr_avlTo = $this->input->post("pr_avlTo");
		$pr_qty = $this->input->post("pr_qty");
		$pr_quality = $this->input->post("pr_quality");
		$pr_price = $this->input->post("pr_price");
		print 'counts' . $item_count	= 	sizeof($pr_name) - 1;

		for ($i=0; $i < $item_count; $i++) {
			$pr_data['pr_id'] = $pr_id;
			$pr_data['pr_name'] = $pr_name[$i];
			$pr_data['pr_desc'] = $pr_desc[$i];
			$date1 = date("Y-m-d", strtotime($pr_avlFrom[$i])); 
			$date2 = date("Y-m-d", strtotime($pr_avlTo[$i])); 

			$pr_data['pr_avlFrom'] = $date1;
			$pr_data['pr_avlTo'] = $date2;
			$pr_data['pr_qty'] = $pr_qty[$i];
			$pr_data['pr_quality'] = $pr_quality[$i];
			$pr_data['pr_price'] = $pr_price[$i];
			$pr_data['pr_image'] = $images[$i];		

			
			$this->db->insert("tbl_pr_farmer",$pr_data);

		}



		if($this->db->affected_rows() > 0){
			echo 'success';
		}
		else{
			echo 'fail';
		}
	}    
	

	// get certificate


	public function get_products()
	{
		$this->db->select('*')->from('tbl_pr_farmer');
		$query=$this->db->get();
		return $query->result();
	}

// get acoount update data


	public function get_tdata($table_name, $pr_table, $username)
	{
print $table_name . $pr_table . $username ;
		$this->db->select('*');    
		$this->db->from($table_name);
		$this->db->where('username', $username);

		$query=$this->db->get();
		return $query->result();
	}


	public function get_prdata($table_name, $pr_table, $username)
	{
print $table_name . $pr_table . $username ;
		$this->db->select('*');    
		$this->db->from($table_name);
		$this->db->join($pr_table, $table_name.'.id = '.$pr_table.'.pr_id');
		$this->db->where($table_name.'.username', $username);

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

 public function get_agency()
  {
    $this->db->select('*')->from('tbl_certification');
    $this->db->order_by('agency_name', 'asc');
    $query=$this->db->get();
    return $query->result();
  }
  
  public function get_username()
  {
    $this->db->select('username')->from('tbl_certification');
    $query=$this->db->get();
    return $query->result();
  }
  
  
  
  	public function username(){
		print	$id = $this->input->post("id");

		if(!empty($id)){

			$this->db->select('username')->from('tbl_certification');
			$this->db->where('id', $id);
			$query=$this->db->get();
			$num = $query->num_rows();
			return $query->result();

		/*	if($num > 0){
				echo '<option value="">Select city</option>';
				foreach($query->result_array() as $row){
					echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';


				}
			}else{
				echo '<option value="">City not available</option>';
			}
        // return $query->result();			
              */  
		}
	}

	public function all_city(){
		print	$state_id = $this->input->post("state_id");

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