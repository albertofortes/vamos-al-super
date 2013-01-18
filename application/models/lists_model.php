<?php

class Lists_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getAll()
    {
	    $this->db->order_by("id", "desc");
	    $query = $this->db->get('lists');
	    return $query->result();
    }
    
    function getName($id)
    {
	    $this->db->select('name');
	    $query = $this->db->get_where('lists', array('id' => $id));
	    $r = $query->result();
	    return $r[0]->name;
    }
            
    function getAllFromList($id)
    {
	    $this->db->order_by("id", "desc"); 
	    $query = $this->db->get_where('products', array('idList' => $id));
	    return $query->result();
    }
    
    function getUncompletedLists()
    {
        $query = $this->db->get_where('lists', array('status' => '0'));		
        return $query->result();
    }
 
    function getCompletedLists()
    {
        $query = $this->db->get_where('lists', array('status' => '1'));	
        return $query->result();
    }
    
    function get($id) 
    {
        $query = $this->db->get_where('lists', array('id'=>$id));  
        if ($query->num_rows()==0) {
            return false;
        }
        $result = $query->result();
        return $result[0];
    }
    
    function add($data)
    {
        $this->db->insert('lists', $data); 
    }
    
    function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('lists', $data); 
    }
    
    function delete($id)
    {
        $query = $this->db->get_where('lists', array('id'=>$id));  
 
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $this->db->delete('lists', array('id' => $id)); 
            return true;
        }    
    }
    
    function setComplete($id)
    {
        $query = $this->db->get_where('lists', array('id'=>$id));  
 
        if ($query->num_rows()==0) {
            return false;
        }
        else {
            $this->db->update('lists', array('status' => 1), array('id' => $id));
            return true;
        }   
    }
    
    function do_upload() {
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';	
		$this->load->library('upload', $config);
		$this->load->library('image_lib');
        
        if ( ! $this->upload->do_upload())
		{
			$upload_error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$upload_ok = array('upload_data' => $this->upload->data());
			$c = array(
				'image_library' => 'gd2',
				//'library_path' => './uploads/thumbs/',
				'source_image' => './uploads/thumbs/mypic.jpg',
				'maintain_ration' => true,
				'create_thumb' => true,
				'width' => 50,
				'height' => 50
			);				
			$this->load->library('image_lib', $c);
			$this->image_lib->resize();			
			//print_r($upload_ok);
			return base_url()."/uploads/".$upload_ok['upload_data']['file_name'];
		}
					
	}	

}
