<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_record extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('order_model');
		$this->load->model('order_product_record_model');
	}

	public function order_form(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('recipient', 'Recipient Name', 'required');
		$this->form_validation->set_rules('street1', 'Street Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('products', 'Products', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data = array();
			
			$products = $this->product_model->get_all();
			$data['products'] = $products;
			
			if($this->input->post()){
				$order->recipient = $this->input->post('recipient');
				$order->street1 = $this->input->post('street1');
				$order->street2 = $this->input->post('street2');
				$order->city = $this->input->post('city');
				$order->state = $this->input->post('state');
				$order->zip_code = $this->input->post('zip_code');
				$order->phone_number = $this->input->post('phone_number');
				$data['order'] = $order;
			}
			$this->load->view('order_form', $data);
		}
		else
		{
			$order_record['recipient'] = $this->input->post('recipient');
			$order_record['street1'] = $this->input->post('street1');
			$order_record['street2'] = $this->input->post('street2');
			$order_record['city'] = $this->input->post('city');
			$order_record['state'] = $this->input->post('state');
			$order_record['zip_code'] = $this->input->post('zip_code');
			$order_record['phone_number'] = $this->input->post('phone_number');
			$order_id = $this->order_model->update_or_insert($order_record);
			$quantity = $this->input->post('quantity');
			foreach($this->input->post('products') as $product_id){
				$this->order_product_record_model->insert(array('order_id'=>$order_id, 'product_id'=>$product_id, 'quantity'=>$quantity[$product_id]));
			}
			$this->load->view('form_success');
		}
	}
	
	public function order_details(){
		$this->load->helper('MY_url');
		
		$data['order'] = $this->order_model->get_by(array('order_key'=>$this->input->get('order_key')));
		$data['products'] = $this->order_product_record_model->with('product')->get_many_by(array('order_id'=>$data['order']->id));
		
		$this->load->view('order_details', $data);
	}

	
	
}
