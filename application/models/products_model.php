<?php

class Products_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add($data)
    {
        $this->db->insert('products', $data); 
    }
    
    function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('products', $data); 
    }
    
    function get($id) 
    {
        $query = $this->db->get_where('products', array('id'=>$id));  
        if ($query->num_rows()==0) {
            return false;
        }
        $result = $query->result();
        return $result[0];
    }
    
    function delete($id)
    {
        $query = $this->db->get_where('products', array('id'=>$id));  
 
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $this->db->delete('products', array('id' => $id)); 
            return true;
        }    
    }
    
    function setComplete($id)
    {
        $query = $this->db->get_where('products', array('id'=>$id));  
 
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $this->db->update('products', array('status' => 1), array('id' => $id));
            return true;
        }   
    }
    
}
