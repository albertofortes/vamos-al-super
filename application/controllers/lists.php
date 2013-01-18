<?php
class Lists extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('lists_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'ion_auth'));
    }
	
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
			$data['you'] = $this->ion_auth->user()->row();
			$data['flash_message'] = $this->session->flashdata('message');
			$data['lists'] = $this->lists_model->getAll();
			$data['incompleted_list'] = $this->lists_model->getUncompletedLists();
	        $data['completed_list'] = $this->lists_model->getCompletedLists();
	        // create json
	        $json = $this->lists_model->getAll();
	        $jsonLists= array();
	        foreach($json as $j) {
		        $jsonId = $j->id;
		        $jsonName = $j->name;
		        $jsonDescription = $j->description;
		        $jsonDate = date('d-m-Y', strtotime($j->date));
		        $jsonStatus = $j->status;
		        $jsonPicture = $j->picture;
		        $jsonLists[] = array_filter( array('id'=> $jsonId, 'name'=> $jsonName, 'description' => $jsonDescription,'date' => $jsonDate, 'status' => $jsonStatus, 'picture' =>$jsonPicture));
		    }        
	        $data['lists'] = json_encode($jsonLists);
	        $this->load->view('lists/index', $data);
		}
	}
	
	public function view()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
			$data['you'] = $this->ion_auth->user()->row();
			$data['idList'] = $this->uri->segment(3);
			$data['flash_message'] = $this->session->flashdata('message');
			$data['listName'] = $this->lists_model->getName($data['idList']);
			$data['products'] = $this->lists_model->getAllFromList($data['idList']);
			$this->load->view('lists/view', $data);
		}
	}
	
	function add()
    {   
	    if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
			$data['you'] = $this->ion_auth->user()->row();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('title', 'Título', 'required');
	        $this->form_validation->set_rules('description', 'Descripcion', 'max_length[255]');
	        
	        $data['idList'] = $this->uri->segment(3);
	
	        if ($this->form_validation->run())
	        {            
	                        
	            $upload_path = $this->lists_model->do_upload();          
	            
	            $data = array_filter(array(
	                    'name'=> $this->input->post('title'),
	                    'description'=> $this->input->post('description'),
	                    'picture'=> $upload_path
	                    ));
	            $this->lists_model->add($data);
	 
	            $this->session->set_flashdata('message', 'Has creado la lista correctamente.');            
	            redirect('/lists');
	            
	        }
	        else
	        {
	            $this->load->view('lists/add', $data);
	        }
	   }
    }
    
    function edit()
    {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
			$data['you'] = $this->ion_auth->user()->row();	  
		    $this->load->library('form_validation');
	        $this->form_validation->set_rules('title', 'Título', 'required');
	        $this->form_validation->set_rules('description', 'Descripcion', 'max_length[255]');
	        
		    if ($this->form_validation->run())
	        {
	            
	        	$upload_path = $this->lists_model->do_upload(); 
 
		        $data = array_filter(array(
		        		'id' => (int) $this->input->post('id'),
		                'name'=> $this->input->post('title'),
		                'description'=> $this->input->post('description'),
		                'picture'=> $upload_path
		                ));
		        $data['status'] = $this->input->post('status');
		        $this->lists_model->edit($this->input->post('id'), $data);
		        $this->session->set_flashdata('message', 'Has modificado la lista correctamente.');            
		        //print_r($upload_path);
		        redirect('/lists');
	        } else {
	        	$id = (int) $this->input->post('id');
				$data['id'] = ($id) ? $id : $this->uri->segment(3);
		        $data['row'] = $this->lists_model->get($data['id']);
		        $this->load->view('lists/edit', $data);
		    }
		}
    }
	
	function delete($id)
    {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
	        $data = $this->lists_model->get($id);
	        if ($this->lists_model->delete($id)) {
	            $this->session->set_flashdata('message', "Hecho, has eliminado la lista $data->name.");                        
	        } else {
	            $this->session->set_flashdata('message', "No hemos encontrado la lista que quieres eliminar."); 
	        }
	        redirect('/lists');
	   }
    }
	
	function complete($id)
    {
	    if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
	        $data = $this->lists_model->get($id);
	        if ($this->lists_model->setComplete($id)) {
	            $this->session->set_flashdata('message', "Has marcado la lista $data->name como completada.");                        
	        } else {
	            $this->session->set_flashdata('message', "No hemos encontrado la lista que quieres marcar.");  
	        }
	        redirect('/lists');
       }
    }
	
}