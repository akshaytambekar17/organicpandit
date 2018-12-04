<?php

class Dashboardview_model extends CI_Model{
    
    function get_contents() {
        $this->db->select('*');
        $this->db->from('tbl_notify');
        $this->db->where('notify_type','new user');
        $query = $this->db->get();
        return $result = $query->result();
        }
        
        function get_verification() {
            $pdata=($this->session->all_userdata());
            $username=$pdata['username'];
        $this->db->select('*');
        $this->db->from('tbl_verification');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $results = $query->result();
        }  

        
      

}

?>