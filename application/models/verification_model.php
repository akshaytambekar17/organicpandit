<?php

class Verification_model extends CI_Model{
    

        
      function get_verification() {
            $pdata=($this->session->all_userdata());
            $username=$pdata['username'];
        $this->db->select('*');
        $this->db->from('tbl_verify');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $results = $query->result();
        }  
        
        function update_verification() {
            $pdata=($this->session->all_userdata());
            $username=$pdata['username'];
        $this->db->set('verification','1');
        $this->db->where('username',$username);
        $this->db->where('verification','0');
        $this->db->update('tbl_verify');
        return true;
        }
        
        function update_verification1() {
            $pdata=($this->session->all_userdata());
            $username=$pdata['username'];
        $this->db->set('verification','2');
        $this->db->where('username',$username);
        $this->db->where('verification','0');
        $this->db->update('tbl_verify');
        return true;
        }
        
    /*    function update() {
        $this->db->select('t1.*, t2.user_name,t2.user_id');
         $this->db->from('tbl_farmer t1, tbl_verify t2');
         $this->db->set('t1.is_verify','t2.verification');
        $this->db->where('t1.username','t2.user_name');
        $this->db->where('t1.id','t2.user_id');
        $this->db->update('tbl_farmer');
        return true;
        } */
        
      /*  function notification(){
            $this->db->select('*');
        $this->db->from('tbl_verify');
        $this->db->where("(verification='1' AND verification='2')");
            
        } */
        
        function notification(){
          $query = $this->db->get('tbl_verify');
            foreach ($query->result() as $row) {
                        $this->db->insert('tbl_notify',$row);
                            }
                     }


}

?>