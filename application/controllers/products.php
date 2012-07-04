<?php
class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->helper('url');
        $this->load->library(array('session', 'ion_auth'));
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
	        $this->form_validation->set_rules('quantity', 'Cantidad', 'required|numeric');
	        $this->form_validation->set_rules('description', 'Descripcion', 'max_length[255]');
	 
	        $data['idList'] = $this->uri->segment(3);
	 
	        if ($this->form_validation->run())
	        {
	             
	            $data = array(
	                    'idList' => (int) $this->input->post('idList'),
	                    'name'=> $this->input->post('title'),
	                    'quantity'=> $this->input->post('quantity'),
	                    'description'=> $this->input->post('description')
	                    );
	            $this->products_model->add($data);
	 
	            $this->session->set_flashdata('message', 'Has añadido el producto correctamente.');            
	            redirect('/lists/view/'.$data['idList']);
	        }
	        else
	        {
	            $this->load->view('products/add', $data);
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
	        $this->form_validation->set_rules('quantity', 'Cantidad', 'required|numeric');
	        $this->form_validation->set_rules('description', 'Descripcion', 'max_length[255]');
	        
		    if ($this->form_validation->run())
	        {
	            $data = array(
	            		'id' => (int) $this->input->post('id'),
	            		'idList' => (int) $this->input->post('idList'),
	                    'name'=>$this->input->post('title'),
	                    'quantity'=>$this->input->post('quantity'),
	                    'description'=>$this->input->post('description'),
	                    'status'=>$this->input->post('status'),
	                    'picture'=>$this->input->post('photo')
	                    );
	            $this->products_model->edit($this->input->post('id'), $data);
	 
	            $this->session->set_flashdata('message', 'Has modificado el producto correctamente.');            
	            redirect('/lists/view/'.$this->input->post('idList'));
	        } else {
	        	$id = (int) $this->input->post('id');
				$data['id'] = ($id) ? $id : $this->uri->segment(3);
		        $data['row'] = $this->products_model->get($data['id']);
		        $this->load->view('products/edit', $data);
	        }
	    }
    }
    
    function delete($id)
    {
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
	        $data = $this->products_model->get($id);
	        $idList = $this->uri->segment(4);
	        if ($this->products_model->delete($id)) {
	            $this->session->set_flashdata('message', "Hecho, has eliminado el producto $data->name.");                        
	        } else {
	            $this->session->set_flashdata('message', "No hemos encontrado el producto que quieres eliminar."); 
	        }
	        redirect('/lists/view/'.$idList);
	    }
    }
    
    function complete($id)
    {
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		} else {
	        $data = $this->products_model->get($id);
	        $idList = $this->uri->segment(4);
	        if ($this->products_model->setComplete($id)) {
	            $this->session->set_flashdata('message', "Has marcado el product $data->name como comprado.");                        
	        } else {
	            $this->session->set_flashdata('message', "No hemos encontrado el producto que quieres marcar.");  
	        }
	        redirect('/lists/view/'.$idList);
	    }
    }
    
}