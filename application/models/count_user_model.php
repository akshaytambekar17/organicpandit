<?php
	class Count_user_model Extends CI_Model
	{
		
		public function get_farmer()
		{
			$query = $this->db->query('SELECT * FROM tbl_farmer');
			return $query->num_rows();
		}
		public function get_fpo()
		{
			$query = $this->db->query('SELECT * FROM tbl_fpo');
			return $query->num_rows();
		}
		public function get_trader()
		{
			$query = $this->db->query('SELECT * FROM tbl_trader');
			return $query->num_rows();
		}
		public function get_processor()
		{
			$query = $this->db->query('SELECT * FROM tbl_processor');
			return $query->num_rows();
		}
		public function get_buyer()
		{
			$query = $this->db->query('SELECT * FROM tbl_buyer');
			return $query->num_rows();
		}
		public function get_org_consultant()
		{
			$query = $this->db->query('SELECT * FROM tbl_org_consultant');
			return $query->num_rows();
		}
		public function get_org_input()
		{
			$query = $this->db->query('SELECT * FROM tbl_org_input');
			return $query->num_rows();
		}
		public function get_packaging()
		{
			$query = $this->db->query('SELECT * FROM tbl_packaging');
			return $query->num_rows();
		}
		public function get_logistic()
		{
			$query = $this->db->query('SELECT * FROM tbl_logistic');
			return $query->num_rows();
		}
		public function get_equipment()
		{
			$query = $this->db->query('SELECT * FROM tbl_equipment');
			return $query->num_rows();
		}
		public function get_exhibitors()
		{
			$query = $this->db->query('SELECT * FROM tbl_exhibitors');
			return $query->num_rows();
		}
		public function get_shops()
		{
			$query = $this->db->query('SELECT * FROM tbl_shops');
			return $query->num_rows();
		}
		public function get_labs()
		{
			$query = $this->db->query('SELECT * FROM tbl_labs');
			return $query->num_rows();
		}
		public function get_gov_agency()
		{
			$query = $this->db->query('SELECT * FROM tbl_gov_agency');
			return $query->num_rows();
		}
		public function get_institutions()
		{
			$query = $this->db->query('SELECT * FROM tbl_institutions');
			return $query->num_rows();
		}
		public function get_restaurant()
		{
			$query = $this->db->query('SELECT * FROM tbl_restaurant');
			return $query->num_rows();
		}
		public function get_ngo()
		{
			$query = $this->db->query('SELECT * FROM tbl_ngo');
			return $query->num_rows();
		}

	}

?>