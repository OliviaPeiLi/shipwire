<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function product_form(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('width', 'Width', 'required');
		$this->form_validation->set_rules('height', 'Height', 'required');
		$this->form_validation->set_rules('length', 'Length', 'required');
		$this->form_validation->set_rules('weight', 'Weight', 'required');
		$this->form_validation->set_rules('value', 'Price', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data = array();
			if(!is_null($this->input->get('product_key'))){
				$data['product'] = $this->product_model->get_by(array('product_key'=>$this->input->get('product_key')));
			}
			
			if($this->input->post()){
				$product->name = $this->input->post('name');
				$product->description = $this->input->post('description');
				$product->width = $this->input->post('width');
				$product->height = $this->input->post('height');
				$product->length = $this->input->post('length');
				$product->weight = $this->input->post('weight');
				$product->value = $this->input->post('value');
				$data['product'] = $product;
			}
			$this->load->view('product_form', $data);
		}
		else
		{
			$this->product_model->update_or_insert($this->input->post());
			$this->load->view('form_success');
		}
	}
	
	public function product_details(){
		$data['product'] = $this->product_model->get_by(array('product_key'=>$this->input->get('product_key')));
		$this->load->view('product_details', $data);
	}
	
	public function product_del(){
		$this->load->helper('url');
		
		$this->product_model->delete_by(array('product_key'=>$this->input->get('product_key')));
		
		redirect('/', 'refresh');
	}
	
	
}
