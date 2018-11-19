<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement_model extends CI_Model {
// update farmer

	public function update_post_req(){
		// echo  "in update";
		$id = $this->input->post('update_user');
		$data = array(
			'company' => $this->input->post('company'),
			'product' => $this->input->post('product'),
			'quality' => $this->input->post('quality'),
			'req_val_date' => $this->input->post('req_val_date'),
			'exp_rate' => $this->input->post('exp_rate'),
			'quantity' => $this->input->post('quantity'),
			'total_val' => $this->input->post('total_val'),
			'delivery_loc' => $this->input->post('delivery_loc'),
			'pay_terms' => $this->input->post('pay_terms'),
			'logistic_req' => $this->input->post('logistic_req'),
			'certi_req' => $this->input->post('certi_req'),
			'other_detail' => $this->input->post('other_detail'),

		);

		$this->db->where('id', $id);
        $this->db->update('post_req', $data);

        if($this->db->affected_rows() > 0){
			echo 'success';
		}
		else{
			echo 'fail';
		}
	}
	// insert farmer
	public function insert_post_req(){
// User data array
		print "in";
		$data = array(
            'company' => $this->input->post('company'),
			'product' => $this->input->post('product'),
			'quality' => $this->input->post('quality'),
			'req_val_date' => $this->input->post('req_val_date'),
			'exp_rate' => $this->input->post('exp_rate'),
			'quantity' => $this->input->post('quantity'),
			'total_val' => $this->input->post('total_val'),
			'delivery_loc' => $this->input->post('delivery_loc'),
			'pay_terms' => $this->input->post('pay_terms'),
			'logistic_req' => $this->input->post('logistic_req'),
			'certi_req' => $this->input->post('certi_req'),
			'other_detail' => $this->input->post('other_detail'),

		);
// Insert user
		$this->db->insert('post_req', $data);
		$insert_id = $this->db->insert_id();
		print $insert_id;

		$pr_id = $insert_id;


	}    
	

	// get certificate


	public function get_products()
	{
		$this->db->select('*')->from('post_req');
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