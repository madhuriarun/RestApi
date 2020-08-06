<?php
class Api_model extends CI_Model{
 
    function getUserDetails($id){
        $this->db->where("id IN (".$id.")",NULL, false);
        $query=$this->db->get("users");
        //print_r($this->db->last_query());exit;
        return $query->result();
    }
     
}