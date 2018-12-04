<?php
	class Register_model Extends CI_Model
	{
		
		public function register($data)
		{
			$this->db->insert('tbl_user', $data);
			$id = $this->db->insert_id();
			if($id)
			{
				$row=$this->db->query("select * from `tbl_user` where `id`='$id'")->row_array();
				$to =$row['Email'];
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
			   $msgtxt = 'Hello '.$row['name'].', Congratulations for signing up! You can login with your registered mail id & password. (merakisan.com)'; 
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
		    return $id;
		}
		public function getcity()		
		{			
			$res=$this->db->get('city');			
			return $res->result_array();		
		}
		public function getcitybyid($id='')
		{
			if($id)
			{
				$run=$this->db->query("select * from `city` where `id`='$id'")->row()->city_name;
				return $run;
			}
			else 
			{
				return false;
			}
		}
		public function get_data($orderid)
		{
			$run=$this->db->query("SELECT `date` FROM `offer_order` WHERE `order_id`='$orderid'")->row()->date;
			return $run;
		}
		public function codorder($data)		
		{			
		$run=$this->db->query("select * from `offer_order` order by `order_id` DESC limit 0,1");		$order_id1=$run->row()->order_id;			
		$order_id=$order_id1+1;				
		$result=$this->session->userdata('cart');	
		$city=$this->session->userdata('setcity');
		$count=count($result['id']);	
		$j=1; 
		$total=0;
		$table=' <tr style="border:1px solid black">
		<th>S. No</th>
									 <th>Product Name</th>
									 <th>Qty</th>
									 <th>Price</th>
									 </tr>';
		for($i=0;$i<$count;$i++)		 	
		{				
			$sel=$this->db->query("select * from `offer_productlist` where `product_id`='".$result['id'][$i]."'");	 			
			$name=$sel->row()->name;
			$total=$total+$result['total'][$i];			
			$this->db->query("insert into `offer_order` set `user_id`='".$data['user']->id."',`order_id`='$order_id',`city_id`='$city',`user_email`='".$data['email']."',`product_name`='$name',`product_id`='".$result['id'][$i]."',`product_qty`='".$result['qty'][$i]."',`offer_price`='".$result['total'][$i]."',`date`='".date('Y-m-d')."'");
			$table.="<tr><td style='border: 1px solid gray;' >".$j."</td>";
			$table.="<th style='border: 1px solid gray;'>".$name."</th>";
			$table.="<td style='border: 1px solid gray;'>".$result['qty'][$i]."</td>";
			$table.="<td style='border: 1px solid gray;'>Rs. ".$result['total'][$i]."</td></tr>";
			$j++;
		}
			$gtotal=$total+20;
			$table.="<tr><th></th>";
			$table.="<th>SubTotal</th>";
			$table.="<th></th>";
			$table.="<th>Rs. ".$total."</th></tr>";
			$table.="<th></th>";
			$table.="<th>Shipping</th>";
			$table.="<th></th>";
			$table.="<th>Rs. 20</th></tr>";
			$table.="<tr><th></th>";
			$table.="<th>Grand Total</th>";
			$table.="<th></th>";
			$table.="<th>Rs. ".$gtotal."</th></tr>";
			$this->db->query("insert into `orderdetail` set  `order_id`='$order_id',`city_id`='$city',`shipping_address`='".$data['address']."',`mobileno`='".$data['mobile']."',`payment_type`='".$data['paytype']."',`delivari_date`='".date('d-m-Y',strtotime($data['date']))."',`delivari_time`='".$data['time']."',`custname`='".$data['fname']." ".$data['lname']."',`count`='$count','total'='$total'");
			if($data['paytype']!='CANCEL')
			{
				$to =$data['email'];
				$from = "info@merakisan.com";
				$headers ="From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
				$subject ="Order Placed!";
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
											  <td style="color:#444444;border-collapse:collapse;font-size:11pt;font-family:proxima_nova,Open Sans,Lucida Grande,Segoe UI,Arial,Verdana,Lucida Sans Unicode,Tahoma,Sans Serif;max-width:454px" width="454" valign="top" align="left">Hello, '.$data['fname'].'<br>
												<br>
												<p>This mail is inform you that your order has been placed Successfully.</p>
											  <td width="36"></td>
											</tr>'.$table.'
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
			if(!empty($data['mobile']))
			{
			   $ch = curl_init();
			   $user = "merakisan";
			   $pass = "merakisan";
			   $receipientno = $data['mobile'];
			   $senderID ="MKISAN"; 
			   $dtime='';
			   $msgtxt = 'Hello '.$data['fname'].', Congratulations! Your order has been placed successfully. For more detail visit merakisan.com'; 
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
			}
			return $data['paytype'];		    
		}		
		public function getuser($user,$pass)
		{
			//$this->db->select('id,username');
			//$this->db->query('Email',$user ,'password',$pass);
			//$query = $this->db->get('tbl_user');
			$query=$this->db->query("select id,username from `tbl_user` where `Email`='$user' and `password`='$pass'");
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				return $row;
			}
			else
			{
				return 0;
			}
			//return $query->num_rows();

		}
		public function ordercancel($oid)
		{
			$done=$this->db->query("update `orderdetail` set `order_status`='3' where `order_id`='$oid'");
			return 1;
		}
		public function orderdetail($orderid)
		{
			$done=$this->db->query("SELECT `mobileno`,`payment_type`,`shipping_address`,`custname` FROM `orderdetail` WHERE `order_id`='$orderid'")->row_array();
			return $done;
			
		}
		public function getuserorder($id)
		{
			$sel=$this->db->query("select * from `offer_order` where `user_id`='$id' GROUP BY `order_id` order by id DESC");
			return $sel->result_array();
			
		}
		public function checkmail($email)
		{
			
			$sel1=$this->db->query("select * from `tbl_user` where `email`='$email'");
			$num1=$sel1->num_rows();
			if($num1>0)
			{
			$row=$sel1->row_array();
				$to = $email;
				$from = "info@merakisan.com";
				$headers ="From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
				$subject ="Forgot Password!";
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
											  <td style="color:#444444;border-collapse:collapse;font-size:11pt;font-family:proxima_nova,Open Sans,Lucida Grande,Segoe UI,Arial,Verdana,Lucida Sans Unicode,Tahoma,Sans Serif;max-width:454px" width="454" valign="top" align="left">Dear, User <br>
											  <p class="text-center">This is an automated message . If you did not recently initiate the Forgot Password process, please disregard this email.</p> 
												<br>
												<p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p>
												<p>Password: <b>'.$row['conpass'].'</b></p>
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
			echo "1";
		}
			else
			{
			echo "0";
			}
		}
		public function fblogin($data)
		{
			
			//$email=$data['email'];
			if($data['email'])
			{
				$res=$this->db->query("select id,name from `tbl_user` where `Email`='".$data['email']."'");
				$num=$res->num_rows();
				if($num==0)
				{
					$ins=$this->db->query("insert into `tbl_user` set `name`='".$data['name']."',`email`='".$data['email']."'");
					$id=$this->db->insert_id();
					$res1=$this->db->query("select id,name from `tbl_user` where `id`='$id'");
					$user=$res1->row();
					
				}
				else
				{
					$user=$res->row();	
				}
			}
			else
			{
				$ins=$this->db->query("insert into `tbl_user` set `name`='".$data['name']."'");
				$id=$this->db->insert_id();
				$res1=$this->db->query("select id,name from `tbl_user` where `id`='$id'");
				$user=$res1->row();
			}
			
			return $user;
			
		}
		function gettime()
		{
			$sel=$this->db->query("select * from `timeslot` order by id");
			return $sel->result_array();
		}
		public function contact($data)
		{
			$this->db->insert('contactus', $data);
			return true;	
		}
	}

?>