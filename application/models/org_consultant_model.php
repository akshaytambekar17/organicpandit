<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Org_consultant_model extends CI_Model {

	
	public function insert_org_consultant($profile, $company_images, $video, $resume){
// User data array
		print "in";
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
			'gst' => $this->input->post('gst'),
			'aadharcard' => $this->input->post('aadharcard'),
			'website' => $this->input->post('website'),
			'story' => $this->input->post('story'),
			'profile' => $profile,
			'company_images' => $company_images,
			'acc_bank' => $this->input->post('acc_bank'),
			'acc_name' => $this->input->post('acc_name'),
			'acc_no' => $this->input->post('acc_no'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'video' => $video,
			'resume' => $resume

		);
// Insert user
		$this->db->insert('tbl_org_consultant', $data);
		$insert_id = $this->db->insert_id();
		
					$data2 = array(
			'user_id' => $insert_id,
			'user_type' => "organic consultant"
		);
		
		$this->db->insert('tbl_notification', $data2);
		if($this->db->affected_rows() > 0){
			$this->db->set('web_notify', 1 ); //value that used to update column  
            $this->db->update('tbl_notification');  //table name
		}
		
					$data3 = array(
			'user_id' => $insert_id,
			'user_type' => "organic consultant",
			'user_name' => $this->input->post('username'),
			'notify_type' => "new user"
		);
		
		$this->db->insert('tbl_notify', $data3);

				if($insert_id)
			{
				$row=$this->db->query("select * from `tbl_org_consultant` where `id`='$insert_id'")->row_array();
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
			//Send SMS
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
			   //End SMS code
			}
		    return $insert_id;

		if($this->db->affected_rows() > 0){
			echo 'success';
		}
		else{
			echo 'fail';
		}
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